<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensitiveInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sexually_active',
        'diabetic',
        'allergies',
        'allergy_details',
        'thyroid',
        'thyroid_details',
        'hypertension',
        'cholesterol',
        'cholesterol_details',
        's_creatinine',
        's_creatinine_details',
        'smoking',
        'smoking_details',
        'alcohol_intake',
        'alcohol_intake_details',
        'drug_abuse_history',
        'drug_abuse_details',
        'patient_id',
    ];

    // If you want to cast the enum fields to specific values, you can use casts
    protected $casts = [
        'sexually_active' => 'string',
        'diabetic' => 'string',
        'allergies' => 'string',
        'thyroid' => 'string',
        'hypertension' => 'string',
        'cholesterol' => 'string',
        's_creatinine' => 'string',
        'smoking' => 'string',
        'alcohol_intake' => 'string',
        'drug_abuse_history' => 'string',
    ];
}
