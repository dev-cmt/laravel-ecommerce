<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ecommerce\ProductVariant;

class Color extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Database\Factories\ColorFactory::new();
    }

    protected $fillable = [
        'color_name', 
        'hex_value',
        'status',
        'user_id'
    ];

    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
