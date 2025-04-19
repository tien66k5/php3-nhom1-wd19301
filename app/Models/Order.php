<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'status',
        'total_price',
        'create_at',
    ];

    public $timestamps = false;

    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(CheckoutAddresses::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
