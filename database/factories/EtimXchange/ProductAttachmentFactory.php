<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\Product;
use App\Models\EtimXchange\ProductAttachment;

class ProductAttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductAttachment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'manufacturer_product_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'attachment_type' => $this->faker->randomElement(["ATX001","ATX002","ATX003","ATX004","ATX005","ATX006","ATX007","ATX008","ATX009","ATX010","ATX011","ATX012","ATX013","ATX014","ATX015","ATX016","ATX017","ATX018","ATX019","ATX020","ATX021","ATX099"]),
            'product_image_similar' => $this->faker->boolean(),
            'attachment_order' => $this->faker->randomDigitNotNull(),
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
