<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'method_name',
        'description',
        'is_active',
    ];

    public function shippingZones()
    {
        return $this->hasMany(ShippingZone::class);
    }

}
