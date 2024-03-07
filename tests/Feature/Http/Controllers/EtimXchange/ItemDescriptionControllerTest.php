<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ItemDescription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ItemDescriptionController
 */
final class ItemDescriptionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $itemDescriptions = ItemDescription::factory()->count(3)->create();

        $response = $this->get(route('item-description.index'));

        $response->assertOk();
        $response->assertViewIs('itemDescription.index');
        $response->assertViewHas('itemDescriptions');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('item-description.create'));

        $response->assertOk();
        $response->assertViewIs('itemDescription.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ItemDescriptionController::class,
            'store',
            \App\Http\Requests\EtimXchange\ItemDescriptionStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();
        $minimal_item_description = $this->faker->word();

        $response = $this->post(route('item-description.store'), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
            'minimal_item_description' => $minimal_item_description,
        ]);

        $itemDescriptions = ItemDescription::query()
            ->where('trade_item_id', $trade_item_id)
            ->where('supplier_item_number', $supplier_item_number)
            ->where('minimal_item_description', $minimal_item_description)
            ->get();
        $this->assertCount(1, $itemDescriptions);
        $itemDescription = $itemDescriptions->first();

        $response->assertRedirect(route('item-description.index'));
        $response->assertSessionHas('itemDescription.id', $itemDescription->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $itemDescription = ItemDescription::factory()->create();

        $response = $this->get(route('item-description.show', $itemDescription));

        $response->assertOk();
        $response->assertViewIs('itemDescription.show');
        $response->assertViewHas('itemDescription');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $itemDescription = ItemDescription::factory()->create();

        $response = $this->get(route('item-description.edit', $itemDescription));

        $response->assertOk();
        $response->assertViewIs('itemDescription.edit');
        $response->assertViewHas('itemDescription');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ItemDescriptionController::class,
            'update',
            \App\Http\Requests\EtimXchange\ItemDescriptionUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $itemDescription = ItemDescription::factory()->create();
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();
        $minimal_item_description = $this->faker->word();

        $response = $this->put(route('item-description.update', $itemDescription), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
            'minimal_item_description' => $minimal_item_description,
        ]);

        $itemDescription->refresh();

        $response->assertRedirect(route('item-description.index'));
        $response->assertSessionHas('itemDescription.id', $itemDescription->id);

        $this->assertEquals($trade_item_id, $itemDescription->trade_item_id);
        $this->assertEquals($supplier_item_number, $itemDescription->supplier_item_number);
        $this->assertEquals($minimal_item_description, $itemDescription->minimal_item_description);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $itemDescription = ItemDescription::factory()->create();

        $response = $this->delete(route('item-description.destroy', $itemDescription));

        $response->assertRedirect(route('item-description.index'));

        $this->assertModelMissing($itemDescription);
    }
}
