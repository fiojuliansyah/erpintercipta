<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportEmployees implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        // Define the column headings for the Excel file
        return [
            'ID Addendum',
            'No Pkwt',
            'ID User',
            'Nama User',
            'Jabatan',
            'project',
            'Area',
        ];
    }
}
