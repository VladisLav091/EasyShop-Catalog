<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductCategoryController extends Controller
{
    public function addCategoryToProduct(Request $request, $productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $category = Category::find($request->category_id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $product->categories()->attach($request->category_id);

        return response()->json(['message' => 'Category added to product'], 200);
    }

    public function removeCategoryFromProduct($productId, $categoryId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $product->categories()->detach($categoryId);

        return response()->json(['message' => 'Category removed from product'], 200);
    }

    public function getProductCategories($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product->categories, 200);
    }

    public function getCategoryProducts($categoryId)
    {
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category->products, 200);
    }
}
