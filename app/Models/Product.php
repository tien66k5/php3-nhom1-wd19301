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

    public function productSkus()
    {
        return $this->hasMany(ProductSku::class);
    }
    public function defaultSku()
    {
        return $this->hasOne(ProductSku::class)->oldest();
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function categoryValues()
    {
        return $this->belongsToMany(CategoryValue::class, 'product_categories', 'product_id', 'category_values_id');
    }
}
