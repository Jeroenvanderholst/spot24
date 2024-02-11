<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Etim\UnitController
 */
final class UnitControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $units = Unit::factory()->count(3)->create();

        $response = $this->get(route('unit.index'));

        $response->assertOk();
        $response->assertViewIs('unit.index');
        $response->assertViewHas('units');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('unit.create'));

        $response->assertOk();
        $response->assertViewIs('unit.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\UnitController::class,
            'store',
            \App\Http\Requests\Etim\UnitStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $description = $this->faker->text();
        $abbreviation = $this->faker->word();
        $deprecated = $this->faker->boolean();

        $response = $this->post(route('unit.store'), [
            'description' => $description,
            'abbreviation' => $abbreviation,
            'deprecated' => $deprecated,
        ]);

        $units = Unit::query()
            ->where('description', $description)
            ->where('abbreviation', $abbreviation)
            ->where('deprecated', $deprecated)
            ->get();
        $this->assertCount(1, $units);
        $unit = $units->first();

        $response->assertRedirect(route('unit.index'));
        $response->assertSessionHas('unit.id', $unit->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $unit = Unit::factory()->create();

        $response = $this->get(route('unit.show', $unit));

        $response->assertOk();
        $response->assertViewIs('unit.show');
        $response->assertViewHas('unit');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $unit = Unit::factory()->create();

        $response = $this->get(route('unit.edit', $unit));

        $response->assertOk();
        $response->assertViewIs('unit.edit');
        $response->assertViewHas('unit');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\UnitController::class,
            'update',
            \App\Http\Requests\Etim\UnitUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $unit = Unit::factory()->create();
        $description = $this->faker->text();
        $abbreviation = $this->faker->word();
        $deprecated = $this->faker->boolean();

        $response = $this->put(route('unit.update', $unit), [
            'description' => $description,
            'abbreviation' => $abbreviation,
            'deprecated' => $deprecated,
        ]);

        $unit->refresh();

        $response->assertRedirect(route('unit.index'));
        $response->assertSessionHas('unit.id', $unit->id);

        $this->assertEquals($description, $unit->description);
        $this->assertEquals($abbreviation, $unit->abbreviation);
        $this->assertEquals($deprecated, $unit->deprecated);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $unit = Unit::factory()->create();

        $response = $this->delete(route('unit.destroy', $unit));

        $response->assertRedirect(route('unit.index'));

        $this->assertModelMissing($unit);
    }
}
