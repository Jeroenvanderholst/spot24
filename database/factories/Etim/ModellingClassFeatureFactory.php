<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\;
use App\Models\Etim\Feature;
use App\Models\Etim\ModellingClass;
use App\Models\Etim\ModellingClassFeature;

class ModellingClassFeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModellingClassFeature::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'modellingclass_id' => ModellingClass::factory(),
            'sort_nr' => $this->faker->randomNumber(),
            'feature_id' => Feature::factory(),
            'port_code' => $this->faker->randomDigitNotNull(),
            'drawing_code' => $this->faker->randomLetter(),
            'unit_id' => ::factory(),
            'imp_unit_id' => $this->faker->randomLetter(),
            'modelling_class_id' => ModellingClass::factory(),
        ];
    }
}
