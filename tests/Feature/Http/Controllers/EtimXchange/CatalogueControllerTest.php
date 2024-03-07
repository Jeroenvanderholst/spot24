<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\20;
use App\Models\Catalogue;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CatalogueController
 */
final class CatalogueControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $catalogues = Catalogue::factory()->count(3)->create();

        $response = $this->get(route('catalogue.index'));

        $response->assertOk();
        $response->assertViewIs('catalogue.index');
        $response->assertViewHas('catalogues');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('catalogue.create'));

        $response->assertOk();
        $response->assertViewIs('catalogue.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CatalogueController::class,
            'store',
            \App\Http\Requests\EtimXchange\CatalogueStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $catalogue = 20::factory()->create();
        $catalogue_type = $this->faker->randomElement(/** enum_attributes **/);
        $catalogue_validity_start = $this->faker->date();
        $language = $this->faker->randomLetter();

        $response = $this->post(route('catalogue.store'), [
            'catalogue_id' => $catalogue->id,
            'catalogue_type' => $catalogue_type,
            'catalogue_validity_start' => $catalogue_validity_start,
            'language' => $language,
        ]);

        $catalogues = Catalogue::query()
            ->where('catalogue_id', $catalogue->id)
            ->where('catalogue_type', $catalogue_type)
            ->where('catalogue_validity_start', $catalogue_validity_start)
            ->where('language', $language)
            ->get();
        $this->assertCount(1, $catalogues);
        $catalogue = $catalogues->first();

        $response->assertRedirect(route('catalogue.index'));
        $response->assertSessionHas('catalogue.id', $catalogue->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $catalogue = Catalogue::factory()->create();

        $response = $this->get(route('catalogue.show', $catalogue));

        $response->assertOk();
        $response->assertViewIs('catalogue.show');
        $response->assertViewHas('catalogue');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $catalogue = Catalogue::factory()->create();

        $response = $this->get(route('catalogue.edit', $catalogue));

        $response->assertOk();
        $response->assertViewIs('catalogue.edit');
        $response->assertViewHas('catalogue');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CatalogueController::class,
            'update',
            \App\Http\Requests\EtimXchange\CatalogueUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $catalogue = Catalogue::factory()->create();
        $catalogue = 20::factory()->create();
        $catalogue_type = $this->faker->randomElement(/** enum_attributes **/);
        $catalogue_validity_start = $this->faker->date();
        $language = $this->faker->randomLetter();

        $response = $this->put(route('catalogue.update', $catalogue), [
            'catalogue_id' => $catalogue->id,
            'catalogue_type' => $catalogue_type,
            'catalogue_validity_start' => $catalogue_validity_start,
            'language' => $language,
        ]);

        $catalogue->refresh();

        $response->assertRedirect(route('catalogue.index'));
        $response->assertSessionHas('catalogue.id', $catalogue->id);

        $this->assertEquals($catalogue->id, $catalogue->catalogue_id);
        $this->assertEquals($catalogue_type, $catalogue->catalogue_type);
        $this->assertEquals(Carbon::parse($catalogue_validity_start), $catalogue->catalogue_validity_start);
        $this->assertEquals($language, $catalogue->language);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $catalogue = Catalogue::factory()->create();

        $response = $this->delete(route('catalogue.destroy', $catalogue));

        $response->assertRedirect(route('catalogue.index'));

        $this->assertModelMissing($catalogue);
    }
}
