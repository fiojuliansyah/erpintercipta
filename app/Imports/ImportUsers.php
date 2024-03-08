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
                'phone' => $row[3],
                'password' => bcrypt($row[4]),
            ]);
            $user = $existingUser;
        } else {
            // Buat pengguna baru jika tidak ada yang ditemukan
            $user = User::create([
                'nik_number' => $row[0],
                'email' => $row[1],
                'name' => $row[2],
                'phone' => $row[3],
                'password' => bcrypt($row[4]),
            ]);
        }
    
        // Buat profil yang terkait dengan pengguna
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'department' => $row[5],
                'employee_nik' => $row[6],
                'address' => $row[7],
                'birth_place' => $row[8],
                'birth_date' => Date::excelToDateTimeObject($row[9])->format('Y-m-d'), // Ubah format sesuai kebutuhan Anda
                'religion' => $row[10],
                'person_status' => $row[11],
                'stay_in' => $row[12],
                'mother_name' => $row[13],
                'gender' => $row[14],
                'weight' => $row[15],
                'height' => $row[16],
                'bank_name' => $row[17],
                'bank_account' => $row[18],
                'family_number' => $row[19],
                'npwp_number' => $row[20],
                // Tambahkan lebih banyak kolom profil jika diperlukan
            ]);
    
        return $user; // Kembalikan model User jika perlu
    }
    

    public function startRow(): int
    {   
        return 2; // Mulai dari baris ke-2 (lewatkan baris header)
    }
}
