<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\ItemAttachment;
use App\Models\EtimXchange\TradeItem;

class ItemAttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemAttachment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'trade_item_id' => TradeItem::factory(),
            'supplier_item_number' => TradeItem::factory()->create()->supplier_item_number,
            'attachment_type' => $this->faker->randomElement(["ATX001","ATX002","ATX003","ATX004","ATX005","ATX006","ATX007","ATX008","ATX009","ATX010","ATX011","ATX012","ATX013","ATX014","ATX015","ATX016","ATX017","ATX018","ATX019","ATX020","ATX021","ATX099"]),
            'attachment_language' => '{}',
            'attachment_type_specification' => '{}',
            'attachment_filename' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'attachment_uri' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'attachment_description' => '{}',
            'attachment_issue_date' => $this->faker->date(),
            'attachment_expiry_date' => $this->faker->date(),
        ];
    }
}
