<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Etim\LanguageController
 */
final class LanguageControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $languages = Language::factory()->count(3)->create();

        $response = $this->get(route('language.index'));

        $response->assertOk();
        $response->assertViewIs('language.index');
        $response->assertViewHas('languages');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('language.create'));

        $response->assertOk();
        $response->assertViewIs('language.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\LanguageController::class,
            'store',
            \App\Http\Requests\Etim\LanguageStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $description = $this->faker->text();

        $response = $this->post(route('language.store'), [
            'description' => $description,
        ]);

        $languages = Language::query()
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $languages);
        $language = $languages->first();

        $response->assertRedirect(route('language.index'));
        $response->assertSessionHas('language.id', $language->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $language = Language::factory()->create();

        $response = $this->get(route('language.show', $language));

        $response->assertOk();
        $response->assertViewIs('language.show');
        $response->assertViewHas('language');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $language = Language::factory()->create();

        $response = $this->get(route('language.edit', $language));

        $response->assertOk();
        $response->assertViewIs('language.edit');
        $response->assertViewHas('language');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\LanguageController::class,
            'update',
            \App\Http\Requests\Etim\LanguageUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $language = Language::factory()->create();
        $description = $this->faker->text();

        $response = $this->put(route('language.update', $language), [
            'description' => $description,
        ]);

        $language->refresh();

        $response->assertRedirect(route('language.index'));
        $response->assertSessionHas('language.id', $language->id);

        $this->assertEquals($description, $language->description);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $language = Language::factory()->create();

        $response = $this->delete(route('language.destroy', $language));

        $response->assertRedirect(route('language.index'));

        $this->assertModelMissing($language);
    }
}
