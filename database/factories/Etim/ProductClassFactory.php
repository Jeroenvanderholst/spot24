<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\Group;
use App\Models\Etim\ProductClass;

class ProductClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductClass::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'class_code' => $this->faker->unique()->regexify('EC[0-9]{6}'),
            'status' => $this->faker->randomElement(["2","3","5","9"]),
            'version' => $this->faker->randomDigitNotNull(),
            'mutation_date' => $this->faker->date(),
            'revision' => $this->faker->randomDigitNotNull(),
            'revision_date' => $this->faker->date(),
            'group_id' => Group::pluck('id')->random(),
            'description' => fake()->text(80),
            'releases' => $this->faker->randomElement(['{["ETIM-7.0", "ETIM-8.0", "ETIM-9.0" ]}', '{["ETIM-8.0", "ETIM-9.0" ]}', '{["ETIM-9.0" ]}']),
            'changecode' => $this->faker->randomElement(["Unchanged","Changed","New","Deleted"]),
        ];
    }
}
