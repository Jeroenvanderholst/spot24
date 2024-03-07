<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\ModelsModellingFeature;
use App\ModelsValueMatrix;

class EtimValueMatrixFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EtimValueMatrix::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'etim_modelling_feature_id' => EtimModellingFeature::factory(),
            'etim_modelling_class_id' => EtimModellingFeature::factory()->create()->etim_modelling_class_id,
            'etim_feature_id' => EtimModellingFeature::factory()->create()->etim_feature_id,
            'etim_value_matrix_source' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'etim_value_matrix_result' => $this->faker->randomFloat(4, 0, 999999999999.9999),
        ];
    }
}
