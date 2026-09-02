@extends("Layout.layouttwo")

@section("AdminContent")

<style>
.container-fluid{padding-left:0;padding-right:0}
.table-container{margin:10px}
.table-wrapper{overflow-x:auto;-webkit-overflow-scrolling:touch;margin-top:15px;margin-bottom:30px;padding-bottom:10px}
.table{width:100%;margin-bottom:0}
.table th,.table td{padding:10px 12px;font-size:14px;white-space:nowrap;text-align:left}
.search-container{display:flex;align-items:center;gap:10px;margin-left:auto}
.search-input{padding:10px;border:1px solid #ccc;border-radius:50px;width:250px;outline:none;font-size:14px;transition:.3s}
.add-new-btn{background-color:#1d3a7d;color:#fff;border:none;padding:10px 20px;border-radius:50px;cursor:pointer;transition:.3s;text-decoration:none}
.add-new-btn:hover{background-color:#fc9928;color:#fff}
@media (max-width:768px){.search-container{flex-direction:column;align-items:stretch;width:70%}
.search-input{display:none}.add-new-btn{width:70%;text-align:center}}
.actions{display:flex;justify-content:center;gap:10px}
.actions i{color:#1d3a7d ;cursor:pointer;transition:.2s}
.actions i:hover{transform:scale(1.08);color:gray}
.banner-thumb{width:90px;height:56px;object-fit:cover;border:1px solid #ddd;border-radius:6px}
</style>

<div class="container-fluid mt-4 table-container">
    <div style="display:flex;justify-content:space-between;align-items:center;">
        <h1 style="font-size:23px;font-weight:bolder;">Banners</h1>

        <form method="GET" class="search-container" action="{{ route('Dashboard.admin.banner.index') }}">
            <input type="text" class="search-input" name="q" value="{{ $q ?? '' }}" placeholder="Search...">
            <a href="{{ route('Dashboard.admin.banner.add') }}" class="add-new-btn">Add New</a>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <div class="table-wrapper">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Banner Image</th>
                <th>Title</th>
                <th>Paragraph</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($banners as $idx => $item)
                <tr>
                    <td>{{ ($banners->currentPage()-1)*$banners->perPage() + $idx + 1 }}</td>
                    <td><img src="{{ asset($item->image_path) }}" class="banner-thumb" alt="Banner"></td>
                    <td>{{ $item->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($item->paragraph, 80) }}</td>
                    <td class="actions">
                        <a href="{{ route('Dashboard.admin.banner.edit', $item->id) }}" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('Dashboard.admin.banner.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this banner?')">
                            @csrf @method('DELETE')
                            <button type="submit" style="border:none;background:none;padding:0" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No banners found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-2">
        {{ $banners->links() }}
    </div>
</div>
@endsection
