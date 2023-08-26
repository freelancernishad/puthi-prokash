<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheBookOfPuthiprakash extends Model
{
    use HasFactory;
    protected $fillable = ['category_id']; // Add other fillable fields

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
