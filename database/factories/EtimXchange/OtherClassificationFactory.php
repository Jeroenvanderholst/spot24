<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\OtherClassification;
use App\Models\EtimXchange\Product;

class OtherClassificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OtherClassification::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'manufacturer_product_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'classification_name' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'classification_version' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'classification_class_code' => $this->faker->regexify('[A-Za-z0-9]{100}'),
        ];
    }
}
