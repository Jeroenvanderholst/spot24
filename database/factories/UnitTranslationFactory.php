<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimLanguage;
use App\Models\Unit;
use App\Models\UnitTranslation;

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
            'unit_id' => Unit::pluck('unit_id')->random(),
            'language_id' => EtimLanguage::pluck('id')->random(),
            'description' => $this->faker->text(80),
            'abbreviation' => $this->faker->text(25),
            
        ];
    }
}
