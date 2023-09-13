<?php
  
namespace App\Models;
  
use App\Models\Pkwt;
use App\Models\Esign;
use App\Models\Profile;
use App\Models\Signature;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
  
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik_number',
        'name',
        'email',
        'phone',
        'password',
    ];
  
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function pkwt()
    {
        return $this->hasOne(Pkwt::class, 'user_id', 'id');
    }

    public function signature()
    {
        return $this->hasOne(Signature::class, 'user_id', 'id');
    }

    public function esign()
    {
        return $this->hasOne(Esign::class, 'user_id', 'id');
    }

    public function applicant()
    {
        return $this->hasOne(Applicant::class, 'user_id', 'id');
    }
}