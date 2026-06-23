<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Employees extends User
{
    protected $fillable = ['username', 'email', 'password', 'role', 'monthly_revenue'];
}
