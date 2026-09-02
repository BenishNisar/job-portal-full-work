@extends("Layout.layouttwo")
@section("AdminContent")

<style>
    .container-fluid { padding-left:0; padding-right:0; }
    .table-container { margin-left:10px; margin-right:10px; }
    .table-wrapper { overflow-x:auto; -webkit-overflow-scrolling:touch; margin-top:15px; margin-bottom:30px; padding-bottom:10px; }
    .table th, .table td { padding:10px 12px; font-size:14px; white-space:nowrap; text-align:left; }

    .search-input {
        padding:10px; border:1px solid #ccc; border-radius:50px; width:250px; outline:none; font-size:14px; transition:0.3s;
    }
    .search-input:focus { border-color:rgba(0,0,0,.35); }

       .add-new-btn {
    background-color:#1d3a7d ;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 50px;
    cursor: pointer;
    transition: 0.3s;
}

.add-new-btn:hover {
    background-color: #fc9928;;
    color: white;
}

    /* extra: multi-select ka size clean */
    .search-multi { min-width:240px; height:38px; border-radius:50px; padding:6px 12px; }
    .search-multi[multiple] { height:auto; min-height:38px; border-radius:12px; }

    /* Mobile & Tablet fix */
    @media (max-width: 768px) {
        .search-container { flex-direction:column; align-items:stretch; width:70%; gap:8px !important; }
        .search-input { display:none; } /* aapki existing rule */
        .add-new-btn { width:70%; text-align:center; }
    }

    .actions { display:flex; justify-content:center; gap:6px; }
    .actions i { color:#1d3a7d ; cursor:pointer; }
    .actions i:hover { transform:scale(1.08); color:gray; }
</style>

<div class="container-fluid mt-4 table-container">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1 style="font-size:23px; font-weight:bolder;">Downloads</h1>

        {{-- FILTER BAR (same "search-container" UI container) --}}
        <form method="GET" class="search-container" style="display:flex; align-items:center; gap:10px; margin:0;">
            <input type="text" name="q" value="{{ $q }}" class="search-input" placeholder="Search title / year...">

            {{-- Multi-category select (compact) --}}


            <button type="submit" class="add-new-btn">Filter</button>
            <a href="{{ route('Dashboard.admin.downloads-mgmt.add') }}" class="add-new-btn">Add New</a>
        </form>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <div class="table-wrapper">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Year</th>
                    <th>Category</th>
                    <th>File</th>
                    <th style="width:120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($downloads as $i => $d)
                    <tr>
                        <td>{{ ($downloads->currentPage()-1)*$downloads->perPage() + $i + 1 }}</td>
                        <td>{{ $d->title }}</td>
                        <td>{{ $d->year_label }}</td>

                        {{-- MANY-TO-MANY: show all category names --}}
                        <td>{{ $d->categories->pluck('name')->join(', ') ?: '—' }}</td>

                        <td><a href="{{ asset($d->file_path) }}" target="_blank">Open</a></td>
                        <td class="actions">
                            <a href="{{ route('Dashboard.admin.downloads-mgmt.edit', $d->id) }}"><i class="fas fa-edit" title="Edit"></i></a>
                            <form action="{{ route('Dashboard.admin.downloads-mgmt.delete', $d->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" style="border:none; background:none; padding:0;" onclick="return confirm('Delete this file?')">
                                    <i class="fas fa-trash-alt" title="Delete"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">No records found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- pagination --}}
    <div class="mt-2">
        {{ $downloads->links() }}
    </div>
</div>

@endsection
