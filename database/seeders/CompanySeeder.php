<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'company' => 'PT. INTERCIPTA JASA INDONESIA',
            'cmpy' => 'IJI'
        ]);

        Company::create([
            'company' => 'PT. CIPTA MANDIRI AGUNG JAYA',
            'cmpy' => 'CMAJ'
        ]);

        Company::create([
            'company' => 'PT. GANA SAKTI INDONESIA',
            'cmpy' => 'GSI'
        ]);

        Company::create([
            'company' => 'PT. SARANA ADI NUSAPARKA',
            'cmpy' => 'SAN'
        ]);
    }
}