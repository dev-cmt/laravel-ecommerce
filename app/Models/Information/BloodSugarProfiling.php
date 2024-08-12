<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodSugarProfiling extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'reading',
        'dietary_information',
        'remark',
        'additional_note',
        'patient_id',
    ];
}
