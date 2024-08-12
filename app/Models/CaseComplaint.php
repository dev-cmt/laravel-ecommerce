<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information\CaseRegistry;
use App\Models\Master\MastComplaint;

class CaseComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_registry_id',
        'complaint_id',
    ];

    public function mastComplaint()
    {
        return $this->belongsTo(MastComplaint::class);
    }

    public function caseRegistry()
    {
        return $this->belongsTo(CaseRegistry::class);
    }

}
