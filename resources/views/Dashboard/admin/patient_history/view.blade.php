@extends("Layout.layouttwo")
@section("AdminContent")

@php
  use Illuminate\Support\Str;

  $v = function($x){
    if(is_null($x) || $x === '') return '—';
    return $x;
  };

  $asList = function($raw){
    if(is_null($raw) || $raw === '') return null;

    $decoded = json_decode($raw, true);
    if(json_last_error() === JSON_ERROR_NONE && is_array($decoded)){
      $decoded = array_values(array_filter($decoded, fn($i)=> trim((string)$i) !== ''));
      return count($decoded) ? $decoded : null;
    }
    return null;
  };

  $fmtDate = function($date){
    if(!$date) return '—';
    try { return \Carbon\Carbon::parse($date)->format('d M Y'); } catch (\Exception $e){ return $date; }
  };

  $pain = is_null($row->pain_level) ? null : (int)$row->pain_level;
  $painPct = is_null($pain) ? 0 : max(0, min(100, ($pain/10)*100));
  $painTone = 'good';
  if(!is_null($pain)){
    if($pain >= 7) $painTone = 'danger';
    elseif($pain >= 4) $painTone = 'amber';
  }

  $initials = function($name){
    $name = trim((string)$name);
    if($name==='') return 'PT';
    $p = preg_split('/\s+/', $name);
    $a = strtoupper(substr($p[0] ?? 'P',0,1));
    $b = strtoupper(substr($p[count($p)-1] ?? 'T',0,1));
    return $a.$b;
  };

  $chip = function($label, $value){
    return '<span class="chip"><span class="chip-k">'.$label.':</span><span class="chip-v">'.$value.'</span></span>';
  };
@endphp

<style>
  /* =========================
    SCOPE (no clash with dashboard theme)
  ========================= */
  #patient-history-report{
    --mint:#bae0db;
    --teal:#6f8f88;
    --teal-dark:#4f6f69;
    --ink:#0b1220;
    --muted:#5b6b84;
    --border:#e6eef0;
    --soft:#f5faf9;

    --danger:#ef4444;
    --amber:#f59e0b;
    --good:#10b981;
  }

  #patient-history-report .report-shell{
    padding:22px 18px;
    background: linear-gradient(180deg,#f3f8f7 0%, #ffffff 70%);
  }

  #patient-history-report .report-card{
    background:#fff;
    border:1px solid rgba(111,143,136,.22);
    border-radius:20px;
    box-shadow: 0 18px 50px rgba(15,23,42,.08);
    overflow:hidden;
    max-width: 1280px;
    margin: 0 auto;
  }

  /* Header */
  #patient-history-report .report-top{
    padding:22px 22px 16px;
    border-bottom:1px dashed rgba(148,163,184,.55);
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap:16px;
    background: linear-gradient(135deg, #ffffff 0%, #f3fbf9 100%);
  }

  #patient-history-report .brandline{ display:flex; align-items:center; gap:14px; }

  #patient-history-report .avatar{
    width:56px;height:56px;border-radius:999px;
    display:flex;align-items:center;justify-content:center;
    font-weight:900;font-size:15px;letter-spacing:.6px;
    border:2px solid rgba(186,224,219,.95);
    background:#eaf7f4;color:#071019;text-transform:uppercase;
    flex:0 0 56px;
  }

  #patient-history-report .rtitle{
    margin:0;
    font-size:22px;
    font-weight:950;
    color:var(--ink);
    letter-spacing:.2px;
  }

  #patient-history-report .rsub{
    margin-top:6px;
    font-size:14px;
    color:var(--muted);
    line-height:1.5;
  }

  /* Actions */
  #patient-history-report .top-actions{ display:flex; gap:10px; flex-wrap:wrap; justify-content:flex-end; align-items:center; }

  #patient-history-report .btn-soft,
  #patient-history-report .btn-main{
    border-radius:999px;
    padding:10px 14px;
    font-size:13px;
    font-weight:900;
    display:inline-flex; align-items:center; gap:9px;
    text-decoration:none;
    transition:.18s ease;
    white-space:nowrap;
  }

  #patient-history-report .btn-soft{
    border:1px solid var(--border);
    background:#fff;
    color:var(--ink);
  }
  #patient-history-report .btn-soft:hover{
    background:var(--soft);
    border-color:rgba(111,143,136,.55);
    transform:translateY(-1px);
  }

  #patient-history-report .btn-main{
    border:none;
    background:linear-gradient(135deg,var(--teal),var(--mint));
    color:#071019;
  }
  #patient-history-report .btn-main:hover{
    background:linear-gradient(135deg,var(--teal-dark),var(--teal));
    color:#fff;
    transform:translateY(-1px);
  }

  /* Dropdown (Export) */
  #patient-history-report .dropdown-menu{
    border:1px solid var(--border);
    border-radius:14px;
    box-shadow: 0 18px 40px rgba(15,23,42,.10);
    overflow:hidden;
    padding:6px;
    min-width: 190px;
  }
  #patient-history-report .dropdown-item{
    border-radius:10px;
    padding:10px 10px;
    font-weight:850;
    font-size:13px;
    display:flex;
    align-items:center;
    gap:10px;
  }
  #patient-history-report .dropdown-item:hover{
    background:#f2fbf8;
  }

  /* Chips */
  #patient-history-report .chips{
    padding:14px 22px 6px;
    display:flex;
    gap:10px;
    flex-wrap:wrap;
  }

  #patient-history-report .chip{
    border:1px solid var(--border);
    background:#fff;
    border-radius:999px;
    padding:9px 12px;
    font-size:13px;
    font-weight:950;
    color:var(--ink);
    display:inline-flex; gap:8px; align-items:center;
    box-shadow: 0 6px 18px rgba(15,23,42,.04);
  }
  #patient-history-report .chip-k{ color:var(--muted); font-weight:950; }
  #patient-history-report .chip-v{ color:var(--ink); }

  /* Body grid */
  #patient-history-report .report-body{ padding:16px 22px 22px; }

  #patient-history-report .grid{
    display:grid;
    grid-template-columns: 1.25fr .9fr;
    gap:16px;
  }
  @media(max-width: 1100px){
    #patient-history-report .grid{ grid-template-columns:1fr; }
    #patient-history-report .report-top{ flex-direction:column; }
    #patient-history-report .top-actions{ justify-content:flex-start; }
  }

  /* Cards/Sections */
  #patient-history-report .sec{
    border:1px solid #edf2f5;
    border-radius:16px;
    overflow:hidden;
    background:#fff;
  }
  #patient-history-report .sec-h{
    background:linear-gradient(135deg,#ffffff,#eef8f6);
    border-bottom:1px solid #e6edf0;
    padding:12px 14px;
    font-size:13px;
    font-weight:950;
    letter-spacing:.6px;
    text-transform:uppercase;
    color:var(--ink);
  }
  #patient-history-report .sec-b{ padding:14px; }

  /* Key/Value rows */
  #patient-history-report .kv{
    display:grid;
    grid-template-columns: 220px 1fr;
    gap:12px;
    padding:10px 0;
    border-bottom:1px dashed #eef2f5;
  }
  #patient-history-report .kv:last-child{ border-bottom:none; }

  @media(max-width: 600px){
    #patient-history-report .kv{ grid-template-columns: 140px 1fr; }
  }

  #patient-history-report .k{
    font-size:13px;
    color:var(--muted);
    font-weight:950;
  }
  #patient-history-report .val{
    font-size:15px;
    color:var(--ink);
    font-weight:800;
    line-height:1.7;
    word-break:break-word;
  }

  #patient-history-report .text-box{
    padding:12px 14px;
    border:1px solid #eef2f5;
    background:#fbfdff;
    border-radius:14px;
    font-size:15px;
    color:var(--ink);
    line-height:1.7;
    font-weight:800;
  }

  #patient-history-report .tags{ display:flex; gap:8px; flex-wrap:wrap; }
  #patient-history-report .tag{
    background:#fff;
    border:1px solid #e8eef2;
    border-radius:999px;
    padding:8px 12px;
    font-size:12px;
    font-weight:950;
    color:#0f172a;
  }

  /* Pain box */
  #patient-history-report .pain-box{
    border:1px solid #eef2f5;
    background:#fbfdff;
    border-radius:16px;
    padding:14px;
  }
  #patient-history-report .pain-top{
    display:flex; justify-content:space-between; align-items:center;
    margin-bottom:10px;
  }
  #patient-history-report .pain-label{
    font-size:13px;
    color:var(--muted);
    font-weight:950;
    text-transform:uppercase;
    letter-spacing:.6px;
  }
  #patient-history-report .pain-badge{
    font-size:13px;
    font-weight:950;
    padding:8px 12px;
    border-radius:999px;
    color:#fff;
  }
  #patient-history-report .tone-good{ background:var(--good); }
  #patient-history-report .tone-amber{ background:var(--amber); }
  #patient-history-report .tone-danger{ background:var(--danger); }

  #patient-history-report .bar{
    height:12px;
    background:#eaf0f3;
    border-radius:999px;
    overflow:hidden;
  }
  #patient-history-report .bar > span{
    display:block;
    height:100%;
    width:0%;
    background:linear-gradient(90deg,var(--good),var(--amber),var(--danger));
    border-radius:999px;
  }

  /* Signature */
  #patient-history-report .sign{
    display:grid;
    grid-template-columns: 1fr 1fr;
    gap:12px;
  }
  #patient-history-report .sign .box{
    border:1px dashed #dbe5ea;
    border-radius:16px;
    padding:14px;
    background:#fbfdff;
  }
  #patient-history-report .sign .line{
    margin-top:20px;
    height:1px;
    background:#dbe5ea;
  }
  #patient-history-report .sign small{
    color:var(--muted);
    font-weight:900;
    font-size:12px;
  }

  /* Print */
  @media print{
    #patient-history-report .top-actions{ display:none !important; }
    #patient-history-report .report-shell{ padding:0 !important; background:#fff !important; }
    #patient-history-report .report-card{ box-shadow:none !important; border:1px solid #e5e7eb !important; }
  }
</style>

<div class="container-fluid report-shell" id="patient-history-report">
  <div class="report-card">

    <div class="report-top">
      <div class="brandline">
        <div class="avatar">{{ $initials($row->patient_full_name) }}</div>
        <div>
          <div class="rtitle">Patient Medical History Report</div>
          <div class="rsub">
            Patient: <strong>{{ $v($row->patient_full_name) }}</strong>
            • Report ID: <strong>#{{ $row->id }}</strong>
            • Submitted: <strong>{{ $fmtDate($row->created_at) }}</strong>
          </div>
        </div>
      </div>

      <div class="top-actions">
        <a href="{{ route('Dashboard.admin.patient_history.index') }}" class="btn-soft">
          <i class="fas fa-arrow-left"></i> Back
        </a>

        <div class="dropdown">
          <button class="btn-soft dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-download"></i> Export
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="{{ route('Dashboard.admin.patient_history.export.pdf', $row->id) }}">
                <i class="fas fa-file-pdf"></i> PDF
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('Dashboard.admin.patient_history.export.csv', $row->id) }}">
                <i class="fas fa-file-csv"></i> CSV
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('Dashboard.admin.patient_history.export.word', $row->id) }}">
                <i class="fas fa-file-word"></i> Word
              </a>
            </li>
          </ul>
        </div>

        <button onclick="window.print()" class="btn-main" type="button">
          <i class="fas fa-print"></i> Print
        </button>
      </div>
    </div>

    <div class="chips">
      {!! $chip('Age', $v($row->age).' yrs') !!}
      {!! $chip('Gender', $v($row->gender)) !!}
      {!! $chip('DOB', $fmtDate($row->date_of_birth)) !!}
      {!! $chip('Phone', $v($row->contact_number)) !!}
      {!! $chip('Email', e($v($row->email_address))) !!}
    </div>

    <div class="report-body">
      <div class="grid">

        {{-- LEFT --}}
        <div>

          <div class="sec mb-3">
            <div class="sec-h">Patient Information</div>
            <div class="sec-b">
              <div class="kv"><div class="k">Full Name</div><div class="val">{{ $v($row->patient_full_name) }}</div></div>
              <div class="kv"><div class="k">Occupation</div><div class="val">{{ $v($row->occupation) }}</div></div>
              <div class="kv"><div class="k">Home Address</div><div class="val">{{ $v($row->home_address) }}</div></div>
            </div>
          </div>

          <div class="sec mb-3">
            <div class="sec-h">Complaint & Pain Details</div>
            <div class="sec-b">
              <div class="kv">
                <div class="k">Primary Complaint</div>
                <div class="val"><div class="text-box">{{ $v($row->primary_complaint) }}</div></div>
              </div>

              <div class="kv">
                <div class="k">Pain Location</div>
                <div class="val">
                  @php $list = $asList($row->pain_details_location); @endphp
                  @if($list)
                    <div class="tags">@foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach</div>
                  @else
                    {{ $v($row->pain_details_location) }}
                  @endif
                </div>
              </div>

              <div class="kv">
                <div class="k">Pain Type</div>
                <div class="val">
                  @php $list = $asList($row->pain_type); @endphp
                  @if($list)
                    <div class="tags">@foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach</div>
                  @else
                    {{ $v($row->pain_type) }}
                  @endif
                </div>
              </div>

              <div class="kv"><div class="k">Pain Worse During</div><div class="val">{{ $v($row->pain_worse_during) }}</div></div>
              <div class="kv"><div class="k">Pain Reduction</div><div class="val">{{ $v($row->pain_reduction) }}</div></div>

              <div class="kv">
                <div class="k">Problem Timeline</div>
                <div class="val">
                  <div class="kv" style="border-bottom:none; padding:0; grid-template-columns:140px 1fr;">
                    <div class="k">Problem Start</div><div class="val">{{ $v($row->problem_start) }}</div>
                  </div>
                  <div class="kv" style="border-bottom:none; padding:8px 0 0; grid-template-columns:140px 1fr;">
                    <div class="k">Cause</div><div class="val">{{ $v($row->problem_cause) }}</div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="sec mb-3">
            <div class="sec-h">Medical History</div>
            <div class="sec-b">
              <div class="kv">
                <div class="k">Past Medical History</div>
                <div class="val">
                  @php $list = $asList($row->past_medical_history); @endphp
                  @if($list)
                    <div class="tags">@foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach</div>
                  @else
                    {{ $v($row->past_medical_history) }}
                  @endif
                </div>
              </div>

              <div class="kv"><div class="k">Injury History</div><div class="val">{{ $v($row->injury_history) }}</div></div>

              <div class="kv">
                <div class="k">Surgical History</div>
                <div class="val">
                  {{ $v($row->surgical_history) }}
                  <div style="margin-top:10px;" class="tags">
                    <span class="tag">Type: {{ $v($row->surgery_type) }}</span>
                    <span class="tag">Year: {{ $v($row->surgery_year) }}</span>
                  </div>
                  <div style="margin-top:10px;" class="text-box">{{ $v($row->additional_surgery) }}</div>
                </div>
              </div>

              <div class="kv">
                <div class="k">Allergies</div>
                <div class="val">
                  @php $list = $asList($row->allergies); @endphp
                  @if($list)
                    <div class="tags">@foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach</div>
                  @else
                    {{ $v($row->allergies) }}
                  @endif
                </div>
              </div>

              <div class="kv">
                <div class="k">Medication Status</div>
                <div class="val">
                  {{ $v($row->medication_status) }}
                  <div style="margin-top:10px;" class="text-box">{{ $v($row->medication_info) }}</div>
                </div>
              </div>

              <div class="kv"><div class="k">Post Surgical Medical Clearance</div><div class="val">{{ $v($row->post_surgical_medical_clearance) }}</div></div>
            </div>
          </div>

          <div class="sec">
            <div class="sec-h">Goals & Functional Status</div>
            <div class="sec-b">
              <div class="kv">
                <div class="k">Goals from Therapy</div>
                <div class="val">
                  @php $list = $asList($row->goals_from_therapy); @endphp
                  @if($list)
                    <div class="tags">@foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach</div>
                  @else
                    {{ $v($row->goals_from_therapy) }}
                  @endif
                </div>
              </div>

              <div class="kv">
                <div class="k">Other Goals</div>
                <div class="val"><div class="text-box">{{ $v($row->other_goals) }}</div></div>
              </div>

              <div class="kv">
                <div class="k">Functional Limitations</div>
                <div class="val">
                  @php $list = $asList($row->functional_limitations); @endphp
                  @if($list)
                    <div class="tags">@foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach</div>
                  @else
                    {{ $v($row->functional_limitations) }}
                  @endif
                </div>
              </div>

              <div class="kv"><div class="k">Lifestyle Activity Level</div><div class="val">{{ $v($row->lifestyle_activity_level) }}</div></div>

              <div class="kv">
                <div class="k">Exercise Routine</div>
                <div class="val">
                  @php $list = $asList($row->exercise_routine); @endphp
                  @if($list)
                    <div class="tags">@foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach</div>
                  @else
                    {{ $v($row->exercise_routine) }}
                  @endif
                </div>
              </div>
            </div>
          </div>

        </div>

        {{-- RIGHT --}}
        <div>

          <div class="sec mb-3">
            <div class="sec-h">Pain Score</div>
            <div class="sec-b">
              <div class="pain-box">
                <div class="pain-top">
                  <div class="pain-label">Pain Level (0 - 10)</div>
                  <div class="pain-badge tone-{{ $painTone }}">
                    {{ is_null($pain) ? '—' : $pain.'/10' }}
                  </div>
                </div>
                <div class="bar"><span style="width: {{ $painPct }}%"></span></div>
              </div>
            </div>
          </div>

          <div class="sec mb-3">
            <div class="sec-h">Emergency Contact</div>
            <div class="sec-b">
              <div class="kv"><div class="k">Name</div><div class="val">{{ $v($row->emergency_contact_name) }}</div></div>
              <div class="kv"><div class="k">Number</div><div class="val">{{ $v($row->emergency_contact_number) }}</div></div>
            </div>
          </div>

          <div class="sec mb-3">
            <div class="sec-h">Women Health</div>
            <div class="sec-b">
              <div class="kv"><div class="k">Women Health Status</div><div class="val">{{ $v($row->women_health_status) }}</div></div>
              <div class="kv"><div class="k">Pregnant</div><div class="val">{{ $v($row->pregnant_status) }}</div></div>
              <div class="kv"><div class="k">Recent Delivery</div><div class="val">{{ $v($row->recent_delivery) }}</div></div>
            </div>
          </div>

          <div class="sec mb-3">
            <div class="sec-h">Home / Virtual Safety</div>
            <div class="sec-b">
              @php $list = $asList($row->home_virtual_session_safety); @endphp
              @if($list)
                <div class="tags">@foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach</div>
              @else
                <div class="text-box">{{ $v($row->home_virtual_session_safety) }}</div>
              @endif
            </div>
          </div>

          <div class="sec">
            <div class="sec-h">Declaration & Signature</div>
            <div class="sec-b">
              <div class="kv"><div class="k">Declaration Agreement</div><div class="val">{{ $v($row->declaration_agreement) }}</div></div>
              <div class="kv"><div class="k">Patient Signature</div><div class="val">{{ $v($row->patient_signature) }}</div></div>
              <div class="kv"><div class="k">Signature Date</div><div class="val">{{ $fmtDate($row->signature_date) }}</div></div>

              <div class="sign" style="margin-top:12px;">
                <div class="box">
                  <small>Patient / Guardian</small>
                  <div class="line"></div>
                </div>
                <div class="box">
                  <small>Doctor / Therapist</small>
                  <div class="line"></div>
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
