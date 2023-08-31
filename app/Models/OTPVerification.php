<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTPVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'otp',
        'expires_at',
        'verified_at',
    ];
}
