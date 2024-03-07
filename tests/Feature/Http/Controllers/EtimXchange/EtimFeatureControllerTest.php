<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\ModelsClassification;
use App\ModelsFeature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimFeatureController
 */
final class EtimFeatureControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $etimFeatures = EtimFeature::factory()->count(3)->create();

        $response = $this->get(route('etim-feature.index'));

        $response->assertOk();
        $response->assertViewIs('etimFeature.index');
        $response->assertViewHas('etimFeatures');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('etim-feature.create'));

        $response->assertOk();
        $response->assertViewIs('etimFeature.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimFeatureController::class,
            'store',
            \App\Http\Requests\EtimXchange\EtimFeatureStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $etim_class_id = $this->faker->randomLetter();
        $etim_class_version = $this->faker->numberBetween(-8, 8);
        $etim_feature_id = $this->faker->randomLetter();
        $etim_classification = EtimClassification::factory()->create();

        $response = $this->post(route('etim-feature.store'), [
            'product_id' => $product_id,
            'etim_class_id' => $etim_class_id,
            'etim_class_version' => $etim_class_version,
            'etim_feature_id' => $etim_feature_id,
            'etim_classification_id' => $etim_classification->id,
        ]);

        $etimFeatures = EtimFeature::query()
            ->where('product_id', $product_id)
            ->where('etim_class_id', $etim_class_id)
            ->where('etim_class_version', $etim_class_version)
            ->where('etim_feature_id', $etim_feature_id)
            ->where('etim_classification_id', $etim_classification->id)
            ->get();
        $this->assertCount(1, $etimFeatures);
        $etimFeature = $etimFeatures->first();

        $response->assertRedirect(route('etim-feature.index'));
        $response->assertSessionHas('etimFeature.id', $etimFeature->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $etimFeature = EtimFeature::factory()->create();

        $response = $this->get(route('etim-feature.show', $etimFeature));

        $response->assertOk();
        $response->assertViewIs('etimFeature.show');
        $response->assertViewHas('etimFeature');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $etimFeature = EtimFeature::factory()->create();

        $response = $this->get(route('etim-feature.edit', $etimFeature));

        $response->assertOk();
        $response->assertViewIs('etimFeature.edit');
        $response->assertViewHas('etimFeature');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimFeatureController::class,
            'update',
            \App\Http\Requests\EtimXchange\EtimFeatureUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $etimFeature = EtimFeature::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $etim_class_id = $this->faker->randomLetter();
        $etim_class_version = $this->faker->numberBetween(-8, 8);
        $etim_feature_id = $this->faker->randomLetter();
        $etim_classification = EtimClassification::factory()->create();

        $response = $this->put(route('etim-feature.update', $etimFeature), [
            'product_id' => $product_id,
            'etim_class_id' => $etim_class_id,
            'etim_class_version' => $etim_class_version,
            'etim_feature_id' => $etim_feature_id,
            'etim_classification_id' => $etim_classification->id,
        ]);

        $etimFeature->refresh();

        $response->assertRedirect(route('etim-feature.index'));
        $response->assertSessionHas('etimFeature.id', $etimFeature->id);

        $this->assertEquals($product_id, $etimFeature->product_id);
        $this->assertEquals($etim_class_id, $etimFeature->etim_class_id);
        $this->assertEquals($etim_class_version, $etimFeature->etim_class_version);
        $this->assertEquals($etim_feature_id, $etimFeature->etim_feature_id);
        $this->assertEquals($etim_classification->id, $etimFeature->etim_classification_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $etimFeature = EtimFeature::factory()->create();

        $response = $this->delete(route('etim-feature.destroy', $etimFeature));

        $response->assertRedirect(route('etim-feature.index'));

        $this->assertModelMissing($etimFeature);
    }
}
