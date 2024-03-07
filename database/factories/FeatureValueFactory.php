<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ClassFeature;
use App\Models\Feature;
use App\Models\FeatureValue;
use App\Models\ModellingClass;
use App\Models\ModellingClassFeature;
use App\Models\ProductClass;
use App\Models\Value;

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
        $entities = ModellingClass::pluck('modelling_class_id');
        $entities = ProductClass::pluck('class_id');

        return [
            'entity_id' => $entities->random(),
            'sort_nr' => $this->faker->randomNumber(2, false),
            'feature_id' => Feature::where('type', '=', 'A')->get()->pluck('id')->random(),
            'value_id' => Value::pluck('id')->random(),
            'changecode' => $this->faker->randomElement(["Unchanged","Changed","New","Deleted"]),
        ];
    }
}
