@extends("Layout.layouttwo")

@section("AdminContent")
<style>
    .form-control,
    .form-select {
        height: 42px;
        padding: 8px 14px;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease-in-out;
        border-radius: 5px;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 5px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #b10937;
        box-shadow: none;
    }

    .textarea-large {
        height: 140px; /* Increased height for better usability */
        resize: vertical; /* Allow vertical resizing */
    }

    .img-preview {
        width: 120px;
        height: 120px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid #ddd;
        padding: 3px;
    }

    .custom-btn {
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 6px;
    }

    .btn-danger {
        background-color: #b10937;
        border: none;
    }

    .btn-danger:hover {
        background-color: #8b072b;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .form-container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="container mt-4">
    <div class="form-container">
        <h1 class="text-center" style="font-size: 23px; font-weight: bolder;">Conditions Catregories</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('Dashboard.admin.conditions-categories.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $customer->name) }}" required />
                </div>



                           </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ url('dashboard/conditions-categories') }}" class="btn btn-secondary custom-btn">Cancel</a>
                <button type="submit" style="background-color:#1d3a7d ;color:white;" class="btn  custom-btn ms-2">Update</button>
            </div>
        </form>


    </div>
</div>

@endsection
