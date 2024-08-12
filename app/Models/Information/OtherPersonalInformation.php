<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherPersonalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'marital_status',
        'home_address',
        'office_address',
        'email_address',
        'phone_number',
        'last_blood_donated',
        'health_insurance_number',
        'family_physician',
        'physician_contact',
        'pregnancy_status',
        'menstrual_cycle',
        'activity_status',
        'remark',
        'patient_id',
    ];
}
