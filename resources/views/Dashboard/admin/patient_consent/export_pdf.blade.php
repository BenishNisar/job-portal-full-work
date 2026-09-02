@php
  $yn = fn($x) => ((int)$x === 1) ? 'Yes' : 'No';

  $fields = [
    'consent_to_assessment' => 'Consent to assessment',
    'understanding_of_benefits_and_risks' => 'Understanding benefits & risks',
    'medical_history_disclosure' => 'Medical history disclosure',
    'home_virtual_session_responsibility' => 'Home/virtual responsibility',
    'tele_rehabilitation_consent' => 'Tele-rehab consent',
    'data_privacy' => 'Data privacy',
    'payment_policy_acknowledgment' => 'Payment policy acknowledgment',
    'voluntary_participation' => 'Voluntary participation',
    'liability_waiver' => 'Liability waiver',
    'guardian_consent' => 'Guardian consent',
    'final_agreement_statement' => 'Final agreement',
  ];

  $sum = 0;
  foreach($fields as $k => $t){ $sum += (int)($row->$k ?? 0); }
@endphp

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    @page { margin: 20mm 16mm; }
    body{ font-family: DejaVu Sans, Arial, sans-serif; font-size:11pt; color:#111827; }
    .h{ border-bottom:2px solid #0f766e; padding-bottom:8px; margin-bottom:12px; }
    .clinic{ font-size:18pt; font-weight:900; color:#0f766e; }
    .sub{ font-size:10pt; color:#6b7280; font-weight:700; letter-spacing:.5px; text-transform:uppercase; }
    .box{ border:1px solid #e5e7eb; border-radius:10px; padding:10px; margin-bottom:12px; }
    .title{ font-size:12pt; font-weight:900; margin:0 0 8px; color:#0f172a; text-transform:uppercase; letter-spacing:.6px; }
    table{ width:100%; border-collapse:collapse; }
    td{ padding:7px 6px; border-bottom:1px dashed #e5e7eb; vertical-align:top; }
    tr:last-child td{ border-bottom:none; }
    .k{ width:38%; color:#64748b; font-weight:900; text-transform:uppercase; font-size:10pt; letter-spacing:.5px; }
    .v{ font-weight:800; }
    .badge{ display:inline-block; padding:4px 10px; border-radius:999px; border:1px solid #e5e7eb; font-weight:900; }
    .foot{ margin-top:10px; font-size:9pt; color:#6b7280; border-top:1px solid #e5e7eb; padding-top:8px; }
  </style>
</head>
<body>

  <div class="h">
    <table>
      <tr>
        <td>
          <div class="clinic">Rehabrion  </div>
          <div class="sub">Physiotherapy & Rehabilitation Clinic</div>
        </td>
        <td style="text-align:right;">
          <div style="font-size:14pt;font-weight:900;color:#1e3a8a;">Patient Consent Report</div>
          <div class="sub">Confidential Clinical Document</div>
        </td>
      </tr>
    </table>
  </div>

  <div class="box">
    <div class="title">Patient Information</div>
    <table>
      <tr><td class="k">Record ID</td><td class="v">#{{ $row->id }}</td></tr>
      <tr><td class="k">Full Name</td><td class="v">{{ $row->patient_full_name ?: '—' }}</td></tr>
      <tr><td class="k">Date of Birth</td><td class="v">{{ $row->date_of_birth ?: '—' }}</td></tr>
      <tr><td class="k">Contact</td><td class="v">{{ $row->contact_number ?: '—' }}</td></tr>
      <tr><td class="k">Email</td><td class="v">{{ $row->email_address ?: '—' }}</td></tr>
      <tr><td class="k">Emergency Contact</td><td class="v">{{ $row->emergency_contact ?: '—' }}</td></tr>
    </table>
  </div>

  <div class="box">
    <div class="title">Consent Checklist <span class="badge">{{ $sum }}/11</span></div>
    <table>
      @foreach($fields as $k => $t)
        <tr>
          <td class="k">{{ $t }}</td>
          <td class="v">{{ $yn($row->$k ?? 0) }}</td>
        </tr>
      @endforeach
    </table>
  </div>

  <div class="box">
    <div class="title">Signature</div>
    <table>
      <tr><td class="k">Patient Signature</td><td class="v">{{ $row->patient_signature ?: '—' }}</td></tr>
      <tr><td class="k">Signature Date</td><td class="v">{{ $row->signature_date ?: '—' }}</td></tr>
    </table>
  </div>

  <div class="foot">
    Generated: {{ now()->format('d M Y H:i') }} • Confidential — Do not distribute without authorization.
  </div>

</body>
</html>
