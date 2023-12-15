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
            'department' => $row[3],
            'title' => $row[4],
            'romawi' => $row[5],
            'year' => $row[6],
            'area' => $row[7],
            'start_date' => Date::excelToDateTimeObject($row[8])->format('Y-m-d'),
            'end_date' => Date::excelToDateTimeObject($row[9])->format('Y-m-d'),
            'length_of_work' => $row[10],
            'place' => $row[11],
            'responsible' => $row[12],
            'salary' => $row[13],
            'department_allowance' => $row[14],
            'attendance_allowance' => $row[15],
            'comunication_allowance' => $row[16],
            'beauty_allowance' => $row[17],
            'food_allowance' => $row[18],
            'transport_allowance' => $row[19],
            'location_allowance' => $row[20],
            'other_non_fix_allowance' => $row[21],
            'penalty' => $row[22],
            'addendum_id' => $row[23],
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
            'pkwt_number' => $row[2]
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
