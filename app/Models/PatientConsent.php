<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientConsent extends Model
{
    use HasFactory;
        protected $table = 'patient_consents';

    protected $fillable = [
        'patient_full_name',
        'date_of_birth',
        'contact_number',
        'email_address',
        'emergency_contact',
        'consent_to_assessment',
        'understanding_of_benefits_and_risks',
        'medical_history_disclosure',
        'home_virtual_session_responsibility',
        'tele_rehabilitation_consent',
        'data_privacy',
        'payment_policy_acknowledgment',
        'voluntary_participation',
        'liability_waiver',
        'guardian_consent',
        'final_agreement_statement',
        'patient_signature',
        'signature_date',
    ];
}
