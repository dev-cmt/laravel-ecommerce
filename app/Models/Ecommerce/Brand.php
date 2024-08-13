<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name',
        'url_slug',
        'description',
        'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
