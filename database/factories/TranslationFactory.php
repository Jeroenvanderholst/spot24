<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Feature;
use App\Models\Group;
use App\Models\EtimLanguage;
use App\Models\ModellingClass;
use App\Models\ModellingGroup;
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
        $ec = ProductClass::pluck('class_id');
        $mc = ModellingClass::pluck('modelling_class_id');
        $ef = Feature::pluck('id');
        $eg = Group::pluck('id');
        $mg = ModellingGroup::pluck('id');
        $ev = Value::pluck('id');
        $entities = $ec->merge($mc)->merge($ef)->merge($eg)->merge($mg)->merge($ev);
        $entity = $entities->random();
        $entity_prepend = substr($entity, 0,2);
        $class = '';
            switch ($entity_prepend) {
                case "EC" :  $class = 'App\Models\ProductClass'; break;
                case "MC" :  $class = 'App\Models\ModellingClass'; break;
                case "CT" :  $class = 'App\Models\ModellingClass'; break;
                case "EF" :  $class = 'App\Models\Feature'; break;
                case "EG" :  $class = 'App\Models\Group'; break; 
                case "MG" :  $class = 'App\Models\ModellingGroup'; break;
                case "EV" :  $class = 'App\Models\Value'; break; 

            }
        
        
        return [
            'translatable_id' => $entity,
            'translatable_type' => $class,
            'language_id' => EtimLanguage::pluck('id')->random(),
            'description' => $this->faker->text(80),
        ];
    }
}
