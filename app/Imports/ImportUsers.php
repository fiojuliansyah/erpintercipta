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
        $user = User::where('email', $row[1])->first();

        if (!$user) {
            // Buat pengguna baru jika tidak ada yang ditemukan
            $user = new User([
                'nik_number' => $row[0],
                'email' => $row[1],
                'name' => $row[2],
                'phone' => $row[3],
                'password' => bcrypt($row[4]),
            ]);

            // Simpan pengguna ke database
            $user->save();
        } else {
            // Perbarui data pengguna jika sudah ada
            $user->nik_number = $row[0];
            $user->name = $row[2];
            $user->phone = $row[3];
            $user->password = bcrypt($row[4]);
            $user->save();
        }

        // Buat profil yang terkait dengan pengguna
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'address' => $row[5],
                'birth_place' => $row[6],
                'birth_date' => Date::excelToDateTimeObject($row[7])->format('Y-m-d'), // Ubah format sesuai kebutuhan Anda
                'religion' => $row[8],
                'person_status' => $row[9],
                'stay_in' => $row[10],
                'mother_name' => $row[11],
                'family_name' => $row[12],
                'family_address' => $row[13],
                'gender' => $row[14],
                'weight' => $row[15],
                'height' => $row[16],
                'hobby' => $row[17],
                'bank_name' => $row[18],
                'bank_account' => $row[19],
                'reference' => $row[20],
                'reference_job' => $row[21],
                'reference_relation' => $row[22],
                'reference_address' => $row[23],
                'active_date' => $row[24],
                'family_number' => $row[25],
                'npwp_number' => $row[26],
                // Tambahkan lebih banyak kolom profil jika diperlukan
            ]);

        return $user; // Kembalikan model User jika perlu
    }

    public function startRow(): int
    {   
        return 2; // Mulai dari baris ke-2 (lewatkan baris header)
    }
}
