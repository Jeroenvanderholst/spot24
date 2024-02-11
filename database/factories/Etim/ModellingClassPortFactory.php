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
            'modelling_class_id' => ModellingClass::factory(),
            'port_code' => $this->faker->randomDigitNotNull(),
            'connection_type_id' => ModellingClass::factory(),
        ];
    }
}
