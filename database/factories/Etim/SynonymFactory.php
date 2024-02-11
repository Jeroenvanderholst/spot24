<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\Language;
use App\Models\Etim\ModellingClass;
use App\Models\Etim\ProductClass;
use App\Models\Etim\Synonym;

class SynonymFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Synonym::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'language_id' => Language::factory(),
            'description' => $this->faker->text(),
            'product_class_id' => ProductClass::factory(),
            'modelling_class_id' => ModellingClass::factory(),
        ];
    }
}
