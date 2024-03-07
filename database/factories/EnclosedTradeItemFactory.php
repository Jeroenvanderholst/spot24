<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EnclosedTradeItem;
use App\Models\PackagingIdentification;

class EnclosedTradeItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EnclosedTradeItem::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'packaging_id' => PackagingIdentification::factory(),
            'supplier_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'manufacturer_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'item_gtin' => $this->faker->randomElements(["01234567", "0123456789012", "12345678"], null),
            'enclosed_item_quantity' => $this->faker->randomNumber(),
            'packaging_identification_id' => PackagingIdentification::factory(),
        ];
    }
}
