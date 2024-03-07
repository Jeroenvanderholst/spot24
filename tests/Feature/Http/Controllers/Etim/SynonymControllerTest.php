<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\5;
use App\Models\ModellingClass;
use App\Models\ProductClass;
use App\Models\Synonym;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SynonymController
 */
final class SynonymControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $synonyms = Synonym::factory()->count(3)->create();

        $response = $this->get(route('synonym.index'));

        $response->assertOk();
        $response->assertViewIs('synonym.index');
        $response->assertViewHas('synonyms');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('synonym.create'));

        $response->assertOk();
        $response->assertViewIs('synonym.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SynonymController::class,
            'store',
            \App\Http\Requests\Etim\SynonymStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $language = 5::factory()->create();
        $description = $this->faker->text();
        $product_class = ProductClass::factory()->create();
        $modelling_class = ModellingClass::factory()->create();

        $response = $this->post(route('synonym.store'), [
            'language_id' => $language->id,
            'description' => $description,
            'product_class_id' => $product_class->id,
            'modelling_class_id' => $modelling_class->id,
        ]);

        $synonyms = Synonym::query()
            ->where('language_id', $language->id)
            ->where('description', $description)
            ->where('product_class_id', $product_class->id)
            ->where('modelling_class_id', $modelling_class->id)
            ->get();
        $this->assertCount(1, $synonyms);
        $synonym = $synonyms->first();

        $response->assertRedirect(route('synonym.index'));
        $response->assertSessionHas('synonym.id', $synonym->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $synonym = Synonym::factory()->create();

        $response = $this->get(route('synonym.show', $synonym));

        $response->assertOk();
        $response->assertViewIs('synonym.show');
        $response->assertViewHas('synonym');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $synonym = Synonym::factory()->create();

        $response = $this->get(route('synonym.edit', $synonym));

        $response->assertOk();
        $response->assertViewIs('synonym.edit');
        $response->assertViewHas('synonym');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SynonymController::class,
            'update',
            \App\Http\Requests\Etim\SynonymUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $synonym = Synonym::factory()->create();
        $language = 5::factory()->create();
        $description = $this->faker->text();
        $product_class = ProductClass::factory()->create();
        $modelling_class = ModellingClass::factory()->create();

        $response = $this->put(route('synonym.update', $synonym), [
            'language_id' => $language->id,
            'description' => $description,
            'product_class_id' => $product_class->id,
            'modelling_class_id' => $modelling_class->id,
        ]);

        $synonym->refresh();

        $response->assertRedirect(route('synonym.index'));
        $response->assertSessionHas('synonym.id', $synonym->id);

        $this->assertEquals($language->id, $synonym->language_id);
        $this->assertEquals($description, $synonym->description);
        $this->assertEquals($product_class->id, $synonym->product_class_id);
        $this->assertEquals($modelling_class->id, $synonym->modelling_class_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $synonym = Synonym::factory()->create();

        $response = $this->delete(route('synonym.destroy', $synonym));

        $response->assertRedirect(route('synonym.index'));

        $this->assertModelMissing($synonym);
    }
}
