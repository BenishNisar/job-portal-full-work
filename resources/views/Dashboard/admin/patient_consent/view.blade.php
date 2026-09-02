@extends("Layout.layouttwo")
@section("AdminContent")

<style>
  :root{
    --mint:#bae0db;
    --teal:#7a958f;
    --teal-dark:#58716b;
    --ink:#0f172a;
    --muted:#64748b;
    --border:#e5e7eb;
    --soft:#f8fafc;
    --soft2:#f1f5f9;

    --good:#10b981;
    --amber:#f59e0b;
    --danger:#ef4444;

    --navy:#1e3a8a;
  }

  .wrap{ margin:16px 0; }
  .cardx{
    background:#fff;
    border-radius:16px;
    border:1px solid rgba(122,149,143,0.18);
    box-shadow:0 14px 30px rgba(15,23,42,0.06);
    overflow:hidden;
  }

  /* ===== HERO HEADER ===== */
  .hero{
    padding:16px 16px 12px;
    background:
      radial-gradient(900px 220px at 30% -20%, rgba(186,224,219,.55), transparent 55%),
      radial-gradient(600px 220px at 95% 0%, rgba(122,149,143,.25), transparent 55%),
      linear-gradient(135deg, #ffffff, #fbfdfc);
    border-bottom:1px solid rgba(148,163,184,0.55);
  }


  .brand{
    display:flex;
    gap:12px;
    align-items:center;
    min-width:260px;
  }



  .title h1{
    margin:0;
    font-size:18px;
    font-weight:800;
    color:var(--ink);
  }
  .title .sub{
    margin-top:2px;
    font-size:12px;
    color:var(--muted);
  }

  .hero-actions{
    display:flex;
    gap:8px;
    align-items:center;
    flex-wrap:wrap;
  }

  .btnx{
    border:none;
    border-radius:999px;
    padding:8px 14px;
    font-weight:700;
    font-size:13px;
    display:inline-flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
    transition:.18s ease;
    cursor:pointer;
    white-space:nowrap;
  }
  .btnx-primary{
    background:linear-gradient(135deg,var(--teal),var(--mint));
    color:#0b1620;
  }
  .btnx-primary:hover{ background:linear-gradient(135deg,var(--teal-dark),var(--teal)); color:#fff; }
  .btnx-ghost{
    background:#fff;
    border:1px solid var(--border);
    color:#334155;
  }
  .btnx-ghost:hover{ border-color:var(--teal); color:var(--teal-dark); background:#f3faf8; }

  /* ===== META STRIP ===== */
  .meta{
    margin-top:12px;
    background:rgba(248,250,252,.9);
    border:1px solid rgba(226,232,240,.9);
    border-radius:14px;
    padding:10px 12px;
  }
  .meta-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:10px;
  }
  .mi{
    padding:8px 10px;
    border-radius:12px;
    background:#fff;
    border:1px solid rgba(226,232,240,.9);
  }
  .mi .l{
    font-size:11px;
    color:var(--muted);
    font-weight:800;
    text-transform:uppercase;
    letter-spacing:.6px;
  }
  .mi .v{
    margin-top:3px;
    font-size:13px;
    color:var(--ink);
    font-weight:800;
  }

  /* ===== BODY LAYOUT ===== */
  .body{
    padding:14px;
  }
  .grid{
    display:grid;
    grid-template-columns: 1.05fr .95fr;
    gap:12px;
    align-items:start;
  }

  .panel{
    border:1px solid var(--border);
    border-radius:14px;
    overflow:hidden;
    background:#fff;
  }
  .ph{
    background:linear-gradient(135deg,var(--soft2),#edf6f4);
    border-left:5px solid var(--teal);
    padding:10px 12px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:8px;
  }
  .ph h3{
    margin:0;
    font-size:13px;
    font-weight:900;
    letter-spacing:.6px;
    text-transform:uppercase;
    color:var(--ink);
  }
  .pb{ padding:12px; }

  /* key-value table */
  .kv{ width:100%; border-collapse:collapse; }
  .kv td{
    padding:9px 8px;
    border-bottom:1px dashed #e5e7eb;
    vertical-align:top;
  }
  .kv tr:last-child td{ border-bottom:none; }
  .k{
    width:45%;
    font-size:11px;
    color:var(--muted);
    font-weight:900;
    text-transform:uppercase;
    letter-spacing:.5px;
  }
  .val{
    font-size:13px;
    font-weight:800;
    color:var(--ink);
  }

  /* status chips */
  .chip{
    display:inline-flex;
    align-items:center;
    gap:8px;
    border:1px solid #e5e7eb;
    background:#fff;
    border-radius:999px;
    padding:5px 10px;
    font-size:12px;
    font-weight:900;
    color:#334155;
    white-space:nowrap;
  }
  .dot{ width:9px; height:9px; border-radius:999px; background:var(--teal); }

  .chip.good .dot{ background:var(--good); }
  .chip.mid .dot{ background:var(--amber); }
  .chip.bad .dot{ background:var(--danger); }

  /* checklist */
  .checklist{
    display:grid;
    grid-template-columns:1fr;
    gap:10px;
  }
  .item{
    display:flex;
    gap:10px;
    align-items:flex-start;
    padding:10px 10px;
    border:1px solid rgba(226,232,240,.9);
    border-radius:14px;
    background:linear-gradient(180deg,#fff,#fcfefe);
  }
  .tick{
    width:26px; height:26px;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:900;
    flex:0 0 26px;
    border:1px solid rgba(226,232,240,.9);
    background:#fff;
    color:#334155;
  }
  .tick.yes{ background:rgba(16,185,129,.12); color:#065f46; border-color:rgba(16,185,129,.25); }
  .tick.no{ background:rgba(239,68,68,.10); color:#991b1b; border-color:rgba(239,68,68,.25); }

  .itxt .t{
    font-weight:900;
    color:var(--ink);
    font-size:12.5px;
    margin:0;
  }
  .itxt .s{
    margin-top:3px;
    font-size:12px;
    color:var(--muted);
    line-height:1.35;
  }

  /* signature */
  .sig-box{
    border:1px dashed #cbd5e1;
    border-radius:14px;
    padding:12px;
    background:#fff;
  }
  .sig-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:10px;
    flex-wrap:wrap;
    margin-bottom:8px;
  }
  .sig-title{
    margin:0;
    font-weight:900;
    letter-spacing:.6px;
    text-transform:uppercase;
    color:var(--ink);
    font-size:12px;
  }
  .sigline{
    height:1px;
    background:rgba(148,163,184,.55);
    margin:10px 0 8px;
  }
  .sig-name{
    font-weight:900;
    color:var(--ink);
    font-size:14px;
  }
  .muted{ color:var(--muted); font-size:12px; }

  /* responsive */
  @media (max-width: 992px){
    .grid{ grid-template-columns:1fr; }
    .meta-grid{ grid-template-columns:repeat(2,1fr); }
  }
  @media (max-width: 520px){
    .meta-grid{ grid-template-columns:1fr; }
  }

  /* print */
  @media print{
    .btnx{ display:none !important; }
    .wrap{ margin:0; }
    .cardx{ box-shadow:none; }
  }
</style>

@php
  $yn = fn($x) => ((int)$x === 1) ? 'Yes' : 'No';
  $badgeClass = function($sum){
    if($sum >= 10) return 'good';
    if($sum >= 7) return 'mid';
    return 'bad';
  };

  // score out of 11
  $fields = [
    'consent_to_assessment' => ['Consent to assessment', 'Patient agrees to physiotherapy assessment and evaluation.'],
    'understanding_of_benefits_and_risks' => ['Understanding benefits & risks', 'Patient understands potential benefits, risks, and limits of treatment.'],
    'medical_history_disclosure' => ['Medical history disclosure', 'Patient confirms accurate medical history is shared for safe care.'],
    'home_virtual_session_responsibility' => ['Home/virtual session responsibility', 'Patient accepts responsibility for safe home/virtual session environment.'],
    'tele_rehabilitation_consent' => ['Tele-rehabilitation consent', 'Patient consents to tele-rehab sessions if required.'],
    'data_privacy' => ['Data privacy', 'Patient agrees to data handling as per clinic privacy policy.'],
    'payment_policy_acknowledgment' => ['Payment policy acknowledgment', 'Patient acknowledges fees, billing, and payment terms.'],
    'voluntary_participation' => ['Voluntary participation', 'Patient confirms participation is voluntary and can stop anytime.'],
    'liability_waiver' => ['Liability waiver', 'Patient understands limitations of responsibility in specific scenarios.'],
    'guardian_consent' => ['Guardian consent', 'Guardian consent if patient is minor / requires guardian.'],
    'final_agreement_statement' => ['Final agreement', 'Patient confirms agreement to proceed under stated conditions.'],
  ];

  $sum = 0;
  foreach($fields as $key => $meta){ $sum += (int)($row->$key ?? 0); }
  $scoreCls = $badgeClass($sum);

  $dob = $row->date_of_birth ? \Carbon\Carbon::parse($row->date_of_birth)->format('d M Y') : '—';
  $sigDate = $row->signature_date ? \Carbon\Carbon::parse($row->signature_date)->format('d M Y') : '—';
@endphp

<div class="container-fluid wrap">
  <div class="cardx">

    <!-- HERO -->
    <div class="hero">


 <div class="hero-actions">
  <a href="{{ route('Dashboard.admin.patient_consent.index') }}" class="btnx btnx-ghost">
    <i class="fas fa-arrow-left"></i> Back
  </a>

  <a href="{{ route('Dashboard.admin.patient_consent.pdf', $row->id) }}" class="btnx btnx-primary">
    <i class="fas fa-file-pdf"></i> PDF
  </a>

  <a href="{{ route('Dashboard.admin.patient_consent.csv', $row->id) }}" class="btnx btnx-ghost">
    <i class="fas fa-file-csv"></i> CSV
  </a>

  <a href="{{ route('Dashboard.admin.patient_consent.word', $row->id) }}" class="btnx btnx-ghost">
    <i class="fas fa-file-word"></i> Word
  </a>

  <button class="btnx btnx-ghost" onclick="window.print()">
    <i class="fas fa-print"></i> Print
  </button>
</div>

      </div>

      <!-- META -->
      <div class="meta">
        <div class="meta-grid">
          <div class="mi">
            <div class="l">Record ID</div>
            <div class="v">#{{ $row->id }}</div>
          </div>
          <div class="mi">
            <div class="l">Submitted</div>
            <div class="v">{{ optional($row->created_at)->format('d M Y') }}</div>
          </div>
          <div class="mi">
            <div class="l">Updated</div>
            <div class="v">{{ optional($row->updated_at)->format('d M Y') }}</div>
          </div>
          <div class="mi">
            <div class="l">Consent Score</div>
            <div class="v">
              <span class="chip {{ $scoreCls }}">
                <span class="dot"></span> {{ $sum }}/11
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- BODY -->
    <div class="body">
      <div class="grid">

        <!-- LEFT: Patient Info + Signature -->
        <div class="panel">
          <div class="ph">
            <h3>Patient Information</h3>
            <span class="chip {{ $scoreCls }}">
              <span class="dot"></span> {{ $sum }}/11
            </span>
          </div>

          <div class="pb">
            <table class="kv">
              <tr>
                <td class="k">Full Name</td>
                <td class="val">{{ $row->patient_full_name ?: '—' }}</td>
              </tr>
              <tr>
                <td class="k">Date of Birth</td>
                <td class="val">{{ $dob }}</td>
              </tr>
              <tr>
                <td class="k">Contact Number</td>
                <td class="val">{{ $row->contact_number ?: '—' }}</td>
              </tr>
              <tr>
                <td class="k">Email Address</td>
                <td class="val">{{ $row->email_address ?: '—' }}</td>
              </tr>
              <tr>
                <td class="k">Emergency Contact</td>
                <td class="val">{{ $row->emergency_contact ?: '—' }}</td>
              </tr>
            </table>

            <div style="margin-top:12px;">
              <div class="ph" style="border-left-color: var(--navy);">
                <h3>Signature & Agreement</h3>
                <span class="chip">
                  <span class="dot"></span> {{ $sigDate }}
                </span>
              </div>

              <div class="pb">
                <div class="sig-box">
                  <div class="sig-top">
                    <p class="sig-title">Patient Signature</p>
                    <span class="chip">
                      <span class="dot"></span> Date: {{ $sigDate }}
                    </span>
                  </div>

                  <div class="sigline"></div>

                  <div class="sig-name">
                    {{ $row->patient_signature ?: '—' }}
                  </div>

                  <div class="muted" style="margin-top:6px;">
                    Declaration: Patient confirms consent and agreement to clinic policies.
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- RIGHT: Consent Checklist -->
        <div class="panel">
          <div class="ph">
            <h3>Consent Checklist</h3>
            <span class="chip {{ $scoreCls }}">
              <span class="dot"></span> Score: {{ $sum }}/11
            </span>
          </div>

          <div class="pb">
            <div class="checklist">

              @foreach($fields as $key => $meta)
                @php
                  $isYes = ((int)($row->$key ?? 0) === 1);
                @endphp

                <div class="item">
                  <div class="tick {{ $isYes ? 'yes' : 'no' }}">
                    {!! $isYes ? '&#10003;' : '&#10005;' !!}
                  </div>
                  <div class="itxt">
                    <div class="t">{{ $meta[0] }} — <span style="color:{{ $isYes ? '#065f46' : '#991b1b' }}">{{ $yn($row->$key ?? 0) }}</span></div>
                    <div class="s">{{ $meta[1] }}</div>
                  </div>
                </div>
              @endforeach

            </div>

            <div style="margin-top:12px; padding:10px 12px; border:1px solid rgba(226,232,240,.9); border-radius:14px; background:var(--soft);">
              <div style="font-weight:900; color:var(--ink); margin-bottom:4px; text-transform:uppercase; letter-spacing:.6px; font-size:12px;">
                Notes
              </div>
              <div class="muted">
                If any consent item is marked “No”, please review with the patient/guardian before starting treatment.
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</div>

@endsection
