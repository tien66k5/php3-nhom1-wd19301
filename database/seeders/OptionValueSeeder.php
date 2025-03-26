<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OptionValue;

class OptionValueSeeder extends Seeder
{
    public function run()
    {
        OptionValue::factory(30)->create();
    }
}
