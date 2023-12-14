<?php

namespace App\Imports;

use App\Models\Agreement;
use App\Models\Pkwt;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportAgreements implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        // Buat agreement baru
        $agreement = new Agreement([
            'department' => $row[2],
            'title' => $row[3],
            'romawi' => $row[4],
            'year' => $row[5],
            'area' => $row[6],
            'start_date' => Date::excelToDateTimeObject($row[7])->format('Y-m-d'),
            'end_date' => Date::excelToDateTimeObject($row[8])->format('Y-m-d'),
            'length_of_work' => $row[9],
            'place' => $row[10],
            'responsible' => $row[11],
            'salary' => $row[12],
            'department_allowance' => $row[13],
            'attendance_allowance' => $row[14],
            'comunication_allowance' => $row[15],
            'beauty_allowance' => $row[16],
            'food_allowance' => $row[17],
            'transport_allowance' => $row[18],
            'location_allowance' => $row[19],
            'other_non_fix_allowance' => $row[20],
            'penalty' => $row[21],
            'addendum_id' => $row[22],
            // ... tambahkan pemetaan lain sesuai kebutuhan
        ]);

        // Simpan Agreement
        $agreement->save();

        // Set user_id ke user_id dari baris saat ini
        $user_id = $row[0];

        // Sekarang, buat atau asosiasikan Pkwt
        $pkwt = new Pkwt([
            'agreement_id' => $agreement->id,
            'user_id' => $user_id,
            'pkwt_number' => $row[1]
            // ... tambahkan pemetaan lain sesuai kebutuhan
        ]);

        // Simpan Pkwt
        $pkwt->save();

        // Kembalikan Agreement (atau null) - tergantung kebutuhan Anda
        return $agreement;
    }

    public function startRow(): int
    {
        return 2; // Mulai dari baris 2 (lewati baris header)
    }
}
