<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\EtimValueMatrix;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\EtimValueMatrixController
 */
final class EtimValueMatrixControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $etimValueMatrices = EtimValueMatrix::factory()->count(3)->create();

        $response = $this->get(route('etim-value-matrix.index'));

        $response->assertOk();
        $response->assertViewIs('etimValueMatrix.index');
        $response->assertViewHas('etimValueMatrices');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('etim-value-matrix.create'));

        $response->assertOk();
        $response->assertViewIs('etimValueMatrix.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\EtimValueMatrixController::class,
            'store',
            \App\Http\Requests\EtimXchange\EtimValueMatrixStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $etim_modelling_feature_id = $this->faker->numberBetween(-100000, 100000);
        $etim_modelling_class_code = $this->faker->randomLetter();
        $etim_feature_code = $this->faker->randomLetter();
        $etim_value_matrix_source = $this->faker->randomFloat(/** decimal_attributes **/);
        $etim_value_matrix_result = $this->faker->randomFloat(/** decimal_attributes **/);

        $response = $this->post(route('etim-value-matrix.store'), [
            'etim_modelling_feature_id' => $etim_modelling_feature_id,
            'etim_modelling_class_code' => $etim_modelling_class_code,
            'etim_feature_code' => $etim_feature_code,
            'etim_value_matrix_source' => $etim_value_matrix_source,
            'etim_value_matrix_result' => $etim_value_matrix_result,
        ]);

        $etimValueMatrices = EtimValueMatrix::query()
            ->where('etim_modelling_feature_id', $etim_modelling_feature_id)
            ->where('etim_modelling_class_code', $etim_modelling_class_code)
            ->where('etim_feature_code', $etim_feature_code)
            ->where('etim_value_matrix_source', $etim_value_matrix_source)
            ->where('etim_value_matrix_result', $etim_value_matrix_result)
            ->get();
        $this->assertCount(1, $etimValueMatrices);
        $etimValueMatrix = $etimValueMatrices->first();

        $response->assertRedirect(route('etim-value-matrix.index'));
        $response->assertSessionHas('etimValueMatrix.id', $etimValueMatrix->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $etimValueMatrix = EtimValueMatrix::factory()->create();

        $response = $this->get(route('etim-value-matrix.show', $etimValueMatrix));

        $response->assertOk();
        $response->assertViewIs('etimValueMatrix.show');
        $response->assertViewHas('etimValueMatrix');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $etimValueMatrix = EtimValueMatrix::factory()->create();

        $response = $this->get(route('etim-value-matrix.edit', $etimValueMatrix));

        $response->assertOk();
        $response->assertViewIs('etimValueMatrix.edit');
        $response->assertViewHas('etimValueMatrix');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\EtimValueMatrixController::class,
            'update',
            \App\Http\Requests\EtimXchange\EtimValueMatrixUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $etimValueMatrix = EtimValueMatrix::factory()->create();
        $etim_modelling_feature_id = $this->faker->numberBetween(-100000, 100000);
        $etim_modelling_class_code = $this->faker->randomLetter();
        $etim_feature_code = $this->faker->randomLetter();
        $etim_value_matrix_source = $this->faker->randomFloat(/** decimal_attributes **/);
        $etim_value_matrix_result = $this->faker->randomFloat(/** decimal_attributes **/);

        $response = $this->put(route('etim-value-matrix.update', $etimValueMatrix), [
            'etim_modelling_feature_id' => $etim_modelling_feature_id,
            'etim_modelling_class_code' => $etim_modelling_class_code,
            'etim_feature_code' => $etim_feature_code,
            'etim_value_matrix_source' => $etim_value_matrix_source,
            'etim_value_matrix_result' => $etim_value_matrix_result,
        ]);

        $etimValueMatrix->refresh();

        $response->assertRedirect(route('etim-value-matrix.index'));
        $response->assertSessionHas('etimValueMatrix.id', $etimValueMatrix->id);

        $this->assertEquals($etim_modelling_feature_id, $etimValueMatrix->etim_modelling_feature_id);
        $this->assertEquals($etim_modelling_class_code, $etimValueMatrix->etim_modelling_class_code);
        $this->assertEquals($etim_feature_code, $etimValueMatrix->etim_feature_code);
        $this->assertEquals($etim_value_matrix_source, $etimValueMatrix->etim_value_matrix_source);
        $this->assertEquals($etim_value_matrix_result, $etimValueMatrix->etim_value_matrix_result);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $etimValueMatrix = EtimValueMatrix::factory()->create();

        $response = $this->delete(route('etim-value-matrix.destroy', $etimValueMatrix));

        $response->assertRedirect(route('etim-value-matrix.index'));

        $this->assertModelMissing($etimValueMatrix);
    }
}
