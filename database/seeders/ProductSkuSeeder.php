<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductSku;

class ProductSkuSeeder extends Seeder
{
    public function run()
    {
        ProductSku::factory(50)->create();
    }
}
