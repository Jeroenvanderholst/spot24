<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\ClassFeature;
use App\Models\Etim\Feature;
use App\Models\Etim\ProductClass;
use App\Models\Etim\Unit;

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
            'class_code' => ProductClass::pluck('class_code')->random(),
            'sort_nr' => $this->faker->randomNumber(2, false),
            'feature_id' => Feature::pluck('id')->random(),
            'unit_id' => Unit::pluck('unit_id')->random(),
            'imp_unit_id' => Unit::pluck('unit_id')->random(),
            'changecode' => $this->faker->randomElement(["Unchanged","Changed","New","Deleted"]),
            'releases' => $this->faker->randomElement(['{["ETIM-7.0", "ETIM-8.0", "ETIM-9.0" ]}', '{["ETIM-8.0", "ETIM-9.0" ]}', '{["ETIM-9.0" ]}']),
        ];
    }
}
