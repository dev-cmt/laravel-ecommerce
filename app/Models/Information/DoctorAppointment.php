<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\DoctorAppointmentDetails;

class DoctorAppointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'designation',
        'specialization',
        'chamber_address',
        'availability_hours',
        'contact_number',
        'patient_id',
    ];

    public function patient(){
        return $this->belongsTo(User::class,'patient_id');
    }
    public function appointmentDetails(){
        return $this->hasMany(DoctorAppointmentDetails::class,'doctor_appointment_id');
    }
}
