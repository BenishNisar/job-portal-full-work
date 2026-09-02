@extends("Layout.layouttwo")
@section("AdminContent")

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Blog</a></li>
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

        <div class="row">
            <div class="col-xl-12">

                <div class="filter cm-content-box box-primary">
                    <div class="content-title SlideToolHeader">
                        <div class="cpa">
                            <i class="fa-sharp fa-solid fa-filter me-2"></i>Filter
                        </div>
                        <div class="tools">
                            <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                        </div>
                    </div>

                    <div class="cm-content-body form excerpt">
                        <div class="card-body">
                            <form method="GET" action="{{ url()->current() }}">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6">
                                        <label class="form-label">Title</label>
                                        <input
                                            type="text"
                                            name="title"
                                            class="form-control mb-xl-0 mb-3"
                                            placeholder="Title"
                                            value="{{ request('title') }}"
                                        >
                                    </div>

                                    <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                        {{-- <label class="form-label">Status</label>
                                        <select name="status" class="form-control default-select h-auto wide" aria-label="Default select example">
                                            <option value="">Select Status</option>
                                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Published</option>
                                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Draft</option>
                                            <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Trash</option>
                                            <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Private</option>
                                            <option value="4" {{ request('status') == '4' ? 'selected' : '' }}>Pending</option>
                                        </select> --}}
      <label class="form-label">Status</label>
<select name="status" class="form-control default-select h-auto wide">
    <option value="">Select Status</option>
    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Published</option>
    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Draft</option>
    <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Trash</option>
    <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Private</option>
    <option value="4" {{ request('status') == '4' ? 'selected' : '' }}>Pending</option>
</select>
                                    </div>

                                    <div class="col-xl-3 col-sm-6">
                                        <label class="form-label">Date</label>
                                        <div class="input-hasicon mb-sm-0 mb-3">
                                            <input
                                                type="date"
                                                name="date"
                                                class="form-control"
                                                value="{{ request('date') }}"
                                            >
                                            <div class="icon"><i class="far fa-calendar"></i></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-sm-6 align-self-end">
                                        <div>
                                            <button class="btn btn-primary me-2" type="submit">
                                                <i class="fa fa-filter me-1"></i>Filter
                                            </button>
                                            <a href="{{ url()->current() }}" class="btn btn-danger light">Remove Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mb-4 pb-3">
                    <ul class="d-flex align-items-center flex-wrap">
                        <li>
                            <a href="{{ route('Dashboard.admin.blog.add') }}" class="btn btn-primary btn-sm">Add Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('Dashboard.admin.category.index') }}" class="btn btn-primary btn-sm mx-1">Blog Category</a>
                        </li>
                        <li>
                            <a href="{{ route('Dashboard.admin.category.index') }}" class="btn btn-primary btn-sm mt-sm-0 mt-1">Add Blog Category</a>
                        </li>
                    </ul>
                </div>

                <div class="filter cm-content-box box-primary">
                    <div class="content-title SlideToolHeader">
                        <div class="cpa">
                            <i class="fa-solid fa-file-lines me-1"></i>Blogs List
                        </div>
                        <div class="tools">
                            <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
                        </div>
                    </div>

                    <div class="cm-content-body form excerpt">
                        <div class="card-body pb-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Modified</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($blogs as $blog)
                                            @php
                                                $statusLabel = 'Draft';
                                                $statusClass = 'secondary';

                                                if ((string)$blog->status === '1') {
                                                    $statusLabel = 'Published';
                                                    $statusClass = 'success';
                                                } elseif ((string)$blog->status === '0') {
                                                    $statusLabel = 'Draft';
                                                    $statusClass = 'secondary';
                                                } elseif ((string)$blog->status === '2') {
                                                    $statusLabel = 'Trash';
                                                    $statusClass = 'danger';
                                                } elseif ((string)$blog->status === '3') {
                                                    $statusLabel = 'Private';
                                                    $statusClass = 'dark';
                                                } elseif ((string)$blog->status === '4') {
                                                    $statusLabel = 'Pending';
                                                    $statusClass = 'warning';
                                                }
                                            @endphp

                                            <tr>
                                                <td>
                                                    {{ method_exists($blogs, 'firstItem') ? $blogs->firstItem() + $loop->index : $loop->iteration }}
                                                </td>

                                                <td>{{ $blog->title }}</td>

                                                <td>{{ $blog->category->name ?? 'No Category' }}</td>

                                                <td>
                                                    <span class="badge light badge-{{ $statusClass }}">
                                                        {{ $statusLabel }}
                                                    </span>
                                                </td>

                                                <td>
                                                    {{ $blog->updated_at ? $blog->updated_at->format('d M, Y') : 'N/A' }}
                                                </td>

                                                <td class="text-nowrap">
                                                    <a href="{{ route('Dashboard.admin.blog.edit', $blog->id) }}" class="btn btn-warning btn-sm content-icon" title="Edit">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>

                                                    <form action="{{ route('Dashboard.admin.blog.delete', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this blog?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm content-icon" title="Delete">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No blogs found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                @if(method_exists($blogs, 'total'))
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <p class="mb-2 me-3">
                                            Page {{ $blogs->currentPage() }} of {{ $blogs->lastPage() }},
                                            showing {{ $blogs->count() }} records out of {{ $blogs->total() }} total,
                                            starting on record {{ $blogs->firstItem() ?? 0 }},
                                            ending on {{ $blogs->lastItem() ?? 0 }}
                                        </p>

                                        <nav aria-label="Page navigation example mb-2">
                                            {{ $blogs->appends(request()->query())->links('pagination::bootstrap-5') }}
                                        </nav>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
