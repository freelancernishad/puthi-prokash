<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryCharge extends Model
{
    use HasFactory;

    protected $fillable = ['weight_from', 'weight_to', 'charge'];

    public function scopeInRange($query, $weight)
    {
        return $query->where('weight_from', '<=', $weight)
                     ->where('weight_to', '>=', $weight);
    }

}
