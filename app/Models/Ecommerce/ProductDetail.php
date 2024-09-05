<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return \Database\Factories\ProductDetailFactory::new();
    }

    protected $fillable = [
        'product_id',
        'detail_name',
        'detail_value'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
