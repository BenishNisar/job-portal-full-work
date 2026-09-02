<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    /* =========================
      DOMPDF FRIENDLY SETTINGS
    ========================= */
    @page { margin: 42mm 18mm 22mm 18mm; }
    body{
      font-family: DejaVu Sans, Arial, sans-serif;
      font-size: 11pt;
      color:#111827;
      margin:0; padding:0;
      line-height:1.45;
    }
    *{ box-sizing:border-box; }

    /* =========================
      BRAND COLORS
    ========================= */
    :root{
      --teal:#0f766e;
      --navy:#1e3a8a;
      --muted:#6b7280;
      --border:#e5e7eb;
      --soft:#f8fafc;
      --soft2:#f1f5f9;
    }


                                                                                                                                                                                                                              * ===== HEADER / FOOTER (NO negative top/bottom) ===== */
.header{
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 32mm;
  padding: 8mm 18mm 0 18mm;
  background:#fff;
  border-bottom: 3px solid #0f766e;
}

.footer{
  position: fixed;
  bottom: 0;              /* IMPORTANT */
  left: 0;
  right: 0;
  height: 12mm;
  padding: 3mm 18mm 0 18mm;
  background:#fff;
  border-top: 1px solid #e5e7eb;
  font-size: 8.5pt;
  color:#6b7280;
}

    /* header layout via table */
    .h-table{ width:100%; border-collapse:collapse; }
    .h-left{ width:60%; vertical-align:top; }
    .h-right{ width:40%; vertical-align:top; text-align:right; }

    .clinic-name{
      font-size: 18pt;
      font-weight: 900;
      color: var(--teal);
      letter-spacing: .2px;
      margin:0;
    }
    .clinic-tag{
      margin:2px 0 0;
      font-size:9.5pt;
      color:#374151;
      font-weight:700;
      text-transform:uppercase;
      letter-spacing:.8px;
    }
    .clinic-info{
      margin-top:4px;
      font-size:9pt;
      color:var(--muted);
      line-height:1.35;
    }
    .report-title{
      margin:0;
      font-size: 16pt;
      font-weight: 900;
      color: var(--navy);
      letter-spacing:.2px;
      text-transform:uppercase;
    }
    .report-subtitle{
      margin-top:3px;
      font-size: 9pt;
      color: var(--muted);
      letter-spacing: 1px;
      text-transform:uppercase;
      font-weight:700;
    }

    /* =========================
      TOP META BAR
    ========================= */
    .meta{
      border:1px solid var(--border);
      background: var(--soft);
      border-radius:10px;
      padding:10px 12px;
      margin: 0 0 14px 0;
    }
    .meta table{ width:100%; border-collapse:collapse; }
    .meta td{
      font-size: 10pt;
      padding: 4px 6px;
      color:#334155;
      vertical-align:top;
    }
    .meta .lbl{ color:#475569; font-weight:800; width:18%; }
    .meta .val{ font-weight:800; color:#111827; }

    /* =========================
      SECTION BOXES
    ========================= */
    .section{
      border:1px solid var(--border);
      border-radius:12px;
      margin: 0 0 14px 0;
      overflow:hidden;
      page-break-inside: avoid;
    }
    .section-h{
      background: var(--soft2);
      border-left: 5px solid var(--teal);
      padding:10px 12px;
      font-size: 11pt;
      font-weight: 900;
      color:#0f172a;
      text-transform:uppercase;
      letter-spacing:.6px;
    }
    .section-b{ padding: 10px 12px; background:#fff; }

    /* key-value rows */
    .kv{ width:100%; border-collapse:collapse; }
    .kv td{ padding:7px 6px; border-bottom:1px dashed #e5e7eb; vertical-align:top; }
    .kv tr:last-child td{ border-bottom:none; }
    .k{
      width:28%;
      color:#64748b;
      font-weight:900;
      font-size:10pt;
      text-transform:uppercase;
      letter-spacing:.5px;
    }
    .v{
      font-weight:800;
      color:#111827;
      font-size:11pt;
    }

    /* tags */
    .tag{
      display:inline-block;
      border:1px solid #cbd5e1;
      background:#ffffff;
      padding:4px 10px;
      border-radius:999px;
      font-size:9.5pt;
      font-weight:800;
      margin: 2px 6px 2px 0;
      color:#0f172a;
    }

    /* Pain box */
    .painbox{
      border:1px solid #dbeafe;
      background:#eff6ff;
      border-radius:12px;
      padding:10px 12px;
    }
    .badge{
      display:inline-block;
      padding:4px 10px;
      border-radius:999px;
      color:#fff;
      font-weight:900;
      font-size:10pt;
    }
    .b-good{ background:#10b981; }
    .b-amber{ background:#f59e0b; }
    .b-danger{ background:#ef4444; }

    .bar{
      height:10px;
      background:#e5e7eb;
      border-radius:999px;
      overflow:hidden;
      margin-top:8px;
    }
    .fill{
      height:10px;
      width:0%;
      background: linear-gradient(90deg,#10b981,#f59e0b,#ef4444);
    }

    /* signature */
    .sig-table{ width:100%; border-collapse:collapse; margin-top:10px; }
    .sig-box{
      border:1px dashed #cbd5e1;
      border-radius:10px;
      padding:14px;
      height:85px;
      vertical-align:top;
    }
    .sig-lbl{
      font-size:9pt;
      color:#475569;
      font-weight:900;
      text-transform:uppercase;
      letter-spacing:.6px;
    }
    .small{ font-size:9pt; color:var(--muted); }

  </style>
</head>

<body>
@php
  use Carbon\Carbon;

  $fmt = fn($d) => $d ? Carbon::parse($d)->format('d M Y') : '—';
  $v   = fn($x) => ($x === null || $x === '') ? '—' : $x;

  $asList = function($raw){
    if(!$raw) return null;
    $d = json_decode($raw,true);
    if(json_last_error() === JSON_ERROR_NONE && is_array($d)){
      $d = array_values(array_filter($d, fn($i)=> trim((string)$i) !== ''));
      return count($d) ? $d : null;
    }
    return null;
  };

  $pain = is_null($row->pain_level) ? null : (int)$row->pain_level;
  $pct  = is_null($pain) ? 0 : max(0, min(100, ($pain/10)*100));
  $tone = 'b-good';
  if(!is_null($pain)){
    if($pain >= 7) $tone = 'b-danger';
    elseif($pain >= 4) $tone = 'b-amber';
  }
@endphp

<!-- HEADER -->
<div class="header">
  <table class="h-table">
    <tr>
      <td class="h-left">
        <div class="clinic-name">Rehabrion  </div>
        <div class="clinic-tag">PHYSIOTHERAPY &amp; REHABILITATION CLINIC</div>
        <div class="clinic-info">
          123 Medical Street, Healthcare District • +92 300 1234567<br>
          info@Rehabrion  .com • License #: MH-2023-9876 • EST: 2018
        </div>
      </td>
      <td class="h-right">
        <div class="report-title">Patient Medical History Report</div>
        <div class="report-subtitle">Confidential Clinical Document</div>
      </td>
    </tr>
  </table>
</div>

<!-- FOOTER -->
<div class="footer">
  <table style="width:100%; border-collapse:collapse;">
    <tr>
      <td class="small">CONFIDENTIAL – Privileged patient information.</td>
      <td class="small" style="text-align:right;">Generated: {{ Carbon::now()->format('d M Y H:i') }}</td>
    </tr>
  </table>
</div>

<!-- META -->
<div class="meta">
  <table>
    <tr>
      <td class="lbl">Report ID</td><td class="val">#{{ str_pad($row->id, 6, '0', STR_PAD_LEFT) }}</td>
      <td class="lbl">Submitted</td><td class="val">{{ $fmt($row->created_at) }}</td>
      <td class="lbl">Updated</td><td class="val">{{ $fmt($row->updated_at) }}</td>
    </tr>
    <tr>
      <td class="lbl">Patient</td><td class="val">{{ $v($row->patient_full_name) }}</td>
      <td class="lbl">DOB</td><td class="val">{{ $fmt($row->date_of_birth) }}</td>
      <td class="lbl">Status</td><td class="val">ACTIVE</td>
    </tr>
  </table>
</div>

<!-- PATIENT DEMOGRAPHICS -->
<div class="section">
  <div class="section-h">Patient Demographics</div>
  <div class="section-b">
    <table class="kv">
      <tr><td class="k">Full Name</td><td class="v">{{ $v($row->patient_full_name) }}</td></tr>
      <tr><td class="k">Age / Gender</td><td class="v">{{ $v($row->age) }} years / {{ $v($row->gender) }}</td></tr>
      <tr><td class="k">Contact</td><td class="v">{{ $v($row->contact_number) }}</td></tr>
      <tr><td class="k">Email</td><td class="v">{{ $v($row->email_address) }}</td></tr>
      <tr><td class="k">Occupation</td><td class="v">{{ $v($row->occupation) }}</td></tr>
      <tr><td class="k">Address</td><td class="v">{{ $v($row->home_address) }}</td></tr>
      <tr><td class="k">Emergency Contact</td><td class="v">{{ $v($row->emergency_contact_name) }} ({{ $v($row->emergency_contact_number) }})</td></tr>
    </table>
  </div>
</div>

<!-- PRESENTING COMPLAINT -->
<div class="section">
  <div class="section-h">Presenting Complaint</div>
  <div class="section-b">
    <table class="kv">
      <tr><td class="k">Primary Complaint</td><td class="v">{{ $v($row->primary_complaint) }}</td></tr>
      <tr><td class="k">Problem Start</td><td class="v">{{ $v($row->problem_start) }}</td></tr>
      <tr><td class="k">Cause</td><td class="v">{{ $v($row->problem_cause) }}</td></tr>
      <tr>
        <td class="k">Pain Location</td>
        <td class="v">
          @php $loc = $asList($row->pain_details_location); @endphp
          @if($loc)
            @foreach($loc as $t) <span class="tag">{{ $t }}</span> @endforeach
          @else
            {{ $v($row->pain_details_location) }}
          @endif
        </td>
      </tr>
      <tr>
        <td class="k">Pain Type</td>
        <td class="v">
          @php $pt = $asList($row->pain_type); @endphp
          @if($pt)
            @foreach($pt as $t) <span class="tag">{{ $t }}</span> @endforeach
          @else
            {{ $v($row->pain_type) }}
          @endif
        </td>
      </tr>
    </table>
  </div>
</div>

<!-- PAIN ASSESSMENT -->
<div class="section">
  <div class="section-h">Pain Assessment</div>
  <div class="section-b">
    <div class="painbox">
      <table style="width:100%; border-collapse:collapse;">
        <tr>
          <td style="font-weight:900; color:#1e3a8a;">VAS Score (0–10)</td>
          <td style="text-align:right;">
            <span class="badge {{ $tone }}">
              {{ is_null($pain) ? '—' : $pain.'/10' }}
            </span>
          </td>
        </tr>
      </table>
      <div class="bar"><div class="fill" style="width:{{ $pct }}%"></div></div>
      <div class="small" style="margin-top:6px;">
        0 = No Pain • 1–3 Mild • 4–6 Moderate • 7–10 Severe
      </div>
    </div>

    <table class="kv" style="margin-top:10px;">
      <tr><td class="k">Aggravating Factors</td><td class="v">{{ $v($row->pain_worse_during) }}</td></tr>
      <tr><td class="k">Relieving Factors</td><td class="v">{{ $v($row->pain_reduction) }}</td></tr>
    </table>
  </div>
</div>

<!-- MEDICAL HISTORY -->
<div class="section">
  <div class="section-h">Medical History</div>
  <div class="section-b">
    <table class="kv">
      <tr>
        <td class="k">Past Medical History</td>
        <td class="v">
          @php $mh = $asList($row->past_medical_history); @endphp
          @if($mh)
            @foreach($mh as $t) <span class="tag">{{ $t }}</span> @endforeach
          @else
            {{ $v($row->past_medical_history) }}
          @endif
        </td>
      </tr>
      <tr><td class="k">Injury History</td><td class="v">{{ $v($row->injury_history) }}</td></tr>
      <tr>
        <td class="k">Surgical History</td>
        <td class="v">
          {{ $v($row->surgical_history) }}
          <div class="small" style="margin-top:6px;">
            Procedure: {{ $v($row->surgery_type) }} • Year: {{ $v($row->surgery_year) }}
          </div>
          <div class="small" style="margin-top:6px;">{{ $v($row->additional_surgery) }}</div>
        </td>
      </tr>
      <tr>
        <td class="k">Allergies</td>
        <td class="v">
          @php $al = $asList($row->allergies); @endphp
          @if($al)
            @foreach($al as $t) <span class="tag" style="border-color:#fecaca;background:#fef2f2;color:#991b1b;">{{ $t }}</span> @endforeach
          @else
            {{ $v($row->allergies) }}
          @endif
        </td>
      </tr>
      <tr>
        <td class="k">Medication</td>
        <td class="v">{{ $v($row->medication_status) }} — {{ $v($row->medication_info) }}</td>
      </tr>
      <tr>
        <td class="k">Medical Clearance</td>
        <td class="v">{{ $v($row->post_surgical_medical_clearance) }}</td>
      </tr>
    </table>
  </div>
</div>

<!-- GOALS / FUNCTIONAL -->
<div class="section">
  <div class="section-h">Goals & Functional Status</div>
  <div class="section-b">
    <table class="kv">
      <tr>
        <td class="k">Goals</td>
        <td class="v">
          @php $g = $asList($row->goals_from_therapy); @endphp
          @if($g)
            @foreach($g as $t) <span class="tag" style="border-color:#bbf7d0;background:#f0fdf4;color:#14532d;">{{ $t }}</span> @endforeach
          @else
            {{ $v($row->goals_from_therapy) }}
          @endif
        </td>
      </tr>
      <tr><td class="k">Other Goals</td><td class="v">{{ $v($row->other_goals) }}</td></tr>
      <tr><td class="k">Functional Limitations</td><td class="v">{{ $v($row->functional_limitations) }}</td></tr>
      <tr><td class="k">Lifestyle Activity</td><td class="v">{{ $v($row->lifestyle_activity_level) }}</td></tr>
      <tr><td class="k">Exercise Routine</td><td class="v">{{ $v($row->exercise_routine) }}</td></tr>
      <tr><td class="k">Home/Virtual Safety</td><td class="v">{{ $v($row->home_virtual_session_safety) }}</td></tr>
    </table>
  </div>
</div>

<!-- WOMEN HEALTH (optional) -->
@if(strtolower((string)$row->gender) === 'female')
<div class="section">
  <div class="section-h">Women’s Health</div>
  <div class="section-b">
    <table class="kv">
      <tr><td class="k">Health Status</td><td class="v">{{ $v($row->women_health_status) }}</td></tr>
      <tr><td class="k">Pregnant</td><td class="v">{{ $v($row->pregnant_status) }}</td></tr>
      <tr><td class="k">Recent Delivery</td><td class="v">{{ $v($row->recent_delivery) }}</td></tr>
    </table>
  </div>
</div>
@endif

<!-- DECLARATION / SIGNATURE -->
<div class="section">
  <div class="section-h">Declaration & Signature</div>
  <div class="section-b">
    <table class="kv">
      <tr><td class="k">Declaration</td><td class="v">{{ $v($row->declaration_agreement) }}</td></tr>
      <tr><td class="k">Signature</td><td class="v">{{ $v($row->patient_signature) }}</td></tr>
      <tr><td class="k">Signature Date</td><td class="v">{{ $fmt($row->signature_date) }}</td></tr>
    </table>

    <table class="sig-table">
      <tr>
        <td class="sig-box" style="width:50%;">
          <div class="sig-lbl">Patient / Guardian</div>
        </td>
        <td style="width:16px;"></td>
        <td class="sig-box" style="width:50%;">
          <div class="sig-lbl">Physiotherapist</div>
        </td>
      </tr>
    </table>
  </div>
</div>

<!-- OPTIONAL: DOMPDF PAGE NUMBERING -->
<script type="text/php">
if (isset($pdf)) {
  $font = $fontMetrics->get_font("DejaVu Sans", "normal");
  $pdf->page_text(520, 820, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(107,114,128));
}
</script>

</body>
</html>
