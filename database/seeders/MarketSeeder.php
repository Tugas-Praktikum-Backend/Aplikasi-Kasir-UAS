<?php

namespace Database\Seeders;

use App\Models\Market;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Market::create([
            'id' => 1,
            'total_pemasukan' => 0,
            'modal_toko' => 0,
        ]);
    }
}
