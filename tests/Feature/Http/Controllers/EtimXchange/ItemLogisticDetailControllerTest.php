<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ItemLogisticDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ItemLogisticDetailController
 */
final class ItemLogisticDetailControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $itemLogisticDetails = ItemLogisticDetail::factory()->count(3)->create();

        $response = $this->get(route('item-logistic-detail.index'));

        $response->assertOk();
        $response->assertViewIs('itemLogisticDetail.index');
        $response->assertViewHas('itemLogisticDetails');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('item-logistic-detail.create'));

        $response->assertOk();
        $response->assertViewIs('itemLogisticDetail.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ItemLogisticDetailController::class,
            'store',
            \App\Http\Requests\EtimXchange\ItemLogisticDetailStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();

        $response = $this->post(route('item-logistic-detail.store'), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
        ]);

        $itemLogisticDetails = ItemLogisticDetail::query()
            ->where('trade_item_id', $trade_item_id)
            ->where('supplier_item_number', $supplier_item_number)
            ->get();
        $this->assertCount(1, $itemLogisticDetails);
        $itemLogisticDetail = $itemLogisticDetails->first();

        $response->assertRedirect(route('item-logistic-detail.index'));
        $response->assertSessionHas('itemLogisticDetail.id', $itemLogisticDetail->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $itemLogisticDetail = ItemLogisticDetail::factory()->create();

        $response = $this->get(route('item-logistic-detail.show', $itemLogisticDetail));

        $response->assertOk();
        $response->assertViewIs('itemLogisticDetail.show');
        $response->assertViewHas('itemLogisticDetail');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $itemLogisticDetail = ItemLogisticDetail::factory()->create();

        $response = $this->get(route('item-logistic-detail.edit', $itemLogisticDetail));

        $response->assertOk();
        $response->assertViewIs('itemLogisticDetail.edit');
        $response->assertViewHas('itemLogisticDetail');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ItemLogisticDetailController::class,
            'update',
            \App\Http\Requests\EtimXchange\ItemLogisticDetailUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $itemLogisticDetail = ItemLogisticDetail::factory()->create();
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();

        $response = $this->put(route('item-logistic-detail.update', $itemLogisticDetail), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
        ]);

        $itemLogisticDetail->refresh();

        $response->assertRedirect(route('item-logistic-detail.index'));
        $response->assertSessionHas('itemLogisticDetail.id', $itemLogisticDetail->id);

        $this->assertEquals($trade_item_id, $itemLogisticDetail->trade_item_id);
        $this->assertEquals($supplier_item_number, $itemLogisticDetail->supplier_item_number);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $itemLogisticDetail = ItemLogisticDetail::factory()->create();

        $response = $this->delete(route('item-logistic-detail.destroy', $itemLogisticDetail));

        $response->assertRedirect(route('item-logistic-detail.index'));

        $this->assertModelMissing($itemLogisticDetail);
    }
}
