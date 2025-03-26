<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_values_id', 'product_id'];

    public function categoryValue()
    {
        return $this->belongsTo(CategoryValue::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
