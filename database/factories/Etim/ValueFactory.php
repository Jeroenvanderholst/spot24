<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\Value;

class ValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Value::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->regexify('EV[0-9]{6}'),
            'description' => $this->faker->text(80),
            'deprecated' => $this->faker->boolean($chanceOfGettingTrue=5),

        ];
    }
}
