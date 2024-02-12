<?php

namespace Database\Factories\Etim;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Etim\EtimLanguage;
use App\Models\Etim\ModellingClass;
use App\Models\Etim\ProductClass;
use App\Models\Etim\Synonym;
use Illuminate\Database\Eloquent\Collection;

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
        $entities = ProductClass::pluck('class_code');
        $entities = ModellingClass::pluck('modelling_class_id');
        

        return [
            'entity_id' => $entities->unique()->random(),
            'language_id' => EtimLanguage::pluck('id')->random(),
            'description' => $this->faker->text(80),

        ];
    }
}
