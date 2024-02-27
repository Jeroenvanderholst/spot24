<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\EtimClassification;
use App\Models\EtimXchange\EtimFeature;

class EtimFeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EtimFeature::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => EtimClassification::factory()->create()->product_id,
            'etim_class_code' => $this->faker->randomLetter(),
            'etim_class_version' => $this->faker->randomDigitNotNull(),
            'etim_feature_code' => $this->faker->randomLetter(),
            'etim_value_code' => $this->faker->randomLetter(),
            'etim_value_numeric' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'etim_value_range_lower' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'etim_value_upper' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'etim_value_logical' => $this->faker->boolean(),
            'etim_value_details' => '[{"Language": "en-GB","EtimValueDetails": "Extra details about ETIM value"}]',
            'reason_no_value' => $this->faker->randomElement(["MV","NA","UN"]),
            'etim_classification_id' => EtimClassification::factory(),
        ];
    }
}
