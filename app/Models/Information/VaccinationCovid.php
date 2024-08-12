<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationCovid extends Model
{
    use HasFactory;

    protected $fillable = [
        'dose_name',
        'location',
        'date',
        'manufacturer',
        'patient_id',
    ];
}
