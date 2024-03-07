<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ItemCountrySpecificField;
use App\Models\TradeItem;

class ItemCountrySpecificFieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemCountrySpecificField::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'trade_item_id' => TradeItem::factory(),
            'supplier_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'cs_item_characteristic_code' => $this->faker->regexify('[A-Za-z0-9]{60}'),
            'cs_item_characteristic_name' => '[{"Language": "nl-NL","CSItemCharacteristicName": "DIN-number"}]',
            'cs_item_characteristic_value_boolean' => $this->faker->boolean(),
            'cs_item_characteristic_value_numeric' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'cs_item_characteristic_value_range_lower' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'cs_item_characteristic_value_range_upper' => $this->faker->randomFloat(4, 0, 999999999999.9999),
            'cs_item_characteristic_value_string' => '[{"Language": "nl-NL","CSItemCharacteristicValueString": "1"}]',
            'cs_item_characteristic_value_set' => '[{"language" : "nl_NL" , "CSItemCharacteristicValueSet" : [ "Tekst of value 1", "Tekst of value 2"]}, {"language" : "fr_FR" , "CSItemCharacteristicValueSet" : [ "Tekst of value 1", "Tekst of value 2"]}]',
            'cs_item_characteristic_value_select' => $this->faker->regexify('[A-Za-z0-9]{60}'),
            'cs_item_characteristic_value_unit_code' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'cs_item_characteristic_reference_gtin' => $this->faker->randomElements(["01234567", "0123456789012", "12345678"], null),
        ];
    }
}
