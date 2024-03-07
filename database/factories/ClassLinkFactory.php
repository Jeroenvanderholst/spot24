<?php

namespace Database\Factories;

use App\Models\ClassLink;
use App\Models\ModellingClass;
use App\Models\ProductClass;
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
        $mc = ModellingClass::inRandomOrder()->first();
        $ec = ProductClass::inRandomOrder()->first();
        return [
            'modelling_class_id' => $mc->modelling_class_id,
            'modelling_class_version' => $mc->version,
            'product_class_id' => $ec->class_id,
            'product_class_version' => $ec->version,
        ];
        
    }
}
