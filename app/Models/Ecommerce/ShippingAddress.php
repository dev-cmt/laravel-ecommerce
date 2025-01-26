<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'phone_number',
        'building',
        'colony',
        'region_name',
        'city_name',
        'area_name',
        'address',
        'delivery_label',
        'is_delete',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
