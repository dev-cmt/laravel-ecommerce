<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_address',
        'state',
        'city',
        'zip_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}