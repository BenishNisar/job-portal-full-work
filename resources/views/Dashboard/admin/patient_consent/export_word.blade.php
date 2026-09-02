@php
  $yn = fn($x) => ((int)$x === 1) ? 'Yes' : 'No';
@endphp

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body{ font-family: Arial, sans-serif; font-size:12pt; color:#111; }
    h2{ margin:0 0 10px; }
    table{ width:100%; border-collapse:collapse; }
    td, th{ border:1px solid #ddd; padding:8px; }
    th{ background:#f3f4f6; text-align:left; }
  </style>
</head>
<body>
  <h2>Patient Consent Report (Rehabrion  )</h2>

  <h3>Patient Info</h3>
  <table>
    <tr><th>ID</th><td>{{ $row->id }}</td></tr>
    <tr><th>Full Name</th><td>{{ $row->patient_full_name }}</td></tr>
    <tr><th>DOB</th><td>{{ $row->date_of_birth }}</td></tr>
    <tr><th>Contact</th><td>{{ $row->contact_number }}</td></tr>
    <tr><th>Email</th><td>{{ $row->email_address }}</td></tr>
    <tr><th>Emergency Contact</th><td>{{ $row->emergency_contact }}</td></tr>
  </table>

  <h3>Consent Items</h3>
  <table>
    <tr><th>Item</th><th>Status</th></tr>
    <tr><td>Consent to assessment</td><td>{{ $yn($row->consent_to_assessment) }}</td></tr>
    <tr><td>Understanding benefits & risks</td><td>{{ $yn($row->understanding_of_benefits_and_risks) }}</td></tr>
    <tr><td>Medical history disclosure</td><td>{{ $yn($row->medical_history_disclosure) }}</td></tr>
    <tr><td>Home/virtual responsibility</td><td>{{ $yn($row->home_virtual_session_responsibility) }}</td></tr>
    <tr><td>Tele-rehabilitation consent</td><td>{{ $yn($row->tele_rehabilitation_consent) }}</td></tr>
    <tr><td>Data privacy</td><td>{{ $yn($row->data_privacy) }}</td></tr>
    <tr><td>Payment policy acknowledgment</td><td>{{ $yn($row->payment_policy_acknowledgment) }}</td></tr>
    <tr><td>Voluntary participation</td><td>{{ $yn($row->voluntary_participation) }}</td></tr>
    <tr><td>Liability waiver</td><td>{{ $yn($row->liability_waiver) }}</td></tr>
    <tr><td>Guardian consent</td><td>{{ $yn($row->guardian_consent) }}</td></tr>
    <tr><td>Final agreement statement</td><td>{{ $yn($row->final_agreement_statement) }}</td></tr>
  </table>

  <h3>Signature</h3>
  <table>
    <tr><th>Patient Signature</th><td>{{ $row->patient_signature }}</td></tr>
    <tr><th>Signature Date</th><td>{{ $row->signature_date }}</td></tr>
  </table>

</body>
</html>
