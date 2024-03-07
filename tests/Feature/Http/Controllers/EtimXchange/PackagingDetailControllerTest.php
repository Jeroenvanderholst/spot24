<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\PackagingDetail;
use App\Models\PackagingIdentification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PackagingDetailController
 */
final class PackagingDetailControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $packagingDetails = PackagingDetail::factory()->count(3)->create();

        $response = $this->get(route('packaging-detail.index'));

        $response->assertOk();
        $response->assertViewIs('packagingDetail.index');
        $response->assertViewHas('packagingDetails');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('packaging-detail.create'));

        $response->assertOk();
        $response->assertViewIs('packagingDetail.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PackagingDetailController::class,
            'store',
            \App\Http\Requests\EtimXchange\PackagingDetailStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $packaging_id = $this->faker->numberBetween(-100000, 100000);
        $packaging_identification = PackagingIdentification::factory()->create();

        $response = $this->post(route('packaging-detail.store'), [
            'packaging_id' => $packaging_id,
            'packaging_identification_id' => $packaging_identification->id,
        ]);

        $packagingDetails = PackagingDetail::query()
            ->where('packaging_id', $packaging_id)
            ->where('packaging_identification_id', $packaging_identification->id)
            ->get();
        $this->assertCount(1, $packagingDetails);
        $packagingDetail = $packagingDetails->first();

        $response->assertRedirect(route('packaging-detail.index'));
        $response->assertSessionHas('packagingDetail.id', $packagingDetail->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $packagingDetail = PackagingDetail::factory()->create();

        $response = $this->get(route('packaging-detail.show', $packagingDetail));

        $response->assertOk();
        $response->assertViewIs('packagingDetail.show');
        $response->assertViewHas('packagingDetail');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $packagingDetail = PackagingDetail::factory()->create();

        $response = $this->get(route('packaging-detail.edit', $packagingDetail));

        $response->assertOk();
        $response->assertViewIs('packagingDetail.edit');
        $response->assertViewHas('packagingDetail');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PackagingDetailController::class,
            'update',
            \App\Http\Requests\EtimXchange\PackagingDetailUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $packagingDetail = PackagingDetail::factory()->create();
        $packaging_id = $this->faker->numberBetween(-100000, 100000);
        $packaging_identification = PackagingIdentification::factory()->create();

        $response = $this->put(route('packaging-detail.update', $packagingDetail), [
            'packaging_id' => $packaging_id,
            'packaging_identification_id' => $packaging_identification->id,
        ]);

        $packagingDetail->refresh();

        $response->assertRedirect(route('packaging-detail.index'));
        $response->assertSessionHas('packagingDetail.id', $packagingDetail->id);

        $this->assertEquals($packaging_id, $packagingDetail->packaging_id);
        $this->assertEquals($packaging_identification->id, $packagingDetail->packaging_identification_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $packagingDetail = PackagingDetail::factory()->create();

        $response = $this->delete(route('packaging-detail.destroy', $packagingDetail));

        $response->assertRedirect(route('packaging-detail.index'));

        $this->assertModelMissing($packagingDetail);
    }
}
