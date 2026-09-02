<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Role;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Users listing + search
     */
    public function index(Request $r)
    {
        $q = trim($r->get('q', ''));

        $users = User::query()
            ->leftJoin('role', 'users.role_id', '=', 'role.id')
            ->when($q, function ($query) use ($q) {
                $like = "%{$q}%";
                $query->where(function ($w) use ($like) {
                    $w->where('users.firstname', 'like', $like)
                      ->orWhere('users.lastname', 'like', $like)
                      ->orWhere('users.email', 'like', $like)
                      ->orWhere('users.phone', 'like', $like)
                      ->orWhere('users.mobile_phone', 'like', $like)
                      ->orWhere('users.city', 'like', $like)
                      ->orWhere('users.country', 'like', $like)
                      ->orWhere('users.zip_code', 'like', $like)
                      ->orWhere('users.organization', 'like', $like)
                      ->orWhere('role.role_name', 'like', $like);
                });
            })
            ->select('users.*', 'role.role_name')
            ->orderByDesc('users.id')
            ->paginate(15)
            ->withQueryString();

        return view('Dashboard.admin.users.index', compact('users', 'q'));
    }

    /**
     * Show create form
     */
    public function add()
    {
        $roles = Role::all();
        return view('Dashboard.admin.users.add', compact('roles'));
    }

    /**
     * Store new user
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname'      => 'required|string|max:255',
            'lastname'       => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'phone'          => 'required|string|max:50',
            'mobile_phone'   => 'nullable|string|max:50',
            'password'       => 'required|min:6',
            'gender'         => 'required|in:male,female,other',
            'date_of_birth'  => 'nullable|date',
            'city'           => 'required|string|max:255',
            'country'        => 'required|string|max:255',
            'zip_code'       => 'required|string|max:50',
            'address_line1'  => 'nullable|string|max:500',
            'address_line2'  => 'nullable|string|max:500',
            'role_id'        => 'required|integer|exists:role,id',
            'organization'   => 'required|string|max:255',
            'profile_img'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB
        ]);

        // ✅ Default profile image
        $path = 'assets/profile_images/default.png';

        // ✅ Handle Profile Image Upload
        if ($request->hasFile('profile_img')) {
            $file     = $request->file('profile_img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/profile_images'), $filename);
            $path = 'assets/profile_images/' . $filename;
        }

        // ✅ Create New User (saare important fields ke sath)
        User::create([
            'firstname'      => $validatedData['firstname'],
            'lastname'       => $validatedData['lastname'],
            'email'          => $validatedData['email'],
            'phone'          => $validatedData['phone'],
            'mobile_phone'   => $validatedData['mobile_phone'] ?? null,
            'password'       => Hash::make($validatedData['password']),
            'gender'         => $validatedData['gender'],
            'date_of_birth'  => $validatedData['date_of_birth'] ?? null,
            'city'           => $validatedData['city'],
            'country'        => $validatedData['country'],
            'zip_code'       => $validatedData['zip_code'],
            'address_line1'  => $validatedData['address_line1'] ?? null,
            'address_line2'  => $validatedData['address_line2'] ?? null,
            'role_id'        => $validatedData['role_id'],
            'organization'   => $validatedData['organization'],
            'profile_img'    => $path,
        ]);

        return redirect()
            ->route('Dashboard.admin.users.index')
            ->with('success', 'User added successfully!');
    }

    /**
     * Edit form
     */
    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::all();

        return view('Dashboard.admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update user
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'firstname'      => 'required|string|max:255',
            'lastname'       => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email,' . $id,
            'phone'          => 'required|string|max:50',
            'mobile_phone'   => 'nullable|string|max:50',
            'password'       => 'nullable|min:6',
            'gender'         => 'required|in:male,female,other',
            'date_of_birth'  => 'nullable|date',
            'city'           => 'required|string|max:255',
            'country'        => 'required|string|max:255',
            'zip_code'       => 'required|string|max:50',
            'address_line1'  => 'nullable|string|max:500',
            'address_line2'  => 'nullable|string|max:500',
            'role_id'        => 'required|integer|exists:role,id',
            'organization'   => 'required|string|max:255',
            'profile_img'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // ✅ Password change (optional)
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        // ✅ Profile image update
        if ($request->hasFile('profile_img')) {
            // purani image delete karni ho to yahan check laga sakti ho
            $file     = $request->file('profile_img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/profile_images'), $filename);
            $user->profile_img = 'assets/profile_images/' . $filename;
        }

        // ✅ Normal fields update
        $user->firstname      = $validatedData['firstname'];
        $user->lastname       = $validatedData['lastname'];
        $user->email          = $validatedData['email'];
        $user->phone          = $validatedData['phone'];
        $user->mobile_phone   = $validatedData['mobile_phone'] ?? null;
        $user->gender         = $validatedData['gender'];
        $user->date_of_birth  = $validatedData['date_of_birth'] ?? null;
        $user->city           = $validatedData['city'];
        $user->country        = $validatedData['country'];
        $user->zip_code       = $validatedData['zip_code'];
        $user->address_line1  = $validatedData['address_line1'] ?? null;
        $user->address_line2  = $validatedData['address_line2'] ?? null;
        $user->role_id        = $validatedData['role_id'];
        $user->organization   = $validatedData['organization'];

        $user->save();

        return redirect()
            ->route('Dashboard.admin.users.index')
            ->with('success', 'User updated successfully!');
    }

    /**
     * Delete user
     */
    public function delete($id)
    {
        User::findOrFail($id)->delete();

        return redirect()
            ->route('Dashboard.admin.users.index')
            ->with('success', 'User deleted successfully!');
    }

    /**
     * View user detail
     */
    public function view($id)
    {
        $user = User::with('role')->findOrFail($id);
        return view('Dashboard.admin.users.view', compact('user'));
    }
}
