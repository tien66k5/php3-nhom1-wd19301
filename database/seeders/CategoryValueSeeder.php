<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryValue;

class CategoryValueSeeder extends Seeder
{
    public function run()
    {
        CategoryValue::factory(20)->create();
    }
}
