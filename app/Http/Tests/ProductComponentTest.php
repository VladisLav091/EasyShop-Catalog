<?php


use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;
use function Pest\Laravel\deleteJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component', 'api');


// Тест для получения продукта по ID
test('GET /api/v1/products/{id} 200', function () {
    $product = \App\Models\Product::factory()->create();

    getJson('/api/v1/products/' . $product->id)
        ->assertStatus(200)
        ->assertJsonPath('id', $product->id)
        ->assertJsonStructure(['id', 'name', 'description', 'price', 'created_at', 'updated_at']);
});

test('GET /api/v1/products/{id} 404', function () {
    getJson('/api/v1/products/1333')
        ->assertStatus(404)
        ->assertJsonFragment(['code' => 'not_found']);
});

// Тест для создания продукта
test('POST /api/v1/products 201', function () {
    $productData = \App\Models\Product::factory()->make(['stock' => null])->toArray();  // Убедитесь, что поле "stock" не создается

    postJson('/api/v1/products', $productData)
        ->assertStatus(201)
        ->assertJsonStructure(['id', 'name', 'description', 'price', 'created_at', 'updated_at']);
});

// Тест для обновления продукта по ID
test('PUT /api/v1/products/{id} 200', function () {
    $product = \App\Models\Product::factory()->create();
    $updatedData = \App\Models\Product::factory()->make(['stock' => null])->toArray();  // Убедитесь, что поле "stock" не создается

    putJson('/api/v1/products/' . $product->id, $updatedData)
        ->assertStatus(200)
        ->assertJsonFragment(['id' => $product->id])
        ->assertJsonStructure(['id', 'name', 'description', 'price', 'created_at', 'updated_at']);
});

// Тест для удаления продукта по ID
// Тест для удаления продукта по ID
test('DELETE /api/v1/products/{id} 200', function () {
    $product = \App\Models\Product::factory()->create();

    deleteJson('/api/v1/products/' . $product->id)
        ->assertStatus(200)
        ->assertJson(['data' => null]);  // Проверяем наличие ключа "data"
});
