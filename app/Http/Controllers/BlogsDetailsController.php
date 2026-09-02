<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsDetailsController extends Controller
{
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        $recent_posts = Blog::where('id', '!=', $blog->id)
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

        $related_blogs = Blog::where('id', '!=', $blog->id)
            ->orderBy('date', 'desc')
            ->limit(3)
            ->get();

        return view('Home.blogs_details', compact('blog', 'recent_posts', 'related_blogs'));
    }
}
