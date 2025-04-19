<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcBuildComponent extends Model
{
    protected $fillable = ['pc_build_id', 'sku_id', 'component_type'];

    public function pcBuild()
    {
        return $this->belongsTo(PcBuild::class);
    }

    public function sku()
    {
        return $this->belongsTo(ProductSku::class, 'sku_id');
    }

    public function component()
    {
        return $this->belongsTo(CategoryValue::class, 'component_type');
    }
}
