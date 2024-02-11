<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\8;
use App\Models\ClassFeature;
use App\Models\FeatureValue;
use App\Models\ModellingClassFeature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Etim\FeatureValueController
 */
final class FeatureValueControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $featureValues = FeatureValue::factory()->count(3)->create();

        $response = $this->get(route('feature-value.index'));

        $response->assertOk();
        $response->assertViewIs('featureValue.index');
        $response->assertViewHas('featureValues');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('feature-value.create'));

        $response->assertOk();
        $response->assertViewIs('featureValue.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\FeatureValueController::class,
            'store',
            \App\Http\Requests\Etim\FeatureValueStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $class = 8::factory()->create();
        $sort_nr = $this->faker->numberBetween(-8, 8);
        $feature = 8::factory()->create();
        $value = 8::factory()->create();
        $class_feature = ClassFeature::factory()->create();
        $modelling_class_feature = ModellingClassFeature::factory()->create();

        $response = $this->post(route('feature-value.store'), [
            'class_id' => $class->id,
            'sort_nr' => $sort_nr,
            'feature_id' => $feature->id,
            'value_id' => $value->id,
            'class_feature_id' => $class_feature->id,
            'modelling_class_feature_id' => $modelling_class_feature->id,
        ]);

        $featureValues = FeatureValue::query()
            ->where('class_id', $class->id)
            ->where('sort_nr', $sort_nr)
            ->where('feature_id', $feature->id)
            ->where('value_id', $value->id)
            ->where('class_feature_id', $class_feature->id)
            ->where('modelling_class_feature_id', $modelling_class_feature->id)
            ->get();
        $this->assertCount(1, $featureValues);
        $featureValue = $featureValues->first();

        $response->assertRedirect(route('feature-value.index'));
        $response->assertSessionHas('featureValue.id', $featureValue->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $featureValue = FeatureValue::factory()->create();

        $response = $this->get(route('feature-value.show', $featureValue));

        $response->assertOk();
        $response->assertViewIs('featureValue.show');
        $response->assertViewHas('featureValue');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $featureValue = FeatureValue::factory()->create();

        $response = $this->get(route('feature-value.edit', $featureValue));

        $response->assertOk();
        $response->assertViewIs('featureValue.edit');
        $response->assertViewHas('featureValue');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\FeatureValueController::class,
            'update',
            \App\Http\Requests\Etim\FeatureValueUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $featureValue = FeatureValue::factory()->create();
        $class = 8::factory()->create();
        $sort_nr = $this->faker->numberBetween(-8, 8);
        $feature = 8::factory()->create();
        $value = 8::factory()->create();
        $class_feature = ClassFeature::factory()->create();
        $modelling_class_feature = ModellingClassFeature::factory()->create();

        $response = $this->put(route('feature-value.update', $featureValue), [
            'class_id' => $class->id,
            'sort_nr' => $sort_nr,
            'feature_id' => $feature->id,
            'value_id' => $value->id,
            'class_feature_id' => $class_feature->id,
            'modelling_class_feature_id' => $modelling_class_feature->id,
        ]);

        $featureValue->refresh();

        $response->assertRedirect(route('feature-value.index'));
        $response->assertSessionHas('featureValue.id', $featureValue->id);

        $this->assertEquals($class->id, $featureValue->class_id);
        $this->assertEquals($sort_nr, $featureValue->sort_nr);
        $this->assertEquals($feature->id, $featureValue->feature_id);
        $this->assertEquals($value->id, $featureValue->value_id);
        $this->assertEquals($class_feature->id, $featureValue->class_feature_id);
        $this->assertEquals($modelling_class_feature->id, $featureValue->modelling_class_feature_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $featureValue = FeatureValue::factory()->create();

        $response = $this->delete(route('feature-value.destroy', $featureValue));

        $response->assertRedirect(route('feature-value.index'));

        $this->assertModelMissing($featureValue);
    }
}
