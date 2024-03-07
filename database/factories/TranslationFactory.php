<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Feature;
use App\Models\Group;
use App\Models\EtimLanguage;
use App\Models\ModellingClass;
use App\Models\ProductClass;
use App\Models\Translation;
use App\Models\Value;

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
        $entities = ProductClass::pluck('class_id');
        $entities = ModellingClass::pluck('modelling_class_id');
        $entities = Feature::pluck('id');
        $entities = Group::pluck('id');
        $entities = Value::pluck('id');
        
        return [
            'entity_id' => $entities->random(),
            'language_id' => EtimLanguage::pluck('id')->random(),
            'description' => $this->faker->text(80),
        ];
    }
}
