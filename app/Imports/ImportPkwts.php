<?php

// app/Imports/PkwtImport.php

namespace App\Imports;

use App\Models\Pkwt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withStartRow;


class ImportPkwts implements ToModel, WithStartRow // Implement the WithStartRow interface
{
    public function model(array $row)
    {
        if ($row[0] === 'addendum_id' && $row[1] === 'user_id') {
            return null; // Skip the header row
        }
        // Map the Excel columns to the database columns
        return new Pkwt([
            'addendum_id' => $row[0],
            'user_id' => $row[1]
            // Add more mappings as needed
        ]);
    }

    public function startRow(): int
    {
        return 2; // Start from row 2 (skip the header row)
    }
}

