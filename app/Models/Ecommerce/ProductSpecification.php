<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return \Database\Factories\ProductSpecificationFactory::new();
    }

    protected $fillable = [
        'product_id',
        'specification_name',
        'specification_value'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
