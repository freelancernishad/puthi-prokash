<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use lemonpatwari\bangladeshgeocode\Models\Thana;
use lemonpatwari\bangladeshgeocode\Models\Union;
use lemonpatwari\bangladeshgeocode\Models\District;
use lemonpatwari\bangladeshgeocode\Models\Division;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'city',
        'state',
        'country',
        'division',
        'district',
        'thana',
        'union',
        'zip',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function user_division()
    {
        return $this->belongsTo(Division::class, 'division');
    }


    public function user_district()
    {
        return $this->belongsTo(District::class, 'district');
    }

    public function user_thana()
    {
        return $this->belongsTo(Thana::class, 'thana');
    }

    public function user_union()
    {
        return $this->belongsTo(Union::class, 'union');
    }




}
