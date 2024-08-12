<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\DoctorAppointment;

class DoctorAppointmentDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_appointment_id',
        'appointment',
        'day',
        'time_date_tool',
        'fee',
        'note',
    ];

    public function doctorAppointment()
    {
        return $this->belongsTo(DoctorAppointment::class, 'doctor_appointment_id');
    }

}
