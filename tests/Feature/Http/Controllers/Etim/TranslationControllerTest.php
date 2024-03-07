<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\Translation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TranslationController
 */
final class TranslationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $translations = Translation::factory()->count(3)->create();

        $response = $this->get(route('translation.index'));

        $response->assertOk();
        $response->assertViewIs('translation.index');
        $response->assertViewHas('translations');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('translation.create'));

        $response->assertOk();
        $response->assertViewIs('translation.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TranslationController::class,
            'store',
            \App\Http\Requests\Etim\TranslationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('translation.store'));

        $response->assertRedirect(route('translation.index'));
        $response->assertSessionHas('translation.id', $translation->id);

        $this->assertDatabaseHas(translations, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $translation = Translation::factory()->create();

        $response = $this->get(route('translation.show', $translation));

        $response->assertOk();
        $response->assertViewIs('translation.show');
        $response->assertViewHas('translation');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $translation = Translation::factory()->create();

        $response = $this->get(route('translation.edit', $translation));

        $response->assertOk();
        $response->assertViewIs('translation.edit');
        $response->assertViewHas('translation');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TranslationController::class,
            'update',
            \App\Http\Requests\Etim\TranslationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $translation = Translation::factory()->create();

        $response = $this->put(route('translation.update', $translation));

        $translation->refresh();

        $response->assertRedirect(route('translation.index'));
        $response->assertSessionHas('translation.id', $translation->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $translation = Translation::factory()->create();

        $response = $this->delete(route('translation.destroy', $translation));

        $response->assertRedirect(route('translation.index'));

        $this->assertModelMissing($translation);
    }
}
