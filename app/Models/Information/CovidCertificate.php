<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'upload_tool',
        'certificate_number',
       
    ];
    
}
