<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\Price;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PriceController
 */
final class PriceControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $prices = Price::factory()->count(3)->create();

        $response = $this->get(route('price.index'));

        $response->assertOk();
        $response->assertViewIs('price.index');
        $response->assertViewHas('prices');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('price.create'));

        $response->assertOk();
        $response->assertViewIs('price.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PriceController::class,
            'store',
            \App\Http\Requests\EtimXchange\PriceStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();
        $price_unit = $this->faker->randomElement(/** enum_attributes **/);
        $price_quantity = $this->faker->randomNumber();

        $response = $this->post(route('price.store'), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
            'price_unit' => $price_unit,
            'price_quantity' => $price_quantity,
        ]);

        $prices = Price::query()
            ->where('trade_item_id', $trade_item_id)
            ->where('supplier_item_number', $supplier_item_number)
            ->where('price_unit', $price_unit)
            ->where('price_quantity', $price_quantity)
            ->get();
        $this->assertCount(1, $prices);
        $price = $prices->first();

        $response->assertRedirect(route('price.index'));
        $response->assertSessionHas('price.id', $price->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $price = Price::factory()->create();

        $response = $this->get(route('price.show', $price));

        $response->assertOk();
        $response->assertViewIs('price.show');
        $response->assertViewHas('price');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $price = Price::factory()->create();

        $response = $this->get(route('price.edit', $price));

        $response->assertOk();
        $response->assertViewIs('price.edit');
        $response->assertViewHas('price');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PriceController::class,
            'update',
            \App\Http\Requests\EtimXchange\PriceUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $price = Price::factory()->create();
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();
        $price_unit = $this->faker->randomElement(/** enum_attributes **/);
        $price_quantity = $this->faker->randomNumber();

        $response = $this->put(route('price.update', $price), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
            'price_unit' => $price_unit,
            'price_quantity' => $price_quantity,
        ]);

        $price->refresh();

        $response->assertRedirect(route('price.index'));
        $response->assertSessionHas('price.id', $price->id);

        $this->assertEquals($trade_item_id, $price->trade_item_id);
        $this->assertEquals($supplier_item_number, $price->supplier_item_number);
        $this->assertEquals($price_unit, $price->price_unit);
        $this->assertEquals($price_quantity, $price->price_quantity);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $price = Price::factory()->create();

        $response = $this->delete(route('price.destroy', $price));

        $response->assertRedirect(route('price.index'));

        $this->assertModelMissing($price);
    }
}
