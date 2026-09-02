@extends('Layout.layouttwo')
@section('AdminContent')
<style>
    body{ font-family: poppins; }
    .form-control,.form-select{
        height:42px;padding:8px 14px;border:1px solid #ccc;transition:.3s;border-radius:5px;
    }
    .form-label{ font-weight:600;margin-bottom:5px; }
    .form-control:focus,.form-select:focus{ border-color:#b10937;box-shadow:none; }
    .textarea-large{ height:140px; resize:vertical; }
    .img-preview{ width:120px;height:120px;border-radius:8px;object-fit:cover;border:1px solid #ddd;padding:3px; }
    .custom-btn{ font-size:16px;padding:10px 20px;border-radius:6px; }
    .btn-danger{ background:#b10937;border:none; } .btn-danger:hover{ background:#8b072b; }
    .btn-secondary{ background:#6c757d;border:none; } .btn-secondary:hover{ background:#5a6268; }
    .form-container{ background:#fff;border:1px solid #a41414;padding:20px;border-radius:10px;box-shadow:0 4px 6px rgba(0,0,0,.1); }
</style>

<div class="container mt-4">
  <div class="form-container">
    <h1 class="text-center" style="font-size:23px;font-weight:bolder;">Upload Document</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('Dashboard.admin.downloads-mgmt.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Title</label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="col-md-3 mb-3">
          <label class="form-label">Year Label (e.g. 2007-08)</label>
          <input type="text" name="year_label" class="form-control" value="{{ old('year_label') }}" required>
        </div>

<div class="col-md-6 mb-3">
  <label class="form-label">Categories (select one or more)</label>

  @php
    // Add page: $download exist nahi karta, isliye sirf old() ya empty default
    $selected = collect(old('category_ids', $selectedCategoryIds ?? []));
  @endphp

  <select name="category_ids[]" class="form-control" multiple size="5" required>
    @foreach($categories as $cat)
      <option value="{{ $cat->id }}" @selected($selected->contains($cat->id))>
        {{ $cat->name }}
      </option>
    @endforeach
  </select>
  <small class="text-muted">Hold Ctrl/⌘ to select multiple.</small>
</div>


        <div class="col-md-6 mb-3">
          <label class="form-label">File</label>
          <input type="file" name="file" class="form-control" required>
        </div>
      </div>
      <div class="text-end">
        <a href="{{ route('Dashboard.admin.downloads-mgmt.index') }}" class="btn btn-secondary">Cancel</a>
        <button class="btn" style="background-color:#1d3a7d ;color:white;">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
