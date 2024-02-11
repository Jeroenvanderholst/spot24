<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\Product;
use App\Models\EtimXchange\ProductCountrySpecificField;

class ProductCountrySpecificFieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCountrySpecificField::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'product_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'cs_product_characteristic_code' => $this->faker->regexify('[A-Za-z0-9]{6}'),
            'cs_product_characteristic_name' => '{}',
            'cs_product_characteristic_value_boolean' => $this->faker->boolean(),
            'cs_product_characteristic_value_numeric' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'cs_product_characteristic_value_range_lower' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'cs_product_characteristic_value_range_upper' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'cs_product_characteristic_value_string' => '{}',
            'cs_product_characteristic_value_set' => '{}',
            'cs_product_characteristic_value_select' => $this->faker->regexify('[A-Za-z0-9]{60}'),
            'cs_product_characteristic_value_unit_code' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'cs_product_characteristic_reference_gtin' => $this->faker->randomLetter(),
        ];
    }
}
