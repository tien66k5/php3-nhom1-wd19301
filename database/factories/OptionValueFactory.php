<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Option;
use App\Models\Product;
use App\Models\OptionValue;

class OptionValueFactory extends Factory
{
    protected $model = OptionValue::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'option_id' => Option::factory(),
            'value_name' => $this->faker->word(),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
