<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\Agreement;
use App\Models\Pkwt;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportUserAndAgreements implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        if ($row[0] === 'nik_number' && $row[1] === 'email') {
            return null; // Skip the header row
        }

        // Pemeriksaan apakah nik_number null
        if ($row[0] === null) {
            // Jika nik_number null, lewati baris ini
            return null;
        }

        // Cari pengguna berdasarkan alamat email
        $existingUser = User::where('email', $row[1])->first();

        if ($existingUser) {
            // Jika pengguna sudah ada, perbarui data pengguna
            $existingUser->update([
                'nik_number' => $row[0],
                'name' => $row[2],
                'password' => bcrypt($row[3]),
            ]);
            $user = $existingUser;
        } else {
            // Buat pengguna baru jika tidak ada yang ditemukan
            $user = User::create([
                'nik_number' => $row[0],
                'email' => $row[1],
                'name' => $row[2],
                'password' => bcrypt($row[3]),
            ]);
        }

        // Buat profil yang terkait dengan pengguna
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'department' => $row[4],
                'employee_nik' => $row[5],
                'address' => $row[6],
                'birth_place' => $row[7],
                'birth_date' => Date::excelToDateTimeObject($row[8])->format('Y-m-d'), // Change format as needed
                'gender' => $row[9],
            ]
        );

        // Buat agreement baru
        $agreement = new Agreement([
            'department' => $row[4],
            'title' => 'PKWT ' . $row[13],
            'romawi' => $row[11],
            'year' => $row[12],
            'area' => $row[13],
            'start_date' => Date::excelToDateTimeObject($row[14])->format('Y-m-d'),
            'end_date' => Date::excelToDateTimeObject($row[15])->format('Y-m-d'),
            'length_of_work' => $row[16],
            'responsible' => $row[17],
            'salary' => $row[18],
            'department_allowance' => $row[19],
            'attendance_allowance' => $row[20],
            'comunication_allowance' => $row[21],
            'beauty_allowance' => $row[22],
            'food_allowance' => $row[23],
            'transport_allowance' => $row[24],
            'location_allowance' => $row[25],
            'other_non_fix_allowance' => $row[26],
            'penalty' => $row[27],
            'addendum_id' => $row[28],
        ]);

        // Simpan Agreement
        $agreement->save();

        // Sekarang, buat atau asosiasikan Pkwt
        $pkwt = new Pkwt([
            'agreement_id' => $agreement->id,
            'user_id' => $user->id,
            'pkwt_number' => $row[10],
        ]);

        // Simpan Pkwt
        $pkwt->save();

        // Kembalikan User (atau null) - tergantung kebutuhan Anda
        return $user;
    }

    public function startRow(): int
    {
        return 2; // Mulai dari baris 2 (lewati baris header)
    }
}
