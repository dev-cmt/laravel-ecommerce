<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles; // KEY :: MULTIPERMISSION
use App\Models\Master\MastNationality;
use App\Models\Information\GeneralProfile;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles; // KEY :: MULTIPERMISSION

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'unique_patient_id',
        'gender',
        'blood_group',
        'marital_status',
        'phone',
        'profile_images',
        'status',
    ];


    public function mastNationality()
    {
        return $this->belongsTo(MastNationality::class);
    }

    public function generalProfile()
    {
        return $this->hasOne(GeneralProfile::class, 'patient_id');
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
