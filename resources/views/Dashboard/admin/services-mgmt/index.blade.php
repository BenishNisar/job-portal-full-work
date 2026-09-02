@extends('Layout.layouttwo')
@section('AdminContent')

<style>
  .container-fluid { padding-left:0; padding-right:0; }
  .table-container { margin-left:10px; margin-right:10px; }
  .table-wrapper { overflow-x:auto; -webkit-overflow-scrolling:touch; margin-top:15px; margin-bottom:30px; padding-bottom:10px; }
  .table th,.table td { padding:10px 12px; font-size:14px; white-space:nowrap; text-align:left; }

  /* thumbnail */
  .tbl-thumb{
    width:70px; height:46px; object-fit:cover; border-radius:6px; border:1px solid #eee;
    background:#f7f7f7;
  }

  .search-container { display:flex; gap:10px; align-items:center; }
  .search-input {
    padding:10px; border:1px solid #ccc; border-radius:50px; width:250px; outline:none; font-size:14px; transition:0.3s;
  }
  .search-input:focus { border-color:rgba(0,0,0,0.35); }
  .add-new-btn { background-color: #1d3a7d; color:#fff; border:none; padding:10px 20px; border-radius:50px; cursor:pointer; transition:0.3s; text-decoration:none; display:inline-block; }
  .add-new-btn:hover { background-color:#fc9928; color:#fff; }

  /* Mobile & Tablet */
  @media (max-width:768px){
    .search-container{ flex-direction:column; align-items:stretch; width:70%; }
    .search-input{ display:none; }
    .add-new-btn{ width:70%; text-align:center; }
  }

  .actions { display:flex; justify-content:center; gap:8px; }
  .actions i { color:#1d3a7d ; cursor:pointer; }
  .actions i:hover { transform:scale(1.08); color:gray; }
</style>

<div class="container-fluid mt-4 table-container">
  <div style="display:flex; justify-content:space-between; align-items:center;">
    <h1 style="font-size:23px; font-weight:bolder;">Services</h1>

    <div class="search-container">
      <form method="GET" action="{{ route('Dashboard.admin.services-mgmt.index') }}">
        <input type="text" name="q" value="{{ $q }}" class="search-input" placeholder="Search services...">
      </form>
      <a href="{{ route('Dashboard.admin.services-mgmt.add') }}" class="add-new-btn">Add New</a>
    </div>
  </div>

  <div class="table-wrapper">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Image</th>   {{-- NEW --}}
          <th>Title</th>
          <th>Sort</th>
          <th>Status</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($rows as $i => $s)
          @php
            // Accessor use kar sakte ho: $s->image_url
            $img = $s->image ? asset($s->image) : asset('assets/images/service/placeholder.jpg');
          @endphp
          <tr>
            <td>{{ ($rows->currentPage()-1)*$rows->perPage()+$i+1 }}</td>
               <td>
      <a href="{{ $s->image_url }}" target="_blank" rel="noopener">
        <img src="{{ $s->image_url }}" alt="{{ $s->title }}"
             style="width:68px;height:46px;object-fit:cover;border:1px solid #eee;border-radius:6px">
      </a>
    </td>
            <td>{{ $s->title }}</td>
            <td>{{ $s->sort_order }}</td>
            <td>
              @if($s->is_active)
                <span class="badge bg-success">Active</span>
              @else
                <span class="badge bg-secondary">Off</span>
              @endif
            </td>
            <td class="actions">
              <a href="{{ route('Dashboard.admin.services-mgmt.edit', $s) }}" title="Edit">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('Dashboard.admin.services-mgmt.delete', $s) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="border:none; background:none; padding:0;" onclick="return confirm('Delete this service?')" title="Delete">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6">No services found.</td> {{-- colspan +1 because of Image column --}}
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Pagination --}}
  @if(method_exists($rows,'links'))
    {{ $rows->links() }}
  @endif
</div>
@endsection
