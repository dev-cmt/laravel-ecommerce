<?php
// database/seeders/FactorySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Brand;
use App\Models\Ecommerce\Color;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\ProductImage;
use App\Models\Ecommerce\ProductVariant;
use App\Models\Ecommerce\ProductSpecification;
use App\Models\Ecommerce\ProductDetail;
use App\Models\User;

class FactorySeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create();
        Category::factory()->count(20)->create();
        Brand::factory()->count(20)->create();
        Color::factory()->count(20)->create();

        Product::factory(20)->create()->each(function ($product) {
            // Seed related product variants, images, details, and specifications
            ProductVariant::factory(3)->create(['product_id' => $product->id]);
            ProductImage::factory(3)->create(['product_id' => $product->id]);
            ProductDetail::factory(3)->create(['product_id' => $product->id]);
            ProductSpecification::factory(3)->create(['product_id' => $product->id]);
        });
    }
}
