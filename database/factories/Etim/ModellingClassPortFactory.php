<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\ModellingClass;
use App\Models\Etim\ModellingClassPort;

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
