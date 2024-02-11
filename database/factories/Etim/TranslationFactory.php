<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\Feature;
use App\Models\Etim\Group;
use App\Models\Etim\Language;
use App\Models\Etim\ModellingClass;
use App\Models\Etim\ProductClass;
use App\Models\Etim\Translation;
use App\Models\Etim\Value;

class TranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Translation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'language_id' => Language::factory(),
            'description' => $this->faker->text(),
            'product_class_id' => ProductClass::factory(),
            'feature_id' => Feature::factory(),
            'group_id' => Group::factory(),
            'modelling_class_id' => ModellingClass::factory(),
            'value_id' => Value::factory(),
        ];
    }
}
