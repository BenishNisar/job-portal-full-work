<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class AccountSettingsController extends Controller
{
    //
      // Show Account Settings Page
      public function index()
      {
          return view('Dashboard.admin.account_settings.index');
      }

      // Update User Info
      public function update(Request $request, $id = null)
      {
          $user = User::findOrFail($id ?? auth()->id()); // fallback to logged-in user

          $validatedData = $request->validate([
              'firstname' => 'required|string|max:255',
              'lastname'  => 'required|string|max:255',
              'email'     => 'required|email|unique:users,email,' . $user->id,
              'password'  => 'nullable|min:6|confirmed',
              'city'      => 'nullable|string|max:255',
              'country'   => 'required|string|max:255',
              'organization' => 'required|string|max:255',
              'profile_img'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
          ]);

          // Update password if present
          if ($request->filled('password')) {
              $user->password = Hash::make($request->password);
          }

          // Update profile image if uploaded
          if ($request->hasFile('profile_img')) {
              $file = $request->file('profile_img');
              $filename = time() . '_' . $file->getClientOriginalName();
              $file->move(public_path('assets/profile_images'), $filename);
              $user->profile_img = 'assets/profile_images/' . $filename;
          }

          // Fill and save remaining fields
          $user->fill($request->except(['password', 'profile_img']));
          $user->save();

          return redirect()->route('Dashboard.admin.account_settings.index')->with('success', 'User updated successfully!');
      }

}
