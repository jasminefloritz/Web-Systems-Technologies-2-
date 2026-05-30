<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        Sale::insert([
            ['amount' => 1200, 'sale_date' => '2025-01-10'],
            ['amount' => 950,  'sale_date' => '2025-01-25'],

            ['amount' => 1100, 'sale_date' => '2025-02-08'],
            ['amount' => 1350, 'sale_date' => '2025-02-20'],

            ['amount' => 1500, 'sale_date' => '2025-03-05'],
            ['amount' => 1750, 'sale_date' => '2025-03-22'],

            ['amount' => 800,  'sale_date' => '2025-04-10'],
            ['amount' => 950,  'sale_date' => '2025-04-28'],

            ['amount' => 2000, 'sale_date' => '2025-05-03'],
            ['amount' => 2200, 'sale_date' => '2025-05-20'],

            ['amount' => 1800, 'sale_date' => '2025-06-12'],
            ['amount' => 2100, 'sale_date' => '2025-06-25'],

            ['amount' => 1600, 'sale_date' => '2025-07-08'],
            ['amount' => 1900, 'sale_date' => '2025-07-30'],

            ['amount' => 2300, 'sale_date' => '2025-08-15'],
            ['amount' => 2500, 'sale_date' => '2025-08-28'],

            ['amount' => 1700, 'sale_date' => '2025-09-10'],
            ['amount' => 2000, 'sale_date' => '2025-09-25'],

            ['amount' => 2200, 'sale_date' => '2025-10-05'],
            ['amount' => 2400, 'sale_date' => '2025-10-18'],

            ['amount' => 2600, 'sale_date' => '2025-11-02'],
            ['amount' => 2800, 'sale_date' => '2025-11-20'],

            ['amount' => 3000, 'sale_date' => '2025-12-10'],
            ['amount' => 3200, 'sale_date' => '2025-12-25'],
        ]);
    }
}