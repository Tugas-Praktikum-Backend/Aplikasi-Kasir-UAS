<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::create([
            'method_id' => 'BCA',
            'method_name' => 'BCA',
            'admin_fee' => 2000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        PaymentMethod::create([
            'method_id' => 'Mandiri',
            'method_name' => 'Mandiri',
            'admin_fee' => 1000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
