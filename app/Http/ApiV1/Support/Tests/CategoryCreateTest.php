<?php
use App\Models\Category;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('POST /api/v1/categories create success', function () {
    $request = [
        'name' => 'Test Category',
        'description' => 'Test description for category',
    ];

    postJson('/api/v1/categories', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.name', $request['name'])
        ->assertJsonPath('data.description', $request['description']);

    assertDatabaseHas(Category::class, [
        'name' => $request['name'],
    ]);
});
