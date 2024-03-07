<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\ModelsClassification;
use App\Models\ModellingClass;
use App\Models\ProductClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimClassificationController
 */
final class EtimClassificationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $etimClassifications = EtimClassification::factory()->count(3)->create();

        $response = $this->get(route('etim-classification.index'));

        $response->assertOk();
        $response->assertViewIs('etimClassification.index');
        $response->assertViewHas('etimClassifications');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('etim-classification.create'));

        $response->assertOk();
        $response->assertViewIs('etimClassification.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimClassificationController::class,
            'store',
            \App\Http\Requests\EtimXchange\EtimClassificationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_nr = $this->faker->word();
        $etim_release_version = $this->faker->word();
        $etim_class_id = $this->faker->randomLetter();
        $etim_class_version = $this->faker->numberBetween(-8, 8);
        $etim_modelling_class_id = $this->faker->randomLetter();

        $response = $this->post(route('etim-classification.store'), [
            'product_id' => $product_id,
            'manufacturer_product_nr' => $manufacturer_product_nr,
            'etim_release_version' => $etim_release_version,
            'etim_class_id' => $etim_class_id,
            'etim_class_version' => $etim_class_version,
            'etim_modelling_class_id' => $etim_modelling_class_id,

        ]);

        $etimClassifications = EtimClassification::query()
            ->where('product_id', $product_id)
            ->where('manufacturer_product_nr', $manufacturer_product_nr)
            ->where('etim_release_version', $etim_release_version)
            ->where('etim_class_id', $etim_class_id)
            ->where('etim_class_version', $etim_class_version)
            ->where('etim_modelling_class_id', $etim_modelling_class_id)
            ->get();
        $this->assertCount(1, $etimClassifications);
        $etimClassification = $etimClassifications->first();

        $response->assertRedirect(route('etim-classification.index'));
        $response->assertSessionHas('etimClassification.id', $etimClassification->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $etimClassification = EtimClassification::factory()->create();

        $response = $this->get(route('etim-classification.show', $etimClassification));

        $response->assertOk();
        $response->assertViewIs('etimClassification.show');
        $response->assertViewHas('etimClassification');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $etimClassification = EtimClassification::factory()->create();

        $response = $this->get(route('etim-classification.edit', $etimClassification));

        $response->assertOk();
        $response->assertViewIs('etimClassification.edit');
        $response->assertViewHas('etimClassification');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimClassificationController::class,
            'update',
            \App\Http\Requests\EtimXchange\EtimClassificationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $etimClassification = EtimClassification::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_nr = $this->faker->word();
        $etim_release_version = $this->faker->word();
        $etim_class_id = $this->faker->randomLetter();
        $etim_class_version = $this->faker->numberBetween(-8, 8);
        $etim_modelling_class_id = $this->faker->randomLetter();


        $response = $this->put(route('etim-classification.update', $etimClassification), [
            'product_id' => $product_id,
            'manufacturer_product_nr' => $manufacturer_product_nr,
            'etim_release_version' => $etim_release_version,
            'etim_class_id' => $etim_class_id,
            'etim_class_version' => $etim_class_version,
            'etim_modelling_class_id' => $etim_modelling_class_id,

        ]);

        $etimClassification->refresh();

        $response->assertRedirect(route('etim-classification.index'));
        $response->assertSessionHas('etimClassification.id', $etimClassification->id);

        $this->assertEquals($product_id, $etimClassification->product_id);
        $this->assertEquals($manufacturer_product_nr, $etimClassification->manufacturer_product_nr);
        $this->assertEquals($etim_release_version, $etimClassification->etim_release_version);
        $this->assertEquals($etim_class_id, $etimClassification->etim_class_id);
        $this->assertEquals($etim_class_version, $etimClassification->etim_class_version);
        $this->assertEquals($etim_modelling_class_id, $etimClassification->etim_modelling_class_id);
        $this->assertEquals($product_class->id, $etimClassification->product_class_id);
        $this->assertEquals($modelling_class->id, $etimClassification->modelling_class_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $etimClassification = EtimClassification::factory()->create();

        $response = $this->delete(route('etim-classification.destroy', $etimClassification));

        $response->assertRedirect(route('etim-classification.index'));

        $this->assertModelMissing($etimClassification);
    }
}
