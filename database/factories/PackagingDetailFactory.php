<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\PackagingDetail;
use App\Models\PackagingIdentification;

class PackagingDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PackagingDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'packaging_id' => PackagingIdentification::factory(),
            'supplier_packaging_part_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'manufacturer_packaging_part_number' => $this->faker->regexify('[A-Za-z0-9]{35}'),
            'packaging_part_gtin' => $this->faker->randomElements(["01234567", "0123456789012", "12345678"], null),
            'packaging_type_length' => $this->faker->randomNumber(),
            'packaging_type_width' => $this->faker->randomNumber(),
            'packaging_type_height' => $this->faker->randomNumber(),
            'packaging_type_diameter' => $this->faker->randomNumber(),
            'packaging_type_dimension_unit' => $this->faker->randomElement(["CMT","DTM","KTM","MMT","MTR","FOT","INH","SMI","YRD"]),
            'packaging_type_weight' => $this->faker->randomNumber(),
            'packaging_type_weight_unit' => $this->faker->randomElement(["GRM","KGM","MGM","TNE","LTN","LBR","ONZ"]),
            'packaging_stackable' => $this->faker->randomDigitNotNull(),
            'packaging_identification_id' => PackagingIdentification::factory(),
        ];
    }
}
