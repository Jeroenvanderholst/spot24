<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\ClassFeature;
use App\Models\Etim\Feature;
use App\Models\Etim\FeatureValue;
use App\Models\Etim\ModellingClassFeature;
use App\Models\Etim\ProductClass;
use App\Models\Etim\Value;

class FeatureValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeatureValue::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'class_id' => ProductClass::factory()->create()->class_id,
            'sort_nr' => $this->faker->randomDigitNotNull(),
            'feature_id' => Feature::factory(),
            'value_id' => Value::factory(),
            'changecode' => $this->faker->randomElement(["Unchanged","Changed","New","Deleted"]),
            'releases' => $this->faker->randomElement(['{["ETIM-7.0", "ETIM-8.0", "ETIM-9.0" ]}', '{["ETIM-8.0", "ETIM-9.0" ]}', '{["ETIM-9.0" ]}']),
            'class_feature_id' => ClassFeature::factory(),
            'modelling_class_feature_id' => ModellingClassFeature::factory(),
        ];
    }
}
