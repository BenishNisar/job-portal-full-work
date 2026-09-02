<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedicalHistory extends Model
{
    use HasFactory;
    // Define fillable fields
        protected $table = 'patient_medical_history';

    protected $fillable = [
        'patient_full_name',
        'date_of_birth',
        'age',
        'gender',
        'contact_number',
        'email_address',
        'home_address',
        'emergency_contact_name',
        'emergency_contact_number',
        'primary_complaint',
        'pain_details_location',
        'pain_level',
        'pain_type',
        'pain_worse_during',
        'pain_reduction',
        'past_medical_history',
        'surgical_history',
        'injury_history',
        'medication_info',
        'allergies',
        'post_surgical_medical_clearance',
        'lifestyle_activity_level',
        'exercise_routine',
        'functional_limitations',
        'women_health_status',
        'goals_from_therapy',
        'home_virtual_session_safety',
        'declaration_agreement',
        'patient_signature',
        'signature_date',
        'occupation',
         'problem_start',
    'problem_cause',
    'other_goals',
    'surgery_type',
    'surgery_year',
    'additional_surgery',
    'recent_delivery',
    'pregnant_status',
    'medication_status',
    ];



    protected $casts = [
    'pain_details_location' => 'array',
    'pain_type' => 'array',
    'pain_worse_during' => 'array',
    'pain_reduction' => 'array',
    'past_medical_history' => 'array',
    'injury_history' => 'array',
    'allergies' => 'array',
    'post_surgical_medical_clearance' => 'array',
    'lifestyle_activity_level' => 'array',
    'exercise_routine' => 'array',
    'functional_limitations' => 'array',
    'goals_from_therapy' => 'array',
    'home_virtual_session_safety' => 'array',
  ];
}
