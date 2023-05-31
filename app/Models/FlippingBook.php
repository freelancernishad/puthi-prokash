<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlippingBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'page',
        'image',
        'type',
        'status',
        'product_id',
    ];

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
