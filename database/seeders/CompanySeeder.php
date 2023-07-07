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
        $companies = [
            'PT. CIPTA MANDIRI AGUNG JAYA',
            'PT. INTERCIPTA JASA INDONESIA',
            'PT. GANA SAKTI INDONESIA',
            'PT. SARANA ADI NUSAPARKA',
        ];
       
        foreach ($companies as $company) {
            Company::create(['company' => $company]);
        }
    }
}