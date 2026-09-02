@extends("Layout.layouttwo")

@section("AdminContent")

<style>
    .view-card {
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: 40px auto;
    }

    .view-card h2 {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #b10937;
    }

    .view-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .view-row label {
        font-weight: bold;
        color: #333;
    }

    .view-row span {
        color: #555;
    }

    .btn-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .back-btn {
        padding: 8px 16px;
        background-color: #86092b;
        color: white;
        text-decoration: none;
        border-radius: 50px;
        transition: background 0.3s;
    }

    .back-btn:hover {
        background-color: #b10937;
        color: white;
    }
</style>

<div class="view-card">
    <h2>View Role Details</h2>

    <div class="view-row">
        <label>ID:</label>
        <span>{{ $role->id }}</span>
    </div>

    <div class="view-row">
        <label>Role Name:</label>
        <span>{{ $role->role_name }}</span>
    </div>

    <div class="btn-container">
        <a href="{{ route('Dashboard.admin.roles.index') }}" class="back-btn">
            Back to Roles
        </a>
    </div>
</div>

@endsection
