<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\EtimModellingFeature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\EtimModellingFeatureController
 */
final class EtimModellingFeatureControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $etimModellingFeatures = EtimModellingFeature::factory()->count(3)->create();

        $response = $this->get(route('etim-modelling-feature.index'));

        $response->assertOk();
        $response->assertViewIs('etimModellingFeature.index');
        $response->assertViewHas('etimModellingFeatures');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('etim-modelling-feature.create'));

        $response->assertOk();
        $response->assertViewIs('etimModellingFeature.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\EtimModellingFeatureController::class,
            'store',
            \App\Http\Requests\EtimXchange\EtimModellingFeatureStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $etim_modelling_port_id = $this->faker->numberBetween(-100000, 100000);
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $etim_modelling_class_code = $this->faker->word();
        $etim_modelling_portcode = $this->faker->numberBetween(-8, 8);
        $etim_feature_code = $this->faker->randomLetter();

        $response = $this->post(route('etim-modelling-feature.store'), [
            'etim_modelling_port_id' => $etim_modelling_port_id,
            'product_id' => $product_id,
            'etim_modelling_class_code' => $etim_modelling_class_code,
            'etim_modelling_portcode' => $etim_modelling_portcode,
            'etim_feature_code' => $etim_feature_code,
        ]);

        $etimModellingFeatures = EtimModellingFeature::query()
            ->where('etim_modelling_port_id', $etim_modelling_port_id)
            ->where('product_id', $product_id)
            ->where('etim_modelling_class_code', $etim_modelling_class_code)
            ->where('etim_modelling_portcode', $etim_modelling_portcode)
            ->where('etim_feature_code', $etim_feature_code)
            ->get();
        $this->assertCount(1, $etimModellingFeatures);
        $etimModellingFeature = $etimModellingFeatures->first();

        $response->assertRedirect(route('etim-modelling-feature.index'));
        $response->assertSessionHas('etimModellingFeature.id', $etimModellingFeature->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $etimModellingFeature = EtimModellingFeature::factory()->create();

        $response = $this->get(route('etim-modelling-feature.show', $etimModellingFeature));

        $response->assertOk();
        $response->assertViewIs('etimModellingFeature.show');
        $response->assertViewHas('etimModellingFeature');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $etimModellingFeature = EtimModellingFeature::factory()->create();

        $response = $this->get(route('etim-modelling-feature.edit', $etimModellingFeature));

        $response->assertOk();
        $response->assertViewIs('etimModellingFeature.edit');
        $response->assertViewHas('etimModellingFeature');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\EtimModellingFeatureController::class,
            'update',
            \App\Http\Requests\EtimXchange\EtimModellingFeatureUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $etimModellingFeature = EtimModellingFeature::factory()->create();
        $etim_modelling_port_id = $this->faker->numberBetween(-100000, 100000);
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $etim_modelling_class_code = $this->faker->word();
        $etim_modelling_portcode = $this->faker->numberBetween(-8, 8);
        $etim_feature_code = $this->faker->randomLetter();

        $response = $this->put(route('etim-modelling-feature.update', $etimModellingFeature), [
            'etim_modelling_port_id' => $etim_modelling_port_id,
            'product_id' => $product_id,
            'etim_modelling_class_code' => $etim_modelling_class_code,
            'etim_modelling_portcode' => $etim_modelling_portcode,
            'etim_feature_code' => $etim_feature_code,
        ]);

        $etimModellingFeature->refresh();

        $response->assertRedirect(route('etim-modelling-feature.index'));
        $response->assertSessionHas('etimModellingFeature.id', $etimModellingFeature->id);

        $this->assertEquals($etim_modelling_port_id, $etimModellingFeature->etim_modelling_port_id);
        $this->assertEquals($product_id, $etimModellingFeature->product_id);
        $this->assertEquals($etim_modelling_class_code, $etimModellingFeature->etim_modelling_class_code);
        $this->assertEquals($etim_modelling_portcode, $etimModellingFeature->etim_modelling_portcode);
        $this->assertEquals($etim_feature_code, $etimModellingFeature->etim_feature_code);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $etimModellingFeature = EtimModellingFeature::factory()->create();

        $response = $this->delete(route('etim-modelling-feature.destroy', $etimModellingFeature));

        $response->assertRedirect(route('etim-modelling-feature.index'));

        $this->assertModelMissing($etimModellingFeature);
    }
}
