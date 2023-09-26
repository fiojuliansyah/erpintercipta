<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Profile;
use Maatwebsite\Excel\Concerns\ToModel;
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
            'department' => $row[5],
            'project' => $row[6],
            'area' => $row[7],
            'address' => $row[8],
            'birth_place' => $row[9],
            'birth_date' => $row[10],
            'religion' => $row[11],
            'person_status' => $row[12],
            'stay_in' => $row[13],
            'mother_name' => $row[14],
            'family_name' => $row[15],
            'family_address' => $row[16],
            'gender' => $row[17],
            'weight' => $row[18],
            'height' => $row[19],
            'hobby' => $row[20],
            'bank_name' => $row[21],
            'bank_account' => $row[22],
            'reference' => $row[23],
            'reference_job' => $row[24],
            'reference_relation' => $row[25],
            'reference_address' => $row[26],
            'active_date' => $row[27],
            'family_number' => $row[28],
            'npwp_number' => $row[29],
            // Tambahkan lebih banyak kolom profil jika diperlukan
        ]);
        
        return $user; // Kembalikan model User jika perlu
    }

    public function startRow(): int
    {   
        return 2; // Mulai dari baris ke-2 (lewatkan baris header)
    }
}

