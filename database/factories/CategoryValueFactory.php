<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\CategoryValue;

class CategoryValueFactory extends Factory
{
    protected $model = CategoryValue::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'status' => $this->faker->randomElement([0, 1]),
            'category_id' => Category::factory(),
        ];
    }
}

