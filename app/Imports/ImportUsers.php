<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withStartRow;
use Illuminate\Support\Facades\Hash;


class ImportUsers implements ToModel, WithStartRow // Implement the WithStartRow interface
{
    public function model(array $row)
    {
        if ($row[0] === 'nik_number' && $row[1] === 'email') {
            return null; // Skip the header row
        }
    
        // Check if the password is already hashed (you may need to adjust this check based on your data)
        $password = Hash::needsRehash($row[4]) ? Hash::make($row[4]) : $row[4];
    
        return new User([
            'nik_number' => $row[0],
            'email' => $row[1],
            'name' => $row[2],
            'phone' => $row[3],
            'password' => $password,
            // Add more mappings as needed
        ]);
    }

    public function startRow(): int
    {
        return 2; // Start from row 2 (skip the header row)
    }
}