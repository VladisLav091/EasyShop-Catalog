<?php

use App\Domain\Catalog\Models\Product;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('GET /api/v1/products/{id} get product success', function () {
    /** @var Product $product */
    $product = Product::factory()->create();

    getJson("/api/v1/products/{$product->id}")
        ->assertStatus(200)
        ->assertJsonPath('data.name', $product->name)
        ->assertJsonPath('data.description', $product->description)
        ->assertJsonPath('data.price', $product->price)
        ->assertJsonPath('data.category_id', $product->category_id);
});
