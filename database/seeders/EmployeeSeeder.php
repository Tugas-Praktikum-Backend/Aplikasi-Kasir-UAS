<?php

namespace Database\Seeders;

use App\Models\Employees;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Utils\RoleUtils;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::updateOrCreate(
            ['id' => 1], 
            [
                'email' => 'manager@kasir.com',
                'password' => Hash::make('12345678'),
                'username' => 'manager',
                'role' => RoleUtils::ROLE_MANAGER,
                'monthly_revenue' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Employees::updateOrCreate(
            ['id' => 2], 
            [
                'email' => 'cashier@kasir.com',
                'password' => Hash::make('12345678'),
                'username' => 'cashier',
                'role' => RoleUtils::ROLE_CASHIER,
                'monthly_revenue' => 15000000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
