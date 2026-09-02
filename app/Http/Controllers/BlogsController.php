<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view("Home.blogs", compact('blogs'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $blogs = Blog::where('status', 1)
            ->where('title', 'like', '%' . $query . '%')
            ->select('slug', 'title')
            ->limit(8)
            ->get();

        return response()->json($blogs);
    }
}
