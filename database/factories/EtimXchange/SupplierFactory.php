<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\Supplier;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'supplier_id_gln' => $this->faker->randomLetter(),
            'supplier_id_duns' => $this->faker->randomLetter(),
            'supplier_name' => $this->faker->regexify('[A-Za-z0-9]{80}'),
            'supplier_vat_no' => $this->faker->randomLetter(),
        ];
    }
}
