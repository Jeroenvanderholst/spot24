<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\EtimModellingFeature;
use App\Models\EtimXchange\EtimValueMatrix;

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
            'etim_modelling_class_code' => EtimModellingFeature::factory()->create()->etim_modelling_class_code,
            'etim_feature_code' => EtimModellingFeature::factory()->create()->etim_feature_code,
            'etim_value_matrix_source' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'etim_value_matrix_result' => $this->faker->randomFloat(4, 0, 999999999999.9999),
        ];
    }
}
