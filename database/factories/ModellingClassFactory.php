<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ModellingClass;
use App\Models\ModellingGroup;

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
            'modelling_class_id' => $this->faker->unique()->regexify('(MC[0-9]{6})'),
            'version' => $this->faker->randomDigitNotNull(),
            'status' => $this->faker->randomElement(["2","3","5","9"]),
            'mutation_date' => $this->faker->date(),
            'revision' => $this->faker->unique()->randomNumber(4, false),
            'revision_date' => $this->faker->date(),
            'modelling' => true,
            'description' => $this->faker->text(80),
            'group_id' => ModellingGroup::pluck('id')->random(),
            'drawing_uri' => $this->faker->imageUrl(1754, 1240, 'SVG Reference Drawing', true, 'Modelling Class', true, 'png'),
            'changecode' => $this->faker->randomElement(["Unchanged","Changed","New","Deleted"]),
        ];
    }
}
