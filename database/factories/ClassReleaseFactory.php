<?php

namespace Database\Factories;

use App\Models\ProductClass;
use App\Models\Release;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClassReleaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'product_class_id' => ProductClass::pluck('id')->random(),
            'release_id' => Release::pluck('id')->random(),
        ];
    }
}
