<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomUploaderTool extends Model
{
    protected $fillable = [
        'patient_id', 
        'document_name',
        'sub_type',
        'date',
        'additional_note',
        'upload_tool',
    ];
}
