<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductSku;

class ProductSkuFactory extends Factory
{
    protected $model = ProductSku::class;

    public function definition(): array
    {
        return [
            'sku' => strtoupper($this->faker->bothify('???-#####')), 
            'images' => json_encode([$this->faker->imageUrl(200, 200), $this->faker->imageUrl(200, 200)]), // Mảng ảnh JSON
            'price' => $this->faker->randomFloat(2, 50, 1000), 
            'quantity' => $this->faker->numberBetween(1, 100),  
            'product_id' => Product::factory(),
        ];
    }
}

