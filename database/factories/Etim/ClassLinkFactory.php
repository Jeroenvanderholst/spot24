<?php

namespace Database\Factories\Etim;

use App\Models\Etim\ClassLink;
use App\Models\Etim\ModellingClass;
use App\Models\Etim\ProductClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClassLinkFactory extends Factory
{

        /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClassLink::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'modelling_class_id' => ModellingClass::pluck('class_id')->random(),
            'modelling_class_version' => ModellingClass::pluck('version')->latest(),
            'product_class_id' => ProductClass::pluck('class_id')->random(),
            'productg_class_version' => ProductClass::pluck('version')->latest(),
        ];
        
    }
}
