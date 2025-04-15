<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['total_price', 'user_id', 'status', 'address_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function address()
    {
        return $this->belongsTo(CheckoutAddress::class, 'address_id');
    }
    
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    
}
