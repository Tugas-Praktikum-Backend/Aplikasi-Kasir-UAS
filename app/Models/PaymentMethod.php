<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = ['method_id', 'method_name', 'admin_fee'];

    public function customer_payment_method() {
        return $this->belongsToMany(CustomerPaymentMethod::Class);
    }
}
