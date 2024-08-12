<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Master\MastEquipment;
use App\Models\Master\MastPower;
use App\Models\User;

class MedicationSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_registry_id',
        'mast_equipment_id',
        'full_name',
        'mast_power_id',
        'duration',
        'frequency',
        'morning',
        'noon',
        'night',
        'cost',
        'timing',
        'antibiotic',
    ];

    // Relationships
    public function equipment()
    {
        return $this->belongsTo(MastEquipment::class, 'mast_equipment_id');
    }

    public function power()
    {
        return $this->belongsTo(MastPower::class, 'mast_power_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
