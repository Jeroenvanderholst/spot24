<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Unit;

class UnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->regexify('EU[0-9]{6}'),
            'description' => $this->faker->text(80),
            'abbreviation' => $this->faker->word(),
            'deprecated' => $this->faker->boolean(),
        ];
    }
}
