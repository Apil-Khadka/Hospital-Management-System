<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryContorller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        if (!$categories) {
            return response()->json(["message" => "No categories found"], 404);
        }
        return json_encode($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasRole("admin")) {
            $validated = $request->validate([
                "name" => "required|unique:categories,name|string|max:255",
                "description" => "nullable|string",
            ]);

            $category = Category::create($validated);

            if (!$category) {
                return response()->json(
                    ["message" => "Category creation failed"],
                    500
                );
            }

            return response()->json($category, 201);
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(["message" => "Category not found"], 404);
        }
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->hasPermissionTo("manage-pharmacy")) {
            $category = Category::find($id);
            if (!$category) {
                return response()->json(
                    ["message" => "Category not found"],
                    404
                );
            }

            $validated = $request->validate([
                "name" => "nullable|unique:categories,name|string|max:255",
                "description" => "nullable|string",
            ]);

            $category->update($validated);

            if (!$category) {
                return response()->json(
                    ["message" => "Category update failed"],
                    500
                );
            }

            return response()->json($category);
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasRole("admin")) {
            $category = Category::find($id);
            if (!$category) {
                return response()->json(
                    ["message" => "Category not found"],
                    404
                );
            }

            $category->delete();

            if (!$category) {
                return response()->json(
                    ["message" => "Category deletion failed"],
                    500
                );
            }

            return response()->json(["message" => "Category deleted"]);
        }
        return response()->json(["message" => "Unauthorized"], 403);
    }
}
