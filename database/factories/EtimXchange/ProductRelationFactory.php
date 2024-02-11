<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\Product;
use App\Models\EtimXchange\ProductRelation;

class ProductRelationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductRelation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'related_manufacturer_product_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'related_manufacturer_product_gtin' => $this->faker->randomLetter(),
            'relation_type' => $this->faker->randomElement(["ACCESSORY","MAIN_PRODUCT","CONSISTS_OF","CROSS-SELLING","MANDATORY","SELECT","SIMILAR","SPAREPART","UPSELLING","SUCCESSOR","PREDECESSOR","OTHER"]),
            'related_product_quantity' => $this->faker->randomNumber(),
        ];
    }
}
