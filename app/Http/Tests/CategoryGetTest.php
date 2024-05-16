<?php

use App\Models\Category;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('GET /api/v1/categories/{id} get category success', function () {
/** @var Category $category */
$category = Category::factory()->create();

getJson("/api/v1/categories/{$category->id}")
->assertStatus(200)
->assertJsonPath('data.name', $category->name)
->assertJsonPath('data.description', $category->description);
});
