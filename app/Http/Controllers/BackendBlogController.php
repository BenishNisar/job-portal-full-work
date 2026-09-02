<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BackendBlogController extends Controller
{
   public function index(Request $request)
{
    $blogs = Blog::with('category');

    if ($request->filled('title')) {
        $blogs->where('title', 'like', '%' . trim($request->title) . '%');
    }

    if ($request->filled('status')) {
        $blogs->where('status', $request->status);
    }

    if ($request->filled('date')) {
        $blogs->whereDate('date', $request->date);
    }

    $blogs = $blogs->orderBy('id', 'desc')->paginate(10)->withQueryString();

    return view("Dashboard.admin.blog.index", compact('blogs'));
}
    public function add()
    {
        $categories = Category::all();
        return view('Dashboard.admin.blog.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'author' => 'required|string|max:100',
            'date' => 'required|date',
            'category_id' => 'required',
            'status' => 'required|in:0,1,2,3,4',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:900',
        ]);

        $path = null;

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'Dashboard_assets/' . $filename;
            $file->move(public_path('Dashboard_assets'), $filename);
        }

        $originalSlug = Str::slug($request->title);
        $slug = $originalSlug;
        $counter = 1;

        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        Blog::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'featured_image' => $path,
            'author' => $request->author,
            'date' => $request->date,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'slug' => $slug,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->route('Dashboard.admin.blog.index')->with('success', 'Blog added successfully.');
    }

    public function edit($id)
    {
        $customer = Blog::findOrFail($id);
        $categories = Category::all();

        return view('Dashboard.admin.blog.edit', compact('customer', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:800',
            'short_description' => 'required|string|max:900',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
            'category_id' => 'required',
            'status' => 'required|in:0,1,2,3,4',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:900',
        ]);

        $path = $blog->featured_image;

        if ($request->hasFile('featured_image')) {
            if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
                unlink(public_path($blog->featured_image));
            }

            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'Dashboard_assets/' . $filename;
            $file->move(public_path('Dashboard_assets'), $filename);
        }

        $originalSlug = Str::slug($request->title);
        $slug = $originalSlug;
        $counter = 1;

        while (
            Blog::where('slug', $slug)
                ->where('id', '!=', $blog->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'featured_image' => $path,
            'author' => $request->author,
            'date' => $request->date,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->route('Dashboard.admin.blog.index')->with('success', 'Blog updated successfully.');
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
            unlink(public_path($blog->featured_image));
        }

        $blog->delete();

        return redirect()->route('Dashboard.admin.blog.index')->with('success', 'Blog deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = trim($request->q);

        $results = Blog::where('title', 'like', '%' . $query . '%')
            ->orWhere('id', $query)
            ->get();

        return response()->json($results);
    }

    public function view($id)
    {
        $blog = Blog::with('category')->findOrFail($id);
        return view('Dashboard.admin.blog.view', compact('blog'));
    }
}
