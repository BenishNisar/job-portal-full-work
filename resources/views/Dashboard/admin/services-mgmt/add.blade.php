@extends('Layout.layouttwo')
@section('AdminContent')

@push('styles')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
  <style>
    /* container look (aapka existing) */
    .form0-container{
      background:#fff;border:1px solid #a41414;padding:20px;border-radius:10px;
      box-shadow:0 4px 6px rgba(0,0,0,.08)
    }
    /* Summernote UI tweaks */
    #svc-summer .note-editor.note-frame{border:1px solid #ced4da;border-radius:.375rem;}
    #svc-summer .note-toolbar{display:flex;flex-wrap:wrap;gap:6px}
    #svc-summer .note-editable{min-height:320px;padding:14px}

    /* >>> Headings visible in editor (preview) <<< */
    #svc-summer .note-editable h1{font-size:32px;line-height:1.25;margin:.6em 0 .4em;font-weight:700}
    #svc-summer .note-editable h2{font-size:28px;line-height:1.3; margin:.6em 0 .4em;font-weight:700}
    #svc-summer .note-editable h3{font-size:24px;line-height:1.35;margin:.6em 0 .4em;font-weight:700}
    #svc-summer .note-editable h4{font-size:20px;line-height:1.4; margin:.6em 0 .4em;font-weight:600}
    #svc-summer .note-editable h5{font-size:18px;line-height:1.45;margin:.6em 0 .4em;font-weight:600}
    #svc-summer .note-editable h6{font-size:16px;line-height:1.5; margin:.6em 0 .4em;font-weight:600;text-transform:uppercase;letter-spacing:.02em}

    /* brand buttons */
    .btn-danger{background:#b10937;border:none}
    .btn-danger:hover{background:#8b072b}
  </style>
@endpush


<div class="container mt-4">
  <div class="form0-container">
    {{-- Heading/Helper chaho to uncomment kar lo --}}
    {{-- <div class="mb-3 d-flex justify-content-between align-items-center">
         <h5 class="mb-0">Add Service</h5>
         <small class="text-muted">Rich editor: headings • lists • tables • media • fullscreen • code</small>
       </div> --}}
       @if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif


    <div class="card-body p-0">
      <form method="POST" action="{{ route('Dashboard.admin.services-mgmt.store') }}"  enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
              <div class="col-md-6">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control" accept="image/*">
    <small class="text-muted">JPG/PNG/WEBP up to 2MB</small>
  </div>
          <div class="col-md-6">
            <label class="form-label">Title *</label>
            <input name="title" class="form-control" value="{{ old('title') }}" required>
          </div>

          <div class="col-md-3">
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order',0) }}">
          </div>

          <div class="col-md-3">
            <label class="form-label">Status</label>
            <select name="is_active" class="form-select">
              <option value="1" {{ old('is_active',1)==1?'selected':'' }}>Active</option>
              <option value="0" {{ old('is_active',1)==0?'selected':'' }}>Inactive</option>
            </select>
          </div>

          <div class="col-12" id="svc-summer">
            <label class="form-label">Description</label>
            <textarea id="summernote" name="description">{!! old('description') !!}</textarea>
          </div>
        </div>

        <div class="text-end mt-3">
          <a href="{{ route('Dashboard.admin.services-mgmt.index') }}" class="btn btn-secondary">Cancel</a>
          <button class="btn" style="background-color: #1d3a7d;color:white;">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
  <script>
    $(function () {
      $('#summernote').summernote({
        height: 320,
        placeholder: 'Write a modern, well-formatted service description…',
        toolbar: [
          ['style', ['style']],
          ['font', ['bold','italic','underline','strikethrough','clear']],
          ['fontname', ['fontname']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul','ol','paragraph']],
          ['table', ['table']],
          ['insert', ['link','picture','video','hr']],
          ['view', ['fullscreen','codeview','help']]
        ],
        styleTags: ['p','h1','h2','h3','h4','h5','h6','blockquote'],
        fontNames: ['Poppins','Arial','Helvetica','Times New Roman','Courier New'],
        dialogsInBody: true
      });
    });
  </script>
@endpush

@endsection
