<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyConversionRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_currency',
        'source_amount',
        'target_currency',
        'target_amount',
        'exchange_rate',
        'last_updated_at'
    ];
}
