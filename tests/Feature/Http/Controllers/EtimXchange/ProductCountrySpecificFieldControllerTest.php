<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ProductCountrySpecificField;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductCountrySpecificFieldController
 */
final class ProductCountrySpecificFieldControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $productCountrySpecificFields = ProductCountrySpecificField::factory()->count(3)->create();

        $response = $this->get(route('product-country-specific-field.index'));

        $response->assertOk();
        $response->assertViewIs('productCountrySpecificField.index');
        $response->assertViewHas('productCountrySpecificFields');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('product-country-specific-field.create'));

        $response->assertOk();
        $response->assertViewIs('productCountrySpecificField.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductCountrySpecificFieldController::class,
            'store',
            \App\Http\Requests\EtimXchange\ProductCountrySpecificFieldStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $product_number = $this->faker->word();
        $cs_product_characteristic_code = $this->faker->word();

        $response = $this->post(route('product-country-specific-field.store'), [
            'product_id' => $product_id,
            'product_number' => $product_number,
            'cs_product_characteristic_code' => $cs_product_characteristic_code,
        ]);

        $productCountrySpecificFields = ProductCountrySpecificField::query()
            ->where('product_id', $product_id)
            ->where('product_number', $product_number)
            ->where('cs_product_characteristic_code', $cs_product_characteristic_code)
            ->get();
        $this->assertCount(1, $productCountrySpecificFields);
        $productCountrySpecificField = $productCountrySpecificFields->first();

        $response->assertRedirect(route('product-country-specific-field.index'));
        $response->assertSessionHas('productCountrySpecificField.id', $productCountrySpecificField->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $productCountrySpecificField = ProductCountrySpecificField::factory()->create();

        $response = $this->get(route('product-country-specific-field.show', $productCountrySpecificField));

        $response->assertOk();
        $response->assertViewIs('productCountrySpecificField.show');
        $response->assertViewHas('productCountrySpecificField');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $productCountrySpecificField = ProductCountrySpecificField::factory()->create();

        $response = $this->get(route('product-country-specific-field.edit', $productCountrySpecificField));

        $response->assertOk();
        $response->assertViewIs('productCountrySpecificField.edit');
        $response->assertViewHas('productCountrySpecificField');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductCountrySpecificFieldController::class,
            'update',
            \App\Http\Requests\EtimXchange\ProductCountrySpecificFieldUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $productCountrySpecificField = ProductCountrySpecificField::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $product_number = $this->faker->word();
        $cs_product_characteristic_code = $this->faker->word();

        $response = $this->put(route('product-country-specific-field.update', $productCountrySpecificField), [
            'product_id' => $product_id,
            'product_number' => $product_number,
            'cs_product_characteristic_code' => $cs_product_characteristic_code,
        ]);

        $productCountrySpecificField->refresh();

        $response->assertRedirect(route('product-country-specific-field.index'));
        $response->assertSessionHas('productCountrySpecificField.id', $productCountrySpecificField->id);

        $this->assertEquals($product_id, $productCountrySpecificField->product_id);
        $this->assertEquals($product_number, $productCountrySpecificField->product_number);
        $this->assertEquals($cs_product_characteristic_code, $productCountrySpecificField->cs_product_characteristic_code);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $productCountrySpecificField = ProductCountrySpecificField::factory()->create();

        $response = $this->delete(route('product-country-specific-field.destroy', $productCountrySpecificField));

        $response->assertRedirect(route('product-country-specific-field.index'));

        $this->assertModelMissing($productCountrySpecificField);
    }
}
