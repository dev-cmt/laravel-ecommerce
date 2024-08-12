<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodPressureProfiling extends Model
{
    use HasFactory;

    protected $fillable = [
        'time', 
        'systolic', 
        'diastolic', 
        'heart_rate_bpm', 
        'additional_note',
        'patient_id'
    ];

}
