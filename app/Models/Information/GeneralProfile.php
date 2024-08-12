<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GeneralProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'dob',
        'age',
        'religion',
        'height_feet',
        'height_inches',
        'weight_kg',
        'weight_pounds',
        'bmi',
        'address',
        'mast_nationality_id',
        'emergency_contact',
        'patient_id',
    ];

    public function getDobAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
}
