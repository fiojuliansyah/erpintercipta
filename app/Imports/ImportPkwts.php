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
        if ($row[0] === 'reference_number' && $row[1] === 'user_id' && $row[2] === 'company_id') {
            return null; // Skip the header row
        }
        // Map the Excel columns to the database columns
        return new Pkwt([
            'reference_number' => $row[0],
            'user_id' => $row[1],
            'company_id' => $row[2],
            'date' => $row[3],
            'date_abjad' => $row[4],
            'month' => $row[5],
            'month_abjad' => $row[6],
            'year' => $row[7],
            'year_abjad' => $row[8],
            'project' => $row[9],
            'area' => $row[10],
            'salary' => $row[11],
            'allowance' => $row[12],
            'place' => $row[13],
            // Add more mappings as needed
        ]);
    }

    public function startRow(): int
    {
        return 2; // Start from row 2 (skip the header row)
    }
}

