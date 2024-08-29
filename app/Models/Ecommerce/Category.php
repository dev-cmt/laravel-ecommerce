<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'url_slug',
        'parent_cat_id',
        'description',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate slug from category_name
            $model->url_slug = Str::slug($model->category_name);
        });

        static::updating(function ($model) {
            // Update slug if category_name is changed
            if ($model->isDirty('category_name')) {
                $model->url_slug = Str::slug($model->category_name);
            }
        });
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_cat_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_cat_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
