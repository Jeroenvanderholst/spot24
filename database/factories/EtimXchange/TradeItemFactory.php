<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\Product;
use App\Models\EtimXchange\TradeItem;

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
            'supplier_item_gtin' => $this->faker->randomLetter(),
            'manufacturer_product_nr' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'supplier_alt_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'manufacturer_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'manufacturer_item_gtin' => $this->faker->randomLetter(),
            'buyer_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'item_validity_date' => $this->faker->date(),
            'item_obslescence_date' => $this->faker->date(),
        ];
    }
}
