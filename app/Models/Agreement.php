<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function addendum()
    {
        return $this->belongsTo(Addendum::class);
    }
}
