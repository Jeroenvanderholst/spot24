<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ItemAttachment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ItemAttachmentController
 */
final class ItemAttachmentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $itemAttachments = ItemAttachment::factory()->count(3)->create();

        $response = $this->get(route('item-attachment.index'));

        $response->assertOk();
        $response->assertViewIs('itemAttachment.index');
        $response->assertViewHas('itemAttachments');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('item-attachment.create'));

        $response->assertOk();
        $response->assertViewIs('itemAttachment.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ItemAttachmentController::class,
            'store',
            \App\Http\Requests\EtimXchange\ItemAttachmentStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();
        $attachment_type = $this->faker->randomElement(/** enum_attributes **/);
        $attachment_filename = $this->faker->word();
        $attachment_uri = $this->faker->word();

        $response = $this->post(route('item-attachment.store'), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
            'attachment_type' => $attachment_type,
            'attachment_filename' => $attachment_filename,
            'attachment_uri' => $attachment_uri,
        ]);

        $itemAttachments = ItemAttachment::query()
            ->where('trade_item_id', $trade_item_id)
            ->where('supplier_item_number', $supplier_item_number)
            ->where('attachment_type', $attachment_type)
            ->where('attachment_filename', $attachment_filename)
            ->where('attachment_uri', $attachment_uri)
            ->get();
        $this->assertCount(1, $itemAttachments);
        $itemAttachment = $itemAttachments->first();

        $response->assertRedirect(route('item-attachment.index'));
        $response->assertSessionHas('itemAttachment.id', $itemAttachment->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $itemAttachment = ItemAttachment::factory()->create();

        $response = $this->get(route('item-attachment.show', $itemAttachment));

        $response->assertOk();
        $response->assertViewIs('itemAttachment.show');
        $response->assertViewHas('itemAttachment');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $itemAttachment = ItemAttachment::factory()->create();

        $response = $this->get(route('item-attachment.edit', $itemAttachment));

        $response->assertOk();
        $response->assertViewIs('itemAttachment.edit');
        $response->assertViewHas('itemAttachment');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ItemAttachmentController::class,
            'update',
            \App\Http\Requests\EtimXchange\ItemAttachmentUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $itemAttachment = ItemAttachment::factory()->create();
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $supplier_item_number = $this->faker->word();
        $attachment_type = $this->faker->randomElement(/** enum_attributes **/);
        $attachment_filename = $this->faker->word();
        $attachment_uri = $this->faker->word();

        $response = $this->put(route('item-attachment.update', $itemAttachment), [
            'trade_item_id' => $trade_item_id,
            'supplier_item_number' => $supplier_item_number,
            'attachment_type' => $attachment_type,
            'attachment_filename' => $attachment_filename,
            'attachment_uri' => $attachment_uri,
        ]);

        $itemAttachment->refresh();

        $response->assertRedirect(route('item-attachment.index'));
        $response->assertSessionHas('itemAttachment.id', $itemAttachment->id);

        $this->assertEquals($trade_item_id, $itemAttachment->trade_item_id);
        $this->assertEquals($supplier_item_number, $itemAttachment->supplier_item_number);
        $this->assertEquals($attachment_type, $itemAttachment->attachment_type);
        $this->assertEquals($attachment_filename, $itemAttachment->attachment_filename);
        $this->assertEquals($attachment_uri, $itemAttachment->attachment_uri);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $itemAttachment = ItemAttachment::factory()->create();

        $response = $this->delete(route('item-attachment.destroy', $itemAttachment));

        $response->assertRedirect(route('item-attachment.index'));

        $this->assertModelMissing($itemAttachment);
    }
}
