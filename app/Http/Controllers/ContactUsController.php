<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::all();
        return view('Dashboard.admin.contactus.index', compact('contacts'));
    }


    public function add()
    {
        return view('Dashboard.admin.contactus.add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
             'country'=> 'required',
             'phone'=>'required',
             'message' => 'required|string',

        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return redirect()->route('Dashboard.admin.contactus.index')->with('success', 'Contact message saved successfully.');
    }


    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('Dashboard.admin.contactus.edit', compact('contact'));
    }


    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
             'country'=> 'required',
             'phone'=>'required',
             'message' => 'required|string',
        ]);

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return redirect()->route('Dashboard.admin.contactus.index')->with('success', 'Contact message updated successfully.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('Dashboard.admin.contactus.index')->with('success', 'Contact message deleted successfully.');
    }

    public function view($id)
{
    $contact = Contact::findOrFail($id);
    return view('Dashboard.admin.contactus.view', compact('contact'));
}

}
