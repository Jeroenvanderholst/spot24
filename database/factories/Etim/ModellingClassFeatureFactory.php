<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\Unit;
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
            'modellingclass_id' => ModellingClass::where('modelling_class_id', 'LIKE', 'MC%')->pluck('modelling_class_id')->random(),
            'sort_nr' => $this->faker->randomNumber(3, false),
            'feature_id' => Feature::pluck('id')->random(),
            'port_code' => $this->faker->randomDigitNotNull(),
            'drawing_code' => $this->faker->text(8),
            'unit_id' => Unit::pluck('unit_id')->random(),
            'imp_unit_id' => Unit::pluck('unit_id')->random(),            
        ];
    }
}
