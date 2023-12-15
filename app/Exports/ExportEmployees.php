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
            'ID User',
            'Nama User',
            'No PKWT',
            'Jabatan',
            'Judul',
            'romawi',
            'Tahun',
            'Area',
            'Tanggal Mulai',
            'tanggal Berakhir',
            'Lama Bekerja',
            'Tempat Pelaksana',
            'Penanggung Jawab',
            'Gaji',
            'Tunjangan Jabatan',
            'Tunjangan Kehadiran',
            'Tunjangan Kehadiran',
            'Tunjangan kehadiran',
            'Tunjangan makanan',
            'Tunjangan Transport',
            'Tunjangan Lokasi',
            'Other Non Fix',
            'Pinalti',
            'addendum_id',
        ];
    }
}
