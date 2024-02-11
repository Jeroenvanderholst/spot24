<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ProductDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\ProductDetailController
 */
final class ProductDetailControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $productDetails = ProductDetail::factory()->count(3)->create();

        $response = $this->get(route('product-detail.index'));

        $response->assertOk();
        $response->assertViewIs('productDetail.index');
        $response->assertViewHas('productDetails');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('product-detail.create'));

        $response->assertOk();
        $response->assertViewIs('productDetail.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\ProductDetailController::class,
            'store',
            \App\Http\Requests\EtimXchange\ProductDetailStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $product_status = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('product-detail.store'), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'product_status' => $product_status,
        ]);

        $productDetails = ProductDetail::query()
            ->where('product_id', $product_id)
            ->where('manufacturer_product_number', $manufacturer_product_number)
            ->where('product_status', $product_status)
            ->get();
        $this->assertCount(1, $productDetails);
        $productDetail = $productDetails->first();

        $response->assertRedirect(route('product-detail.index'));
        $response->assertSessionHas('productDetail.id', $productDetail->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $productDetail = ProductDetail::factory()->create();

        $response = $this->get(route('product-detail.show', $productDetail));

        $response->assertOk();
        $response->assertViewIs('productDetail.show');
        $response->assertViewHas('productDetail');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $productDetail = ProductDetail::factory()->create();

        $response = $this->get(route('product-detail.edit', $productDetail));

        $response->assertOk();
        $response->assertViewIs('productDetail.edit');
        $response->assertViewHas('productDetail');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\ProductDetailController::class,
            'update',
            \App\Http\Requests\EtimXchange\ProductDetailUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $productDetail = ProductDetail::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $product_status = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('product-detail.update', $productDetail), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'product_status' => $product_status,
        ]);

        $productDetail->refresh();

        $response->assertRedirect(route('product-detail.index'));
        $response->assertSessionHas('productDetail.id', $productDetail->id);

        $this->assertEquals($product_id, $productDetail->product_id);
        $this->assertEquals($manufacturer_product_number, $productDetail->manufacturer_product_number);
        $this->assertEquals($product_status, $productDetail->product_status);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $productDetail = ProductDetail::factory()->create();

        $response = $this->delete(route('product-detail.destroy', $productDetail));

        $response->assertRedirect(route('product-detail.index'));

        $this->assertModelMissing($productDetail);
    }
}
