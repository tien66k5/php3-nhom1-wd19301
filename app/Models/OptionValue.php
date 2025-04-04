<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class OptionValue extends Model
{
    protected $table = 'option_values';
    protected $fillable = ['product_id', 'option_id', 'value_name', 'status', 'price'];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
