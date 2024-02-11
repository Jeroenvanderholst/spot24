<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\Supplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\SupplierController
 */
final class SupplierControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $suppliers = Supplier::factory()->count(3)->create();

        $response = $this->get(route('supplier.index'));

        $response->assertOk();
        $response->assertViewIs('supplier.index');
        $response->assertViewHas('suppliers');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('supplier.create'));

        $response->assertOk();
        $response->assertViewIs('supplier.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\SupplierController::class,
            'store',
            \App\Http\Requests\EtimXchange\SupplierStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('supplier.store'));

        $response->assertRedirect(route('supplier.index'));
        $response->assertSessionHas('supplier.id', $supplier->id);

        $this->assertDatabaseHas(suppliers, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $supplier = Supplier::factory()->create();

        $response = $this->get(route('supplier.show', $supplier));

        $response->assertOk();
        $response->assertViewIs('supplier.show');
        $response->assertViewHas('supplier');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $supplier = Supplier::factory()->create();

        $response = $this->get(route('supplier.edit', $supplier));

        $response->assertOk();
        $response->assertViewIs('supplier.edit');
        $response->assertViewHas('supplier');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\SupplierController::class,
            'update',
            \App\Http\Requests\EtimXchange\SupplierUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $supplier = Supplier::factory()->create();

        $response = $this->put(route('supplier.update', $supplier));

        $supplier->refresh();

        $response->assertRedirect(route('supplier.index'));
        $response->assertSessionHas('supplier.id', $supplier->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $supplier = Supplier::factory()->create();

        $response = $this->delete(route('supplier.destroy', $supplier));

        $response->assertRedirect(route('supplier.index'));

        $this->assertModelMissing($supplier);
    }
}
