<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ProductAttachment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductAttachmentController
 */
final class ProductAttachmentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $productAttachments = ProductAttachment::factory()->count(3)->create();

        $response = $this->get(route('product-attachment.index'));

        $response->assertOk();
        $response->assertViewIs('productAttachment.index');
        $response->assertViewHas('productAttachments');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('product-attachment.create'));

        $response->assertOk();
        $response->assertViewIs('productAttachment.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductAttachmentController::class,
            'store',
            \App\Http\Requests\EtimXchange\ProductAttachmentStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $attachment_type = $this->faker->randomElement(/** enum_attributes **/);
        $attachment_filename = $this->faker->word();
        $attachment_uri = $this->faker->word();

        $response = $this->post(route('product-attachment.store'), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'attachment_type' => $attachment_type,
            'attachment_filename' => $attachment_filename,
            'attachment_uri' => $attachment_uri,
        ]);

        $productAttachments = ProductAttachment::query()
            ->where('product_id', $product_id)
            ->where('manufacturer_product_number', $manufacturer_product_number)
            ->where('attachment_type', $attachment_type)
            ->where('attachment_filename', $attachment_filename)
            ->where('attachment_uri', $attachment_uri)
            ->get();
        $this->assertCount(1, $productAttachments);
        $productAttachment = $productAttachments->first();

        $response->assertRedirect(route('product-attachment.index'));
        $response->assertSessionHas('productAttachment.id', $productAttachment->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $productAttachment = ProductAttachment::factory()->create();

        $response = $this->get(route('product-attachment.show', $productAttachment));

        $response->assertOk();
        $response->assertViewIs('productAttachment.show');
        $response->assertViewHas('productAttachment');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $productAttachment = ProductAttachment::factory()->create();

        $response = $this->get(route('product-attachment.edit', $productAttachment));

        $response->assertOk();
        $response->assertViewIs('productAttachment.edit');
        $response->assertViewHas('productAttachment');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductAttachmentController::class,
            'update',
            \App\Http\Requests\EtimXchange\ProductAttachmentUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $productAttachment = ProductAttachment::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $attachment_type = $this->faker->randomElement(/** enum_attributes **/);
        $attachment_filename = $this->faker->word();
        $attachment_uri = $this->faker->word();

        $response = $this->put(route('product-attachment.update', $productAttachment), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'attachment_type' => $attachment_type,
            'attachment_filename' => $attachment_filename,
            'attachment_uri' => $attachment_uri,
        ]);

        $productAttachment->refresh();

        $response->assertRedirect(route('product-attachment.index'));
        $response->assertSessionHas('productAttachment.id', $productAttachment->id);

        $this->assertEquals($product_id, $productAttachment->product_id);
        $this->assertEquals($manufacturer_product_number, $productAttachment->manufacturer_product_number);
        $this->assertEquals($attachment_type, $productAttachment->attachment_type);
        $this->assertEquals($attachment_filename, $productAttachment->attachment_filename);
        $this->assertEquals($attachment_uri, $productAttachment->attachment_uri);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $productAttachment = ProductAttachment::factory()->create();

        $response = $this->delete(route('product-attachment.destroy', $productAttachment));

        $response->assertRedirect(route('product-attachment.index'));

        $this->assertModelMissing($productAttachment);
    }
}
