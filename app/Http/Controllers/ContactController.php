<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use App\Mail\UserThankYouMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('Home.contact-us');
    }

    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|string|max:800',
            'email' => 'required|email|max:900',
            'country' => 'required|string|max:900',
            'phone' => 'required|string|max:900',
            'message' => 'required|string|max:900',
            'sms_consent' => 'accepted',
            'g-recaptcha-response' => 'required',
        ], [
            'g-recaptcha-response.required' => 'Please confirm that you are not a robot.',
            'sms_consent.accepted' => 'Please check this box if you want to proceed.',
        ]);

        if ($v->fails()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'ok' => false,
                    'errors' => $v->errors()
                ], 422);
            }

            return back()->withErrors($v)->withInput();
        }

        try {
            $captchaResponse = Http::asForm()->post(
                'https://www.google.com/recaptcha/api/siteverify',
                [
                    'secret' => config('services.recaptcha.secret_key'),
                    'response' => $request->input('g-recaptcha-response'),
                    'remoteip' => $request->ip(),
                ]
            );

            if (
                !$captchaResponse->successful() ||
                !$captchaResponse->json('success')
            ) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'ok' => false,
                        'errors' => [
                            'g-recaptcha-response' => [
                                'Captcha verification failed. Please try again.'
                            ]
                        ]
                    ], 422);
                }

                return back()
                    ->withErrors([
                        'g-recaptcha-response' => 'Captcha verification failed. Please try again.'
                    ])
                    ->withInput();
            }
        } catch (\Throwable $e) {
            Log::error('reCAPTCHA verification failed: ' . $e->getMessage());

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'ok' => false,
                    'errors' => [
                        'g-recaptcha-response' => [
                            'Captcha verification could not be completed. Please try again.'
                        ]
                    ]
                ], 422);
            }

            return back()
                ->withErrors([
                    'g-recaptcha-response' => 'Captcha verification could not be completed. Please try again.'
                ])
                ->withInput();
        }

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        try {
            Mail::to('benishk800@gmail.com')->send(new ContactMail($contact));
        } catch (\Throwable $e) {
            Log::error('Admin mail failed: ' . $e->getMessage());
        }

        try {
            Mail::to($contact->email)->send(new UserThankYouMail($contact));
        } catch (\Throwable $e) {
            Log::error('User mail failed: ' . $e->getMessage());
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'ok' => true,
                'message' => 'Thank you. Your message has been submitted.'
            ]);
        }

        return back()->with(
            'toast.ok',
            'Thank you. Your message has been submitted.'
        );
    }
}
