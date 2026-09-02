@extends("Layout.layouttwo")

@section("AdminContent")

<style>
    .blog-view-card {
        background-color: #fff;
        border-radius: 12px;
        padding: 30px;
        max-width: 850px;
        height:800px;
        margin: 40px auto;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .blog-view-card h2 {
        font-size: 24px;
        font-weight: bold;
        color: #b10937;
        margin-bottom: 25px;
    }

    .view-row {
        margin-bottom: 15px;
        display: flex;
        justify-content: space-between;
    }

    .view-row label {
        font-weight: bold;
        color: #444;
    }

    .view-row span {
        color: #666;
        max-width: 70%;
        text-align: right;
    }

    .blog-image {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .back-btn {
        background-color: #86092b;
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        text-decoration: none;
        float: right;
        transition: 0.3s;
    }

    .back-btn:hover {
        background-color: #b10937;
        color: white;

    }
</style>

<div class="blog-view-card">
    <h2>Blog Details</h2>

    @if($blog->featured_image)
        <img src="{{ asset($blog->featured_image) }}" alt="Blog Image" class="blog-image">
    @endif

    <div class="view-row">
        <label>Title:</label>
        <span>{{ $blog->title }}</span>
    </div>

    <div class="view-row">
        <label>Short Description:</label>
        <span>{{ $blog->short_description }}</span>
    </div>


    <div class="view-row">
        <label>Author:</label>
        <span>{{ $blog->author }}</span>
    </div>

    <div class="view-row">
        <label>Date:</label>
        <span>{{ $blog->date }}</span>
    </div>

    <div class="view-row">
        <label>Category:</label>
        <span>{{ $blog->category->name ?? 'N/A' }}</span>
    </div>

    <a href="{{ route('Dashboard.admin.blog.index') }}" class="back-btn mt-2">Back to Blogs</a>
</div>

@endsection
