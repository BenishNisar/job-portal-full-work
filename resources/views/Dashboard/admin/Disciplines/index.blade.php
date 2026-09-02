@extends("Layout.layouttwo")
@section("AdminContent")

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Disciplines</a></li>
            </ol>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
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
                            <form method="GET" action="{{ route('Dashboard.admin.disciplines.index') }}">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-6">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control mb-xl-0 mb-3" value="{{ request('title') }}" placeholder="Hero title, menu title, slug">
                                    </div>

                                    <div class="col-xl-4 col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Menu Group</label>
                                        <input type="text" name="menu_group" class="form-control" value="{{ request('menu_group') }}" placeholder="Technology, Healthcare, Corporate">
                                    </div>

                                    <div class="col-xl-4 col-sm-12 align-self-end">
                                        <div>
                                            <button class="btn btn-primary me-2" type="submit">
                                                <i class="fa fa-filter me-1"></i>Filter
                                            </button>
                                            <a href="{{ route('Dashboard.admin.disciplines.index') }}" class="btn btn-danger light">
                                                Remove Filter
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mb-4 pb-3">
                    <a href="{{ route('Dashboard.admin.disciplines.add') }}" class="btn btn-primary btn-sm">Add Discipline</a>
                </div>

                <div class="filter cm-content-box box-primary">
                    <div class="content-title SlideToolHeader">
                        <div class="cpa">
                            <i class="fa-solid fa-file-lines me-1"></i>Disciplines List
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
                                            <th>Hero Title</th>
                                            <th>Menu Title</th>
                                            <th>Menu Group</th>
                                            <th>Slug</th>
                                            <th>Modified</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($disciplines as $discipline)
                                            <tr>
                                                <td>{{ $loop->iteration + ($disciplines->currentPage() - 1) * $disciplines->perPage() }}</td>
                                                <td>{{ $discipline->hero_title }}</td>
                                                <td>{{ $discipline->menu_title }}</td>
                                                <td>{{ $discipline->menu_group }}</td>
                                                <td>{{ $discipline->slug }}</td>
                                                <td>{{ \Carbon\Carbon::parse($discipline->updated_at)->format('d M, Y') }}</td>
                                                <td class="text-nowrap">
                                                    <a href="{{ route('Dashboard.admin.disciplines.edit', $discipline->id) }}" class="btn btn-warning btn-sm content-icon">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('Dashboard.admin.disciplines.delete', $discipline->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this discipline?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm content-icon">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No disciplines found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <p class="mb-2 me-3">
                                        @if($disciplines->total() > 0)
                                            Page {{ $disciplines->currentPage() }} of {{ $disciplines->lastPage() }},
                                            showing {{ $disciplines->count() }} records out of {{ $disciplines->total() }} total,
                                            starting on record {{ $disciplines->firstItem() }},
                                            ending on {{ $disciplines->lastItem() }}
                                        @else
                                            No records available
                                        @endif
                                    </p>

                                    <nav aria-label="Page navigation example mb-2">
                                        {{ $disciplines->links('pagination::bootstrap-5') }}
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

@endsection
