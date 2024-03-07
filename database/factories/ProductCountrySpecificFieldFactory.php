<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductCountrySpecificField;

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
            'cs_product_characteristic_name' => '[{"Language": "nl-NL","CSProductCharacteristicName": "DIN-number"}]',
            'cs_product_characteristic_value_boolean' => $this->faker->boolean(),
            'cs_product_characteristic_value_numeric' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'cs_product_characteristic_value_range_lower' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'cs_product_characteristic_value_range_upper' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'cs_product_characteristic_value_string' => '[{"Language": "nl-NL","CSProductCharacteristicValueString": "1"}]',
            'cs_product_characteristic_value_set' => '[{"language" : "nl_NL" , "CSProductCharacteristicValueSet" : [ "Tekst of value 1", "Tekst of value 2"]}, {"language" : "fr_FR" , "CSProductCharacteristicValueSet" : [ "Tekst of value 1", "Tekst of value 2"]}}',
            'cs_product_characteristic_value_select' => $this->faker->regexify('[A-Za-z0-9]{60}'),
            'cs_product_characteristic_value_unit_code' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'cs_product_characteristic_reference_gtin' => $this->faker->randomElements(["01234567", "0123456789012", "12345678"]),
        ];
    }
}
