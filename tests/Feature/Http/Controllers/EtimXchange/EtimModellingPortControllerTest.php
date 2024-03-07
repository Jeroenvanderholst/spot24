<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\ModelsClassification;
use App\ModelsModellingPort;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimModellingPortController
 */
final class EtimModellingPortControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $etimModellingPorts = EtimModellingPort::factory()->count(3)->create();

        $response = $this->get(route('etim-modelling-port.index'));

        $response->assertOk();
        $response->assertViewIs('etimModellingPort.index');
        $response->assertViewHas('etimModellingPorts');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('etim-modelling-port.create'));

        $response->assertOk();
        $response->assertViewIs('etimModellingPort.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimModellingPortController::class,
            'store',
            \App\Http\Requests\EtimXchange\EtimModellingPortStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $etim_modelling_portcode = $this->faker->numberBetween(-8, 8);
        $etim_modelling_connection_type_code = $this->faker->randomLetter();
        $etim_modelling_connection_type_version = $this->faker->numberBetween(-8, 8);
        $etim_classification = EtimClassification::factory()->create();

        $response = $this->post(route('etim-modelling-port.store'), [
            'product_id' => $product_id,
            'etim_modelling_portcode' => $etim_modelling_portcode,
            'etim_modelling_connection_type_code' => $etim_modelling_connection_type_code,
            'etim_modelling_connection_type_version' => $etim_modelling_connection_type_version,
            'etim_classification_id' => $etim_classification->id,
        ]);

        $etimModellingPorts = EtimModellingPort::query()
            ->where('product_id', $product_id)
            ->where('etim_modelling_portcode', $etim_modelling_portcode)
            ->where('etim_modelling_connection_type_code', $etim_modelling_connection_type_code)
            ->where('etim_modelling_connection_type_version', $etim_modelling_connection_type_version)
            ->where('etim_classification_id', $etim_classification->id)
            ->get();
        $this->assertCount(1, $etimModellingPorts);
        $etimModellingPort = $etimModellingPorts->first();

        $response->assertRedirect(route('etim-modelling-port.index'));
        $response->assertSessionHas('etimModellingPort.id', $etimModellingPort->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $etimModellingPort = EtimModellingPort::factory()->create();

        $response = $this->get(route('etim-modelling-port.show', $etimModellingPort));

        $response->assertOk();
        $response->assertViewIs('etimModellingPort.show');
        $response->assertViewHas('etimModellingPort');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $etimModellingPort = EtimModellingPort::factory()->create();

        $response = $this->get(route('etim-modelling-port.edit', $etimModellingPort));

        $response->assertOk();
        $response->assertViewIs('etimModellingPort.edit');
        $response->assertViewHas('etimModellingPort');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimModellingPortController::class,
            'update',
            \App\Http\Requests\EtimXchange\EtimModellingPortUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $etimModellingPort = EtimModellingPort::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $etim_modelling_portcode = $this->faker->numberBetween(-8, 8);
        $etim_modelling_connection_type_code = $this->faker->randomLetter();
        $etim_modelling_connection_type_version = $this->faker->numberBetween(-8, 8);
        $etim_classification = EtimClassification::factory()->create();

        $response = $this->put(route('etim-modelling-port.update', $etimModellingPort), [
            'product_id' => $product_id,
            'etim_modelling_portcode' => $etim_modelling_portcode,
            'etim_modelling_connection_type_code' => $etim_modelling_connection_type_code,
            'etim_modelling_connection_type_version' => $etim_modelling_connection_type_version,
            'etim_classification_id' => $etim_classification->id,
        ]);

        $etimModellingPort->refresh();

        $response->assertRedirect(route('etim-modelling-port.index'));
        $response->assertSessionHas('etimModellingPort.id', $etimModellingPort->id);

        $this->assertEquals($product_id, $etimModellingPort->product_id);
        $this->assertEquals($etim_modelling_portcode, $etimModellingPort->etim_modelling_portcode);
        $this->assertEquals($etim_modelling_connection_type_code, $etimModellingPort->etim_modelling_connection_type_code);
        $this->assertEquals($etim_modelling_connection_type_version, $etimModellingPort->etim_modelling_connection_type_version);
        $this->assertEquals($etim_classification->id, $etimModellingPort->etim_classification_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $etimModellingPort = EtimModellingPort::factory()->create();

        $response = $this->delete(route('etim-modelling-port.destroy', $etimModellingPort));

        $response->assertRedirect(route('etim-modelling-port.index'));

        $this->assertModelMissing($etimModellingPort);
    }
}
