<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\Feature;
use App\Models\Etim\Group;
use App\Models\Etim\EtimLanguage;
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
        $entities = ProductClass::pluck('class_code');
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
