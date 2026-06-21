<?php

use App\Utils\RoleUtils;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('username');
            $table->string('role');
            $table->integer('monthly_revenue');
            $table->timestamps();
        });
        DB::table('employees')->insert([
            [
                'email' => 'temp_manager@gmail.com',
                'password' => Hash::make('12345678'),
                'username' => 'temp_manager',
                'role' => RoleUtils::ROLE_MANAGER,
                'monthly_revenue' => 15000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'temp_cashier@gmail.com',
                'password' => Hash::make('12345678'),
                'username' => 'temp_cashier',
                'role' => RoleUtils::ROLE_CASHIER,
                'monthly_revenue' => 7000000,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
