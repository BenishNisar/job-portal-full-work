@extends('Layout.layouttwo')
@section('AdminContent')

<style>
  :root{
    --mint:#bae0db;
    --teal:#7a958f;
    --teal-dark:#6a857f;
    --bg:#f6fbfa;
    --card:#ffffff;
    --text:#0f172a;
    --muted:#64748b;
    --border: rgba(122,149,143,.22);
    --shadow: 0 12px 30px rgba(15, 23, 42, .08);
  }

  .container-fluid{ padding-left:0; padding-right:0; }

  .page-wrap{
    margin: 18px 10px 26px;
    padding: 14px;
    background: var(--bg);
    border-radius: 18px;
  }

  .page-head{
    background: linear-gradient(135deg, rgba(186,224,219,.55), rgba(122,149,143,.25));
    border: 1px solid rgba(122,149,143,.25);
    border-radius: 18px;
    padding: 16px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap: 14px;
    box-shadow: 0 10px 22px rgba(122,149,143,.16);
    flex-wrap: wrap;
  }

  .page-head h1{
    margin:0;
    font-size: 22px;
    font-weight: 900;
    color: var(--text);
    letter-spacing:.2px;
  }

  .page-head p{
    margin: 4px 0 0;
    font-size: 13px;
    color: rgba(15,23,42,.70);
  }

  .head-right{
    display:flex;
    gap: 10px;
    align-items:center;
    flex-wrap: wrap;
    justify-content:flex-end;
  }

  .searchbox{
    position: relative;
    min-width: 260px;
    width: 34vw;
    max-width: 420px;
  }

  .searchbox i{
    position:absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 16px;
    color: rgba(15,23,42,.45);
    font-size: 14px;
  }

  .search-input{
    width:100%;
    padding: 11px 16px 11px 42px;
    border: 1px solid rgba(122,149,143,.35);
    border-radius: 999px;
    outline:none;
    font-size: 14px;
    background: rgba(255,255,255,.95);
    transition: .2s;
    box-shadow: 0 8px 18px rgba(122,149,143,.12);
  }

  .search-input:focus{
    border-color: rgba(122,149,143,.70);
    box-shadow: 0 14px 26px rgba(122,149,143,.20);
  }

  .btn-mint{
    border: 1px solid rgba(122,149,143,.30);
    background: rgba(255,255,255,.92);
    color: rgba(15,23,42,.82);
    padding: 10px 16px;
    border-radius: 999px;
    font-weight: 900;
    font-size: 13px;
    cursor: pointer;
    transition: .18s;
    box-shadow: 0 10px 18px rgba(122,149,143,.12);
    text-decoration: none;
    display:inline-flex;
    align-items:center;
    gap: 8px;
    white-space: nowrap;
  }

  .btn-mint:hover{
    transform: translateY(-1px);
    border-color: rgba(122,149,143,.55);
    box-shadow: 0 16px 28px rgba(122,149,143,.18);
    color: rgba(15,23,42,.90);
  }

  .card-shell{
    margin-top: 14px;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 18px;
    box-shadow: var(--shadow);
    overflow:hidden;
  }

  .card-top{
    padding: 12px 14px;
    border-bottom: 1px solid rgba(122,149,143,.18);
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap: 10px;
    background: linear-gradient(180deg, rgba(186,224,219,.35), rgba(255,255,255,1));
    flex-wrap: wrap;
  }

  .pill{
    display:inline-flex;
    align-items:center;
    gap: 8px;
    padding: 7px 10px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 900;
    background: rgba(186,224,219,.55);
    color: rgba(15,23,42,.78);
    border: 1px solid rgba(122,149,143,.22);
  }

  .muted{
    color: var(--muted);
    font-size: 13px;
    font-weight: 700;
  }

  .table-wrapper{
    overflow-x:auto;
    -webkit-overflow-scrolling:touch;
    padding-bottom: 22px;
  }

  .table-wrapper::-webkit-scrollbar{ height: 8px; }
  .table-wrapper::-webkit-scrollbar-thumb{ background: rgba(122,149,143,.35); border-radius: 999px; }
  .table-wrapper::-webkit-scrollbar-track{ background: rgba(186,224,219,.25); border-radius: 999px; }

  #settingsTable{
    width:100%;
    margin:0;
    border-collapse: separate;
    border-spacing: 0;
  }

  #settingsTable thead th{
    padding: 14px 12px;
    font-size: 13px;
    font-weight: 900;
    color: var(--text);
    white-space: nowrap;
    background: rgba(186,224,219,.40);
    border-bottom: 1px solid rgba(122,149,143,.18);
  }

  #settingsTable tbody td{
    padding: 17px 12px;
    font-size: 14px;
    white-space: nowrap;
    color: var(--text);
    border-bottom: 1px solid rgba(122,149,143,.14);
    vertical-align: middle;
  }

  #settingsTable tbody tr{
    background:#fff;
    transition: .15s;
  }

  #settingsTable tbody tr:hover{
    background: rgba(186,224,219,.22);
  }

  .stack div{
    font-size: 13px;
    font-weight: 800;
    color: rgba(15,23,42,.78);
    line-height: 1.5;
    white-space: normal;
  }

  .addr{
    max-width: 420px;
    white-space: normal !important;
    line-height: 1.45;
    color: rgba(15,23,42,.78);
    font-size: 13px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .actions{
    display:flex;
    justify-content:center;
    gap: 10px;
  }

  .icon-btn{
    width: 38px;
    height: 38px;
    border-radius: 14px;
    border: 1px solid rgba(122,149,143,.25);
    background: rgba(255,255,255,.95);
    display:inline-flex;
    align-items:center;
    justify-content:center;
    transition: .18s;
    box-shadow: 0 10px 18px rgba(122,149,143,.12);
    padding:0;
    cursor:pointer;
    text-decoration:none;
  }

  .icon-btn i{
    color: var(--teal);
    font-size: 14px;
  }

  .icon-btn:hover{
    transform: translateY(-1px);
    border-color: rgba(122,149,143,.55);
    box-shadow: 0 16px 28px rgba(122,149,143,.18);
  }

  .flash{
    border-radius: 14px;
    border: 1px solid rgba(122,149,143,.25);
    box-shadow: 0 10px 22px rgba(122,149,143,.12);
  }

  @media (max-width: 768px){
    .page-head{ flex-direction: column; align-items: stretch; }
    .head-right{ justify-content: stretch; }
    .searchbox{ width: 100%; min-width: unset; max-width: unset; }
    .addr{ max-width: 260px; }
  }
</style>

<div class="container-fluid mt-3">
  <div class="page-wrap">

    <div class="page-head">
      <div>
        <h1>Contact Settings</h1>
        <p>View and manage contact settings.</p>
      </div>

      <div class="head-right">
        <div class="searchbox">
          <i class="fas fa-search"></i>
          <input type="text" class="search-input" placeholder="Search by note, address, phone, email..." id="settingsSearch">
        </div>

        <a href="{{ route('Dashboard.admin.contact-settings.add') }}" class="btn-mint">
          <i class="fas fa-plus"></i>
          Add New
        </a>
      </div>
    </div>

    @if(session('success'))
      <div class="alert alert-success flash mt-3 mb-0">{{ session('success') }}</div>
    @endif

    <div class="card-shell">
      <div class="card-top">
        <span class="pill">
          <i class="fas fa-sliders-h"></i>
          Total: {{ $settings->count() }}
        </span>
        <span class="muted">Latest records</span>
      </div>

      <div class="table-wrapper">
        <table class="table" id="settingsTable">
          <thead>
            <tr>
              <th style="width:90px;">ID</th>
              <th>Note</th>
              <th>Address</th>
              <th>Phones</th>
              <th>Emails</th>
              <th class="text-center" style="width:140px;">Action</th>
            </tr>
          </thead>

          <tbody>
            @forelse($settings as $s)
              <tr>
                <td style="font-weight:900;">{{ $s->id }}</td>
                <td style="font-weight:800;">{{ $s->note }}</td>

                <td class="addr" title="{{ e($s->address) }}">
                  {{ $s->address }}
                </td>

                <td>
                  <div class="stack">
                    @foreach(($s->phones ?? []) as $p)
                      <div>{{ $p }}</div>
                    @endforeach
                  </div>
                </td>

                <td>
                  <div class="stack">
                    @foreach(($s->emails ?? []) as $e)
                      <div>{{ $e }}</div>
                    @endforeach
                  </div>
                </td>

                <td class="text-center">
                  <div class="actions">
                    <a class="icon-btn" href="{{ route('Dashboard.admin.contact-settings.edit', $s->id) }}" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('Dashboard.admin.contact-settings.destroy', $s->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure to delete?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="icon-btn" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr data-empty="1">
                <td colspan="6" style="padding:24px; text-align:center; color: var(--muted); font-weight:800;">
                  No records yet.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <div class="mt-3">
      {{ $settings->links() }}
    </div>

  </div>
</div>

<script>
  const settingsSearch = document.getElementById('settingsSearch');
  const settingsTable = document.getElementById('settingsTable');

  if (settingsSearch && settingsTable) {
    const tbody = settingsTable.querySelector('tbody');

    settingsSearch.addEventListener('keyup', function () {
      const q = this.value.toLowerCase().trim();
      const rows = Array.from(tbody.querySelectorAll('tr'));

      let visibleCount = 0;

      rows.forEach(row => {
        const isEmptyRow = row.dataset.empty === "1";
        if (isEmptyRow) return;

        const text = row.innerText.toLowerCase();
        const show = text.includes(q);

        row.style.display = show ? '' : 'none';
        if (show) visibleCount++;
      });

      const emptyRow = tbody.querySelector('tr[data-empty="1"]');
      if (emptyRow) {
        emptyRow.style.display = visibleCount === 0 ? '' : 'none';
      }
    });
  }
</script>

@endsection
