<?php

use App\Models\Product;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\getJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('GET /api/v1/products get all products success', function () {
Product::factory()->count(5)->create();

getJson("/api/v1/products")
->assertStatus(200)
->assertJsonCount(5, 'data');
});
