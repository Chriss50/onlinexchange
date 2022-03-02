<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            ['name' => 'USD', 'rate' => 1],
            ['name' => 'EUR', 'rate' => 0.89],
            ['name' => 'NGN', 'rate' => 415.56]
        ]);
    }
}
