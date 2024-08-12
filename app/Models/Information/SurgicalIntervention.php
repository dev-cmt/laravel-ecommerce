<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurgicalIntervention extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'case_registry_id',
        'intervention', 
        'due_time', 
        'details', 
        'date_line', 
        'cost'
    ];
}
