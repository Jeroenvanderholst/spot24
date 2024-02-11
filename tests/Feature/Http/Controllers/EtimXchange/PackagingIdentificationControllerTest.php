<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\PackagingIdentification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\PackagingIdentificationController
 */
final class PackagingIdentificationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $packagingIdentifications = PackagingIdentification::factory()->count(3)->create();

        $response = $this->get(route('packaging-identification.index'));

        $response->assertOk();
        $response->assertViewIs('packagingIdentification.index');
        $response->assertViewHas('packagingIdentifications');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('packaging-identification.create'));

        $response->assertOk();
        $response->assertViewIs('packagingIdentification.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\PackagingIdentificationController::class,
            'store',
            \App\Http\Requests\EtimXchange\PackagingIdentificationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $packaging_type_code = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('packaging-identification.store'), [
            'trade_item_id' => $trade_item_id,
            'packaging_type_code' => $packaging_type_code,
        ]);

        $packagingIdentifications = PackagingIdentification::query()
            ->where('trade_item_id', $trade_item_id)
            ->where('packaging_type_code', $packaging_type_code)
            ->get();
        $this->assertCount(1, $packagingIdentifications);
        $packagingIdentification = $packagingIdentifications->first();

        $response->assertRedirect(route('packaging-identification.index'));
        $response->assertSessionHas('packagingIdentification.id', $packagingIdentification->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $packagingIdentification = PackagingIdentification::factory()->create();

        $response = $this->get(route('packaging-identification.show', $packagingIdentification));

        $response->assertOk();
        $response->assertViewIs('packagingIdentification.show');
        $response->assertViewHas('packagingIdentification');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $packagingIdentification = PackagingIdentification::factory()->create();

        $response = $this->get(route('packaging-identification.edit', $packagingIdentification));

        $response->assertOk();
        $response->assertViewIs('packagingIdentification.edit');
        $response->assertViewHas('packagingIdentification');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\PackagingIdentificationController::class,
            'update',
            \App\Http\Requests\EtimXchange\PackagingIdentificationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $packagingIdentification = PackagingIdentification::factory()->create();
        $trade_item_id = $this->faker->numberBetween(-100000, 100000);
        $packaging_type_code = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('packaging-identification.update', $packagingIdentification), [
            'trade_item_id' => $trade_item_id,
            'packaging_type_code' => $packaging_type_code,
        ]);

        $packagingIdentification->refresh();

        $response->assertRedirect(route('packaging-identification.index'));
        $response->assertSessionHas('packagingIdentification.id', $packagingIdentification->id);

        $this->assertEquals($trade_item_id, $packagingIdentification->trade_item_id);
        $this->assertEquals($packaging_type_code, $packagingIdentification->packaging_type_code);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $packagingIdentification = PackagingIdentification::factory()->create();

        $response = $this->delete(route('packaging-identification.destroy', $packagingIdentification));

        $response->assertRedirect(route('packaging-identification.index'));

        $this->assertModelMissing($packagingIdentification);
    }
}
