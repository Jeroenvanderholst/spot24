<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ItemCountrySpecificField;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ItemCountrySpecificFieldController
 */
final class ItemCountrySpecificFieldControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $itemCountrySpecificFields = ItemCountrySpecificField::factory()->count(3)->create();

        $response = $this->get(route('item-country-specific-field.index'));

        $response->assertOk();
        $response->assertViewIs('itemCountrySpecificField.index');
        $response->assertViewHas('itemCountrySpecificFields');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('item-country-specific-field.create'));

        $response->assertOk();
        $response->assertViewIs('itemCountrySpecificField.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ItemCountrySpecificFieldController::class,
            'store',
            \App\Http\Requests\EtimXchange\ItemCountrySpecificFieldStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();
        $cs_item_characteristic_code = $this->faker->word();

        $response = $this->post(route('item-country-specific-field.store'), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
            'cs_item_characteristic_code' => $cs_item_characteristic_code,
        ]);

        $itemCountrySpecificFields = ItemCountrySpecificField::query()
            ->where('trade_item_id', $trade_item_id)
            ->where('supplier_item_number', $supplier_item_number)
            ->where('cs_item_characteristic_code', $cs_item_characteristic_code)
            ->get();
        $this->assertCount(1, $itemCountrySpecificFields);
        $itemCountrySpecificField = $itemCountrySpecificFields->first();

        $response->assertRedirect(route('item-country-specific-field.index'));
        $response->assertSessionHas('itemCountrySpecificField.id', $itemCountrySpecificField->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $itemCountrySpecificField = ItemCountrySpecificField::factory()->create();

        $response = $this->get(route('item-country-specific-field.show', $itemCountrySpecificField));

        $response->assertOk();
        $response->assertViewIs('itemCountrySpecificField.show');
        $response->assertViewHas('itemCountrySpecificField');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $itemCountrySpecificField = ItemCountrySpecificField::factory()->create();

        $response = $this->get(route('item-country-specific-field.edit', $itemCountrySpecificField));

        $response->assertOk();
        $response->assertViewIs('itemCountrySpecificField.edit');
        $response->assertViewHas('itemCountrySpecificField');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ItemCountrySpecificFieldController::class,
            'update',
            \App\Http\Requests\EtimXchange\ItemCountrySpecificFieldUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $itemCountrySpecificField = ItemCountrySpecificField::factory()->create();
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();
        $cs_item_characteristic_code = $this->faker->word();

        $response = $this->put(route('item-country-specific-field.update', $itemCountrySpecificField), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
            'cs_item_characteristic_code' => $cs_item_characteristic_code,
        ]);

        $itemCountrySpecificField->refresh();

        $response->assertRedirect(route('item-country-specific-field.index'));
        $response->assertSessionHas('itemCountrySpecificField.id', $itemCountrySpecificField->id);

        $this->assertEquals($trade_item_id, $itemCountrySpecificField->trade_item_id);
        $this->assertEquals($supplier_item_number, $itemCountrySpecificField->supplier_item_number);
        $this->assertEquals($cs_item_characteristic_code, $itemCountrySpecificField->cs_item_characteristic_code);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $itemCountrySpecificField = ItemCountrySpecificField::factory()->create();

        $response = $this->delete(route('item-country-specific-field.destroy', $itemCountrySpecificField));

        $response->assertRedirect(route('item-country-specific-field.index'));

        $this->assertModelMissing($itemCountrySpecificField);
    }
}
