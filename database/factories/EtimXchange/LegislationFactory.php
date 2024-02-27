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
            'hazard_class' => $this->faker->randomElements(["1", "2.1", "2.2", "2.3", "3", "4.1", "4.2", "4.3", "5.1", "5.2", "6.1", "6.2", "7", "8", "9"], null),
            'adr_category' => $this->faker->randomElement(["0","1","2","3","4"]),
            'net_weight_hazardous_substances' => $this->faker->randomNumber(),
            'volume_hazardous_substances' => $this->faker->randomNumber(),
            'un_shipping_name' => '[{"Language": "'.str_replace("_", "-", $this->faker->locale()).'","UnShippingName": "UN 2902 PESTICIDE, LIQUID, TOXIC, N.O.S. (drazoxolon)"}],',
            'packing_group' => $this->faker->randomElement(["I","II","III"]),
            'limited_quantities' => $this->faker->boolean(),
            'excepted_quantities' => $this->faker->boolean(),
            'aggregation_state' => $this->faker->randomElement(["L","S","G"]),
            'special_provision_id' => $this->faker->regexify('(SP[0-9]{3,4}){0,5}'),
            'classification_code' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'hazard_label' => '["'.$this->faker->regexify("\d(.\d){0,1}").'","'.$this->faker->regexify("\d(.\d){0,1}").'","'.$this->faker->regexify("\d(.\d){0,1}").'"]',
            'environmental_hazards' => $this->faker->boolean(),
            'tunnel_code' => $this->faker->randomElement(["A","B","C","D","E"]),
            'label_code' => $this->faker->randomElements(["GHS01","GHS02","GHS03","GHS04","GHS05","GHS06","GHS07","GHS08","GHS09"], null),
            'signal_word' => $this->faker->randomElement(["D","W"]),
            'hazard_statement' => fake()->randomElements(["AUH029","H241", "EUH430"],null),
            'precautionary_statement' => fake()->randomElements(["P234","P235","P236"], null),
            'li_ion_tested' => $this->faker->boolean(),
            'lithium_amount' => $this->faker->randomNumber(),
            'battery_energy' => $this->faker->randomNumber(),
            'nos274' => $this->faker->boolean(),
            'hazard_trigger' => fake()->randomElemens(["NITRATES", "PERMANGANATES", "INORGANIC"], null),
        ];
    }
}
