<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkwt extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function addendum()
    {
        return $this->belongsTo(Addendum::class);
    }

    public function agreement()
    {
        return $this->belongsTo(Agreement::class);
    }
}
