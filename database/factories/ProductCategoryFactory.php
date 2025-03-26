<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\CategoryValue;
use App\Models\ProductCategory;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

    public function definition(): array
    {
        return [
            'category_values_id' => CategoryValue::factory(),
            'product_id' => Product::factory(),
        ];
    }
}
