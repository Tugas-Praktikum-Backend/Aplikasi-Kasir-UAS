<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    // Add this to allow saving data to these columns
    protected $fillable = [
        'name', 
        'percentage', 
        'start_date', 
        'end_date'
    ];
}
