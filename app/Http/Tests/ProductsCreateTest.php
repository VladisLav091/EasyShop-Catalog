<?php

use App\Models\Product;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;


uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('POST /api/v1/products create success', function () {
    $request = [
        'name' => 'Test Product',
        'description' => 'Test description for product',
        'price' => 99.99,
        'category_id' => 1, // Assuming there's a category with ID 1
    ];

    postJson('/api/v1/products', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.name', $request['name'])
        ->assertJsonPath('data.description', $request['description'])
        ->assertJsonPath('data.price', $request['price'])
        ->assertJsonPath('data.category_id', $request['category_id']);

    assertDatabaseHas(Product::class, [
        'name' => $request['name'],
    ]);
});
