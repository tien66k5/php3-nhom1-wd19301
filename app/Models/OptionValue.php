<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    use HasFactory;

    protected $table = 'option_values';
    protected $fillable = ['product_id', 'option_id', 'value_name', 'status'];

    public function option()
    {
        return $this->belongsTo(Option::class, 'option_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

