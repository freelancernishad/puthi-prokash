<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;


    protected $fillable = [
        'header_logo',
        'footer_logo',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'pinterest',
        'mail',
        'whatsapp',
        'phone1',
        'phone2',
        'address',
        'address2',
        'short_about',
        'about',
        'Books_are_the_best_gift',
        'google_map',
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'smtp_encryption',
    ];

}
