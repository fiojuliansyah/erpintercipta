<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'company', 'cmpy', 'image'
    ];

    public function careers()
    {
        return $this->hasMany(Career::class);
    }
}
