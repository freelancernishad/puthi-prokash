<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'multimedia_categories_id',
        'title',
        'description',
        'media_type',
        'media_url',
    ];


    public function category()
    {
        return $this->belongsTo(MultimediaCategory::class, 'multimedia_categories_id');
    }


}
