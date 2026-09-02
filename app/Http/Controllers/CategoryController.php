<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categorys = Category::orderBy('id', 'desc')->paginate(10);
        $editCategory = null;

        if ($request->filled('edit')) {
            $editCategory = Category::findOrFail($request->edit);
        }

        return view("Dashboard.admin.category.index", compact('categorys', 'editCategory'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:category,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('Dashboard.admin.category.index')
            ->with('success', 'Category added successfully.');
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:category,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('Dashboard.admin.category.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('Dashboard.admin.category.index')
            ->with('success', 'Category deleted successfully.');
    }
}