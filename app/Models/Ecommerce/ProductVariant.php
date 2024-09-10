<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Color;

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
        'color_id',
        'size',
        'price',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
