<?php

namespace App\Http\Controllers;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryBackendController extends Controller
{
    //
    public function index()
    {
        $subcategories = Subcategory::with('category')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('dashboard.admin.subcategories.index', compact('subcategories'));
    }

    public function add()
    {
        $categories = Category::where('is_active', 1)
            ->orderBy('name')
            ->get();

        return view('dashboard.admin.subcategories.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name'        => ['required', 'string', 'max:800'],
            'slug'        => ['nullable', 'string', 'max:800', 'unique:subcategories,slug'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'is_active'   => ['nullable'],
        ]);

        $data['slug'] = $data['slug']
            ? Str::slug($data['slug'])
            : Str::slug($data['name']);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active']  = $request->has('is_active') ? 1 : 0;

        Subcategory::create($data);

        return redirect()
            ->route('dashboard.admin.subcategories.index')
            ->with('success', 'Subcategory created successfully');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories  = Category::where('is_active', 1)
            ->orderBy('name')
            ->get();

        return view(
            'dashboard.admin.subcategories.edit',
            compact('subcategory', 'categories')
        );
    }

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $data = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name'        => ['required', 'string', 'max:800'],
            'slug'        => ['nullable', 'string', 'max:800', 'unique:subcategories,slug,' . $subcategory->id],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'is_active'   => ['nullable'],
        ]);

        $data['slug'] = $data['slug']
            ? Str::slug($data['slug'])
            : Str::slug($data['name']);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active']  = $request->has('is_active') ? 1 : 0;

        $subcategory->update($data);

        return redirect()
            ->route('dashboard.admin.subcategories.index')
            ->with('success', 'Subcategory updated successfully');
    }

    public function delete($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect()
            ->route('dashboard.admin.subcategories.index')
            ->with('success', 'Subcategory deleted successfully');
    }
}
