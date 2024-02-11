<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\5;
use App\Models\Unit;
use App\Models\UnitTranslation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Etim\UnitTranslationController
 */
final class UnitTranslationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $unitTranslations = UnitTranslation::factory()->count(3)->create();

        $response = $this->get(route('unit-translation.index'));

        $response->assertOk();
        $response->assertViewIs('unitTranslation.index');
        $response->assertViewHas('unitTranslations');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('unit-translation.create'));

        $response->assertOk();
        $response->assertViewIs('unitTranslation.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\UnitTranslationController::class,
            'store',
            \App\Http\Requests\Etim\UnitTranslationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $language = 5::factory()->create();
        $description = $this->faker->text();
        $abbreviation = $this->faker->word();
        $unit = Unit::factory()->create();

        $response = $this->post(route('unit-translation.store'), [
            'language_id' => $language->id,
            'description' => $description,
            'abbreviation' => $abbreviation,
            'unit_id' => $unit->id,
        ]);

        $unitTranslations = UnitTranslation::query()
            ->where('language_id', $language->id)
            ->where('description', $description)
            ->where('abbreviation', $abbreviation)
            ->where('unit_id', $unit->id)
            ->get();
        $this->assertCount(1, $unitTranslations);
        $unitTranslation = $unitTranslations->first();

        $response->assertRedirect(route('unit-translation.index'));
        $response->assertSessionHas('unitTranslation.id', $unitTranslation->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $unitTranslation = UnitTranslation::factory()->create();

        $response = $this->get(route('unit-translation.show', $unitTranslation));

        $response->assertOk();
        $response->assertViewIs('unitTranslation.show');
        $response->assertViewHas('unitTranslation');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $unitTranslation = UnitTranslation::factory()->create();

        $response = $this->get(route('unit-translation.edit', $unitTranslation));

        $response->assertOk();
        $response->assertViewIs('unitTranslation.edit');
        $response->assertViewHas('unitTranslation');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\UnitTranslationController::class,
            'update',
            \App\Http\Requests\Etim\UnitTranslationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $unitTranslation = UnitTranslation::factory()->create();
        $language = 5::factory()->create();
        $description = $this->faker->text();
        $abbreviation = $this->faker->word();
        $unit = Unit::factory()->create();

        $response = $this->put(route('unit-translation.update', $unitTranslation), [
            'language_id' => $language->id,
            'description' => $description,
            'abbreviation' => $abbreviation,
            'unit_id' => $unit->id,
        ]);

        $unitTranslation->refresh();

        $response->assertRedirect(route('unit-translation.index'));
        $response->assertSessionHas('unitTranslation.id', $unitTranslation->id);

        $this->assertEquals($language->id, $unitTranslation->language_id);
        $this->assertEquals($description, $unitTranslation->description);
        $this->assertEquals($abbreviation, $unitTranslation->abbreviation);
        $this->assertEquals($unit->id, $unitTranslation->unit_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $unitTranslation = UnitTranslation::factory()->create();

        $response = $this->delete(route('unit-translation.destroy', $unitTranslation));

        $response->assertRedirect(route('unit-translation.index'));

        $this->assertModelMissing($unitTranslation);
    }
}
