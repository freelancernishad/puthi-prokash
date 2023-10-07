<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderId',
        'user_id',
        'amount',
        'delevery',
        'total_amount',
        'total_quantity',
        'name',
        'email',
        'phone',
        'address',
        'address2',
        'country',
        'user_division',
        'user_district',
        'user_thana',
        'user_union',
        'state',
        'zip',
        'paymentMethod',
    ];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
            ->withPivot('quantity')
            ->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public static function generateSerial()
    {
        $lastOrder = Order::orderByDesc('id')->first();

        if ($lastOrder) {
            $lastSerial = $lastOrder->orderId;
            $lastNumber = (int) substr($lastSerial, -6); // Extract the last 6 digits as a number
            $newNumber = $lastNumber + 1;

            // Pad the number with leading zeros to make it 6 digits
            $newSerial = str_pad($newNumber, 6, '0', STR_PAD_LEFT);
        } else {
            // If no previous order exists, start with 000001
            $newSerial = '000001';
        }

        return $newSerial;
    }

    protected static function boot()
    {
        parent::boot();

        // Generate a 6-character serial ID for the orderId before creating a new order
        static::creating(function ($order) {
            $order->orderId = self::generateSerial();
        });
    }

}
