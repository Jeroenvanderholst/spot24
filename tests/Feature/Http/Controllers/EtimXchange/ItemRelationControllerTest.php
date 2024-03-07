<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ItemRelation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ItemRelationController
 */
final class ItemRelationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $itemRelations = ItemRelation::factory()->count(3)->create();

        $response = $this->get(route('item-relation.index'));

        $response->assertOk();
        $response->assertViewIs('itemRelation.index');
        $response->assertViewHas('itemRelations');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('item-relation.create'));

        $response->assertOk();
        $response->assertViewIs('itemRelation.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ItemRelationController::class,
            'store',
            \App\Http\Requests\EtimXchange\ItemRelationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $related_supplier_item_number = $this->faker->word();
        $relation_type = $this->faker->randomElement(/** enum_attributes **/);
        $related_item_quantity = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('item-relation.store'), [
            'trade_item_id' => $trade_item_id,
            'related_supplier_item_number' => $related_supplier_item_number,
            'relation_type' => $relation_type,
            'related_item_quantity' => $related_item_quantity,
        ]);

        $itemRelations = ItemRelation::query()
            ->where('trade_item_id', $trade_item_id)
            ->where('related_supplier_item_number', $related_supplier_item_number)
            ->where('relation_type', $relation_type)
            ->where('related_item_quantity', $related_item_quantity)
            ->get();
        $this->assertCount(1, $itemRelations);
        $itemRelation = $itemRelations->first();

        $response->assertRedirect(route('item-relation.index'));
        $response->assertSessionHas('itemRelation.id', $itemRelation->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $itemRelation = ItemRelation::factory()->create();

        $response = $this->get(route('item-relation.show', $itemRelation));

        $response->assertOk();
        $response->assertViewIs('itemRelation.show');
        $response->assertViewHas('itemRelation');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $itemRelation = ItemRelation::factory()->create();

        $response = $this->get(route('item-relation.edit', $itemRelation));

        $response->assertOk();
        $response->assertViewIs('itemRelation.edit');
        $response->assertViewHas('itemRelation');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ItemRelationController::class,
            'update',
            \App\Http\Requests\EtimXchange\ItemRelationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $itemRelation = ItemRelation::factory()->create();
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $related_supplier_item_number = $this->faker->word();
        $relation_type = $this->faker->randomElement(/** enum_attributes **/);
        $related_item_quantity = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('item-relation.update', $itemRelation), [
            'trade_item_id' => $trade_item_id,
            'related_supplier_item_number' => $related_supplier_item_number,
            'relation_type' => $relation_type,
            'related_item_quantity' => $related_item_quantity,
        ]);

        $itemRelation->refresh();

        $response->assertRedirect(route('item-relation.index'));
        $response->assertSessionHas('itemRelation.id', $itemRelation->id);

        $this->assertEquals($trade_item_id, $itemRelation->trade_item_id);
        $this->assertEquals($related_supplier_item_number, $itemRelation->related_supplier_item_number);
        $this->assertEquals($relation_type, $itemRelation->relation_type);
        $this->assertEquals($related_item_quantity, $itemRelation->related_item_quantity);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $itemRelation = ItemRelation::factory()->create();

        $response = $this->delete(route('item-relation.destroy', $itemRelation));

        $response->assertRedirect(route('item-relation.index'));

        $this->assertModelMissing($itemRelation);
    }
}
