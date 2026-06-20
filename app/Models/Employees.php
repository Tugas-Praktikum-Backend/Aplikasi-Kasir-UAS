<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = ['id', 'created_at', 'updated_at', 'role'];
}
