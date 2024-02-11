<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\ClassificationFeature;
use App\Models\OtherClassification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\ClassificationFeatureController
 */
final class ClassificationFeatureControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $classificationFeatures = ClassificationFeature::factory()->count(3)->create();

        $response = $this->get(route('classification-feature.index'));

        $response->assertOk();
        $response->assertViewIs('classificationFeature.index');
        $response->assertViewHas('classificationFeatures');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('classification-feature.create'));

        $response->assertOk();
        $response->assertViewIs('classificationFeature.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\ClassificationFeatureController::class,
            'store',
            \App\Http\Requests\EtimXchange\ClassificationFeatureStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $other_classification = OtherClassification::factory()->create();

        $response = $this->post(route('classification-feature.store'), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'other_classification_id' => $other_classification->id,
        ]);

        $classificationFeatures = ClassificationFeature::query()
            ->where('product_id', $product_id)
            ->where('manufacturer_product_number', $manufacturer_product_number)
            ->where('other_classification_id', $other_classification->id)
            ->get();
        $this->assertCount(1, $classificationFeatures);
        $classificationFeature = $classificationFeatures->first();

        $response->assertRedirect(route('classification-feature.index'));
        $response->assertSessionHas('classificationFeature.id', $classificationFeature->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $classificationFeature = ClassificationFeature::factory()->create();

        $response = $this->get(route('classification-feature.show', $classificationFeature));

        $response->assertOk();
        $response->assertViewIs('classificationFeature.show');
        $response->assertViewHas('classificationFeature');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $classificationFeature = ClassificationFeature::factory()->create();

        $response = $this->get(route('classification-feature.edit', $classificationFeature));

        $response->assertOk();
        $response->assertViewIs('classificationFeature.edit');
        $response->assertViewHas('classificationFeature');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\ClassificationFeatureController::class,
            'update',
            \App\Http\Requests\EtimXchange\ClassificationFeatureUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $classificationFeature = ClassificationFeature::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $other_classification = OtherClassification::factory()->create();

        $response = $this->put(route('classification-feature.update', $classificationFeature), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'other_classification_id' => $other_classification->id,
        ]);

        $classificationFeature->refresh();

        $response->assertRedirect(route('classification-feature.index'));
        $response->assertSessionHas('classificationFeature.id', $classificationFeature->id);

        $this->assertEquals($product_id, $classificationFeature->product_id);
        $this->assertEquals($manufacturer_product_number, $classificationFeature->manufacturer_product_number);
        $this->assertEquals($other_classification->id, $classificationFeature->other_classification_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $classificationFeature = ClassificationFeature::factory()->create();

        $response = $this->delete(route('classification-feature.destroy', $classificationFeature));

        $response->assertRedirect(route('classification-feature.index'));

        $this->assertModelMissing($classificationFeature);
    }
}
