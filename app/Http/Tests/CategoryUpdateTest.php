<?php

use App\Models\Category;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\putJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('PUT /api/v1/categories/{id} update success', function () {
/** @var Category $category */
$category = Category::factory()->create();

$request = [
'name' => 'Updated Category Name',
'description' => 'Updated description for category',
];

putJson("/api/v1/categories/{$category->id}", $request)
->assertStatus(200)
->assertJsonPath('data.name', $request['name'])
->assertJsonPath('data.description', $request['description']);

assertDatabaseHas(Category::class, [
'id' => $category->id,
'name' => $request['name'],
]);
});
