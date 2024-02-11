<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\ModellingClass;
use App\Models\Etim\ModellingGroup;

class ModellingClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModellingClass::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'modelling_class_id' => $this->faker->randomLetter(),
            'version' => $this->faker->randomDigitNotNull(),
            'status' => $this->faker->randomElement(["2","3","5","9"]),
            'mutation_date' => $this->faker->date(),
            'revision' => $this->faker->randomDigitNotNull(),
            'revision_date' => $this->faker->date(),
            'modelling' => $this->faker->boolean(),
            'description' => $this->faker->text(),
            'group_id' => ModellingGroup::factory(),
            'drawing_uri' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'changecode' => $this->faker->regexify('[A-Za-z0-9]{80}'),
            'modelling_group_id' => ModellingGroup::factory(),
        ];
    }
}
