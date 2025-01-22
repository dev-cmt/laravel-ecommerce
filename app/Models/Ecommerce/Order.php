<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'shipping_address_id',
        'coupon_id',
        'total_amount',
        'discount_amount',
        'gross_amount',
        'shipping_amount',
        'net_amount',
        'order_notes',
        'status',
        'payment_status',
        'payment_gateway_id',
        'payment_number',
        'transaction_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shippingAddress()
    {
        return $this->hasOne(OrderShippingAddress::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function paymentGateway()
    {
        return $this->belongsTo(PaymentGateway::class);
    }
}
