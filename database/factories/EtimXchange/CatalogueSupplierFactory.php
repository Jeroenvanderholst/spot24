<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\Catalogue;
use App\Models\EtimXchange\CatalogueSupplier;
use App\Models\EtimXchange\Supplier;

class CatalogueSupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CatalogueSupplier::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'catalogue_id' => Catalogue::factory(),
            'supplier_id' => Supplier::factory(),
        ];
    }
}
