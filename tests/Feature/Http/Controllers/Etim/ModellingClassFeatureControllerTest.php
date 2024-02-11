<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\8;
use App\Models\ModellingClass;
use App\Models\ModellingClassFeature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Etim\ModellingClassFeatureController
 */
final class ModellingClassFeatureControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $modellingClassFeatures = ModellingClassFeature::factory()->count(3)->create();

        $response = $this->get(route('modelling-class-feature.index'));

        $response->assertOk();
        $response->assertViewIs('modellingClassFeature.index');
        $response->assertViewHas('modellingClassFeatures');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('modelling-class-feature.create'));

        $response->assertOk();
        $response->assertViewIs('modellingClassFeature.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\ModellingClassFeatureController::class,
            'store',
            \App\Http\Requests\Etim\ModellingClassFeatureStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $modellingclass = 8::factory()->create();
        $sort_nr = $this->faker->numberBetween(-1000, 1000);
        $feature = 8::factory()->create();
        $port_code = $this->faker->numberBetween(-8, 8);
        $drawing_code = $this->faker->randomLetter();
        $modelling_class = ModellingClass::factory()->create();

        $response = $this->post(route('modelling-class-feature.store'), [
            'modellingclass_id' => $modellingclass->id,
            'sort_nr' => $sort_nr,
            'feature_id' => $feature->id,
            'port_code' => $port_code,
            'drawing_code' => $drawing_code,
            'modelling_class_id' => $modelling_class->id,
        ]);

        $modellingClassFeatures = ModellingClassFeature::query()
            ->where('modellingclass_id', $modellingclass->id)
            ->where('sort_nr', $sort_nr)
            ->where('feature_id', $feature->id)
            ->where('port_code', $port_code)
            ->where('drawing_code', $drawing_code)
            ->where('modelling_class_id', $modelling_class->id)
            ->get();
        $this->assertCount(1, $modellingClassFeatures);
        $modellingClassFeature = $modellingClassFeatures->first();

        $response->assertRedirect(route('modelling-class-feature.index'));
        $response->assertSessionHas('modellingClassFeature.id', $modellingClassFeature->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $modellingClassFeature = ModellingClassFeature::factory()->create();

        $response = $this->get(route('modelling-class-feature.show', $modellingClassFeature));

        $response->assertOk();
        $response->assertViewIs('modellingClassFeature.show');
        $response->assertViewHas('modellingClassFeature');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $modellingClassFeature = ModellingClassFeature::factory()->create();

        $response = $this->get(route('modelling-class-feature.edit', $modellingClassFeature));

        $response->assertOk();
        $response->assertViewIs('modellingClassFeature.edit');
        $response->assertViewHas('modellingClassFeature');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\ModellingClassFeatureController::class,
            'update',
            \App\Http\Requests\Etim\ModellingClassFeatureUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $modellingClassFeature = ModellingClassFeature::factory()->create();
        $modellingclass = 8::factory()->create();
        $sort_nr = $this->faker->numberBetween(-1000, 1000);
        $feature = 8::factory()->create();
        $port_code = $this->faker->numberBetween(-8, 8);
        $drawing_code = $this->faker->randomLetter();
        $modelling_class = ModellingClass::factory()->create();

        $response = $this->put(route('modelling-class-feature.update', $modellingClassFeature), [
            'modellingclass_id' => $modellingclass->id,
            'sort_nr' => $sort_nr,
            'feature_id' => $feature->id,
            'port_code' => $port_code,
            'drawing_code' => $drawing_code,
            'modelling_class_id' => $modelling_class->id,
        ]);

        $modellingClassFeature->refresh();

        $response->assertRedirect(route('modelling-class-feature.index'));
        $response->assertSessionHas('modellingClassFeature.id', $modellingClassFeature->id);

        $this->assertEquals($modellingclass->id, $modellingClassFeature->modellingclass_id);
        $this->assertEquals($sort_nr, $modellingClassFeature->sort_nr);
        $this->assertEquals($feature->id, $modellingClassFeature->feature_id);
        $this->assertEquals($port_code, $modellingClassFeature->port_code);
        $this->assertEquals($drawing_code, $modellingClassFeature->drawing_code);
        $this->assertEquals($modelling_class->id, $modellingClassFeature->modelling_class_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $modellingClassFeature = ModellingClassFeature::factory()->create();

        $response = $this->delete(route('modelling-class-feature.destroy', $modellingClassFeature));

        $response->assertRedirect(route('modelling-class-feature.index'));

        $this->assertModelMissing($modellingClassFeature);
    }
}
