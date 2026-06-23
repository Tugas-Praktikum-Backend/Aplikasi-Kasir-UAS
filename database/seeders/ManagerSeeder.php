<?php

namespace Database\Seeders;

use App\Models\Employees;
use App\Models\Market;
use App\Utils\RoleUtils;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function now;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::query()->create( [
            'email' => 'temp_manager@gmail.com',
            'password' => Hash::make('12345678'),
            'username' => 'temp_manager',
            'role' => RoleUtils::ROLE_MANAGER,
            'monthly_revenue' => 15000000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Employees::query()->create([
            'email' => 'temp_cashier@gmail.com',
            'password' => Hash::make('12345678'),
            'username' => 'temp_cashier',
            'role' => RoleUtils::ROLE_CASHIER,
            'monthly_revenue' => 7000000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Employees::query()->create([
            'email' => 'temp_supplier@gmail.com',
            'password' => Hash::make('12345678'),
            'username' => 'temp_cashier',
            'role' => RoleUtils::ROLE_SUPPLIER,
            'monthly_revenue' => 5000000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
