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
        // Seed users, categories, and brands
        User::factory()->count(10)->create();
        Category::factory()->count(20)->create();
        Brand::factory()->count(20)->create();

        // Step 1: Insert data into the Color table first
        $colors = Color::factory()->count(20)->create();

        Product::factory(20)->create()->each(function ($product) use ($colors) {
            ProductVariant::factory(3)->create([
                'product_id' => $product->id,
                'color_id' => $colors->random()->id
            ]);
            ProductImage::factory(3)->create(['product_id' => $product->id]);
            ProductDetail::factory(3)->create(['product_id' => $product->id]);
            ProductSpecification::factory(3)->create(['product_id' => $product->id]);
        });
    }
}
