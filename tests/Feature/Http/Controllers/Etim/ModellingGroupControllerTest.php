<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\ModellingGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ModellingGroupController
 */
final class ModellingGroupControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $modellingGroups = ModellingGroup::factory()->count(3)->create();

        $response = $this->get(route('modelling-group.index'));

        $response->assertOk();
        $response->assertViewIs('modellingGroup.index');
        $response->assertViewHas('modellingGroups');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('modelling-group.create'));

        $response->assertOk();
        $response->assertViewIs('modellingGroup.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ModellingGroupController::class,
            'store',
            \App\Http\Requests\Etim\ModellingGroupStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $description = $this->faker->text();
        $deprecated = $this->faker->boolean();

        $response = $this->post(route('modelling-group.store'), [
            'description' => $description,
            'deprecated' => $deprecated,
        ]);

        $modellingGroups = ModellingGroup::query()
            ->where('description', $description)
            ->where('deprecated', $deprecated)
            ->get();
        $this->assertCount(1, $modellingGroups);
        $modellingGroup = $modellingGroups->first();

        $response->assertRedirect(route('modelling-group.index'));
        $response->assertSessionHas('modellingGroup.id', $modellingGroup->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $modellingGroup = ModellingGroup::factory()->create();

        $response = $this->get(route('modelling-group.show', $modellingGroup));

        $response->assertOk();
        $response->assertViewIs('modellingGroup.show');
        $response->assertViewHas('modellingGroup');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $modellingGroup = ModellingGroup::factory()->create();

        $response = $this->get(route('modelling-group.edit', $modellingGroup));

        $response->assertOk();
        $response->assertViewIs('modellingGroup.edit');
        $response->assertViewHas('modellingGroup');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ModellingGroupController::class,
            'update',
            \App\Http\Requests\Etim\ModellingGroupUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $modellingGroup = ModellingGroup::factory()->create();
        $description = $this->faker->text();
        $deprecated = $this->faker->boolean();

        $response = $this->put(route('modelling-group.update', $modellingGroup), [
            'description' => $description,
            'deprecated' => $deprecated,
        ]);

        $modellingGroup->refresh();

        $response->assertRedirect(route('modelling-group.index'));
        $response->assertSessionHas('modellingGroup.id', $modellingGroup->id);

        $this->assertEquals($description, $modellingGroup->description);
        $this->assertEquals($deprecated, $modellingGroup->deprecated);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $modellingGroup = ModellingGroup::factory()->create();

        $response = $this->delete(route('modelling-group.destroy', $modellingGroup));

        $response->assertRedirect(route('modelling-group.index'));

        $this->assertModelMissing($modellingGroup);
    }
}
