<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\Feature;

class FeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feature::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => fake()->regexify('EF[0-9]{6}'),
            'type' => $this->faker->randomElement(["A","L","N","R","C","M"]),
            'description' => $this->faker->text(80),
            'deprecated' => $this->faker->boolean($chanceOfGettingTrue=5),
        ];
    }
}
