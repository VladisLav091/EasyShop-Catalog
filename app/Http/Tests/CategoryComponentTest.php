<?php

use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component', 'api');
// Тест для получения категории по ID
test('GET /api/v1/categories/{id} 200', function () {
    $category = \App\Models\Category::factory()->create();

    getJson('/api/v1/categories/' . $category->id)
        ->assertStatus(200)
        ->assertJsonPath('id', $category->id)
        ->assertJsonStructure(['id', 'name', 'description', 'created_at', 'updated_at']);
});

test('GET /api/v1/categories/{id} 404', function () {
    getJson('/api/v1/categories/1333')
        ->assertStatus(404)
        ->assertJsonFragment(['code' => 'not_found']);
});

// Тест для создания категории
test('POST /api/v1/categories 201', function () {
    $categoryData = \App\Models\Category::factory()->make()->toArray();

    postJson('/api/v1/categories', $categoryData)
        ->assertStatus(201)
        ->assertJsonFragment(['name' => $categoryData['name']])
        ->assertJsonStructure(['id', 'name', 'description', 'created_at', 'updated_at']);
});

// Тест для обновления категории по ID
test('PUT /api/v1/categories/{id} 200', function () {
    $category = \App\Models\Category::factory()->create();
    $updatedData = \App\Models\Category::factory()->make()->toArray();

    putJson('/api/v1/categories/' . $category->id, $updatedData)
        ->assertStatus(200)
        ->assertJsonFragment(['id' => $category->id])
        ->assertJsonStructure(['id', 'name', 'description', 'created_at', 'updated_at']);
});


// Тест для удаления категории по ID
test('DELETE /api/v1/categories/{id} 200', function () {
    $category = \App\Models\Category::factory()->create();

    deleteJson('/api/v1/categories/' . $category->id)
        ->assertStatus(200)
        ->assertJson(['data' => null]);
});

