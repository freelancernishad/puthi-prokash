<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'cat_id',
        'name',
        'slug',
        'icon',
        'parent_id',
        'index_number',
    ];



    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->with('parent');
    }


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('children');
    }

    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('childrens');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }


    public function categoryImages()
    {
        return $this->hasMany(CategoryImage::class);
    }


    public function productCount()
        {
            return $this->hasMany(CategoryProduct::class)
                ->selectRaw('category_id, count(*) as count')
                ->groupBy('category_id');
        }


}
