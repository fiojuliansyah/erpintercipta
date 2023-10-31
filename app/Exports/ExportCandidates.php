<?php

namespace App\Exports;

use App\Models\Candidate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportCandidates implements FromCollection, WithHeadings
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
            'Perusahaan',
            'ID Perusahaan',
            'Nama KTP',
            'ID User',
            'Nama Panggilan',
            'Alamat',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Agama',
            'Status',
            'Nama Ibu',
            'Nama Keluarga',
            'Alamat Keluarga',
            'Berat Badan',
            'Tinggi Badan',
            'hobi',
            'No Rekening',
            'BANK',
            'Referensi',
            'Pekerjaan Referensi',
            'Hubungan Referensi',
            'Alamat Referensi',
            'No NIK',
            'No KK',
            'No NPWP',
            'Status Aktif SKCK',
            // Add more headings as needed
        ];
    }
}
