<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200); // Возвращаем массив категорий
    }


    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['code' => 'not_found', 'message' => 'Category not found'], 404);
        }
        return response()->json($category, 200); // Возвращаем категорию без обертки в "data"
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $category = Category::create($validatedData);
        return response()->json($category, 201); // Возвращаем категорию без обертки в "data"
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['code' => 'not_found', 'message' => 'Category not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $category->update($validatedData);
        return response()->json($category, 200); // Возвращаем обновленную категорию без ключа "data"
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['code' => 'not_found', 'message' => 'Category not found'], 404);
        }

        $category->delete();
        return response()->json(['data' => null], 200);// Изменено для соответствия ожидаемой схеме
    }
}

