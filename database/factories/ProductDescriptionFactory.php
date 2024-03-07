<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductDescription;

class ProductDescriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductDescription::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'manufacturer_product_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'description_language' => str_replace("_","-", $this->faker->locale()),
            'minimal_product_description' => $this->faker->regexify('[A-Za-z0-9]{80}'),
            'unique_main_product_description' => $this->faker->regexify('[A-Za-z0-9]{256}'),
            'full_product_description' => $this->faker->text(),
            'product_marketing_text' => $this->faker->text(),
            'product_specification_text' => $this->faker->text(),
            'product_application_instructions' => $this->faker->text(),
            'product_keyword' => $this->faker->randomElements(["New","Offer","Best in tests", "Premium"]),
            'product_page_uri' => $this->faker->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}
