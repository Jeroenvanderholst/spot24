<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\Value;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Etim\ValueController
 */
final class ValueControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $values = Value::factory()->count(3)->create();

        $response = $this->get(route('value.index'));

        $response->assertOk();
        $response->assertViewIs('value.index');
        $response->assertViewHas('values');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('value.create'));

        $response->assertOk();
        $response->assertViewIs('value.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\ValueController::class,
            'store',
            \App\Http\Requests\Etim\ValueStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('value.store'));

        $response->assertRedirect(route('value.index'));
        $response->assertSessionHas('value.id', $value->id);

        $this->assertDatabaseHas(values, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $value = Value::factory()->create();

        $response = $this->get(route('value.show', $value));

        $response->assertOk();
        $response->assertViewIs('value.show');
        $response->assertViewHas('value');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $value = Value::factory()->create();

        $response = $this->get(route('value.edit', $value));

        $response->assertOk();
        $response->assertViewIs('value.edit');
        $response->assertViewHas('value');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\ValueController::class,
            'update',
            \App\Http\Requests\Etim\ValueUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $value = Value::factory()->create();

        $response = $this->put(route('value.update', $value));

        $value->refresh();

        $response->assertRedirect(route('value.index'));
        $response->assertSessionHas('value.id', $value->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $value = Value::factory()->create();

        $response = $this->delete(route('value.destroy', $value));

        $response->assertRedirect(route('value.index'));

        $this->assertModelMissing($value);
    }
}
