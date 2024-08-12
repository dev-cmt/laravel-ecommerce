<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'vaccine_name',
        'dose_01',
        'dose_02',
        'dose_03',
        'booster',
        'market_name',
        'applicable_for',
        'location',
        'date',
        'manufacturer',
        'certificate_number',
        'side_effects',
        'upload_tool',
        'patient_id',
    ];
}
