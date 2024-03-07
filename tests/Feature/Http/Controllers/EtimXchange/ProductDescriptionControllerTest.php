<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ProductDescription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductDescriptionController
 */
final class ProductDescriptionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $productDescriptions = ProductDescription::factory()->count(3)->create();

        $response = $this->get(route('product-description.index'));

        $response->assertOk();
        $response->assertViewIs('productDescription.index');
        $response->assertViewHas('productDescriptions');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('product-description.create'));

        $response->assertOk();
        $response->assertViewIs('productDescription.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductDescriptionController::class,
            'store',
            \App\Http\Requests\EtimXchange\ProductDescriptionStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $minimal_product_description = $this->faker->word();

        $response = $this->post(route('product-description.store'), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'minimal_product_description' => $minimal_product_description,
        ]);

        $productDescriptions = ProductDescription::query()
            ->where('product_id', $product_id)
            ->where('manufacturer_product_number', $manufacturer_product_number)
            ->where('minimal_product_description', $minimal_product_description)
            ->get();
        $this->assertCount(1, $productDescriptions);
        $productDescription = $productDescriptions->first();

        $response->assertRedirect(route('product-description.index'));
        $response->assertSessionHas('productDescription.id', $productDescription->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $productDescription = ProductDescription::factory()->create();

        $response = $this->get(route('product-description.show', $productDescription));

        $response->assertOk();
        $response->assertViewIs('productDescription.show');
        $response->assertViewHas('productDescription');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $productDescription = ProductDescription::factory()->create();

        $response = $this->get(route('product-description.edit', $productDescription));

        $response->assertOk();
        $response->assertViewIs('productDescription.edit');
        $response->assertViewHas('productDescription');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductDescriptionController::class,
            'update',
            \App\Http\Requests\EtimXchange\ProductDescriptionUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $productDescription = ProductDescription::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $minimal_product_description = $this->faker->word();

        $response = $this->put(route('product-description.update', $productDescription), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'minimal_product_description' => $minimal_product_description,
        ]);

        $productDescription->refresh();

        $response->assertRedirect(route('product-description.index'));
        $response->assertSessionHas('productDescription.id', $productDescription->id);

        $this->assertEquals($product_id, $productDescription->product_id);
        $this->assertEquals($manufacturer_product_number, $productDescription->manufacturer_product_number);
        $this->assertEquals($minimal_product_description, $productDescription->minimal_product_description);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $productDescription = ProductDescription::factory()->create();

        $response = $this->delete(route('product-description.destroy', $productDescription));

        $response->assertRedirect(route('product-description.index'));

        $this->assertModelMissing($productDescription);
    }
}
