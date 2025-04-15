<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutAddress extends Model
{
    protected $table = 'checkout_addresses';  

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'province',
        'district',
        'ward',
        'address_detail',
    ];


    public function orders()
    {
        return $this->hasMany(Order::class, 'address_id');
    }
    
}
