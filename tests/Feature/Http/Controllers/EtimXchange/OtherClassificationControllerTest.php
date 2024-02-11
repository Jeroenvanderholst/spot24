<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\OtherClassification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\OtherClassificationController
 */
final class OtherClassificationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $otherClassifications = OtherClassification::factory()->count(3)->create();

        $response = $this->get(route('other-classification.index'));

        $response->assertOk();
        $response->assertViewIs('otherClassification.index');
        $response->assertViewHas('otherClassifications');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('other-classification.create'));

        $response->assertOk();
        $response->assertViewIs('otherClassification.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\OtherClassificationController::class,
            'store',
            \App\Http\Requests\EtimXchange\OtherClassificationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $classification_name = $this->faker->word();
        $classification_class_code = $this->faker->word();

        $response = $this->post(route('other-classification.store'), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'classification_name' => $classification_name,
            'classification_class_code' => $classification_class_code,
        ]);

        $otherClassifications = OtherClassification::query()
            ->where('product_id', $product_id)
            ->where('manufacturer_product_number', $manufacturer_product_number)
            ->where('classification_name', $classification_name)
            ->where('classification_class_code', $classification_class_code)
            ->get();
        $this->assertCount(1, $otherClassifications);
        $otherClassification = $otherClassifications->first();

        $response->assertRedirect(route('other-classification.index'));
        $response->assertSessionHas('otherClassification.id', $otherClassification->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $otherClassification = OtherClassification::factory()->create();

        $response = $this->get(route('other-classification.show', $otherClassification));

        $response->assertOk();
        $response->assertViewIs('otherClassification.show');
        $response->assertViewHas('otherClassification');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $otherClassification = OtherClassification::factory()->create();

        $response = $this->get(route('other-classification.edit', $otherClassification));

        $response->assertOk();
        $response->assertViewIs('otherClassification.edit');
        $response->assertViewHas('otherClassification');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\OtherClassificationController::class,
            'update',
            \App\Http\Requests\EtimXchange\OtherClassificationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $otherClassification = OtherClassification::factory()->create();
        $product_id = $this->faker->numberBetween(-100000, 100000);
        $manufacturer_product_number = $this->faker->word();
        $classification_name = $this->faker->word();
        $classification_class_code = $this->faker->word();

        $response = $this->put(route('other-classification.update', $otherClassification), [
            'product_id' => $product_id,
            'manufacturer_product_number' => $manufacturer_product_number,
            'classification_name' => $classification_name,
            'classification_class_code' => $classification_class_code,
        ]);

        $otherClassification->refresh();

        $response->assertRedirect(route('other-classification.index'));
        $response->assertSessionHas('otherClassification.id', $otherClassification->id);

        $this->assertEquals($product_id, $otherClassification->product_id);
        $this->assertEquals($manufacturer_product_number, $otherClassification->manufacturer_product_number);
        $this->assertEquals($classification_name, $otherClassification->classification_name);
        $this->assertEquals($classification_class_code, $otherClassification->classification_class_code);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $otherClassification = OtherClassification::factory()->create();

        $response = $this->delete(route('other-classification.destroy', $otherClassification));

        $response->assertRedirect(route('other-classification.index'));

        $this->assertModelMissing($otherClassification);
    }
}
