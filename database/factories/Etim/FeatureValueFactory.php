<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\ClassFeature;
use App\Models\Etim\Feature;
use App\Models\Etim\FeatureValue;
use App\Models\Etim\ModellingClass;
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
        $entities = ModellingClass::pluck('modelling_class_id');
        $entities = ProductClass::pluck('class_code');

        return [
            'entity_id' => $entities->random(),
            'sort_nr' => $this->faker->randomNumber(2, false),
            'feature_id' => Feature::where('type', '=', 'A')->get()->pluck('id')->random(),
            'value_id' => Value::pluck('id')->random(),
            'changecode' => $this->faker->randomElement(["Unchanged","Changed","New","Deleted"]),
            'releases' => $this->faker->randomElement([
                '[{"ETIM-7.0" : true},{"ETIM-8.0": true}, {"ETIM-9.0":true}]', 
                '[{"ETIM-7.0" : false},{"ETIM-8.0": true}, {"ETIM-9.0":true}]',
                '[{"ETIM-7.0" : false},{"ETIM-8.0": false}, {"ETIM-9.0":true}]'
            ]),
        ];
    }
}
