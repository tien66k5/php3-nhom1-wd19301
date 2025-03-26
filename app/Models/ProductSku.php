<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    use HasFactory;

    protected $table = 'product_skus';
    protected $fillable = ['sku', 'images', 'price', 'quantity', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function skuValues()
    {
        return $this->hasMany(SkuValue::class, 'sku_id');
    }
}
