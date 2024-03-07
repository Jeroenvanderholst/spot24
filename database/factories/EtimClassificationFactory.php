<?php

namespace Database\Factories;

use App\Models\ModellingClass;
use App\Models\ProductClass;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\ModelsClassification;
use App\Models\Product;

class EtimClassificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EtimClassification::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'manufacturer_product_nr' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'etim_release_version' => $this->faker->regexify('[A-Za-z0-9]{7}'),
            'etim_dynamic_release_date' => $this->faker->date(),
            'etim_class_id' => ProductClass::factory()->create()->class_id,
            'etim_class_version' => $this->faker->randomDigitNotNull(),
            'etim_modelling_class_id' => ModellingClass::factory()->create()->modelling_class_id,
            'etim_modelling_class_version' => $this->faker->randomDigitNotNull(),
        ];
    }
}
