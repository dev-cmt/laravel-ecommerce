<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'name',
        'bn_name',
        'url',
    ];

    // Define the relationship with the District model
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    // Optionally, you can define a relationship with the Union model
    public function unions()
    {
        return $this->hasMany(Union::class);
    }
}
