<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'product_id',
        'total_price',
        'payment_method',
        'status',
        'discounts'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'method_id');
    }
}
