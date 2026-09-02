<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    @page { margin: 18mm 14mm; }
    body{ font-family: DejaVu Sans, Arial, sans-serif; font-size: 11px; color:#111; }
    .muted{ color:#6b7280; }
    .h1{ font-size:18px; font-weight:800; margin:0; }
    .hr{ height:2px; background:#0f766e; margin:10px 0 12px; }

    .header{ width:100%; border-collapse:collapse; }
    .header td{ vertical-align:top; }
    .brand{ font-size:14px; font-weight:800; }
    .clinic{ font-size:10px; line-height:1.5; }

    .meta{ width:100%; border-collapse:collapse; margin-top:6px; }
    .meta td{ padding:6px 8px; border:1px solid #e5e7eb; background:#f9fafb; font-size:10px; }

    .card{ border:1px solid #e5e7eb; border-radius:8px; padding:10px; margin:10px 0; }
    .grid{ width:100%; border-collapse:collapse; }
    .grid td{ padding:7px 8px; border-bottom:1px dashed #e5e7eb; vertical-align:top; }
    .grid tr:last-child td{ border-bottom:none; }
    .k{ width:28%; color:#6b7280; font-weight:700; }
    .v{ width:72%; font-weight:700; }

    .sec{ margin-top:10px; page-break-inside:avoid; }
    .sec-title{
      font-size:12px; font-weight:900; letter-spacing:.3px;
      padding:8px 10px; border:1px solid #e5e7eb;
      background:#ecfeff; color:#0f766e; border-radius:8px;
    }
    .sec-body{ border:1px solid #e5e7eb; border-top:none; border-radius:0 0 8px 8px; padding:10px; }

    .box{ border:1px solid #eef2f7; background:#fbfdff; padding:8px 10px; border-radius:8px; line-height:1.6; font-weight:700; }
    .tag{ display:inline-block; padding:4px 8px; border:1px solid #e5e7eb; border-radius:999px; margin:3px 4px 0 0; font-size:10px; font-weight:800; }

    .pill{ display:inline-block; padding:5px 10px; border-radius:999px; font-size:10px; font-weight:900; color:#fff; }
    .g{ background:#10b981; } .a{ background:#f59e0b; } .r{ background:#ef4444; }

    .bar{ height:10px; background:#e5e7eb; border-radius:999px; overflow:hidden; margin-top:6px; }
    .bar span{ display:block; height:100%; width:0%; background:#0f766e; }

    .twoCol{ width:100%; border-collapse:collapse; }
    .twoCol td{ width:50%; vertical-align:top; padding:0 6px 0 0; }
    .twoCol td:last-child{ padding:0 0 0 6px; }

    .footer{
      position: fixed; bottom: -10mm; left:0; right:0;
      font-size:9px; color:#6b7280; text-align:center;
    }

    .sign{ width:100%; border-collapse:collapse; margin-top:12px; }
    .sign td{ width:50%; padding:14px 10px; border:1px dashed #cbd5e1; border-radius:10px; }
    .line{ margin-top:22px; height:1px; background:#cbd5e1; }

  </style>
</head>
<body>

@php
  use Carbon\Carbon;
  $fmt = fn($d)=> $d ? Carbon::parse($d)->format('d M Y') : '—';
  $v = fn($x)=> (is_null($x) || $x==='') ? '—' : $x;

  $asList = function($raw){
    if(is_null($raw) || $raw==='') return null;
    $d = json_decode($raw,true);
    if(json_last_error()===JSON_ERROR_NONE && is_array($d)){
      $d = array_values(array_filter($d, fn($i)=> trim((string)$i) !== ''));
      return count($d)?$d:null;
    }
    return null;
  };

  $pain = is_null($row->pain_level) ? null : (int)$row->pain_level;
  $pct  = is_null($pain) ? 0 : max(0,min(100,($pain/10)*100));
  $tone = 'g'; $label='Mild';
  if(!is_null($pain)){
    if($pain>=7){ $tone='r'; $label='Severe'; }
    elseif($pain>=4){ $tone='a'; $label='Moderate'; }
  }
@endphp

<table class="header">
  <tr>
    <td style="width:65%">
      <div class="brand">Rehabrion  </div>
      <div class="clinic muted">
        Physiotherapy & Rehab Clinic<br>
        Phone: +92 XXX XXXXXXX &nbsp; | &nbsp; Email: info@Rehabrion  .com<br>
        Address: Your clinic address here
      </div>
    </td>
    <td style="text-align:right; width:35%">
      <div class="h1">Patient Medical History Report</div>
      <div class="muted" style="margin-top:4px;">
        Confidential Document
      </div>
    </td>
  </tr>
</table>

<div class="hr"></div>

<table class="meta">
  <tr>
    <td><b>Report ID:</b> #{{ $row->id }}</td>
    <td><b>Submitted:</b> {{ $fmt($row->created_at) }}</td>
    <td><b>Last Updated:</b> {{ $fmt($row->updated_at) }}</td>
  </tr>
</table>

<div class="card">
  <table class="twoCol">
    <tr>
      <td>
        <table class="grid">
          <tr><td class="k">Full Name</td><td class="v">{{ $v($row->patient_full_name) }}</td></tr>
          <tr><td class="k">DOB</td><td class="v">{{ $fmt($row->date_of_birth) }}</td></tr>
          <tr><td class="k">Age / Gender</td><td class="v">{{ $v($row->age) }} / {{ $v($row->gender) }}</td></tr>
          <tr><td class="k">Occupation</td><td class="v">{{ $v($row->occupation) }}</td></tr>
        </table>
      </td>
      <td>
        <table class="grid">
          <tr><td class="k">Contact</td><td class="v">{{ $v($row->contact_number) }}</td></tr>
          <tr><td class="k">Email</td><td class="v">{{ $v($row->email_address) }}</td></tr>
          <tr><td class="k">Home Address</td><td class="v">{{ $v($row->home_address) }}</td></tr>
          <tr><td class="k">Emergency</td><td class="v">{{ $v($row->emergency_contact_name) }} — {{ $v($row->emergency_contact_number) }}</td></tr>
        </table>
      </td>
    </tr>
  </table>
</div>

<div class="sec">
  <div class="sec-title">Presenting Complaint & Pain Assessment</div>
  <div class="sec-body">
    <table class="twoCol">
      <tr>
        <td>
          <div class="muted" style="font-weight:800; margin-bottom:6px;">Primary Complaint</div>
          <div class="box">{{ $v($row->primary_complaint) }}</div>

          <div style="height:10px"></div>

          <div class="muted" style="font-weight:800; margin-bottom:6px;">Pain Location</div>
          @php $list = $asList($row->pain_details_location); @endphp
          @if($list)
            @foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach
          @else
            <div class="box">{{ $v($row->pain_details_location) }}</div>
          @endif

          <div style="height:10px"></div>

          <div class="muted" style="font-weight:800; margin-bottom:6px;">Pain Type</div>
          @php $list = $asList($row->pain_type); @endphp
          @if($list)
            @foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach
          @else
            <div class="box">{{ $v($row->pain_type) }}</div>
          @endif
        </td>

        <td>
          <div class="muted" style="font-weight:800;">Pain Score (0–10)</div>
          <div style="margin-top:6px;">
            <span class="pill {{ $tone }}">{{ is_null($pain) ? '—' : $pain.'/10' }} • {{ $label }}</span>
            <div class="bar"><span style="width: {{ $pct }}%"></span></div>
          </div>

          <div style="height:12px"></div>

          <table class="grid">
            <tr><td class="k">Problem Start</td><td class="v">{{ $v($row->problem_start) }}</td></tr>
            <tr><td class="k">Problem Cause</td><td class="v">{{ $v($row->problem_cause) }}</td></tr>
            <tr><td class="k">Worse During</td><td class="v">{{ $v($row->pain_worse_during) }}</td></tr>
            <tr><td class="k">Pain Reduction</td><td class="v">{{ $v($row->pain_reduction) }}</td></tr>
          </table>
        </td>
      </tr>
    </table>
  </div>
</div>

<div class="sec">
  <div class="sec-title">Medical & Surgical History</div>
  <div class="sec-body">
    <table class="twoCol">
      <tr>
        <td>
          <div class="muted" style="font-weight:800; margin-bottom:6px;">Past Medical History</div>
          @php $list = $asList($row->past_medical_history); @endphp
          @if($list)
            @foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach
          @else
            <div class="box">{{ $v($row->past_medical_history) }}</div>
          @endif

          <div style="height:10px"></div>

          <div class="muted" style="font-weight:800; margin-bottom:6px;">Injury History</div>
          <div class="box">{{ $v($row->injury_history) }}</div>
        </td>

        <td>
          <table class="grid">
            <tr><td class="k">Surgical History</td><td class="v">{{ $v($row->surgical_history) }}</td></tr>
            <tr><td class="k">Surgery Type</td><td class="v">{{ $v($row->surgery_type) }}</td></tr>
            <tr><td class="k">Surgery Year</td><td class="v">{{ $v($row->surgery_year) }}</td></tr>
          </table>
          <div style="height:8px"></div>
          <div class="muted" style="font-weight:800; margin-bottom:6px;">Additional Surgery Notes</div>
          <div class="box">{{ $v($row->additional_surgery) }}</div>
        </td>
      </tr>
    </table>

    <div style="height:10px"></div>

    <table class="twoCol">
      <tr>
        <td>
          <div class="muted" style="font-weight:800; margin-bottom:6px;">Medications</div>
          <div class="box"><b>Status:</b> {{ $v($row->medication_status) }}<br>{{ $v($row->medication_info) }}</div>
        </td>
        <td>
          <div class="muted" style="font-weight:800; margin-bottom:6px;">Allergies</div>
          @php $list = $asList($row->allergies); @endphp
          @if($list)
            @foreach($list as $t) <span class="tag">{{ $t }}</span> @endforeach
          @else
            <div class="box">{{ $v($row->allergies) }}</div>
          @endif
        </td>
      </tr>
    </table>

    <div style="height:10px"></div>
    <div class="muted" style="font-weight:800; margin-bottom:6px;">Post Surgical Medical Clearance</div>
    <div class="box">{{ $v($row->post_surgical_medical_clearance) }}</div>
  </div>
</div>

<div class="sec">
  <div class="sec-title">Lifestyle, Goals & Safety</div>
  <div class="sec-body">
    <table class="twoCol">
      <tr>
        <td>
          <table class="grid">
            <tr><td class="k">Activity Level</td><td class="v">{{ $v($row->lifestyle_activity_level) }}</td></tr>
            <tr><td class="k">Exercise Routine</td><td class="v">{{ $v($row->exercise_routine) }}</td></tr>
            <tr><td class="k">Functional Limitations</td><td class="v">{{ $v($row->functional_limitations) }}</td></tr>
          </table>
        </td>
        <td>
          <div class="muted" style="font-weight:800; margin-bottom:6px;">Goals From Therapy</div>
          <div class="box">{{ $v($row->goals_from_therapy) }}</div>

          <div style="height:10px"></div>
          <div class="muted" style="font-weight:800; margin-bottom:6px;">Other Goals</div>
          <div class="box">{{ $v($row->other_goals) }}</div>
        </td>
      </tr>
    </table>

    <div style="height:10px"></div>
    <div class="muted" style="font-weight:800; margin-bottom:6px;">Home / Virtual Session Safety</div>
    <div class="box">{{ $v($row->home_virtual_session_safety) }}</div>

    <div style="height:10px"></div>
    <table class="twoCol">
      <tr>
        <td>
          <div class="muted" style="font-weight:800; margin-bottom:6px;">Women Health Status</div>
          <div class="box">
            <b>Status:</b> {{ $v($row->women_health_status) }}<br>
            <b>Pregnant:</b> {{ $v($row->pregnant_status) }} &nbsp; | &nbsp;
            <b>Recent Delivery:</b> {{ $v($row->recent_delivery) }}
          </div>
        </td>
        <td>
          <div class="muted" style="font-weight:800; margin-bottom:6px;">Declaration</div>
          <div class="box">
            <b>Agreement:</b> {{ $v($row->declaration_agreement) }}<br>
            <b>Signature:</b> {{ $v($row->patient_signature) }}<br>
            <b>Date:</b> {{ $fmt($row->signature_date) }}
          </div>
        </td>
      </tr>
    </table>

    <table class="sign">
      <tr>
        <td>
          <div class="muted" style="font-weight:800;">Patient / Guardian Signature</div>
          <div class="line"></div>
        </td>
        <td>
          <div class="muted" style="font-weight:800;">Doctor / Therapist Signature</div>
          <div class="line"></div>
        </td>
      </tr>
    </table>
  </div>
</div>

<div class="footer">
  This document is confidential and intended for clinical use only.
</div>

</body>
</html>
