<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FeatureController
 */
final class FeatureControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $features = Feature::factory()->count(3)->create();

        $response = $this->get(route('feature.index'));

        $response->assertOk();
        $response->assertViewIs('feature.index');
        $response->assertViewHas('features');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('feature.create'));

        $response->assertOk();
        $response->assertViewIs('feature.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FeatureController::class,
            'store',
            \App\Http\Requests\Etim\FeatureStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('feature.store'));

        $response->assertRedirect(route('feature.index'));
        $response->assertSessionHas('feature.id', $feature->id);

        $this->assertDatabaseHas(features, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $feature = Feature::factory()->create();

        $response = $this->get(route('feature.show', $feature));

        $response->assertOk();
        $response->assertViewIs('feature.show');
        $response->assertViewHas('feature');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $feature = Feature::factory()->create();

        $response = $this->get(route('feature.edit', $feature));

        $response->assertOk();
        $response->assertViewIs('feature.edit');
        $response->assertViewHas('feature');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FeatureController::class,
            'update',
            \App\Http\Requests\Etim\FeatureUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $feature = Feature::factory()->create();

        $response = $this->put(route('feature.update', $feature));

        $feature->refresh();

        $response->assertRedirect(route('feature.index'));
        $response->assertSessionHas('feature.id', $feature->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $feature = Feature::factory()->create();

        $response = $this->delete(route('feature.destroy', $feature));

        $response->assertRedirect(route('feature.index'));

        $this->assertModelMissing($feature);
    }
}
