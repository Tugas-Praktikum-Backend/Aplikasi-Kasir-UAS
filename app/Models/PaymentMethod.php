<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = ['method_id', 'method_name', 'admin_fee'];

    protected $primaryKey = 'method_id';

    public $incrementing = false;
    protected $keyType = 'string';

    public function customer_payment_method() {
        return $this->belongsToMany(CustomerPaymentMethod::Class);
    }
}
