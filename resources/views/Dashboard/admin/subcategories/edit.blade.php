@extends("Layout.layouttwo")
@section("AdminContent")

<style>
  .form-control,.form-select{
    height:42px;
    padding:8px 14px;
    border:1px solid #ccc;
    transition:border-color 0.3s ease-in-out;
    border-radius:5px;
  }
  .form-label{ font-weight:600; margin-bottom:5px; }
  .form-control:focus,.form-select:focus{
    border-color:#1d3a7d;
    box-shadow:none;
  }
  .custom-btn{ font-size:16px; padding:10px 20px; border-radius:6px; }
  .btn-secondary{ background:#6c757d; border:none; }
  .btn-secondary:hover{ background:#5a6268; }
  .form-container{
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 4px 6px rgba(0,0,0,0.1);
    border:1px solid #1d3a7d;
  }
</style>

<div class="container mt-4">
  <div class="form-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 style="font-size:23px; font-weight:bolder;">Edit Subcategory</h1>
      <a href="{{ route('Dashboard.admin.subcategories.index') }}" class="btn btn-secondary custom-btn">Back</a>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('Dashboard.admin.subcategories.update', $subcategory->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Select Category</label>
         <select class="form-select" name="condition_category_id" required>
  <option value="">Choose category</option>
  @foreach($categories as $cat)
    <option value="{{ $cat->id }}" {{ old('condition_category_id')==$cat->id ? 'selected' : '' }}>
      {{ $cat->name }}
    </option>
  @endforeach
</select>

        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Subcategory Name</label>
          <input type="text" class="form-control" name="name" value="{{ old('name', $subcategory->name) }}" required>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Slug</label>
          <input type="text" class="form-control" name="slug" value="{{ old('slug', $subcategory->slug) }}">
        </div>

        <div class="col-md-3 mb-3">
          <label class="form-label">Sort Order</label>
          <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order', $subcategory->sort_order) }}">
        </div>

        <div class="col-md-3 mb-3 d-flex align-items-end">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_active" {{ old('is_active', $subcategory->is_active) ? 'checked' : '' }}>
            <label class="form-check-label" style="font-weight:600;">Active</label>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('Dashboard.admin.subcategories.index') }}" class="btn btn-secondary custom-btn">Cancel</a>
        <button type="submit" style="background-color:#1d3a7d; color:white;" class="btn custom-btn ms-2">Update</button>
      </div>
    </form>
  </div>
</div>

@endsection
