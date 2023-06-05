<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'price',

        'discount_type',
        'discount',
        'prossod',
        'total_page',
        'release_date',
        'cover_type',
        'ISBN',


        'visit',
        'share',
        'buy',
        'image',
        'author_id',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function flippingBooks()
    {
        return $this->hasMany(FlippingBook::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
