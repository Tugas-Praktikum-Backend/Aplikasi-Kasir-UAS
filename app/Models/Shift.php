<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model {

    protected $fillable = [
        'username', 'start_shift', 'total_duration', 'created_at', 'updated_at'
    ];
}
