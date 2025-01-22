<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gateway_type',
        'description',
        'api_key',
        'merchant_id',
        'secret_key',
        'payment_url',
        'image_path',
        'is_active',
        'currency',
        'priority',
    ];
}
