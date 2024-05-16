<?php

use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('GET /api/v1/products 200', function () {
    getJson('/api/v1/products')
        ->assertStatus(200);
});

test('POST /api/v1/products 201', function () {
    postJson('/api/v1/products')
        ->assertStatus(201);
});

test('POST /api/v1/products 400', function () {
    postJson('/api/v1/products')
        ->assertStatus(400);
});

test('GET /api/v1/products/{id} 200', function () {
    getJson('/api/v1/products/{id}')
        ->assertStatus(200);
});

test('GET /api/v1/products/{id} 404', function () {
    getJson('/api/v1/products/{id}')
        ->assertStatus(404);
});

test('PUT /api/v1/products/{id} 200', function () {
    putJson('/api/v1/products/{id}')
        ->assertStatus(200);
});

test('PUT /api/v1/products/{id} 400', function () {
    putJson('/api/v1/products/{id}')
        ->assertStatus(400);
});

test('PUT /api/v1/products/{id} 404', function () {
    putJson('/api/v1/products/{id}')
        ->assertStatus(404);
});

test('DELETE /api/v1/products/{id} 200', function () {
    deleteJson('/api/v1/products/{id}')
        ->assertStatus(200);
});

test('DELETE /api/v1/products/{id} 404', function () {
    deleteJson('/api/v1/products/{id}')
        ->assertStatus(404);
});
