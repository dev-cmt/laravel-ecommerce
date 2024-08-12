<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneticDiseaseProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'disease_diabetes',
        'disease_stroke',
        'disease_heart',
        'disease_hyper',
        'disease_pressure',
        'disease_balding',
        'disease_vitiligo',
        'disease_disability',
        'disease_psoriasis',
        'disease_eczema',
        'other_diseases',
        'additional_comments',
        'patient_id',
    ];
}
