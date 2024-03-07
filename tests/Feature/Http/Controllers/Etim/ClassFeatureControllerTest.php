<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\ClassFeature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ClassFeatureController
 */
final class ClassFeatureControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $classFeatures = ClassFeature::factory()->count(3)->create();

        $response = $this->get(route('class-feature.index'));

        $response->assertOk();
        $response->assertViewIs('classFeature.index');
        $response->assertViewHas('classFeatures');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('class-feature.create'));

        $response->assertOk();
        $response->assertViewIs('classFeature.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClassFeatureController::class,
            'store',
            \App\Http\Requests\Etim\ClassFeatureStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('class-feature.store'));

        $response->assertRedirect(route('class-feature.index'));
        $response->assertSessionHas('classFeature.id', $classFeature->id);

        $this->assertDatabaseHas(classFeatures, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $classFeature = ClassFeature::factory()->create();

        $response = $this->get(route('class-feature.show', $classFeature));

        $response->assertOk();
        $response->assertViewIs('classFeature.show');
        $response->assertViewHas('classFeature');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $classFeature = ClassFeature::factory()->create();

        $response = $this->get(route('class-feature.edit', $classFeature));

        $response->assertOk();
        $response->assertViewIs('classFeature.edit');
        $response->assertViewHas('classFeature');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClassFeatureController::class,
            'update',
            \App\Http\Requests\Etim\ClassFeatureUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $classFeature = ClassFeature::factory()->create();

        $response = $this->put(route('class-feature.update', $classFeature));

        $classFeature->refresh();

        $response->assertRedirect(route('class-feature.index'));
        $response->assertSessionHas('classFeature.id', $classFeature->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $classFeature = ClassFeature::factory()->create();

        $response = $this->delete(route('class-feature.destroy', $classFeature));

        $response->assertRedirect(route('class-feature.index'));

        $this->assertModelMissing($classFeature);
    }
}
