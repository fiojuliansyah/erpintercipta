<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportUsers implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        if ($row[0] === 'nik_number' && $row[1] === 'email') {
            return null; // Skip the header row
        }

        // Cari pengguna berdasarkan alamat email
        $user = User::where('nik_number', $row[0])->first();

        if (!$user) {
            // Buat pengguna baru jika tidak ada yang ditemukan
            $user = User::where('email', $row[1])->first();

            if (!$user) {
                // Buat pengguna baru jika alamat email belum digunakan
                $user = new User([
                    'nik_number' => $row[0],
                    'email' => $row[1],
                    'name' => $row[3],
                    'phone' => $row[4],
                    'password' => bcrypt($row[5]),
                ]);

                // Simpan pengguna ke database
                $user->save();
            } else {
                // Perbarui data pengguna yang sudah ada
                $user->nik_number = $row[0];
                $user->name = $row[3];
                $user->phone = $row[4];
                $user->password = bcrypt($row[5]);
                $user->save();
            }
        } else {
            // Perbarui data pengguna jika sudah ada
            $user->nik_number = $row[0];
            $user->name = $row[3];
            $user->phone = $row[4];
            $user->password = bcrypt($row[5]);
            $user->save();
        }

        // Buat profil yang terkait dengan pengguna
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'employee_nik' => $row[2],
                'address' => $row[6],
                'birth_place' => $row[7],
                'birth_date' => Date::excelToDateTimeObject($row[8])->format('Y-m-d'), // Ubah format sesuai kebutuhan Anda
                'religion' => $row[9],
                'person_status' => $row[10],
                'stay_in' => $row[11],
                'mother_name' => $row[12],
                'gender' => $row[13],
                'weight' => $row[14],
                'height' => $row[15],
                'bank_name' => $row[16],
                'bank_account' => $row[17],
                'family_number' => $row[18],
                'npwp_number' => $row[19],
                'department' => $row[20],
                // Tambahkan lebih banyak kolom profil jika diperlukan
            ]);

        return $user; // Kembalikan model User jika perlu
    }

    public function startRow(): int
    {   
        return 2; // Mulai dari baris ke-2 (lewatkan baris header)
    }
}
