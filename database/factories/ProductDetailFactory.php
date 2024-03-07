<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'manufacturer_product_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'product_status' => $this->faker->randomElement(["PRE-LAUNCH","ACTIVE","ON_HOLD","PLANNED_WITHDRAWAL","OBSOLETE"]),
            'product_type' => $this->faker->randomElement(["PHYSICAL","CONTRACT","LICENCE","SERVICE"]),
            'customisable_product' => $this->faker->boolean(),
            'warranty_consumer' => $this->faker->randomNumber(),
            'warranty_business' => $this->faker->randomNumber(),
        ];
    }
}
