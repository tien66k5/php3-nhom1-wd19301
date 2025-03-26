<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name', 'description', 'short_description', 
        'total_quantity', 'discount', 'thumbnail', 
        'specifications', 'status', 'brand_id'
    ];

    public function skus()
    {
        return $this->hasMany(ProductSku::class, 'product_id');
    }

    public function optionValues()
    {
        return $this->hasMany(OptionValue::class, 'product_id');
    }
}
