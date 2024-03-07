<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Ordering;
use App\Models\TradeItem;

class OrderingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ordering::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'trade_item_id' => TradeItem::factory(),
            'supplier_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'order_unit' => $this->faker->randomElement(["ANN","BE","BG","BO","BX","C62","CA","CI","CL","CMK","CMQ","CMT","CQ","CR","CS","CT","D99","DAY","DR","DZN","FOT","FTQ","GRM","HLT","HUR","INH","INQ","KG","KGM","KTM","LBR","LTN","LTR","MGM","MIN","MLT","MMK","MMQ","MMT","MTK","MTQ","MTR","NMP","NPL","NRL","ONZ","PA","PF","PK","PL","PR","PU","RG","RL","RO","SA","SEC","SET","SMI","ST","TN","TNE","TU","WEE","YRD","Z2","Z3"]),
            'minimum_order_quantity' => $this->faker->randomNumber(),
            'order_step_size' => $this->faker->randomNumber(),
            'standard_order_lead_time' => $this->faker->randomNumber(),
            'use_unit' => $this->faker->randomElement(["ANN","BE","BG","BO","BX","C62","CA","CI","CL","CMK","CMQ","CMT","CQ","CR","CS","CT","D99","DAY","DR","DZN","FOT","FTQ","GRM","HLT","HUR","INH","INQ","KG","KGM","KTM","LBR","LTN","LTR","MGM","MIN","MLT","MMK","MMQ","MMT","MTK","MTQ","MTR","NMP","NPL","NRL","ONZ","PA","PF","PK","PL","PR","PU","RG","RL","RO","SA","SEC","SET","SMI","ST","TN","TNE","TU","WEE","YRD","Z2","Z3"]),
            'use_unit_conversion_factor' => $this->faker->randomNumber(),
            'single_use_unit_quantity' => $this->faker->randomNumber(),
            'alternative_use_unit' => $this->faker->randomElement(["ANN","BE","BG","BO","BX","C62","CA","CI","CL","CMK","CMQ","CMT","CQ","CR","CS","CT","D99","DAY","DR","DZN","FOT","FTQ","GRM","HLT","HUR","INH","INQ","KG","KGM","KTM","LBR","LTN","LTR","MGM","MIN","MLT","MMK","MMQ","MMT","MTK","MTQ","MTR","NMP","NPL","NRL","ONZ","PA","PF","PK","PL","PR","PU","RG","RL","RO","SA","SEC","SET","SMI","ST","TN","TNE","TU","WEE","YRD","Z2","Z3"]),
            'alternative_use_unit_conversion_factor' => $this->faker->randomNumber(),
        ];
    }
}
