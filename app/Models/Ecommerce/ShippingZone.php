<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingZone extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_method_id',
        'zone_name',
        'cost',
        'is_active',
    ];

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class);
    }
}