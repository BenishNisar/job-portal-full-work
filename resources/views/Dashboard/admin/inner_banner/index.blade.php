@extends('Layout.layouttwo')

@section('AdminContent')
<style>
  /* ====== Inner Banner Manager (cards) ====== */
  .ib-header {
    display: flex;
    gap: 12px;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
  }
  .ib-title {
    font-size: 23px;
    font-weight: 800;
    margin: 0;
  }
  .ib-actions {
    display: flex;
    gap: 10px;
    align-items: center;
  }
  .ib-search {
    position: relative;
  }
  .ib-search input {
    padding: 10px 14px 10px 36px;
    border: 1px solid #e3e3e3;
    border-radius: 24px;
    outline: none;
    min-width: 240px;
  }
  .ib-search svg {
    position: absolute;
    left: 10px;
    top: 9px;
    width: 18px;
    height: 18px;
    opacity: 0.7;
  }
  .ib-add {
    background: #1d3a7d;
    color: #fff;
    border: 0;
    border-radius: 24px;
    padding: 10px 16px;
    text-decoration: none;
  }
  .ib-add:hover { background: #fc9928; color: #fff; }

  .ib-grid {
    --min: 260px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(var(--min), 1fr));
    gap: 16px;
    margin-top: 16px;
  }

  .ib-card {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    background: #f7f7f7;
    transition: transform .18s ease, box-shadow .18s ease;
  }
  .ib-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 26px rgba(0,0,0,0.12);
  }

  .ib-thumb {
    position: relative;
    width: 100%;
    aspect-ratio: 16/9;
    background: linear-gradient(135deg, #f0f0f0, #fafafa);
    display: block;
  }
  .ib-thumb > img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display:block;
  }
  .ib-badge-id {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(0,0,0,.55);
    color: #fff;
    font-size: 12px;
    padding: 4px 8px;
    border-radius: 999px;
  }
  .ib-actions-top {
    position: absolute;
    top: 10px;
    right: 10px;
    display:flex;
    gap:8px;
    opacity: 0;
    transform: translateY(-6px);
    transition: .18s ease;
  }
  .ib-card:hover .ib-actions-top { opacity: 1; transform: translateY(0); }

  .ib-icon-btn {
    background: rgba(255,255,255,.92);
    border: 0;
    border-radius: 999px;
    width: 36px;
    height: 36px;
    display:grid;
    place-items:center;
    cursor:pointer;
  }
  .ib-icon-btn:hover { background: #fff; }

  .ib-titlebar {
    position: absolute;
    left: 0; right: 0; bottom: 0;
    display:flex;
    align-items: flex-end;
    justify-content: space-between;
    padding: 12px;
    background: linear-gradient(to top, rgba(0,0,0,.55), rgba(0,0,0,0));
    color: #fff;
  }
  .ib-name {
    font-weight: 700;
    font-size: 16px;
    margin: 0;
    line-height: 1.2;
    text-shadow: 0 1px 2px rgba(0,0,0,.5);
  }

  .ib-card-foot {
    display:flex;
    align-items:center;
    justify-content: space-between;
    padding: 10px 12px 12px;
    gap:8px;
  }
  .ib-foot-left {
    font-size: 12px;
    color:#666;
  }
  .ib-foot-right {
    display:flex;
    gap:8px;
  }
  .btn-outline-gray {
    border:1px solid #ddd;
    background: #fff;
    color:#333;
    padding:6px 10px;
    border-radius: 8px;
    text-decoration:none;
    font-size: 13px;
  }
  .btn-outline-gray:hover { border-color:#bbb; }

  /* empty state */
  .ib-empty {
    border:2px dashed #e6e6e6;
    border-radius: 16px;
    padding: 36px;
    text-align:center;
    color:#777;
    background:#fcfcfc;
  }
  .ib-empty a { color:#1d3a7d ; text-decoration: none; }
  .ib-empty a:hover { text-decoration: underline; }

  /* modal image */
  .ib-modal-img {
    width: 100%;
    height: auto;
    display:block;
    border-radius: 8px;
  }

  @media (max-width: 576px) {
    .ib-search input { min-width: 180px; }
  }
</style>

<div class="container-fluid mt-4">
  <div class="ib-header">
    <h1 class="ib-title">Inner Page Banners</h1>

    <div class="ib-actions">
      <div class="ib-search">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path d="M10 2a8 8 0 105.293 14.293l3.707 3.707 1.414-1.414-3.707-3.707A8 8 0 0010 2zm0 2a6 6 0 110 12A6 6 0 0110 4z"/>
        </svg>
        <input id="bannerSearch" type="search" placeholder="Search banner by name...">
      </div>

      <a href="{{ route('Dashboard.admin.inner_banner.add') }}" class="ib-add">+ Add New</a>
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
  @endif

  @if($banners->count() === 0)
    <div class="ib-empty mt-3">
      <p class="mb-2">No banners yet.</p>
      <a href="{{ route('Dashboard.admin.inner_banner.add') }}">Add your first banner</a>
    </div>
  @else
    <div class="ib-grid" id="bannerGrid">
      @foreach($banners as $item)
        <div class="ib-card" data-name="{{ Str::lower($item->name) }}">
          <div class="ib-thumb">
            @if($item->image)
              <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
            @endif

            <span class="ib-badge-id">#{{ $item->id }}</span>

            <div class="ib-actions-top">
              <!-- Preview -->
              <button type="button"
                      class="ib-icon-btn js-preview"
                      data-bs-toggle="modal"
                      data-bs-target="#bannerPreviewModal"
                      data-title="{{ $item->name }}"
                      data-src="{{ asset($item->image) }}"
                      title="Preview">
                <i class="bi bi-eye"></i>
              </button>

              <!-- Edit -->
              <a class="ib-icon-btn"
                 href="{{ route('Dashboard.admin.inner_banner.edit', ['inner' => $item->id]) }}"
                 title="Edit">
                <i class="bi bi-pencil"></i>
              </a>

              <!-- Delete -->
              <form action="{{ route('Dashboard.admin.inner_banner.destroy', ['inner' => $item->id]) }}"
                    method="POST"
                    onsubmit="return confirm('Delete this banner?')">
                @csrf @method('DELETE')
                <button type="submit" class="ib-icon-btn" title="Delete">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </div>

            <div class="ib-titlebar">
              <h3 class="ib-name" title="{{ $item->name }}">{{ $item->name }}</h3>
            </div>
          </div>

          <div class="ib-card-foot">
            <div class="ib-foot-left">
              <span>Updated: {{ optional($item->updated_at)->diffForHumans() }}</span>
            </div>
            <div class="ib-foot-right">
              <a class="btn-outline-gray"
                 href="{{ route('Dashboard.admin.inner_banner.edit', ['inner' => $item->id]) }}">Edit</a>
              <form action="{{ route('Dashboard.admin.inner_banner.destroy', ['inner' => $item->id]) }}"
                    method="POST"
                    onsubmit="return confirm('Delete this banner?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn-outline-gray">Delete</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="mt-3">
      {{ $banners->links() }}
    </div>
  @endif
</div>

<!-- Preview Modal (Bootstrap) -->
<div class="modal fade" id="bannerPreviewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:0;">
        <h5 class="modal-title" id="previewTitle">Banner Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pt-0">
        <img id="previewImg" class="ib-modal-img" src="" alt="Preview">
      </div>
      <div class="modal-footer" style="border-top:0;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  // Preview modal wiring
  document.querySelectorAll('.js-preview').forEach(btn => {
    btn.addEventListener('click', () => {
      const title = btn.getAttribute('data-title') || 'Banner Preview';
      const src   = btn.getAttribute('data-src')   || '';
      document.getElementById('previewTitle').textContent = title;
      const img = document.getElementById('previewImg');
      img.src = src;
      img.alt = title;
    });
  });

  // Client-side search filter
  const search = document.getElementById('bannerSearch');
  const cards  = document.querySelectorAll('#bannerGrid .ib-card');
  if (search) {
    search.addEventListener('input', () => {
      const q = search.value.trim().toLowerCase();
      cards.forEach(card => {
        const name = card.getAttribute('data-name') || '';
        card.style.display = name.includes(q) ? '' : 'none';
      });
    });
  }
</script>
@endsection
