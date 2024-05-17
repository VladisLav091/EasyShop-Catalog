<?php

use App\Models\Category;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;
use function Pest\Laravel\deleteJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('GET /api/v1/categories get all categories', function () {
    $categories = Category::factory()->count(3)->create();

    getJson('/api/v1/categories')
        ->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
        $json->has('data', 3)
            ->has('data.0', fn ($json) =>
            $json->whereType('id', 'integer')
                ->whereType('name', 'string')
                ->whereType('description', 'string')
                ->whereType('created_at', 'string')
                ->whereType('updated_at', 'string')
            )
        );
});

test('GET /api/v1/categories/{id} get category by id', function () {
    $category = Category::factory()->create();

    getJson("/api/v1/categories/{$category->id}")
        ->assertStatus(200)
        ->assertJsonPath('data.id', $category->id)
        ->assertJsonPath('data.name', $category->name)
        ->assertJsonPath('data.description', $category->description);
});

test('POST /api/v1/categories create category', function () {
    $request = [
        'name' => 'New Category',
        'description' => 'New category description',
    ];

    postJson('/api/v1/categories', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.name', $request['name'])
        ->assertJsonPath('data.description', $request['description']);

    assertDatabaseHas(Category::class, [
        'name' => $request['name'],
        'description' => $request['description'],
    ]);
});

test('PUT /api/v1/categories/{id} update category', function () {
    $category = Category::factory()->create();
    $request = [
        'name' => 'Updated Category',
        'description' => 'Updated category description',
    ];

    putJson("/api/v1/categories/{$category->id}", $request)
        ->assertStatus(200)
        ->assertJsonPath('data.id', $category->id)
        ->assertJsonPath('data.name', $request['name'])
        ->assertJsonPath('data.description', $request['description']);

    assertDatabaseHas(Category::class, [
        'id' => $category->id,
        'name' => $request['name'],
        'description' => $request['description'],
    ]);
});

test('DELETE /api/v1/categories/{id} delete category', function () {
    $category = Category::factory()->create();

    deleteJson("/api/v1/categories/{$category->id}")
        ->assertStatus(200)
        ->assertJsonPath('message', 'Category deleted');

    assertDatabaseMissing(Category::class, [
        'id' => $category->id,
    ]);
});
