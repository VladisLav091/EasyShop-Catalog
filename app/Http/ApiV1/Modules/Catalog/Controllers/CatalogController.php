<?php

namespace App\Http\ApiV1\Modules\Catalog\Controllers;

use App\Domain\Catalog\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Catalog::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = Catalog::whereNull('parent_id')->get();

        return view('categories.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_id' => 'nullable|exists:catalog,id',
            'active' => 'boolean',
        ]);

        Catalog::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Catalog $category)
    {
        $parents = Catalog::whereNull('parent_id')->get();

        return view('categories.edit', compact('category', 'parents'));
    }

    public function update(Request $request, Catalog $category)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_id' => 'nullable|exists:catalog,id',
            'active' => 'boolean',
        ]);

        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Catalog $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
