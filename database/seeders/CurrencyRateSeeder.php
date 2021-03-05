<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencyRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Currency::create([
            'currency' => 'Dollars',
            'rate' => 450,
            'naira' => 1
        ]);
        Currency::create([
            'currency' => 'Pounds',
            'rate' => 550,
            'naira' => 1
        ]);
        Currency::create([
            'currency' => 'Euros',
            'rate' => 600,
            'naira' => 1
        ]);
    }
}
