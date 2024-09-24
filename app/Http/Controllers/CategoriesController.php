<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $query = Categories::query();
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }
        $categories = $query->paginate($perPage);

        return view('categories.index', compact('categories'));
    }

    public function edit($id)
    {
        $category = Categories::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Categories::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);
        
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'images/resource/' . $imageName;
            $image->move(public_path('images/resource/'), $imageName);
        }

        return back()->with('success', 'Image uploaded successfully.');
    }
    
    public function getUserCategories($userId)
    {
        $categories = Categories::where('user_id', $userId)->get();
        if ($categories->isEmpty()) {
            return response()->json(['message' => 'No categories found for this user.'], 404);
        }

        return response()->json($categories);
    }
}
