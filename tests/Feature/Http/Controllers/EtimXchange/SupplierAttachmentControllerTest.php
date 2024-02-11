<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\SupplierAttachment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\SupplierAttachmentController
 */
final class SupplierAttachmentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $supplierAttachments = SupplierAttachment::factory()->count(3)->create();

        $response = $this->get(route('supplier-attachment.index'));

        $response->assertOk();
        $response->assertViewIs('supplierAttachment.index');
        $response->assertViewHas('supplierAttachments');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('supplier-attachment.create'));

        $response->assertOk();
        $response->assertViewIs('supplierAttachment.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\SupplierAttachmentController::class,
            'store',
            \App\Http\Requests\EtimXchange\SupplierAttachmentStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $supplier_id = $this->faker->numberBetween(-100000, 100000);
        $attachment_type = $this->faker->randomElement(/** enum_attributes **/);
        $attachment_filename = $this->faker->word();
        $attachment_uri = $this->faker->word();

        $response = $this->post(route('supplier-attachment.store'), [
            'supplier_id' => $supplier_id,
            'attachment_type' => $attachment_type,
            'attachment_filename' => $attachment_filename,
            'attachment_uri' => $attachment_uri,
        ]);

        $supplierAttachments = SupplierAttachment::query()
            ->where('supplier_id', $supplier_id)
            ->where('attachment_type', $attachment_type)
            ->where('attachment_filename', $attachment_filename)
            ->where('attachment_uri', $attachment_uri)
            ->get();
        $this->assertCount(1, $supplierAttachments);
        $supplierAttachment = $supplierAttachments->first();

        $response->assertRedirect(route('supplier-attachment.index'));
        $response->assertSessionHas('supplierAttachment.id', $supplierAttachment->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $supplierAttachment = SupplierAttachment::factory()->create();

        $response = $this->get(route('supplier-attachment.show', $supplierAttachment));

        $response->assertOk();
        $response->assertViewIs('supplierAttachment.show');
        $response->assertViewHas('supplierAttachment');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $supplierAttachment = SupplierAttachment::factory()->create();

        $response = $this->get(route('supplier-attachment.edit', $supplierAttachment));

        $response->assertOk();
        $response->assertViewIs('supplierAttachment.edit');
        $response->assertViewHas('supplierAttachment');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\SupplierAttachmentController::class,
            'update',
            \App\Http\Requests\EtimXchange\SupplierAttachmentUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $supplierAttachment = SupplierAttachment::factory()->create();
        $supplier_id = $this->faker->numberBetween(-100000, 100000);
        $attachment_type = $this->faker->randomElement(/** enum_attributes **/);
        $attachment_filename = $this->faker->word();
        $attachment_uri = $this->faker->word();

        $response = $this->put(route('supplier-attachment.update', $supplierAttachment), [
            'supplier_id' => $supplier_id,
            'attachment_type' => $attachment_type,
            'attachment_filename' => $attachment_filename,
            'attachment_uri' => $attachment_uri,
        ]);

        $supplierAttachment->refresh();

        $response->assertRedirect(route('supplier-attachment.index'));
        $response->assertSessionHas('supplierAttachment.id', $supplierAttachment->id);

        $this->assertEquals($supplier_id, $supplierAttachment->supplier_id);
        $this->assertEquals($attachment_type, $supplierAttachment->attachment_type);
        $this->assertEquals($attachment_filename, $supplierAttachment->attachment_filename);
        $this->assertEquals($attachment_uri, $supplierAttachment->attachment_uri);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $supplierAttachment = SupplierAttachment::factory()->create();

        $response = $this->delete(route('supplier-attachment.destroy', $supplierAttachment));

        $response->assertRedirect(route('supplier-attachment.index'));

        $this->assertModelMissing($supplierAttachment);
    }
}
