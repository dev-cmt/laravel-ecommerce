<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_code',
        'discount_type',
        'discount_value',
        'start_date',
        'end_date',
        'description',
        'status',
        'max_usage',
        'used_count'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'coupon_code', 'coupon_code');
    }
}
