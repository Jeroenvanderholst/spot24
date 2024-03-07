<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AllowanceSurcharge;
use App\Models\Price;

class AllowanceSurchargeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AllowanceSurcharge::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'pricing_id' => Price::factory(),
            'allowance_surcharge_indicator' => $this->faker->randomElement(["ALLOWANCE","SURCHARGE"]),
            'allowance_surcharge_validity_date' => $this->faker->date(),
            'allowance_surcharge_type' => $this->faker->randomElement(["AAT","ABL","ADO","ADR","ADZ","AEM","AEO","AEP","AEQ","CAI","DAE","DBD","FC","HD","INS","MAC","MAT","PAD","PI","QD","RAD","SH","TD","WHE","X21"]),
            'allowance_surcharge_amount' => $this->faker->randomNumber(),
            'allowance_surcharge_sequence_number' => $this->faker->randomDigitNotNull(),
            'allowance_surcharge_percentage' => $this->faker->randomNumber(),
            'allowance_surcharge_description' => '[{"Language" : "en-GB","AllowanceSurchargeDescription" : "Some surcharge for ..."} , {"Language" : "nl-NL" , "AllowanceSurchargeDescription" : "Toeslag voor …."}]',
            'allowance_surcharge_minimum_quantity' => $this->faker->randomNumber(),
            'price_id' => Price::factory(),
        ];
    }
}
