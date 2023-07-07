<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $terms = [
            'C.O.D',
            'NET 14',
            'NET 30',
            'NET 60',
            'NET 90',
            'NET 120',
        ];
       
        foreach ($terms as $term) {
            Term::create(['term' => $term]);
        }
    }
}
