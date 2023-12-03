<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultimediaCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function multimedia()
    {
        return $this->hasMany(Multimedia::class, 'category_id');
    }



}
