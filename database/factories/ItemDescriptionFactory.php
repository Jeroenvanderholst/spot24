<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ItemDescription;
use App\Models\TradeItem;

class ItemDescriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemDescription::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'trade_item_id' => TradeItem::factory(),
            'supplier_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'description_language' => $this->faker->randomLetter(),
            'minimal_item_description' => $this->faker->regexify('[A-Za-z0-9]{80}'),
            'unique_main_item_description' => $this->faker->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}
