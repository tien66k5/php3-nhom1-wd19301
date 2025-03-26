<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'image' => 'brand-' . $this->faker->numberBetween(1, 10) . '.png',
            'description' => $this->faker->sentence(10),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
