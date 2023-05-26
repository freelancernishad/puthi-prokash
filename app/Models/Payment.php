<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'trx_id',
        'trx_date',
        'trx_month',
        'trx_year',
        'amount',
        'payment_status',
        'payment_url',
        'payment_ipn',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
