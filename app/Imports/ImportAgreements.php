<?php

namespace App\Imports;

use App\Models\Agreement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportAgreements implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        if ($row[0] === 'addendum_id' && $row[1] === 'title') {
            return null; // Skip the header row
        }
        // Map the Excel columns to the database columns
        return new Agreement([
            'addendum_id' => $row[0],
            'title' => $row[1],
            'department' => $row[2],
            'romawi' => $row[3],
            'year' => $row[4],
            'area' => $row [5],
            'start_date' => Date::excelToDateTimeObject($row[6])->format('Y-m-d'),
            'end_date' => Date::excelToDateTimeObject($row[7])->format('Y-m-d'),
            'length_of_work' => $row[8],
            'place' => $row[9],
            'responsible' => $row[10],
            'salary' => $row[11],
            'department_allowance' => $row[12],
            'attendance_allowance' => $row[13],
            'comunication_allowance' => $row[14],
            'beauty_allowance' => $row[15],
            'food_allowance' => $row[16],
            'transport_allowance' => $row[17],
            'location_allowance' => $row[18],
            'other_non_fix_allowance' => $row[19],
            'penalty' => $row[20]
        ]);
    }

    public function startRow(): int
    {
        return 2; // Start from row 2 (skip the header row)
    }
}
