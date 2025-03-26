<?php
namespace Database\Factories;


use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'short_description' => $this->faker->sentence(),
            'total_quantity' => $this->faker->numberBetween(10, 100),
            'discount' => $this->faker->numberBetween(0, 100), 
            'thumbnail' => 'default.png',
            'specifications' => json_encode(['color' => 'red', 'size' => 'M']),
            'status' => 1,
            'brand_id' => \App\Models\Brand::factory(),
        ];
    }
}
