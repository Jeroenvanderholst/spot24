<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ModellingClass;
use App\Models\ModellingClassPort;

class ModellingClassPortFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModellingClassPort::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        
        return [
            'modelling_class_id' => ModellingClass::where('modelling_class_id', 'LIKE', 'MC%')->pluck('modelling_class_id')->random(),
            'port_code' => $this->faker->randomDigit(),
            'connection_type_id' => ModellingClass::where('modelling_class_id', 'LIKE', 'CT%')->pluck('modelling_class_id')->random(),
        ];
    }
}
