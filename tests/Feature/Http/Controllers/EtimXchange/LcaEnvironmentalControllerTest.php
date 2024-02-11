<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\LcaEnvironmental;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\LcaEnvironmentalController
 */
final class LcaEnvironmentalControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $lcaEnvironmentals = LcaEnvironmental::factory()->count(3)->create();

        $response = $this->get(route('lca-environmental.index'));

        $response->assertOk();
        $response->assertViewIs('lcaEnvironmental.index');
        $response->assertViewHas('lcaEnvironmentals');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('lca-environmental.create'));

        $response->assertOk();
        $response->assertViewIs('lcaEnvironmental.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\LcaEnvironmentalController::class,
            'store',
            \App\Http\Requests\EtimXchange\LcaEnvironmentalStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $declared_unit_unit = $this->faker->randomElement(/** enum_attributes **/);
        $declared_unit_quantity = $this->faker->randomNumber();
        $lca_reference_lifetime = $this->faker->numberBetween(-1000, 1000);
        $third_party_verification = $this->faker->randomElement(/** enum_attributes **/);
        $manufacturer_product_gtin = $this->faker->randomLetter();

        $response = $this->post(route('lca-environmental.store'), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'declared_unit_unit' => $declared_unit_unit,
            'declared_unit_quantity' => $declared_unit_quantity,
            'lca_reference_lifetime' => $lca_reference_lifetime,
            'third_party_verification' => $third_party_verification,
            'manufacturer_product_gtin' => $manufacturer_product_gtin,
        ]);

        $lcaEnvironmentals = LcaEnvironmental::query()
            ->where('product_id', $product_id)
            ->where('manufacturer_product_number', $manufacturer_product_number)
            ->where('declared_unit_unit', $declared_unit_unit)
            ->where('declared_unit_quantity', $declared_unit_quantity)
            ->where('lca_reference_lifetime', $lca_reference_lifetime)
            ->where('third_party_verification', $third_party_verification)
            ->where('manufacturer_product_gtin', $manufacturer_product_gtin)
            ->get();
        $this->assertCount(1, $lcaEnvironmentals);
        $lcaEnvironmental = $lcaEnvironmentals->first();

        $response->assertRedirect(route('lca-environmental.index'));
        $response->assertSessionHas('lcaEnvironmental.id', $lcaEnvironmental->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $lcaEnvironmental = LcaEnvironmental::factory()->create();

        $response = $this->get(route('lca-environmental.show', $lcaEnvironmental));

        $response->assertOk();
        $response->assertViewIs('lcaEnvironmental.show');
        $response->assertViewHas('lcaEnvironmental');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $lcaEnvironmental = LcaEnvironmental::factory()->create();

        $response = $this->get(route('lca-environmental.edit', $lcaEnvironmental));

        $response->assertOk();
        $response->assertViewIs('lcaEnvironmental.edit');
        $response->assertViewHas('lcaEnvironmental');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\LcaEnvironmentalController::class,
            'update',
            \App\Http\Requests\EtimXchange\LcaEnvironmentalUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $lcaEnvironmental = LcaEnvironmental::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $declared_unit_unit = $this->faker->randomElement(/** enum_attributes **/);
        $declared_unit_quantity = $this->faker->randomNumber();
        $lca_reference_lifetime = $this->faker->numberBetween(-1000, 1000);
        $third_party_verification = $this->faker->randomElement(/** enum_attributes **/);
        $manufacturer_product_gtin = $this->faker->randomLetter();

        $response = $this->put(route('lca-environmental.update', $lcaEnvironmental), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'declared_unit_unit' => $declared_unit_unit,
            'declared_unit_quantity' => $declared_unit_quantity,
            'lca_reference_lifetime' => $lca_reference_lifetime,
            'third_party_verification' => $third_party_verification,
            'manufacturer_product_gtin' => $manufacturer_product_gtin,
        ]);

        $lcaEnvironmental->refresh();

        $response->assertRedirect(route('lca-environmental.index'));
        $response->assertSessionHas('lcaEnvironmental.id', $lcaEnvironmental->id);

        $this->assertEquals($product_id, $lcaEnvironmental->product_id);
        $this->assertEquals($manufacturer_product_number, $lcaEnvironmental->manufacturer_product_number);
        $this->assertEquals($declared_unit_unit, $lcaEnvironmental->declared_unit_unit);
        $this->assertEquals($declared_unit_quantity, $lcaEnvironmental->declared_unit_quantity);
        $this->assertEquals($lca_reference_lifetime, $lcaEnvironmental->lca_reference_lifetime);
        $this->assertEquals($third_party_verification, $lcaEnvironmental->third_party_verification);
        $this->assertEquals($manufacturer_product_gtin, $lcaEnvironmental->manufacturer_product_gtin);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $lcaEnvironmental = LcaEnvironmental::factory()->create();

        $response = $this->delete(route('lca-environmental.destroy', $lcaEnvironmental));

        $response->assertRedirect(route('lca-environmental.index'));

        $this->assertModelMissing($lcaEnvironmental);
    }
}
