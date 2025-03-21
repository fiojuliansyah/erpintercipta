<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
