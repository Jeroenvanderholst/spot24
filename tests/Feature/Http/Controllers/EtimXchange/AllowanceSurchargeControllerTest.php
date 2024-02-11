<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\AllowanceSurcharge;
use App\Models\Price;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\AllowanceSurchargeController
 */
final class AllowanceSurchargeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $allowanceSurcharges = AllowanceSurcharge::factory()->count(3)->create();

        $response = $this->get(route('allowance-surcharge.index'));

        $response->assertOk();
        $response->assertViewIs('allowanceSurcharge.index');
        $response->assertViewHas('allowanceSurcharges');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('allowance-surcharge.create'));

        $response->assertOk();
        $response->assertViewIs('allowanceSurcharge.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\AllowanceSurchargeController::class,
            'store',
            \App\Http\Requests\EtimXchange\AllowanceSurchargeStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $pricing_id = $this->faker->numberBetween(-100000, 100000);
        $allowance_surcharge_indicator = $this->faker->randomElement(/** enum_attributes **/);
        $allowance_surcharge_type = $this->faker->randomElement(/** enum_attributes **/);
        $price = Price::factory()->create();

        $response = $this->post(route('allowance-surcharge.store'), [
            'pricing_id' => $pricing_id,
            'allowance_surcharge_indicator' => $allowance_surcharge_indicator,
            'allowance_surcharge_type' => $allowance_surcharge_type,
            'price_id' => $price->id,
        ]);

        $allowanceSurcharges = AllowanceSurcharge::query()
            ->where('pricing_id', $pricing_id)
            ->where('allowance_surcharge_indicator', $allowance_surcharge_indicator)
            ->where('allowance_surcharge_type', $allowance_surcharge_type)
            ->where('price_id', $price->id)
            ->get();
        $this->assertCount(1, $allowanceSurcharges);
        $allowanceSurcharge = $allowanceSurcharges->first();

        $response->assertRedirect(route('allowance-surcharge.index'));
        $response->assertSessionHas('allowanceSurcharge.id', $allowanceSurcharge->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $allowanceSurcharge = AllowanceSurcharge::factory()->create();

        $response = $this->get(route('allowance-surcharge.show', $allowanceSurcharge));

        $response->assertOk();
        $response->assertViewIs('allowanceSurcharge.show');
        $response->assertViewHas('allowanceSurcharge');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $allowanceSurcharge = AllowanceSurcharge::factory()->create();

        $response = $this->get(route('allowance-surcharge.edit', $allowanceSurcharge));

        $response->assertOk();
        $response->assertViewIs('allowanceSurcharge.edit');
        $response->assertViewHas('allowanceSurcharge');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\AllowanceSurchargeController::class,
            'update',
            \App\Http\Requests\EtimXchange\AllowanceSurchargeUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $allowanceSurcharge = AllowanceSurcharge::factory()->create();
        $pricing_id = $this->faker->numberBetween(-100000, 100000);
        $allowance_surcharge_indicator = $this->faker->randomElement(/** enum_attributes **/);
        $allowance_surcharge_type = $this->faker->randomElement(/** enum_attributes **/);
        $price = Price::factory()->create();

        $response = $this->put(route('allowance-surcharge.update', $allowanceSurcharge), [
            'pricing_id' => $pricing_id,
            'allowance_surcharge_indicator' => $allowance_surcharge_indicator,
            'allowance_surcharge_type' => $allowance_surcharge_type,
            'price_id' => $price->id,
        ]);

        $allowanceSurcharge->refresh();

        $response->assertRedirect(route('allowance-surcharge.index'));
        $response->assertSessionHas('allowanceSurcharge.id', $allowanceSurcharge->id);

        $this->assertEquals($pricing_id, $allowanceSurcharge->pricing_id);
        $this->assertEquals($allowance_surcharge_indicator, $allowanceSurcharge->allowance_surcharge_indicator);
        $this->assertEquals($allowance_surcharge_type, $allowanceSurcharge->allowance_surcharge_type);
        $this->assertEquals($price->id, $allowanceSurcharge->price_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $allowanceSurcharge = AllowanceSurcharge::factory()->create();

        $response = $this->delete(route('allowance-surcharge.destroy', $allowanceSurcharge));

        $response->assertRedirect(route('allowance-surcharge.index'));

        $this->assertModelMissing($allowanceSurcharge);
    }
}
