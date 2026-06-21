<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerPaymentMethod extends Model
{
    protected $fillable = ['customer_id', 'method_id', 'balance'];

    public function customer() {
        return $this->belongsToMany(Customer::class);
    }

    public function payment_method() {
        return $this->belongsToMany(PaymentMethod::class);
    }
}
