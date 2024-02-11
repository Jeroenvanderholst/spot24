<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\Legislation;
use App\Models\EtimXchange\Product;

class LegislationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Legislation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'manufacturer_product_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'electric_component_contained' => $this->faker->boolean(),
            'battery_contained' => $this->faker->boolean(),
            'weee_category' => $this->faker->randomElement(["1","2","3","4","5","6","7"]),
            'rohs_indicator' => $this->faker->randomElement(["true","false","exempt"]),
            'ce_marking' => $this->faker->boolean(),
            'sds_indicatobigintr' => $this->faker->boolean(),
            'reach_indicator' => $this->faker->randomElement(["true","false","no data"]),
            'reach_date' => $this->faker->date(),
            'scip_number' => $this->faker->randomLetter(),
            'ufi_code' => $this->faker->randomLetter(),
            'un_number' => $this->faker->randomLetter(),
            'hazard_class' => '{}',
            'adr_category' => $this->faker->randomElement(["0","1","2","3","4"]),
            'net_weight_hazardous_substances' => $this->faker->randomNumber(),
            'volume_hazardous_substances' => $this->faker->randomNumber(),
            'un_shipping_name' => '{}',
            'packing_group' => $this->faker->randomElement(["I","II","III"]),
            'limited_quantities' => $this->faker->boolean(),
            'excepted_quantities' => $this->faker->boolean(),
            'aggregation_state' => $this->faker->randomElement(["L","S","G"]),
            'special_provision_id' => '{}',
            'classification_code' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'hazard_label' => '{}',
            'environmental_hazards' => $this->faker->boolean(),
            'tunnel_code' => $this->faker->randomElement(["A","B","C","D","E"]),
            'label_code' => '{}',
            'signal_word' => $this->faker->randomElement(["D","W"]),
            'hazard_statement' => '{}',
            'precautionary_statement' => '{}',
            'li_ion_tested' => $this->faker->boolean(),
            'lithium_amount' => $this->faker->randomNumber(),
            'battery_energy' => $this->faker->randomNumber(),
            'nos274' => $this->faker->boolean(),
            'hazard_trigger' => '{}',
        ];
    }
}
