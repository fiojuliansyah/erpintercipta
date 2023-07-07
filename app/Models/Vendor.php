<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function taxcategorya()
    {
        return $this->belongsTo(Taxcategory::class);
    }
    
    public function taxcategoryb()
    {
        return $this->belongsTo(Taxcategory::class);
    }

    public function department()
    {
        return $this->hasMany(Department::class);
    }

    public function chartofaccount()
    {
        return $this->hasMany(Chartofaccount::class);
    }
}
