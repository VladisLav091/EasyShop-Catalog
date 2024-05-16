<?php

use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('GET /api/v1CategoryOne 200', function () {
    getJson('/api/v1CategoryOne')
        ->assertStatus(200);
});

test('GET /api/v1CategoryOne 404', function () {
    getJson('/api/v1CategoryOne')
        ->assertStatus(404);
});

test('PUT /api/v1Category 200', function () {
    putJson('/api/v1Category')
        ->assertStatus(200);
});

test('PUT /api/v1Category 400', function () {
    putJson('/api/v1Category')
        ->assertStatus(400);
});

test('PUT /api/v1Category 404', function () {
    putJson('/api/v1Category')
        ->assertStatus(404);
});

test('POST /api/v1Category 201', function () {
    postJson('/api/v1Category')
        ->assertStatus(201);
});

test('POST /api/v1Category 400', function () {
    postJson('/api/v1Category')
        ->assertStatus(400);
});

test('DELETE /api/v1Category 200', function () {
    deleteJson('/api/v1Category')
        ->assertStatus(200);
});

test('DELETE /api/v1Category 404', function () {
    deleteJson('/api/v1Category')
        ->assertStatus(404);
});
