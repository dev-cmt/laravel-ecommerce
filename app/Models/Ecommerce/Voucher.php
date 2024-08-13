<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucher_code',
        'discount_type',
        'discount_value',
        'start_date',
        'end_date',
        'description',
        'status',
        'max_usage',
        'used_count'
    ];
}
