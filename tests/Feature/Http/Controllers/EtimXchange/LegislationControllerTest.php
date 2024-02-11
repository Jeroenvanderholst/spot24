<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\Legislation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\LegislationController
 */
final class LegislationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $legislations = Legislation::factory()->count(3)->create();

        $response = $this->get(route('legislation.index'));

        $response->assertOk();
        $response->assertViewIs('legislation.index');
        $response->assertViewHas('legislations');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('legislation.create'));

        $response->assertOk();
        $response->assertViewIs('legislation.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\LegislationController::class,
            'store',
            \App\Http\Requests\EtimXchange\LegislationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $hazard_class = $this->faker->;

        $response = $this->post(route('legislation.store'), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'hazard_class' => $hazard_class,
        ]);

        $legislations = Legislation::query()
            ->where('product_id', $product_id)
            ->where('manufacturer_product_number', $manufacturer_product_number)
            ->where('hazard_class', $hazard_class)
            ->get();
        $this->assertCount(1, $legislations);
        $legislation = $legislations->first();

        $response->assertRedirect(route('legislation.index'));
        $response->assertSessionHas('legislation.id', $legislation->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $legislation = Legislation::factory()->create();

        $response = $this->get(route('legislation.show', $legislation));

        $response->assertOk();
        $response->assertViewIs('legislation.show');
        $response->assertViewHas('legislation');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $legislation = Legislation::factory()->create();

        $response = $this->get(route('legislation.edit', $legislation));

        $response->assertOk();
        $response->assertViewIs('legislation.edit');
        $response->assertViewHas('legislation');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\LegislationController::class,
            'update',
            \App\Http\Requests\EtimXchange\LegislationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $legislation = Legislation::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $hazard_class = $this->faker->;

        $response = $this->put(route('legislation.update', $legislation), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'hazard_class' => $hazard_class,
        ]);

        $legislation->refresh();

        $response->assertRedirect(route('legislation.index'));
        $response->assertSessionHas('legislation.id', $legislation->id);

        $this->assertEquals($product_id, $legislation->product_id);
        $this->assertEquals($manufacturer_product_number, $legislation->manufacturer_product_number);
        $this->assertEquals($hazard_class, $legislation->hazard_class);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $legislation = Legislation::factory()->create();

        $response = $this->delete(route('legislation.destroy', $legislation));

        $response->assertRedirect(route('legislation.index'));

        $this->assertModelMissing($legislation);
    }
}
