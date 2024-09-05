<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return \Database\Factories\ProductVariantFactory::new();
    }

    protected $fillable = [
        'product_id',
        'img_path',
        'color',
        'size',
        'price',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
