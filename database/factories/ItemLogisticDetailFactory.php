<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ItemLogisticDetail;
use App\Models\TradeItem;

class ItemLogisticDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemLogisticDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'trade_item_id' => TradeItem::factory(),
            'supplier_item_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'base_item_net_length' => $this->faker->randomNumber(),
            'base_item_net_width' => $this->faker->randomNumber(),
            'base_item_net_height' => $this->faker->randomNumber(),
            'base_item_net_diameter' => $this->faker->randomNumber(),
            'net_dimension_unit' => $this->faker->randomElement(["CMT","DTM","KTM","MMT","MTR","FOT","INH","SMI","YRD"]),
            'base_item_net_weight' => $this->faker->randomNumber(),
            'net_weight_unit' => $this->faker->randomElement(["GRM","KGM","MGM","TNE","LTN","LBR","ONZ"]),
            'base_item_net_volume' => $this->faker->randomNumber(),
            'net_volume_unit' => $this->faker->randomElement(["LTR","MLT","MMQ","MTQ","FTQ","INQ"]),
        ];
    }
}
