<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'sku_id', 'price', 'quantity'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function productSku()
    {
        return $this->belongsTo(ProductSku::class, 'sku_id');
    }
    
}
