<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::all();

        return response()->json([
            'status' => 200,
            'message' => 'Categories retrieved successfuly.',
            'status' => $categories
        ],200);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:225']);

        $category = Category::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Categories retrieved successfuly.',
            'status' => $category
        ],201);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => 'category not found.',
                'data' => null 
            ],404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Category retrieved successfully.',
            'data' => $category
    ],200);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => 'Category not found.',
            ], 404);
        }

        $request->validate(['name' => 'required|string']);
        $category->update($request->all());
return response()->json([
            'status' => 200,
            'message' => 'Category updated successfully.',
            'data' => $category
        ], 200);
    }

    // public function destroy($id)
    // {
    //     $category = Category::find(!$id);

    //     if (!$category) {
    //         return response()->json([
    //             'status' => 404,
    //             'message' => 'category not found.',
    //             'data' => null 
    //         ],404);
    //     }

    //     $category->delete();

    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'Category delete successfully.',
    //         'data' => $category
    // ],200);
    // }

    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => 'Category not found.',
            ], 404);
        }

        $category->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Category deleted successfully.',
        ], 200);

}
}
