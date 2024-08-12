<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MastEquipment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];
}
