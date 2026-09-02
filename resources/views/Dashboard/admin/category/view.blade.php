@extends("Layout.layouttwo")

@section("AdminContent")

<style>
    .category-view-card {
        background-color: #fff;
        border-radius: 12px;
        padding: 30px;
        max-width: 600px;
        height:250px;
        margin: 40px auto;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .category-view-card h2 {
        font-size: 24px;
        font-weight: bold;
        color: #b10937;
        margin-bottom: 25px;
    }

    .view-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .view-row label {
        font-weight: bold;
        color: #444;
    }

    .view-row span {
        color: #666;
        text-align: right;
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

<div class="category-view-card">
    <h2>View Category Details</h2>

    <div class="view-row">
        <label>ID:</label>
        <span>{{ $category->id }}</span>
    </div>

    <div class="view-row">
        <label>Category Name:</label>
        <span>{{ $category->name }}</span>
    </div>

    <a href="{{ route('Dashboard.admin.category.index') }}" class="back-btn">Back to Categories</a>
</div>

@endsection
