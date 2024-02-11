<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\Ordering;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\OrderingController
 */
final class OrderingControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $orderings = Ordering::factory()->count(3)->create();

        $response = $this->get(route('ordering.index'));

        $response->assertOk();
        $response->assertViewIs('ordering.index');
        $response->assertViewHas('orderings');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('ordering.create'));

        $response->assertOk();
        $response->assertViewIs('ordering.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\OrderingController::class,
            'store',
            \App\Http\Requests\EtimXchange\OrderingStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();
        $order_unit = $this->faker->randomElement(/** enum_attributes **/);
        $minimum_order_quantity = $this->faker->randomNumber();
        $order_step_size = $this->faker->randomNumber();

        $response = $this->post(route('ordering.store'), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
            'order_unit' => $order_unit,
            'minimum_order_quantity' => $minimum_order_quantity,
            'order_step_size' => $order_step_size,
        ]);

        $orderings = Ordering::query()
            ->where('trade_item_id', $trade_item_id)
            ->where('supplier_item_number', $supplier_item_number)
            ->where('order_unit', $order_unit)
            ->where('minimum_order_quantity', $minimum_order_quantity)
            ->where('order_step_size', $order_step_size)
            ->get();
        $this->assertCount(1, $orderings);
        $ordering = $orderings->first();

        $response->assertRedirect(route('ordering.index'));
        $response->assertSessionHas('ordering.id', $ordering->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $ordering = Ordering::factory()->create();

        $response = $this->get(route('ordering.show', $ordering));

        $response->assertOk();
        $response->assertViewIs('ordering.show');
        $response->assertViewHas('ordering');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $ordering = Ordering::factory()->create();

        $response = $this->get(route('ordering.edit', $ordering));

        $response->assertOk();
        $response->assertViewIs('ordering.edit');
        $response->assertViewHas('ordering');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\OrderingController::class,
            'update',
            \App\Http\Requests\EtimXchange\OrderingUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $ordering = Ordering::factory()->create();
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();
        $order_unit = $this->faker->randomElement(/** enum_attributes **/);
        $minimum_order_quantity = $this->faker->randomNumber();
        $order_step_size = $this->faker->randomNumber();

        $response = $this->put(route('ordering.update', $ordering), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
            'order_unit' => $order_unit,
            'minimum_order_quantity' => $minimum_order_quantity,
            'order_step_size' => $order_step_size,
        ]);

        $ordering->refresh();

        $response->assertRedirect(route('ordering.index'));
        $response->assertSessionHas('ordering.id', $ordering->id);

        $this->assertEquals($trade_item_id, $ordering->trade_item_id);
        $this->assertEquals($supplier_item_number, $ordering->supplier_item_number);
        $this->assertEquals($order_unit, $ordering->order_unit);
        $this->assertEquals($minimum_order_quantity, $ordering->minimum_order_quantity);
        $this->assertEquals($order_step_size, $ordering->order_step_size);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $ordering = Ordering::factory()->create();

        $response = $this->delete(route('ordering.destroy', $ordering));

        $response->assertRedirect(route('ordering.index'));

        $this->assertModelMissing($ordering);
    }
}
