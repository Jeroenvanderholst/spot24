<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\Language;
use App\Models\Etim\Unit;
use App\Models\Etim\UnitTranslation;

class UnitTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UnitTranslation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'language_id' => Language::factory(),
            'description' => $this->faker->text(),
            'abbreviation' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'unit_id' => Unit::factory(),
        ];
    }
}
