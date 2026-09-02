<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientConsent;

class PatientConsentBackendController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $rows = PatientConsent::query()
            ->when($q, function ($query) use ($q) {
                $query->where('patient_full_name', 'like', "%{$q}%")
                      ->orWhere('contact_number', 'like', "%{$q}%")
                      ->orWhere('email_address', 'like', "%{$q}%")
                      ->orWhere('patient_signature', 'like', "%{$q}%");
            })
            ->orderByDesc('id')
            ->paginate(10);

        return view('Dashboard.admin.patient_consent.index', compact('rows', 'q'));
    }

    public function view($id)
    {
        $row = PatientConsent::findOrFail($id);
        return view('Dashboard.admin.patient_consent.view', compact('row'));
    }

    // ✅ CSV (single record)
    public function csv($id)
    {
        $row = PatientConsent::findOrFail($id);

        $yn = fn($x) => ((int)$x === 1) ? 'Yes' : 'No';

        $headers = [
            'ID','Patient Name','DOB','Contact','Email','Emergency Contact',
            'Consent to assessment','Understanding benefits & risks','Medical history disclosure',
            'Home/virtual responsibility','Tele-rehab consent','Data privacy','Payment policy',
            'Voluntary participation','Liability waiver','Guardian consent','Final agreement',
            'Patient signature','Signature date','Created at','Updated at'
        ];

        $data = [
            $row->id,
            $row->patient_full_name,
            $row->date_of_birth,
            $row->contact_number,
            $row->email_address,
            $row->emergency_contact,

            $yn($row->consent_to_assessment),
            $yn($row->understanding_of_benefits_and_risks),
            $yn($row->medical_history_disclosure),
            $yn($row->home_virtual_session_responsibility),
            $yn($row->tele_rehabilitation_consent),
            $yn($row->data_privacy),
            $yn($row->payment_policy_acknowledgment),
            $yn($row->voluntary_participation),
            $yn($row->liability_waiver),
            $yn($row->guardian_consent),
            $yn($row->final_agreement_statement),

            $row->patient_signature,
            $row->signature_date,
            optional($row->created_at)->toDateTimeString(),
            optional($row->updated_at)->toDateTimeString(),
        ];

        return response()->streamDownload(function () use ($headers, $data) {
            $out = fopen('php://output', 'w');
            fputcsv($out, $headers);
            fputcsv($out, $data);
            fclose($out);
        }, "patient-consent-{$row->id}.csv", ['Content-Type' => 'text/csv']);
    }

    // ✅ WORD (simple .doc using HTML)
    public function word($id)
    {
        $row = PatientConsent::findOrFail($id);

        $html = view('Dashboard.admin.patient_consent.export_word', compact('row'))->render();

        return response($html, 200, [
            'Content-Type' => 'application/msword; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="patient-consent-'.$row->id.'.doc"',
        ]);
    }

    // ✅ PDF (DomPDF)
    public function pdf($id)
    {
        $row = PatientConsent::findOrFail($id);

        $pdf = \PDF::loadView('Dashboard.admin.patient_consent.export_pdf', compact('row'))
            ->setPaper('a4', 'portrait');

        return $pdf->download("patient-consent-{$row->id}.pdf");
    }
}
