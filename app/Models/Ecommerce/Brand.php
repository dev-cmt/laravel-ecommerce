<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ecommerce\Product;

class Brand extends Model
{
    use HasFactory;
    
    protected static function newFactory()
    {
        return \Database\Factories\BrandFactory::new();
    }

    protected $fillable = [
        'brand_name',
        'url_slug',
        'img_path',
        'description',
        'status',
        'user_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
