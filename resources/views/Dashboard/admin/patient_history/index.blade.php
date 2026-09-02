@extends("Layout.layouttwo")
@section("AdminContent")

<style>
    :root{
        --mint: #bae0db;
        --teal: #7a958f;
        --teal-dark: #58716b;
        --ink: #111827;
        --muted: #6b7280;
        --border-soft: #e5e7eb;
        --danger:#ef4444;
        --amber:#f59e0b;
        --good:#10b981;
    }

    .users-shell{ margin-top:16px; margin-bottom:16px; }

    .users-card{
        background:#fff;
        border-radius:14px;
        border:1px solid rgba(122,149,143,0.18);
        box-shadow:0 14px 30px rgba(15,23,42,0.06);
        padding:14px 14px 10px;
    }

    .page-head{
        display:flex;
        align-items:flex-start;
        justify-content:space-between;
        gap:12px;
        padding:4px 2px 10px;
        border-bottom:1px dashed rgba(148,163,184,0.55);
        margin-bottom:8px;
    }
    .page-head-title{ display:flex; flex-direction:column; gap:2px; }
    .page-head-title h1{
        font-size:22px; font-weight:700; color:var(--ink); margin:0;
    }
    .meta{ font-size:12px; color:var(--muted); }

    .toolbar{
        display:flex; align-items:center; gap:8px;
        flex-wrap:wrap; justify-content:flex-end;
    }

    .search-wrapper{ position:relative; }
    .search-wrapper i{
        position:absolute; left:11px; top:50%;
        transform:translateY(-50%);
        font-size:13px; color:#9ca3af;
    }
    .search-field{
        height:36px;
        border:1px solid var(--border-soft);
        border-radius:999px;
        padding:0 12px 0 30px;
        min-width:280px;
        outline:none;
        font-size:13px;
        color:var(--ink);
        background:#f9fafb;
        transition:border-color .18s ease, box-shadow .18s ease, background-color .18s ease;
    }
    .search-field::placeholder{ color:#9ca3af; font-weight:300; }
    .search-field:focus{
        border-color:var(--teal);
        background:#fff;
        box-shadow:0 0 0 0.12rem rgba(122,149,143,0.28);
    }

    .btn-primary{
        background:linear-gradient(135deg,var(--teal),var(--mint));
        border:none; color:#0b1620;
        border-radius:999px;
        padding:8px 15px;
        font-weight:600;
        font-size:13px;
        display:inline-flex; align-items:center; gap:6px;
    }
    .btn-primary:hover{
        background:linear-gradient(135deg,var(--teal-dark),var(--teal));
        color:#fff;
    }

    .table-wrapper{ margin-top:10px; }
    .table-responsive{
        border-radius:12px;
        border:1px solid #eef0f3;
        overflow:hidden;
        background:#fff;
    }
    table.table{ margin:0; font-size:13px; }
    thead th{
        background:linear-gradient(135deg,#f8fafc,#edf6f4);
        border-bottom:1px solid #e2e8f0;
        color:#111827;
        font-weight:600;
        padding-top:9px;
        padding-bottom:9px;
        white-space:nowrap;
    }
    tbody td{ vertical-align:middle; border-color:#f1f5f9; color:#111827; }
    tbody tr:hover{ background:#f9fdfc; }

    .avatar{
        width:38px; height:38px; border-radius:50%;
        display:flex; align-items:center; justify-content:center;
        font-weight:800; font-size:12px; letter-spacing:.5px;
        border:2px solid rgba(186,224,219,0.8);
        background:#f3faf8;
        color:#0b1620;
        text-transform:uppercase;
        flex:0 0 38px;
    }
    .user-cell{ display:flex; align-items:center; gap:10px; min-width:220px; }
    .user-name{ font-weight:600; color:#111827; font-size:13px; margin-bottom:2px; }
    .user-sub{ font-size:11px; color:#6b7280; line-height:1.1; }

    .chip{
        display:inline-flex; align-items:center;
        padding:3px 10px; border-radius:999px;
        font-size:11px; font-weight:700;
        border:1px solid #e5e7eb;
        background:#fff; color:#374151;
        gap:6px; white-space:nowrap;
    }
    .chip-dot{ width:8px; height:8px; border-radius:999px; background:var(--teal); }

    .chip.pain-low .chip-dot{ background:var(--good); }
    .chip.pain-mid .chip-dot{ background:var(--amber); }
    .chip.pain-high .chip-dot{ background:var(--danger); }

    .actions{ display:flex; justify-content:center; gap:6px; }
    .icon-btn{
        display:inline-flex; align-items:center; justify-content:center;
        width:32px; height:32px;
        border-radius:9px;
        border:1px solid #e5e7eb;
        background:#fff;
        color:#4b5563;
        padding:0;
        transition:background-color .18s ease, border-color .18s ease, transform .1s ease, color .18s ease;
    }
    .icon-btn:hover{
        background:#f3faf8;
        border-color:var(--teal);
        color:var(--teal-dark);
        transform:translateY(-1px);
    }

    .text-end{ text-align:end; }

    .empty-block{ text-align:center; padding:22px 10px; }
    .empty-block-title{ font-weight:600; font-size:13px; margin-bottom:2px; color:#111827; }
    .empty-block-sub{ font-size:12px; color:#6b7280; }

    tfoot td{ border-top:1px solid #e5e7eb; background:#f9fafb; }

    /* Users jaisi pagination wrap and styling */
    .pagination-wrap{
        padding: 16px 14px 18px;
        margin-top: 10px;
        border-top: 1px solid rgba(122,149,143,.18);
        background: rgba(186,224,219,.12);
    }

    .pagination{
        margin:0;
        gap: 8px;
    }
    .pagination .page-link{
        border-radius: 12px !important;
        padding: 8px 12px !important;
        color: var(--teal) !important;
        border-color: rgba(122,149,143,.22) !important;
    }
    .pagination .page-link:hover{
        background: rgba(186,224,219,.30) !important;
    }
    .pagination .page-item.active .page-link{
        background: var(--teal) !important;
        border-color: var(--teal) !important;
        color: #fff !important;
    }
    .pagination svg{
        width: 16px !important;
        height: 16px !important;
        max-width: 16px !important;
        max-height: 16px !important;
    }

    @media (max-width:768px){
        .users-card{ padding:10px; border-radius:10px; }
        .page-head{ flex-direction:column; align-items:flex-start; }
        .toolbar{ width:100%; justify-content:flex-start; }
        .search-field{ min-width:0; width:100%; }
        .hide-sm{ display:none; }
        .user-cell{ min-width:0; }
    }
</style>

@php
    use Illuminate\Support\Str;

    $initials = function($name){
        $name = trim((string)$name);
        if($name === '') return 'PT';
        $parts = preg_split('/\s+/', $name);
        $first = strtoupper(substr($parts[0] ?? 'P', 0, 1));
        $last  = strtoupper(substr($parts[count($parts)-1] ?? 'T', 0, 1));
        return $first.$last;
    };

    $painClass = function($lvl){
        if($lvl === null || $lvl === '') return '';
        $lvl = (int)$lvl;
        if($lvl <= 3) return 'pain-low';
        if($lvl <= 6) return 'pain-mid';
        return 'pain-high';
    };
@endphp

<div class="container-fluid users-shell">
    <div class="users-card">

        <div class="page-head">
            <div class="page-head-title">
                <h1>Patient Medical History</h1>
                <div class="meta">
                    Total: {{ $rows->total() }} {{ Str::plural('record',$rows->total()) }}
                    @if(!empty($q))
                        • Search: “{{ $q }}”
                    @endif
                </div>
            </div>

            <div class="toolbar">
                <form method="GET"
                      action="{{ route('Dashboard.admin.patient_history.index') }}"
                      class="d-flex align-items-center flex-wrap"
                      role="search">
                    <div class="search-wrapper">
                        <i class="fas fa-search"></i>
                        <input type="text"
                               name="q"
                               value="{{ $q ?? '' }}"
                               class="search-field"
                               placeholder="Search name, phone, email...">
                    </div>
                </form>
            </div>
        </div>

        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width:70px">#</th>
                            <th>Patient</th>
                            <th class="hide-sm">DOB</th>
                            <th>Age/Gender</th>
                            <th>Contact</th>
                            <th class="hide-sm">Submitted</th>
                            <th style="width:140px" class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($rows as $i => $r)
                            @php
                                $rowNo = ($rows->currentPage()-1)*$rows->perPage() + $i + 1;
                            @endphp

                            <tr>
                                <td>{{ $rowNo }}</td>

                                <td>
                                    <div class="user-cell">
                                        <div class="avatar">{{ $initials($r->patient_full_name) }}</div>
                                        <div>
                                            <div class="user-name">{{ $r->patient_full_name }}</div>
                                            <div class="user-sub">
                                                ID: #{{ $r->id }}
                                                @if(!empty($r->occupation))
                                                    • {{ Str::limit($r->occupation, 22) }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="hide-sm">
                                    {{ $r->date_of_birth ? \Carbon\Carbon::parse($r->date_of_birth)->format('d M Y') : '—' }}
                                </td>

                                <td>
                                    <span class="chip">
                                        <span class="chip-dot"></span>
                                        {{ $r->age }} / {{ $r->gender }}
                                    </span>
                                </td>

                                <td>
                                    <div style="font-size:12px;color:#111827;font-weight:700;">
                                        {{ $r->contact_number }}
                                    </div>
                                    <div class="user-sub">
                                        {{ $r->email_address ?: '—' }}
                                    </div>
                                </td>

                                <td class="hide-sm">
                                    {{ optional($r->created_at)->format('d M Y') }}
                                </td>

                                <td class="text-end">
                                    <div class="actions" style="justify-content:flex-end;">
                                        <a class="icon-btn"
                                           href="{{ route('Dashboard.admin.patient_history.view', $r->id) }}"
                                           title="View Full History">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-block">
                                        <div class="empty-block-title">No patient medical history found</div>
                                        <div class="empty-block-sub">Try clearing the search or check DB records.</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            @if($rows->hasPages())
                <div class="pagination-wrap">
                    {{ $rows->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            @endif

        </div>

    </div>
</div>

@endsection
