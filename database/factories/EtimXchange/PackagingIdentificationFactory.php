<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\PackagingIdentification;
use App\Models\EtimXchange\TradeItem;

class PackagingIdentificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PackagingIdentification::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'trade_item_id' => TradeItem::factory(),
            'supplier_packaging_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'manufacturer_packaging_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'manufacturer_packaging_gtin_3' => $this->faker->randomLetter(),
            'packaging_type_code' => $this->faker->randomElement(["BE","BG","BJ","BO","BR","BX","C62","CA","CL","CQ","CR","CS","CT","CY","D99","DR","EV","KG","NE","PA","PF","PK","PL","PR","PU","RG","RL","RO","SA","SET","TN","TU","WR","Z2","Z3"]),
            'packaging_quantity' => $this->faker->randomNumber(),
            'trade_item_primary_packaging' => $this->faker->boolean(),
            'packaging_gs1_code128' => $this->faker->regexify('[A-Za-z0-9]{48}'),
            'packaging_recyclable' => $this->faker->boolean(),
            'packaging_reusable' => $this->faker->boolean(),
            'packaging_break' => $this->faker->boolean(),
            'number_of_packaging_parts' => $this->faker->randomDigitNotNull(),
        ];
    }
}
