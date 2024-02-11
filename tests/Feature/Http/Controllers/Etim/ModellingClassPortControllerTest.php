<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\8;
use App\Models\ModellingClassPort;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Etim\ModellingClassPortController
 */
final class ModellingClassPortControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $modellingClassPorts = ModellingClassPort::factory()->count(3)->create();

        $response = $this->get(route('modelling-class-port.index'));

        $response->assertOk();
        $response->assertViewIs('modellingClassPort.index');
        $response->assertViewHas('modellingClassPorts');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('modelling-class-port.create'));

        $response->assertOk();
        $response->assertViewIs('modellingClassPort.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\ModellingClassPortController::class,
            'store',
            \App\Http\Requests\Etim\ModellingClassPortStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $modelling_class = 8::factory()->create();
        $port_code = $this->faker->numberBetween(-8, 8);
        $connection_type = 8::factory()->create();

        $response = $this->post(route('modelling-class-port.store'), [
            'modelling_class_id' => $modelling_class->id,
            'port_code' => $port_code,
            'connection_type_id' => $connection_type->id,
        ]);

        $modellingClassPorts = ModellingClassPort::query()
            ->where('modelling_class_id', $modelling_class->id)
            ->where('port_code', $port_code)
            ->where('connection_type_id', $connection_type->id)
            ->get();
        $this->assertCount(1, $modellingClassPorts);
        $modellingClassPort = $modellingClassPorts->first();

        $response->assertRedirect(route('modelling-class-port.index'));
        $response->assertSessionHas('modellingClassPort.id', $modellingClassPort->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $modellingClassPort = ModellingClassPort::factory()->create();

        $response = $this->get(route('modelling-class-port.show', $modellingClassPort));

        $response->assertOk();
        $response->assertViewIs('modellingClassPort.show');
        $response->assertViewHas('modellingClassPort');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $modellingClassPort = ModellingClassPort::factory()->create();

        $response = $this->get(route('modelling-class-port.edit', $modellingClassPort));

        $response->assertOk();
        $response->assertViewIs('modellingClassPort.edit');
        $response->assertViewHas('modellingClassPort');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\ModellingClassPortController::class,
            'update',
            \App\Http\Requests\Etim\ModellingClassPortUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $modellingClassPort = ModellingClassPort::factory()->create();
        $modelling_class = 8::factory()->create();
        $port_code = $this->faker->numberBetween(-8, 8);
        $connection_type = 8::factory()->create();

        $response = $this->put(route('modelling-class-port.update', $modellingClassPort), [
            'modelling_class_id' => $modelling_class->id,
            'port_code' => $port_code,
            'connection_type_id' => $connection_type->id,
        ]);

        $modellingClassPort->refresh();

        $response->assertRedirect(route('modelling-class-port.index'));
        $response->assertSessionHas('modellingClassPort.id', $modellingClassPort->id);

        $this->assertEquals($modelling_class->id, $modellingClassPort->modelling_class_id);
        $this->assertEquals($port_code, $modellingClassPort->port_code);
        $this->assertEquals($connection_type->id, $modellingClassPort->connection_type_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $modellingClassPort = ModellingClassPort::factory()->create();

        $response = $this->delete(route('modelling-class-port.destroy', $modellingClassPort));

        $response->assertRedirect(route('modelling-class-port.index'));

        $this->assertModelMissing($modellingClassPort);
    }
}
