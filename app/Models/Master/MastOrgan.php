<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MastOrgan extends Model
{
    use HasFactory;

    protected $fillable = ['organ_name', 'user_id'];
}
