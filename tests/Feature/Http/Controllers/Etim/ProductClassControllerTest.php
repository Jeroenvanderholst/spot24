<?php

namespace Tests\Feature\Http\Controllers\Etim;

use App\Models\8;
use App\Models\ProductClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Etim\ProductClassController
 */
final class ProductClassControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $productClasses = ProductClass::factory()->count(3)->create();

        $response = $this->get(route('product-class.index'));

        $response->assertOk();
        $response->assertViewIs('productClass.index');
        $response->assertViewHas('productClasses');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('product-class.create'));

        $response->assertOk();
        $response->assertViewIs('productClass.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\ProductClassController::class,
            'store',
            \App\Http\Requests\Etim\ProductClassStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $class = 8::factory()->create();
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $version = $this->faker->numberBetween(-8, 8);
        $group = 8::factory()->create();
        $description = $this->faker->text();
        $releases = $this->faker->;
        $changecode = $this->faker->word();

        $response = $this->post(route('product-class.store'), [
            'class_id' => $class->id,
            'status' => $status,
            'version' => $version,
            'group_id' => $group->id,
            'description' => $description,
            'releases' => $releases,
            'changecode' => $changecode,
        ]);

        $productClasses = ProductClass::query()
            ->where('class_id', $class->id)
            ->where('status', $status)
            ->where('version', $version)
            ->where('group_id', $group->id)
            ->where('description', $description)
            ->where('releases', $releases)
            ->where('changecode', $changecode)
            ->get();
        $this->assertCount(1, $productClasses);
        $productClass = $productClasses->first();

        $response->assertRedirect(route('product-class.index'));
        $response->assertSessionHas('productClass.id', $productClass->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $productClass = ProductClass::factory()->create();

        $response = $this->get(route('product-class.show', $productClass));

        $response->assertOk();
        $response->assertViewIs('productClass.show');
        $response->assertViewHas('productClass');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $productClass = ProductClass::factory()->create();

        $response = $this->get(route('product-class.edit', $productClass));

        $response->assertOk();
        $response->assertViewIs('productClass.edit');
        $response->assertViewHas('productClass');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Etim\ProductClassController::class,
            'update',
            \App\Http\Requests\Etim\ProductClassUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $productClass = ProductClass::factory()->create();
        $class = 8::factory()->create();
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $version = $this->faker->numberBetween(-8, 8);
        $group = 8::factory()->create();
        $description = $this->faker->text();
        $releases = $this->faker->;
        $changecode = $this->faker->word();

        $response = $this->put(route('product-class.update', $productClass), [
            'class_id' => $class->id,
            'status' => $status,
            'version' => $version,
            'group_id' => $group->id,
            'description' => $description,
            'releases' => $releases,
            'changecode' => $changecode,
        ]);

        $productClass->refresh();

        $response->assertRedirect(route('product-class.index'));
        $response->assertSessionHas('productClass.id', $productClass->id);

        $this->assertEquals($class->id, $productClass->class_id);
        $this->assertEquals($status, $productClass->status);
        $this->assertEquals($version, $productClass->version);
        $this->assertEquals($group->id, $productClass->group_id);
        $this->assertEquals($description, $productClass->description);
        $this->assertEquals($releases, $productClass->releases);
        $this->assertEquals($changecode, $productClass->changecode);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $productClass = ProductClass::factory()->create();

        $response = $this->delete(route('product-class.destroy', $productClass));

        $response->assertRedirect(route('product-class.index'));

        $this->assertModelMissing($productClass);
    }
}
