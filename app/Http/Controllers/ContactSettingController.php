<?php

namespace App\Http\Controllers;
use App\Models\ContactSetting;

use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    //
     // List
    public function index()
    {
        $settings = ContactSetting::orderBy('id', 'desc')->paginate(20);
        return view('Dashboard.admin.contact-settings.index', compact('settings'));
    }

    // Show Add form
    public function add()
    {
        return view('Dashboard.admin.contact-settings.add');
    }

    // Create
    public function store(Request $request)
    {
        $data = $request->validate([
            'note'    => 'nullable|string|max:255',
            'address' => 'required|string',
            'phones'  => 'nullable|string', // textarea (one per line)
            'emails'  => 'nullable|string', // textarea (one per line)
        ]);

        // Parse textarea -> arrays
        $phones = collect(preg_split('/\r\n|\r|\n/', $data['phones'] ?? ''))
                    ->map(fn($v) => trim($v))
                    ->filter()
                    ->values()
                    ->all();

        $emails = collect(preg_split('/\r\n|\r|\n/', $data['emails'] ?? ''))
                    ->map(fn($v) => trim($v))
                    ->filter()
                    ->values()
                    ->all();

        ContactSetting::create([
            'note'    => $data['note'] ?? null,
            'address' => $data['address'],
            'phones'  => $phones, // will be json-encoded by casts
            'emails'  => $emails, // will be json-encoded by casts
        ]);

        return redirect()->route('Dashboard.admin.contact-settings.index')
                         ->with('success', 'Contact settings created.');
    }

    // Show Edit form
    public function edit(ContactSetting $contact_setting)
    {
        return view('Dashboard.admin.contact-settings.edit', ['setting' => $contact_setting]);
    }

    // Update
    public function update(Request $request, ContactSetting $contact_setting)
    {
        $data = $request->validate([
            'note'    => 'nullable|string|max:255',
            'address' => 'required|string',
            'phones'  => 'nullable|string',
            'emails'  => 'nullable|string',
        ]);

        $phones = collect(preg_split('/\r\n|\r|\n/', $data['phones'] ?? ''))
                    ->map(fn($v) => trim($v))
                    ->filter()
                    ->values()
                    ->all();

        $emails = collect(preg_split('/\r\n|\r|\n/', $data['emails'] ?? ''))
                    ->map(fn($v) => trim($v))
                    ->filter()
                    ->values()
                    ->all();

        $contact_setting->update([
            'note'    => $data['note'] ?? null,
            'address' => $data['address'],
            'phones'  => $phones,
            'emails'  => $emails,
        ]);

        return redirect()->route('Dashboard.admin.contact-settings.index')
                         ->with('success', 'Contact settings updated.');
    }

    // Delete
    public function destroy(ContactSetting $contact_setting)
    {
        $contact_setting->delete();

        return redirect()->route('Dashboard.admin.contact-settings.index')
                         ->with('success', 'Contact settings deleted.');
    }
}
