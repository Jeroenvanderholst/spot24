<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\TradeItem;

class TradeItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TradeItem::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'supplier_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'manufacturer_product_nr' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'supplier_alt_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'manufacturer_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'item_gtin' => $this->faker->randomElements(["01234567", "0123456789012", "12345678"], null),
            'buyer_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'discount_group_id' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'discount_group_description' => '{}',
            'bonus_group_id' => '[{"Language" : "en-GB","DiscountGroupDescription" : "Discount group 1"},{"Language" : "nl-NL","DiscountGroupDescription" : "Kortingsgroep 1"}]',
            'bonus_group_description' => '[{"Language" : "en-GB","BonusGroupDescription" : "Bonus group 1"},{"Language" : "nl-NL","BonusGroupDescription" : "bonusgroep 1"}]',
            'item_validity_date' => $this->faker->date(),
            'item_obslescence_date' => $this->faker->date(),
        ];
    }
}
