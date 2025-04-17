<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['sku_id', 'quantity', 'user_id'];

    public function productSku() {
        return $this->belongsTo(ProductSku::class, 'sku_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
