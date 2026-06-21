<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nama', 'harga']; 

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }
}
