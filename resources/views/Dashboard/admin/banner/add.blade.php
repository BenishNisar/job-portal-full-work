@extends("Layout.layouttwo")
@section("AdminContent")

<style>
    .form-control,.form-select{height:38px;padding:6px 12px;border:1px solid #ccc;transition:.3s}
    .form-label{font-weight:600}
    .form-control:focus,.form-select:focus{border-color:#b10937;box-shadow:none}
    .uniform-width{width:100%}
    .square-button{width:80px;height:40px;border-radius:0;display:inline-flex;align-items:center;justify-content:center}
</style>

@if ($errors->any())
<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="container mt-4">
    <h1 style="font-size:23px;font-weight:bolder;">Add Banner</h1><br>

    <form action="{{ route('Dashboard.admin.banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Banner Image</label>
                <input type="file" name="image" class="form-control rounded-0 uniform-width" accept="image/*" required>
                @error('image')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Title</label>
                <input name="title" type="text" class="form-control rounded-0 uniform-width" value="{{ old('title') }}" required>
                @error('title')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-8 mb-3">
                <label class="form-label">Paragraph</label>
                <textarea name="paragraph" class="form-control rounded-0 uniform-width" rows="3" style="height:auto">{{ old('paragraph') }}</textarea>
                @error('paragraph')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="mb-3" style="display:flex;justify-content:flex-end;margin-top:1vh;">
            <a href="{{ route('Dashboard.admin.banner.index') }}" class="btn square-button" style="background-color:#6c757d;color:white;margin-right:10px;">Cancel</a>
            <button style="background-color:#1d3a7d ;color:white;" type="submit" class="btn square-button">Save</button>
        </div>
    </form>
</div>
@endsection
