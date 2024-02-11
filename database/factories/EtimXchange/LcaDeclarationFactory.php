<?php

namespace Database\Factories\EtimXchange;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EtimXchange\LcaDeclaration;
use App\Models\EtimXchange\LcaEnvironmental;

class LcaDeclarationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LcaDeclaration::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'lca_environmental_id' => LcaEnvironmental::factory(),
            'life_cycle_stage' => $this->faker->randomElement(["A1","A2","A3","A1-A3","A4","A5","B1","B2","B3","B4","B5","B6","B7","C1","C2","C3","C4","D"]),
            'lca_declaration_indicator' => $this->faker->randomElement(["MDE","MND","MNR","AGG"]),
            'declared_unit_gwp_total' => $this->faker->randomNumber(),
            'declared_unit_ap' => $this->faker->randomNumber(),
            'declared_unit_ep_freshwater' => $this->faker->randomNumber(),
            'declared_unit_ep_marine' => $this->faker->randomNumber(),
            'declared_unit_ep_terrestrial' => $this->faker->randomNumber(),
            'declared_unit_pocp' => $this->faker->randomNumber(),
            'declared_unit_odp' => $this->faker->randomNumber(),
            'declared_unit_adpe' => $this->faker->randomNumber(),
            'declared_unit_adpf' => $this->faker->randomNumber(),
            'declared_unit_wdp' => $this->faker->randomNumber(),
            'declared_unit_pert' => $this->faker->randomNumber(),
            'declared_unit_penrt' => $this->faker->randomNumber(),
            'column_17' => $this->faker->randomNumber(),
        ];
    }
}
