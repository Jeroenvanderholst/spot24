<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\Price;
use App\Models\EtimXchange\TradeItem;

class PriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Price::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'trade_item_id' => TradeItem::factory(),
            'supplier_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'price_unit' => $this->faker->randomElement(["ANN","BE","BG","BO","BX","C62","CA","CI","CL","CMK","CMQ","CMT","CQ","CR","CS","CT","D99","DAY","DR","DZN","FOT","FTQ","GRM","HLT","HUR","INH","INQ","KG","KGM","KTM","LBR","LTN","LTR","MGM","MIN","MLT","MMK","MMQ","MMT","MTK","MTQ","MTR","NMP","NPL","NRL","ONZ","PA","PF","PK","PL","PR","PU","RG","RL","RO","SA","SEC","SET","SMI","ST","TN","TNE","TU","WEE","YRD","Z2","Z3"]),
            'price_unit_factor' => $this->faker->randomNumber(),
            'price_quantity' => $this->faker->randomNumber(),
            'price_on_request' => $this->faker->boolean(),
            'gross_list_pricec' => $this->faker->randomNumber(),
            'net_price' => $this->faker->randomNumber(),
            'recommended_retail_price' => $this->faker->randomNumber(),
            'vat' => $this->faker->randomNumber(),
            'price_validity_date' => $this->faker->date(),
            'price_expiry_date' => $this->faker->date(),
        ];
    }
}
