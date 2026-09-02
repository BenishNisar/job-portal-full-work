@extends("Layout.layouttwo")
@section("AdminContent")
@php
    $editCategory = $editCategory ?? null;
@endphp
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Blog Category</a></li>
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
                <div class="row">

                    <div class="col-xl-4">
                        <div class="filter cm-content-box box-primary">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    {{ $editCategory ? 'Edit Blog Category' : 'Add Blog Category' }}
                                </div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand handle">
                                        <i class="fal fa-angle-down"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="cm-content-body form excerpt">
                                <div class="card-body">

                                    @if($editCategory)
                                        <form action="{{ route('Dashboard.admin.category.update', $editCategory->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                    @else
                                        <form action="{{ route('Dashboard.admin.category.store') }}" method="POST">
                                            @csrf
                                    @endif

                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                placeholder="Category Name"
                                                value="{{ old('name', $editCategory->name ?? '') }}"
                                            >
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-primary">
                                                {{ $editCategory ? 'Update' : 'Save' }}
                                            </button>

                                            <a href="{{ route('Dashboard.admin.category.index') }}" class="btn btn-light ms-2">
                                                {{ $editCategory ? 'Cancel' : 'Reset' }}
                                            </a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <div class="filter cm-content-box box-primary">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    Blog Category List
                                </div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand handle">
                                        <i class="fal fa-angle-down"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="cm-content-body publish-content form excerpt">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.No</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($categorys as $category)
                                                    <tr>
                                                        <td>{{ $categorys->firstItem() + $loop->index }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>
                                                            <div>
                                                                <a href="{{ route('Dashboard.admin.category.index', ['edit' => $category->id]) }}" class="text-hover">Edit</a>
                                                                <span>|</span>

                                                                <form action="{{ route('Dashboard.admin.category.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this category?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-link p-0 m-0 text-hover text-danger" style="text-decoration:none;">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center">No categories found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                            <p class="mb-2 me-3">
                                                Page {{ $categorys->currentPage() }} of {{ $categorys->lastPage() }},
                                                showing {{ $categorys->count() }} records out of {{ $categorys->total() }} total,
                                                starting on record {{ $categorys->firstItem() ?? 0 }},
                                                ending on {{ $categorys->lastItem() ?? 0 }}
                                            </p>

                                            <nav aria-label="Page navigation example mb-2">
                                                {{ $categorys->links('pagination::bootstrap-5') }}
                                            </nav>
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

@endsection
