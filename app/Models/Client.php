<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nama'];

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}