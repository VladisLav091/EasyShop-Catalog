<?php

use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\postJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('POST /api/v1/products/{productId}/categories 200', function () {
    postJson('/api/v1/products/{productId}/categories')
        ->assertStatus(200);
});

test('POST /api/v1/products/{productId}/categories 404', function () {
    postJson('/api/v1/products/{productId}/categories')
        ->assertStatus(404);
});

test('DELETE /api/v1/products/{productId}/categories/{categoryId} 200', function () {
    deleteJson('/api/v1/products/{productId}/categories/{categoryId}')
        ->assertStatus(200);
});

test('DELETE /api/v1/products/{productId}/categories/{categoryId} 404', function () {
    deleteJson('/api/v1/products/{productId}/categories/{categoryId}')
        ->assertStatus(404);
});
