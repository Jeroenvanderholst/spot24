<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\ItemRelation;
use App\Models\EtimXchange\TradeItem;

class ItemRelationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemRelation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'trade_item_id' => TradeItem::factory(),
            'related_supplier_item_number' => TradeItem::factory()->create()->supplier_item_number,
            'related_supplier_item_gtin' => TradeItem::factory()->create()->supplier_item_gtin,
            'related_manufacturer_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'related_manufacturer_item_gtin' => $this->faker->randomLetter(),
            'relation_type' => $this->faker->randomElement(["ACCESSORY","MAIN_PRODUCT","CONSISTS_OF","CROSS-SELLING","MANDATORY","SELECT","SIMILAR","SPAREPART","UPSELLING","SUCCESSOR","PREDECESSOR","OTHER"]),
            'related_item_quantity' => $this->faker->randomNumber(),
        ];
    }
}
