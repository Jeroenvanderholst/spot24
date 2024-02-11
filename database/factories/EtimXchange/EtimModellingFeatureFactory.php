<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\EtimModellingFeature;
use App\Models\EtimXchange\EtimModellingPort;

class EtimModellingFeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EtimModellingFeature::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'etim_modelling_port_id' => EtimModellingPort::factory(),
            'product_id' => EtimModellingPort::factory()->create()->product_id,
            'etim_modelling_class_code' => $this->faker->word(),
            'etim_modelling_portcode' => $this->faker->randomDigitNotNull(),
            'etim_feature_code' => $this->faker->randomLetter(),
            'etim_value_code' => $this->faker->randomLetter(),
            'etim_value_numeric' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'etim_value_range_lower' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'etim_value_range_upper' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'etim_value_logical' => $this->faker->boolean(),
            'etim_value_coordinate_x' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'etim_value_coordinate_y' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'etim_value_coordinate_z' => $this->faker->randomFloat(4, 0, 999999999999.9999),
        ];
    }
}
