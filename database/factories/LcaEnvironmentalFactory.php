<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LcaEnvironmental;
use App\Models\Product;

class LcaEnvironmentalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LcaEnvironmental::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'manufacturer_product_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'declared_unit_unit' => $this->faker->randomElement(["KGM","LTR","MTK","MTQ","MTR","PCE","TNE","FOT","FTK","FTQ","LBR","LTN","YDK","YRD"]),
            'declared_unit_quantity' => $this->faker->randomNumber(),
            'functional_unit_description' => '[{"Language": "en-GB","FunctionalUnitDescription": "To protect a power system against faults such as short circuit and overload, using an auxiliary voltage of 110 V DC, during a service life of 10 years and with a use rate of 100 % in Europe"}],',
            'lca_reference_lifetime' => $this->faker->randomNumber(),
            'third_party_verification' => $this->faker->randomElement(["none","internally","externally"]),
            'manufacturer_product_gtin' => $this->faker->randomLetter(),
        ];
    }
}
