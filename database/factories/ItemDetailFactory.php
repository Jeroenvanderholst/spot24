<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ItemDetail;
use App\Models\TradeItem;

class ItemDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'supplier_item_number' => TradeItem::factory(),
            'item_status' => $this->faker->randomElement(["PRE-LAUNCH","ACTIVE","ON HOLD","PLANNED WITHDRAWAL","OBSOLETE"]),
            'item_condition' => $this->faker->randomElement(["NEW","USED","REFURBISHED"]),
            'stock_item' => $this->faker->boolean(),
            'shelf_life_period' => $this->faker->randomNumber(),
        ];
    }
}
