<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name','price', 'description', 'short_description', 'is_featured',
        'total_quantity', 'discount', 'thumbnail', 
        'specifications', 'status', 'brand_id'
    ];

    public function productSkus() {
        return $this->hasMany(ProductSku::class);
    }
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    
    
}
