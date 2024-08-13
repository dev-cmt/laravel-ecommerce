<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'shipping_address_id',
        'full_address',
        'state',
        'city',
        'zip_code'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
    }
}
