<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Option;

class OptionFactory extends Factory
{
    protected $model = Option::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}

