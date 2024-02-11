<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ItemDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\ItemDetailController
 */
final class ItemDetailControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $itemDetails = ItemDetail::factory()->count(3)->create();

        $response = $this->get(route('item-detail.index'));

        $response->assertOk();
        $response->assertViewIs('itemDetail.index');
        $response->assertViewHas('itemDetails');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('item-detail.create'));

        $response->assertOk();
        $response->assertViewIs('itemDetail.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\ItemDetailController::class,
            'store',
            \App\Http\Requests\EtimXchange\ItemDetailStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $supplier_item_number = $this->faker->word();

        $response = $this->post(route('item-detail.store'), [
            'supplier_item_number' => $supplier_item_number,
        ]);

        $itemDetails = ItemDetail::query()
            ->where('supplier_item_number', $supplier_item_number)
            ->get();
        $this->assertCount(1, $itemDetails);
        $itemDetail = $itemDetails->first();

        $response->assertRedirect(route('item-detail.index'));
        $response->assertSessionHas('itemDetail.id', $itemDetail->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $itemDetail = ItemDetail::factory()->create();

        $response = $this->get(route('item-detail.show', $itemDetail));

        $response->assertOk();
        $response->assertViewIs('itemDetail.show');
        $response->assertViewHas('itemDetail');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $itemDetail = ItemDetail::factory()->create();

        $response = $this->get(route('item-detail.edit', $itemDetail));

        $response->assertOk();
        $response->assertViewIs('itemDetail.edit');
        $response->assertViewHas('itemDetail');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\ItemDetailController::class,
            'update',
            \App\Http\Requests\EtimXchange\ItemDetailUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $itemDetail = ItemDetail::factory()->create();
        $supplier_item_number = $this->faker->word();

        $response = $this->put(route('item-detail.update', $itemDetail), [
            'supplier_item_number' => $supplier_item_number,
        ]);

        $itemDetail->refresh();

        $response->assertRedirect(route('item-detail.index'));
        $response->assertSessionHas('itemDetail.id', $itemDetail->id);

        $this->assertEquals($supplier_item_number, $itemDetail->supplier_item_number);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $itemDetail = ItemDetail::factory()->create();

        $response = $this->delete(route('item-detail.destroy', $itemDetail));

        $response->assertRedirect(route('item-detail.index'));

        $this->assertModelMissing($itemDetail);
    }
}
