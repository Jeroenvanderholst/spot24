<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\Catalogue;

class CatalogueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Catalogue::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'catalogue_id' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'catalogue_name' => '{}',
            'version' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'contract_reference_number' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'catalogue_type' => $this->faker->randomElement(["FULL","CHANGE"]),
            'change_reference_catalogue_version' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'generation_date' => $this->faker->date(),
            'name_data_creator' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'email_data_creator' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'buyer_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'buyer_id_gln' => $this->faker->randomLetter(),
            'buyer_id_duns' => $this->faker->randomLetter(),
            'datapool_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'datapool_gln' => $this->faker->randomLetter(),
            'catalogue_validity_start' => $this->faker->date(),
            'catalogue_validity_end' => $this->faker->date(),
            'country' => $this->faker->country(),
            'language' => $this->faker->randomLetter(),
            'currency_code' => $this->faker->randomLetter(),
        ];
    }
}
