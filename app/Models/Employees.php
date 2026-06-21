<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Employees extends User
{
    protected $fillable = ['id', 'created_at', 'updated_at', 'role', 'revenue'];
}
