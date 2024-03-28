<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ProductClassFeature;
use App\Models\Feature;
use App\Models\ProductClass;
use App\Models\Unit;

class ProductClassFeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductClassFeature::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {


        
        return [
            'product_class_id' => ProductClass::pluck('id')->first(),
            'feature_id' => Feature::pluck('id')->random(),
            'unit_id' => Unit::pluck('id')->random(),
            'imp_unit_id' => Unit::pluck('id')->random(),
            'changecode' => $this->faker->randomElement(["Unchanged","Changed","New","Deleted"]),
        ];
    }


}
