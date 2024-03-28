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
        unset($mc);
        unset($ec);
        $mc = ModellingClass::inRandomOrder()->select('id' , 'code')->first();
        $ec = ProductClass::inRandomOrder()->select('id' , 'code')->first();
        $entities = [
            'ec' => [
                'id' => $ec->id, 
                'type' => '\App\Models\ProductClass'
            ], 
            'mc' => [
                'id' => $mc->id, 
                'type' => '\App\Models\ModellingClass'
            ]];
        dd($entities);
        $entity_id = $entities;

        return [
            'entity_id' => $entity_id,
            'entity_type' => $entity_type,
            'sort_nr' => $this->faker->randomNumber(2, false),
            'feature_id' => Feature::where('type', '=', 'A')->get()->pluck('id')->random(),
            'value_id' => Value::pluck('id')->random(),
            'changecode' => $this->faker->randomElement(["Unchanged","Changed","New","Deleted"]),
        ];
    }
}
