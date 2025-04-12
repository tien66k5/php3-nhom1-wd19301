<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    protected $fillable = ['name', 'description', 'total_quantity', 'images', 'short_description', 'status', 'category_id'];
    protected $casts = [
        'images' => 'array', 
    ];

    public function productSkus() {
        return $this->hasMany(ProductSku::class);
    }
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    
    
}
