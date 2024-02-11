<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\TradeItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\TradeItemController
 */
final class TradeItemControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $tradeItems = TradeItem::factory()->count(3)->create();

        $response = $this->get(route('trade-item.index'));

        $response->assertOk();
        $response->assertViewIs('tradeItem.index');
        $response->assertViewHas('tradeItems');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('trade-item.create'));

        $response->assertOk();
        $response->assertViewIs('tradeItem.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\TradeItemController::class,
            'store',
            \App\Http\Requests\EtimXchange\TradeItemStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('trade-item.store'));

        $response->assertRedirect(route('trade-item.index'));
        $response->assertSessionHas('tradeItem.id', $tradeItem->id);

        $this->assertDatabaseHas(tradeItems, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $tradeItem = TradeItem::factory()->create();

        $response = $this->get(route('trade-item.show', $tradeItem));

        $response->assertOk();
        $response->assertViewIs('tradeItem.show');
        $response->assertViewHas('tradeItem');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $tradeItem = TradeItem::factory()->create();

        $response = $this->get(route('trade-item.edit', $tradeItem));

        $response->assertOk();
        $response->assertViewIs('tradeItem.edit');
        $response->assertViewHas('tradeItem');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\TradeItemController::class,
            'update',
            \App\Http\Requests\EtimXchange\TradeItemUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $tradeItem = TradeItem::factory()->create();

        $response = $this->put(route('trade-item.update', $tradeItem));

        $tradeItem->refresh();

        $response->assertRedirect(route('trade-item.index'));
        $response->assertSessionHas('tradeItem.id', $tradeItem->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $tradeItem = TradeItem::factory()->create();

        $response = $this->delete(route('trade-item.destroy', $tradeItem));

        $response->assertRedirect(route('trade-item.index'));

        $this->assertModelMissing($tradeItem);
    }
}
