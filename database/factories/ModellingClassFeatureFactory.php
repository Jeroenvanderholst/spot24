<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Unit;
use App\Models\Feature;
use App\Models\ModellingClass;
use App\Models\ModellingClassFeature;

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
            'modelling_class_id' => ModellingClass::where('code', 'LIKE', 'MC%')->pluck('id')->random(),
            'sort_nr' => $this->faker->randomNumber(3, false),
            'feature_id' => Feature::pluck('id')->random(),
            'port_code' => $this->faker->randomDigitNotNull(),
            'drawing_code' => $this->faker->text(8),
            'unit_id' => Unit::pluck('id')->random(),
            'imp_unit_id' => Unit::pluck('id')->random(),            
        ];
    }
}
