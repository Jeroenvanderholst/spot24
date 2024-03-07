<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ProductRelation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductRelationController
 */
final class ProductRelationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $productRelations = ProductRelation::factory()->count(3)->create();

        $response = $this->get(route('product-relation.index'));

        $response->assertOk();
        $response->assertViewIs('productRelation.index');
        $response->assertViewHas('productRelations');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('product-relation.create'));

        $response->assertOk();
        $response->assertViewIs('productRelation.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductRelationController::class,
            'store',
            \App\Http\Requests\EtimXchange\ProductRelationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $related_manufacturer_product_number = $this->faker->word();
        $relation_type = $this->faker->randomElement(/** enum_attributes **/);
        $related_product_quantity = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('product-relation.store'), [
            'product_id' => $product_id,
            'related_manufacturer_product_number' => $related_manufacturer_product_number,
            'relation_type' => $relation_type,
            'related_product_quantity' => $related_product_quantity,
        ]);

        $productRelations = ProductRelation::query()
            ->where('product_id', $product_id)
            ->where('related_manufacturer_product_number', $related_manufacturer_product_number)
            ->where('relation_type', $relation_type)
            ->where('related_product_quantity', $related_product_quantity)
            ->get();
        $this->assertCount(1, $productRelations);
        $productRelation = $productRelations->first();

        $response->assertRedirect(route('product-relation.index'));
        $response->assertSessionHas('productRelation.id', $productRelation->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $productRelation = ProductRelation::factory()->create();

        $response = $this->get(route('product-relation.show', $productRelation));

        $response->assertOk();
        $response->assertViewIs('productRelation.show');
        $response->assertViewHas('productRelation');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $productRelation = ProductRelation::factory()->create();

        $response = $this->get(route('product-relation.edit', $productRelation));

        $response->assertOk();
        $response->assertViewIs('productRelation.edit');
        $response->assertViewHas('productRelation');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductRelationController::class,
            'update',
            \App\Http\Requests\EtimXchange\ProductRelationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $productRelation = ProductRelation::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $related_manufacturer_product_number = $this->faker->word();
        $relation_type = $this->faker->randomElement(/** enum_attributes **/);
        $related_product_quantity = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('product-relation.update', $productRelation), [
            'product_id' => $product_id,
            'related_manufacturer_product_number' => $related_manufacturer_product_number,
            'relation_type' => $relation_type,
            'related_product_quantity' => $related_product_quantity,
        ]);

        $productRelation->refresh();

        $response->assertRedirect(route('product-relation.index'));
        $response->assertSessionHas('productRelation.id', $productRelation->id);

        $this->assertEquals($product_id, $productRelation->product_id);
        $this->assertEquals($related_manufacturer_product_number, $productRelation->related_manufacturer_product_number);
        $this->assertEquals($relation_type, $productRelation->relation_type);
        $this->assertEquals($related_product_quantity, $productRelation->related_product_quantity);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $productRelation = ProductRelation::factory()->create();

        $response = $this->delete(route('product-relation.destroy', $productRelation));

        $response->assertRedirect(route('product-relation.index'));

        $this->assertModelMissing($productRelation);
    }
}
