<?php

namespace Database\Seeders;

use App\Models\Accounttype;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounttypes = [
            'Cash/Bank',
            'Account Receivable',
            'Inventory',
            'Other Current Asset',
            'Fixed Asset',
            'Accumulated Depreciation',
            'Other Asset',
            'Account Payable',
        ];
       
        foreach ($accounttypes as $accounttype) {
            Accounttype::create(['accounttype' => $accounttype]);
        }
    }
}
