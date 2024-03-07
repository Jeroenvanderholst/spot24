<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ModellingGroup;

class ModellingGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModellingGroup::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->regexify('MG[0-9]{6}'),
            'description' => $this->faker->text(50),
            'deprecated' => $this->faker->boolean($changeOfGettingTrue=5),
        ];
    }
}
