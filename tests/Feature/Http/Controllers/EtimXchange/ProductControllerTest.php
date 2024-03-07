<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductController
 */
final class ProductControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $products = Product::factory()->count(3)->create();

        $response = $this->get(route('product.index'));

        $response->assertOk();
        $response->assertViewIs('product.index');
        $response->assertViewHas('products');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('product.create'));

        $response->assertOk();
        $response->assertViewIs('product.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'store',
            \App\Http\Requests\EtimXchange\ProductStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $supplier_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_name = $this->faker->word();
        $manufacturer_product_number = $this->faker->word();
        $manufacturer_product_gtin = $this->faker->randomLetter();

        $response = $this->post(route('product.store'), [
            'supplier_id' => $supplier_id,
            'manufacturer_name' => $manufacturer_name,
            'manufacturer_product_number' => $manufacturer_product_number,
            'manufacturer_product_gtin' => $manufacturer_product_gtin,
        ]);

        $products = Product::query()
            ->where('supplier_id', $supplier_id)
            ->where('manufacturer_name', $manufacturer_name)
            ->where('manufacturer_product_number', $manufacturer_product_number)
            ->where('manufacturer_product_gtin', $manufacturer_product_gtin)
            ->get();
        $this->assertCount(1, $products);
        $product = $products->first();

        $response->assertRedirect(route('product.index'));
        $response->assertSessionHas('product.id', $product->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.show', $product));

        $response->assertOk();
        $response->assertViewIs('product.show');
        $response->assertViewHas('product');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.edit', $product));

        $response->assertOk();
        $response->assertViewIs('product.edit');
        $response->assertViewHas('product');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'update',
            \App\Http\Requests\EtimXchange\ProductUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $product = Product::factory()->create();
        $supplier_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_name = $this->faker->word();
        $manufacturer_product_number = $this->faker->word();
        $manufacturer_product_gtin = $this->faker->randomLetter();

        $response = $this->put(route('product.update', $product), [
            'supplier_id' => $supplier_id,
            'manufacturer_name' => $manufacturer_name,
            'manufacturer_product_number' => $manufacturer_product_number,
            'manufacturer_product_gtin' => $manufacturer_product_gtin,
        ]);

        $product->refresh();

        $response->assertRedirect(route('product.index'));
        $response->assertSessionHas('product.id', $product->id);

        $this->assertEquals($supplier_id, $product->supplier_id);
        $this->assertEquals($manufacturer_name, $product->manufacturer_name);
        $this->assertEquals($manufacturer_product_number, $product->manufacturer_product_number);
        $this->assertEquals($manufacturer_product_gtin, $product->manufacturer_product_gtin);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('product.destroy', $product));

        $response->assertRedirect(route('product.index'));

        $this->assertModelMissing($product);
    }
}
