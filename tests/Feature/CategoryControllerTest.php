<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        Category::factory()->count(3)->create();

        $response = $this->get('/api/categories');

        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data');
    }

    public function testShow()
    {
        $category = Category::factory()->create();

        $response = $this->get('/api/categories/' . $category->id);

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $category->id,
            'name' => $category->name,
        ]);
    }

    public function testShowNotFound()
    {
        $response = $this->get('/api/categories/999');

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'Category not found',
        ]);
    }

    public function testStore()
    {
        $data = ['name' => 'New Category'];

        $response = $this->post('/api/categories', $data);

        $response->assertStatus(201);
        $response->assertJson($data);

        $this->assertDatabaseHas('categories', $data);
    }

    public function testUpdate()
    {
        $category = Category::factory()->create();
        $data = ['name' => 'Updated Category'];

        $response = $this->put('/api/categories/' . $category->id, $data);

        $response->assertStatus(200);
        $response->assertJson($data);

        $this->assertDatabaseHas('categories', $data);
    }

    public function testUpdateNotFound()
    {
        $data = ['name' => 'Updated Category'];

        $response = $this->put('/api/categories/999', $data);

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'Category not found',
        ]);
    }

    public function testDestroy()
    {
        $category = Category::factory()->create();

        $response = $this->delete('/api/categories/' . $category->id);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Category deleted',
        ]);

        $this->assertDeleted($category);
    }

    public function testDestroyNotFound()
    {
        $response = $this->delete('/api/categories/999');

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'Category not found',
        ]);
    }
}
