<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\ClassificationFeature;
use App\Models\EtimXchange\OtherClassification;
use App\Models\EtimXchange\OtherClassificationProductId;

class ClassificationFeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClassificationFeature::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => OtherClassificationProductId::factory(),
            'manufacturer_product_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'classification_feature_name' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'classification_feature_value1' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'classification_feature_value2' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'classification_feature_uni' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'other_classification_id' => OtherClassification::factory(),
        ];
    }
}
