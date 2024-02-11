<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\EnclosedTradeItem;
use App\Models\PackagingIdentification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\EnclosedTradeItemController
 */
final class EnclosedTradeItemControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $enclosedTradeItems = EnclosedTradeItem::factory()->count(3)->create();

        $response = $this->get(route('enclosed-trade-item.index'));

        $response->assertOk();
        $response->assertViewIs('enclosedTradeItem.index');
        $response->assertViewHas('enclosedTradeItems');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('enclosed-trade-item.create'));

        $response->assertOk();
        $response->assertViewIs('enclosedTradeItem.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\EnclosedTradeItemController::class,
            'store',
            \App\Http\Requests\EtimXchange\EnclosedTradeItemStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $packaging_id = $this->faker->numberBetween(-100000, 100000);
        $enclosed_item_quantity = $this->faker->numberBetween(-1000, 1000);
        $packaging_identification = PackagingIdentification::factory()->create();

        $response = $this->post(route('enclosed-trade-item.store'), [
            'packaging_id' => $packaging_id,
            'enclosed_item_quantity' => $enclosed_item_quantity,
            'packaging_identification_id' => $packaging_identification->id,
        ]);

        $enclosedTradeItems = EnclosedTradeItem::query()
            ->where('packaging_id', $packaging_id)
            ->where('enclosed_item_quantity', $enclosed_item_quantity)
            ->where('packaging_identification_id', $packaging_identification->id)
            ->get();
        $this->assertCount(1, $enclosedTradeItems);
        $enclosedTradeItem = $enclosedTradeItems->first();

        $response->assertRedirect(route('enclosed-trade-item.index'));
        $response->assertSessionHas('enclosedTradeItem.id', $enclosedTradeItem->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $enclosedTradeItem = EnclosedTradeItem::factory()->create();

        $response = $this->get(route('enclosed-trade-item.show', $enclosedTradeItem));

        $response->assertOk();
        $response->assertViewIs('enclosedTradeItem.show');
        $response->assertViewHas('enclosedTradeItem');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $enclosedTradeItem = EnclosedTradeItem::factory()->create();

        $response = $this->get(route('enclosed-trade-item.edit', $enclosedTradeItem));

        $response->assertOk();
        $response->assertViewIs('enclosedTradeItem.edit');
        $response->assertViewHas('enclosedTradeItem');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\EnclosedTradeItemController::class,
            'update',
            \App\Http\Requests\EtimXchange\EnclosedTradeItemUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $enclosedTradeItem = EnclosedTradeItem::factory()->create();
        $packaging_id = $this->faker->numberBetween(-100000, 100000);
        $enclosed_item_quantity = $this->faker->numberBetween(-1000, 1000);
        $packaging_identification = PackagingIdentification::factory()->create();

        $response = $this->put(route('enclosed-trade-item.update', $enclosedTradeItem), [
            'packaging_id' => $packaging_id,
            'enclosed_item_quantity' => $enclosed_item_quantity,
            'packaging_identification_id' => $packaging_identification->id,
        ]);

        $enclosedTradeItem->refresh();

        $response->assertRedirect(route('enclosed-trade-item.index'));
        $response->assertSessionHas('enclosedTradeItem.id', $enclosedTradeItem->id);

        $this->assertEquals($packaging_id, $enclosedTradeItem->packaging_id);
        $this->assertEquals($enclosed_item_quantity, $enclosedTradeItem->enclosed_item_quantity);
        $this->assertEquals($packaging_identification->id, $enclosedTradeItem->packaging_identification_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $enclosedTradeItem = EnclosedTradeItem::factory()->create();

        $response = $this->delete(route('enclosed-trade-item.destroy', $enclosedTradeItem));

        $response->assertRedirect(route('enclosed-trade-item.index'));

        $this->assertModelMissing($enclosedTradeItem);
    }
}
