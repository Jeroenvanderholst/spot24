<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\EtimClassification;
use App\Models\EtimXchange\EtimModellingPort;
use App\Models\Etim\Etim\ModellingClass;

class EtimModellingPortFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EtimModellingPort::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => EtimClassification::factory()->create()->product_id,
            'etim_modelling_portcode' => $this->faker->randomDigitNotNull(),
            'etim_modelling_connection_type_code' => Etim\ModellingClass::factory()->create()->modelling_class_id,
            'etim_modelling_connection_type_version' => $this->faker->randomDigitNotNull(),
            'etim_classification_id' => EtimClassification::factory(),
        ];
    }
}
