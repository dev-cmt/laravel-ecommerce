<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ecommerce\Product;

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

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
