<?php

namespace Database\Seeders;

use App\Models\Taxcategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaxCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxs = [
            'PPN 11%',
            'PPH 23 2%',
            'PPH 4/2 10%',
            'PPN WAPU 11%',
            'PPH 21 2,5%'
        ];
       
        foreach ($taxs as $tax) {
            Taxcategory::create(['taxcategory' => $tax]);
        }
    }
}
