<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\Product;
use App\Models\EtimXchange\Supplier;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'supplier_id' => Supplier::factory(),
            'manufacturer_name' => $this->faker->regexify('[A-Za-z0-9]{80}'),
            'manufacturer_shortname' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'manufacturer_product_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'manufacturer_product_gtin' => $this->faker->randomLetter(),
            'unbranded_product' => $this->faker->boolean(),
            'brand_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'brand_series' => '{}',
            'brand_series_variation' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'product_validity_date' => $this->faker->date(),
            'product_obsolescence_date' => $this->faker->date(),
            'discount_group_id' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'discount_group_description' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'bonus_group_id' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'bonus_group_description' => '{}',
            'customs_commodity_code' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'factor_customs_commodity_codedecimal(15,4)' => $this->faker->randomNumber(),
            'country_of_origin' => $this->faker->randomLetter(),
        ];
    }
}
