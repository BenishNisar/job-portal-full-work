@extends("Layout.layouttwo")

{{-- Make sure your Layout.layouttwo has @stack('styles') inside the <head> tag! --}}
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        /* Thori si custom styling taake Jobick theme ke sath acha lagay */
        .note-editor.note-frame {
            border: 1px solid #e2e2e2;
            border-radius: 0.75rem; /* Jobick style radius */
            overflow: hidden;
        }
        .note-editor .note-toolbar {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e2e2e2;
        }
    </style>
@endpush

@section("AdminContent")

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
            </ol>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('Dashboard.admin.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xl-12">
                    <div class="mb-4">
                        <ul class="d-flex align-items-center flex-wrap">
                            <li><a href="{{ route('Dashboard.admin.blog.index') }}" class="btn btn-primary btn-sm">Blog List</a></li>
                            <li><a href="{{ route('Dashboard.admin.category.index') }}" class="btn btn-primary btn-sm mx-1">Blog Category</a></li>
                            <li><a href="{{ route('Dashboard.admin.category.index') }}" class="btn btn-primary btn-sm me-1 mt-sm-0 mt-1">Add Blog Category</a></li>
                            <li><a href="javascript:void(0);" class="btn btn-primary btn-sm open mt-1 mt-md-0">Screen Option</a></li>
                        </ul>
                    </div>

                    <div class="main-check" style="display:none;">
                        <div class="row">
                            <h6 class="mb-3">Show on screen</h6>

                            <div class="col-xl-2 col-lg-3 col-sm-4">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault-2" checked>
                                    <label class="form-check-label mb-0 text-nowrap" for="flexCheckDefault-2">Featured Image</label>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-3 col-sm-4">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault-3" checked>
                                    <label class="form-check-label mb-0" for="flexCheckDefault-3">Excerpt</label>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-3 col-sm-4">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault-7" checked>
                                    <label class="form-check-label mb-0" for="flexCheckDefault-7">Author</label>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-3 col-sm-4">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault-9" checked>
                                    <label class="form-check-label mb-0" for="flexCheckDefault-9">Seo</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card h-auto">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="content" id="content_editor" class="form-control">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="filter cm-content-box box-primary">
                                <div class="content-title SlideToolHeader">
                                    <div class="cpa">Excerpt</div>
                                    <div class="tools">
                                        <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                                    </div>
                                </div>
                                <div class="cm-content-body publish-content form excerpt">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Short Description</label>
                                            <textarea name="short_description" id="short_description_editor" class="form-control">{{ old('short_description') }}</textarea>
                                            <div class="form-text">Excerpts are optional hand crafted summaries of your content.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="filter cm-content-box box-primary">
                                <div class="content-title SlideToolHeader">
                                    <div class="cpa">Seo</div>
                                    <div class="tools">
                                        <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                                    </div>
                                </div>
                                <div class="cm-content-body form excerpt">
                                    <div class="card-body">
                                        <label class="form-label">Page Title</label>
                                        <input type="text" name="meta_title" class="form-control mb-3" placeholder="Page title" value="{{ old('meta_title') }}">

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <label class="form-label">Descriptions</label>
                                                <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter meta description">{{ old('meta_description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="right-sidebar-sticky">
                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">Published</div>
                                        <div class="tools">
                                            <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                                        </div>
                                    </div>

                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body py-3">
                                            <ul class="list-style-1 block">
                                                <li>
                                                    <div class="mb-3">
                                                        <label class="form-label mb-2">Status</label>
                                                        <select name="status" class="form-control solid default-select">
                                                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Published</option>
                                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Draft</option>
                                                            <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Trash</option>
                                                            <option value="3" {{ old('status') == '3' ? 'selected' : '' }}>Private</option>
                                                            <option value="4" {{ old('status') == '4' ? 'selected' : '' }}>Pending</option>
                                                        </select>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="mb-3">
                                                        <label class="form-label mb-2">Author</label>
                                                        <input type="text" name="author" class="form-control" value="{{ old('author') }}" placeholder="Author">
                                                    </div>
                                                </li>

                                                <li class="border-bottom-0">
                                                    <div class="mb-3">
                                                        <label class="form-label mb-2">Published Date</label>
                                                        <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="card-footer border-top text-end py-3">
                                            <a href="{{ route('Dashboard.admin.blog.index') }}" class="btn btn-danger light btn-sm">Cancel</a>
                                            <button type="submit" class="btn btn-primary btn-sm">Publish</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">Categories</div>
                                        <div class="tools">
                                            <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
                                            <label class="form-label">Select Category</label>
                                            <select name="category_id" class="form-control default-select h-auto wide">
                                                <option value="">Select Category</option>
                                                @foreach($categories ?? [] as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="filter cm-content-box box-primary">
                                    <div class="content-title SlideToolHeader">
                                        <div class="cpa">Featured Image</div>
                                        <div class="tools">
                                            <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                                        </div>
                                    </div>
                                    <div class="cm-content-body publish-content form excerpt">
                                        <div class="card-body">
                                            <div class="avatar-upload d-flex align-items-center">
                                                <div class="position-relative">
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url('{{ asset('images/no-img-avatar.png') }}'); height: 100px; width: 100px; background-size: cover; background-position: center;"></div>
                                                    </div>
                                                    <div class="change-btn d-flex align-items-center flex-wrap mt-3">
                                                        <input type="file" name="featured_image" class="form-control d-none" id="imageUpload" accept=".png, .jpg, .jpeg">
                                                        <label for="imageUpload" class="btn btn-primary light btn-sm ms-0">Select Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

{{-- Make sure your Layout.layouttwo has @stack('scripts') right before the closing </body> tag! --}}
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <script>
    $(document).ready(function () {
        // Full text editor initialization
        $('#content_editor').summernote({
            height: 320,
            placeholder: 'Write blog content here...',
            tabsize: 2,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6']
        });

        // Short description initialization
        $('#short_description_editor').summernote({
            height: 180,
            placeholder: 'Write short description here...',
            tabsize: 2,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });

        // Image Preview logic
        $('#imageUpload').on('change', function () {
            let input = this;
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        // Dropdown toggle for Screen Options
        $('.open').on('click', function () {
            $('.main-check').slideToggle();
        });
    });
    </script>
@endpush
