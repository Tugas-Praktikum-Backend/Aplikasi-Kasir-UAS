<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['product_id', 'merek', 'stock', 'isipc', 'hrgktn'];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
