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
            'manufacturer_id_gln' => $this->faker->randomNumber('13',true),
            'manufacturer_id_duns' => $this->faker->randomNumber('9',true),
            'manufacturer_name' => $this->faker->regexify('[A-Za-z0-9]{80}'),
            'manufacturer_shortname' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'manufacturer_product_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'product_gtin' => '["01234567", "0123456789012", "12345678"]',
            'unbranded_product' => $this->faker->boolean(),
            'brand_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'brand_series' => '[{"Language": "en-GB","BrandSeries": "Things"}, {"Language": "nl-NL","BrandSeries": "Dingen"}]',
            'brand_series_variation' => '[{"Language": "en-GB","BrandSeriesVariation": "Smaller things"}, {"Language": "nl-NL","BrandSeriesVariation": "Kleinere dingen"}]',
            'product_validity_date' => $this->faker->date(),
            'product_obsolescence_date' => $this->faker->date(),
            'customs_commodity_code' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'factor_customs_commodity_codedecimal(15,4)' => $this->faker->randomNumber(),
            'country_of_origin' => '["'.$this->faker->countryCode().'","'.$this->faker->countryCode().'"]',
        ];
    }
}
