<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Master\MastComplaint;
use App\Models\User;
use App\Models\CaseComplaint;
use App\Models\Information\TreatmentProfile;
use App\Models\Information\LabTest;
use App\Models\Information\MedicationSchedule;
use App\Models\Information\SurgicalIntervention;
use App\Models\Information\OptionsalQuestion;
use App\Models\Information\Restriction;

class CaseRegistry extends Model
{
    use HasFactory;
    
    protected $table = 'case_registries';

    protected $fillable = [
        'patient_id',
        'date_of_primary_identification',
        'date_of_first_visit',
        'recurrence',
        'duration',
        'duration_unit',
        'area_of_problem',
        'type_of_ailment',
        'additional_complaints',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function complaints()
    {
        return $this->belongsToMany(MastComplaint::class, 'case_complaints');
    }
    public function caseComplaints()
    {
        return $this->hasMany(CaseComplaint::class);
    }

    /**
     * 
     * 
     */
    public function treatmentProfile()
    {
        return $this->hasOne(TreatmentProfile::class, 'case_registry_id');
    }
    public function medicationSchedule()
    {
        return $this->hasMany(MedicationSchedule::class, 'case_registry_id');
    }
    public function surgicalIntervention()
    {
        return $this->hasMany(SurgicalIntervention::class, 'case_registry_id');
    }
    public function optionsalQuestion()
    {
        return $this->hasOne(OptionsalQuestion::class, 'case_registry_id');
    }
    public function restriction()
    {
        return $this->hasMany(Restriction::class, 'case_registry_id');
    }

}
