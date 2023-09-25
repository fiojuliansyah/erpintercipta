<?php

// app/Exports/PkwtExport.php

namespace App\Exports;

use App\Models\Pkwt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPkwts implements FromCollection, WithHeadings
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
            'No Surat',
            'Pelamar',
            'Perusahaan',
            'Bulan',
            'Tahun',
            'Proyek',
            'Area',
            // Add more headings as needed
        ];
    }
}

