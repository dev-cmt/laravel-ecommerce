<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'published_at',
        'status'
    ];

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function views()
    {
        return $this->hasMany(BlogView::class);
    }

    public function shares()
    {
        return $this->hasMany(BlogShare::class);
    }
}
