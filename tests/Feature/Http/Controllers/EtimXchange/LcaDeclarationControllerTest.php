<?php

namespace Tests\Feature\Http\Controllers\EtimXchange;

use App\Models\35;
use App\Models\LcaDeclaration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EtimXchange\LcaDeclarationController
 */
final class LcaDeclarationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $lcaDeclarations = LcaDeclaration::factory()->count(3)->create();

        $response = $this->get(route('lca-declaration.index'));

        $response->assertOk();
        $response->assertViewIs('lcaDeclaration.index');
        $response->assertViewHas('lcaDeclarations');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('lca-declaration.create'));

        $response->assertOk();
        $response->assertViewIs('lcaDeclaration.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\LcaDeclarationController::class,
            'store',
            \App\Http\Requests\EtimXchange\LcaDeclarationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $lca_environmental = 35::factory()->create();
        $life_cycle_stage = $this->faker->randomElement(/** enum_attributes **/);
        $lca_declaration_indicator = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('lca-declaration.store'), [
            'lca_environmental_id' => $lca_environmental->id,
            'life_cycle_stage' => $life_cycle_stage,
            'lca_declaration_indicator' => $lca_declaration_indicator,
        ]);

        $lcaDeclarations = LcaDeclaration::query()
            ->where('lca_environmental_id', $lca_environmental->id)
            ->where('life_cycle_stage', $life_cycle_stage)
            ->where('lca_declaration_indicator', $lca_declaration_indicator)
            ->get();
        $this->assertCount(1, $lcaDeclarations);
        $lcaDeclaration = $lcaDeclarations->first();

        $response->assertRedirect(route('lca-declaration.index'));
        $response->assertSessionHas('lcaDeclaration.id', $lcaDeclaration->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $lcaDeclaration = LcaDeclaration::factory()->create();

        $response = $this->get(route('lca-declaration.show', $lcaDeclaration));

        $response->assertOk();
        $response->assertViewIs('lcaDeclaration.show');
        $response->assertViewHas('lcaDeclaration');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $lcaDeclaration = LcaDeclaration::factory()->create();

        $response = $this->get(route('lca-declaration.edit', $lcaDeclaration));

        $response->assertOk();
        $response->assertViewIs('lcaDeclaration.edit');
        $response->assertViewHas('lcaDeclaration');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EtimXchange\LcaDeclarationController::class,
            'update',
            \App\Http\Requests\EtimXchange\LcaDeclarationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $lcaDeclaration = LcaDeclaration::factory()->create();
        $lca_environmental = 35::factory()->create();
        $life_cycle_stage = $this->faker->randomElement(/** enum_attributes **/);
        $lca_declaration_indicator = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('lca-declaration.update', $lcaDeclaration), [
            'lca_environmental_id' => $lca_environmental->id,
            'life_cycle_stage' => $life_cycle_stage,
            'lca_declaration_indicator' => $lca_declaration_indicator,
        ]);

        $lcaDeclaration->refresh();

        $response->assertRedirect(route('lca-declaration.index'));
        $response->assertSessionHas('lcaDeclaration.id', $lcaDeclaration->id);

        $this->assertEquals($lca_environmental->id, $lcaDeclaration->lca_environmental_id);
        $this->assertEquals($life_cycle_stage, $lcaDeclaration->life_cycle_stage);
        $this->assertEquals($lca_declaration_indicator, $lcaDeclaration->lca_declaration_indicator);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $lcaDeclaration = LcaDeclaration::factory()->create();

        $response = $this->delete(route('lca-declaration.destroy', $lcaDeclaration));

        $response->assertRedirect(route('lca-declaration.index'));

        $this->assertModelMissing($lcaDeclaration);
    }
}
