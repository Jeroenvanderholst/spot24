<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\8;
use App\Models\ModellingClass;
use App\Models\ModellingGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Etim\ModellingClassController
 */
final class ModellingClassControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $modellingClasses = ModellingClass::factory()->count(3)->create();

        $response = $this->get(route('modelling-class.index'));

        $response->assertOk();
        $response->assertViewIs('modellingClass.index');
        $response->assertViewHas('modellingClasses');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('modelling-class.create'));

        $response->assertOk();
        $response->assertViewIs('modellingClass.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\ModellingClassController::class,
            'store',
            \App\Http\Requests\Etim\ModellingClassStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $modelling_class = 8::factory()->create();
        $version = $this->faker->numberBetween(-8, 8);
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $modelling = $this->faker->boolean();
        $description = $this->faker->text();
        $group = 8::factory()->create();
        $modelling_group = ModellingGroup::factory()->create();

        $response = $this->post(route('modelling-class.store'), [
            'modelling_class_id' => $modelling_class->id,
            'version' => $version,
            'status' => $status,
            'modelling' => $modelling,
            'description' => $description,
            'group_id' => $group->id,
            'modelling_group_id' => $modelling_group->id,
        ]);

        $modellingClasses = ModellingClass::query()
            ->where('modelling_class_id', $modelling_class->id)
            ->where('version', $version)
            ->where('status', $status)
            ->where('modelling', $modelling)
            ->where('description', $description)
            ->where('group_id', $group->id)
            ->where('modelling_group_id', $modelling_group->id)
            ->get();
        $this->assertCount(1, $modellingClasses);
        $modellingClass = $modellingClasses->first();

        $response->assertRedirect(route('modelling-class.index'));
        $response->assertSessionHas('modellingClass.id', $modellingClass->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $modellingClass = ModellingClass::factory()->create();

        $response = $this->get(route('modelling-class.show', $modellingClass));

        $response->assertOk();
        $response->assertViewIs('modellingClass.show');
        $response->assertViewHas('modellingClass');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $modellingClass = ModellingClass::factory()->create();

        $response = $this->get(route('modelling-class.edit', $modellingClass));

        $response->assertOk();
        $response->assertViewIs('modellingClass.edit');
        $response->assertViewHas('modellingClass');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\ModellingClassController::class,
            'update',
            \App\Http\Requests\Etim\ModellingClassUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $modellingClass = ModellingClass::factory()->create();
        $modelling_class = 8::factory()->create();
        $version = $this->faker->numberBetween(-8, 8);
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $modelling = $this->faker->boolean();
        $description = $this->faker->text();
        $group = 8::factory()->create();
        $modelling_group = ModellingGroup::factory()->create();

        $response = $this->put(route('modelling-class.update', $modellingClass), [
            'modelling_class_id' => $modelling_class->id,
            'version' => $version,
            'status' => $status,
            'modelling' => $modelling,
            'description' => $description,
            'group_id' => $group->id,
            'modelling_group_id' => $modelling_group->id,
        ]);

        $modellingClass->refresh();

        $response->assertRedirect(route('modelling-class.index'));
        $response->assertSessionHas('modellingClass.id', $modellingClass->id);

        $this->assertEquals($modelling_class->id, $modellingClass->modelling_class_id);
        $this->assertEquals($version, $modellingClass->version);
        $this->assertEquals($status, $modellingClass->status);
        $this->assertEquals($modelling, $modellingClass->modelling);
        $this->assertEquals($description, $modellingClass->description);
        $this->assertEquals($group->id, $modellingClass->group_id);
        $this->assertEquals($modelling_group->id, $modellingClass->modelling_group_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $modellingClass = ModellingClass::factory()->create();

        $response = $this->delete(route('modelling-class.destroy', $modellingClass));

        $response->assertRedirect(route('modelling-class.index'));

        $this->assertModelMissing($modellingClass);
    }
}
