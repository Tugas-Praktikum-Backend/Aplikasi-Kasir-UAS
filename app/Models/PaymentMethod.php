<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $primaryKey = 'method_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'method_id',
        'method_name',
        'admin_fee',
    ];
}