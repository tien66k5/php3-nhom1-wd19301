<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SkuValue;

class SkuValueSeeder extends Seeder
{
    public function run()
    {
        SkuValue::factory(50)->create();
    }
}
