<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\CatalogueSupplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CatalogueSupplierController
 */
final class CatalogueSupplierControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $catalogueSuppliers = CatalogueSupplier::factory()->count(3)->create();

        $response = $this->get(route('catalogue-supplier.index'));

        $response->assertOk();
        $response->assertViewIs('catalogueSupplier.index');
        $response->assertViewHas('catalogueSuppliers');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('catalogue-supplier.create'));

        $response->assertOk();
        $response->assertViewIs('catalogueSupplier.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CatalogueSupplierController::class,
            'store',
            \App\Http\Requests\EtimXchange\CatalogueSupplierStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $catalogue_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_id = $this->faker->numberBetween(-100000, 100000);

        $response = $this->post(route('catalogue-supplier.store'), [
            'catalogue_id' => $catalogue_id,
            'supplier_id' => $supplier_id,
        ]);

        $catalogueSuppliers = CatalogueSupplier::query()
            ->where('catalogue_id', $catalogue_id)
            ->where('supplier_id', $supplier_id)
            ->get();
        $this->assertCount(1, $catalogueSuppliers);
        $catalogueSupplier = $catalogueSuppliers->first();

        $response->assertRedirect(route('catalogue-supplier.index'));
        $response->assertSessionHas('catalogueSupplier.id', $catalogueSupplier->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $catalogueSupplier = CatalogueSupplier::factory()->create();

        $response = $this->get(route('catalogue-supplier.show', $catalogueSupplier));

        $response->assertOk();
        $response->assertViewIs('catalogueSupplier.show');
        $response->assertViewHas('catalogueSupplier');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $catalogueSupplier = CatalogueSupplier::factory()->create();

        $response = $this->get(route('catalogue-supplier.edit', $catalogueSupplier));

        $response->assertOk();
        $response->assertViewIs('catalogueSupplier.edit');
        $response->assertViewHas('catalogueSupplier');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CatalogueSupplierController::class,
            'update',
            \App\Http\Requests\EtimXchange\CatalogueSupplierUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $catalogueSupplier = CatalogueSupplier::factory()->create();
        $catalogue_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_id = $this->faker->numberBetween(-100000, 100000);

        $response = $this->put(route('catalogue-supplier.update', $catalogueSupplier), [
            'catalogue_id' => $catalogue_id,
            'supplier_id' => $supplier_id,
        ]);

        $catalogueSupplier->refresh();

        $response->assertRedirect(route('catalogue-supplier.index'));
        $response->assertSessionHas('catalogueSupplier.id', $catalogueSupplier->id);

        $this->assertEquals($catalogue_id, $catalogueSupplier->catalogue_id);
        $this->assertEquals($supplier_id, $catalogueSupplier->supplier_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $catalogueSupplier = CatalogueSupplier::factory()->create();

        $response = $this->delete(route('catalogue-supplier.destroy', $catalogueSupplier));

        $response->assertRedirect(route('catalogue-supplier.index'));

        $this->assertModelMissing($catalogueSupplier);
    }
}
