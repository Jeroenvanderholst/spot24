<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ClassFeature;
use App\Models\Feature;
use App\Models\ProductClass;
use App\Models\Unit;

class ClassFeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClassFeature::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'class_id' => ProductClass::pluck('class_id')->random(),
            'sort_nr' => $this->faker->randomNumber(2, false),
            'feature_id' => Feature::pluck('id')->random(),
            'unit_id' => Unit::pluck('unit_id')->random(),
            'imp_unit_id' => Unit::pluck('unit_id')->random(),
            'changecode' => $this->faker->randomElement(["Unchanged","Changed","New","Deleted"]),
        ];
    }
}
