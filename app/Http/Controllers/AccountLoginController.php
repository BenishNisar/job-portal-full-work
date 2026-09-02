<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Password;

use Illuminate\Support\Str;

class AccountLoginController extends Controller
{
    //
    // public function index(){
    //     return view("auth.accountlogin");
    // }
public function index()
{
    return response()
        ->view("auth.accountlogin")
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
}




// public function store(Request $request)
// {
//     $request->validate([
//         "email" => "required",
//         "password" => "required"
//     ]);

//     $credentials = $request->only("email","password");

//     if (Auth::attempt($credentials, $request->filled('remember'))) {
//         $request->session()->regenerate();

//         $user = Auth::user();

//         if ($user->role_id == 1) {
//             return redirect()->route("Dashboard.admin.dashboard");
//         }

//         if ($user->role_id == 2) {
//             return redirect()->route("Home.welcome");
//         }

//         Auth::logout();
//         return redirect("/accountlogin")->withErrors(["error" => "Unauthorized access."]);
//     }

//     return redirect("/accountlogin")->withErrors(["email" => "Invalid login credentials."]);
// }
public function store(Request $request)
{
    $request->validate([
        "email" => "required",
        "password" => "required"
    ]);

    $credentials = $request->only("email", "password");

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        $user = Auth::user();

        if ((int) $user->role_id === 1) {
            return redirect()->route("Dashboard.admin.dashboard");
        }

        if ((int) $user->role_id === 3) {
            return redirect()->route("Dashboard.admin.dashboard");
        }

        if ((int) $user->role_id === 2) {
            return redirect()->route("Home.welcome");
        }

        Auth::logout();

        return redirect("/accountlogin")->withErrors([
            "error" => "Unauthorized access."
        ]);
    }

    return redirect("/accountlogin")->withErrors([
        "email" => "Invalid login credentials."
    ]);
}
public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect("/accountlogin")->with("successfully");
    }


    public function showForgetForm(){
        return view('auth.forget-password');
    }

//     public function submitForgetForm(Request $request){
//         $request->validate(['email' => 'required|email|exists:users,email']);
//         $token = Str::random(64);

//         PasswordReset::create([
//             'email' => $request->email,
//             'token' => $token,
//             'created_at' => now()
//         ]);

//         // ✅ Correct Reset Link
//         $link = url('/reset-password/'.$token.'?email='.$request->email);

//         // ✅ Send Mail
//         // Mail::raw("Reset your password using this link: ".$link, function($message) use($request){
//         //     $message->to($request->email);
//         //     $message->subject('Password Reset Link');
//         // });

// Mail::send([], [], function ($message) use ($request, $link) {
//     $message->to($request->email)
//         ->subject('Password Reset Link')
//         ->html('
//             <div style="font-family:Arial,sans-serif;max-width:520px;margin:0 auto;padding:20px;border:1px solid #e5e7eb;border-radius:12px;">
//               <h2 style="margin:0 0 10px;color:#111827;">Reset your password</h2>
//               <p style="margin:0 0 14px;color:#374151;line-height:1.5;">
//                 You requested a password reset. Click the button below to set a new password.
//               </p>
//               <a href="'.$link.'" style="display:inline-block;background:#7a958f;color:#ffffff;text-decoration:none;padding:10px 16px;border-radius:999px;font-weight:600;">
//                 Reset Password
//               </a>
//               <p style="margin:14px 0 0;color:#6b7280;font-size:12px;line-height:1.5;">
//                 If you did not request this, you can ignore this email.
//               </p>
//             </div>
//         ');
// });


//         // ✅ Pass Link to View using Session
//         return back()->with([
//             'message' => 'Reset link sent successfully.',
//             'reset_link' => $link
//         ]);
//     }


public function submitForgetForm(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    return back()->with('message', __($status));
}






    public function showResetForm(Request $request, $token){
        $email = $request->query('email'); // URL se email lo

        return view('auth.reset-password', compact('token', 'email'));
    }


//  public function submitResetForm(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:6|confirmed',
//         'token' => 'required'
//     ]);

// $email = strtolower(trim($request->email));
// $hashedToken = hash('sha256', $request->token);

// $resetRow = PasswordReset::where('email', $email)
//     ->where('token', $hashedToken)
//     ->first();

// if (!$resetRow) {
//     return back()->withErrors(['email' => 'Invalid or expired link.']);
// }

// if ($resetRow->created_at && now()->diffInMinutes(Carbon::parse($resetRow->created_at)) > 30) {
//     PasswordReset::where('email', $email)->delete();
//     return back()->withErrors(['email' => 'Invalid or expired link.']);
// }


//     $user = User::where('email', $email)->first();
//     if (!$user) {
//         return back()->withErrors(['email' => 'Invalid request.']);
//     }

//     $user->password = Hash::make($request->password);
//     $user->save();

//     PasswordReset::where('email', $email)->delete();

//     Auth::login($user);

//     if ($user->role_id == 1) return redirect()->route('Dashboard.admin.dashboard')->with('message', 'Password changed successfully');
//     if ($user->role_id == 2) return redirect()->route('Home.submit-medical-history')->with('message', 'Password changed successfully');

//     Auth::logout();
//     return redirect('/accountlogin')->withErrors(['error' => 'Unauthorized access']);
// }

public function submitResetForm(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email','password','password_confirmation','token'),
        function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
            Auth::login($user);
        }
    );

    if ($status === Password::PASSWORD_RESET) {
        $user = Auth::user();
        if ($user->role_id == 1) return redirect()->route('Dashboard.admin.dashboard');
        if ($user->role_id == 2) return redirect()->route('Home.laywelcome');
    }

    return back()->withErrors(['email' => __($status)]);
}

    public function showRegisterForm()
{
    return view('auth.register');
}

// public function register(Request $request)
// {
//     $request->validate([
//         'firstname' => 'required|string|max:255',
//         'lastname' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email',
//         'phone' => 'required|string|max:50',
//         'gender' => 'required|string|max:50',
//         'city' => 'required|string|max:255',
//         'country' => 'required|string|max:255',
//         'zip_code' => 'required|string|max:50',
//         'organization' => 'required|string|max:255',
//         'password' => 'required|min:6|confirmed',
//     ]);

//     $user = User::create([
//         'firstname' => $request->firstname,
//         'lastname' => $request->lastname,
//         'email' => $request->email,
//         'phone' => $request->phone,
//         'mobile_phone' => $request->mobile_phone,
//         'password' => Hash::make($request->password),
//         'gender' => $request->gender,
//         'date_of_birth' => $request->date_of_birth,
//         'city' => $request->city,
//         'country' => $request->country,
//         'zip_code' => $request->zip_code,
//         'address_line1' => $request->address_line1,
//         'address_line2' => $request->address_line2,
//         'role_id' => 2,
//         'organization' => $request->organization,
//         'profile_img' => null,
//     ]);

//     Auth::login($user);
//     $request->session()->regenerate();

//     return redirect()->route('Home.submit-medical-history');
// }
// public function register(Request $request)
// {
//     $request->validate([
//         'firstname' => 'required|string|max:255',
//         'lastname' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email',
//         'phone' => 'required|string|max:50',
//         'gender' => 'required|string|max:50',
//         'city' => 'required|string|max:255',
//         'country' => 'required|string|max:255',
//         'zip_code' => 'required|string|max:50',
//         'organization' => 'required|string|max:255',
//         'password' => 'required|min:6|confirmed',
//     ]);

//     User::create([
//         'firstname' => $request->firstname,
//         'lastname' => $request->lastname,
//         'email' => $request->email,
//         'phone' => $request->phone,
//         'mobile_phone' => $request->mobile_phone,
//         'password' => Hash::make($request->password),
//         'gender' => $request->gender,
//         'date_of_birth' => $request->date_of_birth,
//         'city' => $request->city,
//         'country' => $request->country,
//         'zip_code' => $request->zip_code,
//         'address_line1' => $request->address_line1,
//         'address_line2' => $request->address_line2,
//         'role_id' => 2,
//         'organization' => $request->organization,
//         'profile_img' => null,
//     ]);

//     return redirect()->route('auth.accountlogin')
//         ->with('success', 'Account created successfully. Please sign in.');
// }

public function register(Request $request)
{
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname'  => 'required|string|max:255',
        'email'     => 'required|email|unique:users,email',
        'phone'     => 'required|string|max:50',
        'password'  => 'required|min:6|confirmed',
    ]);

    User::create([
        'firstname'     => $request->firstname,
        'lastname'      => $request->lastname,
        'email'         => $request->email,
        'phone'         => $request->phone,
        'mobile_phone'  => $request->mobile_phone,
        'password'      => Hash::make($request->password),
        'role_id'       => 2,

        // Optional fields left empty for now
        'gender'        => null,
        'date_of_birth' => null,
        'city'          => null,
        'country'       => null,
        'zip_code'      => null,
        'organization'  => null,
        'address_line1' => null,
        'address_line2' => null,
        'profile_img'   => null,
    ]);

    return redirect()->route('auth.accountlogin')
        ->with('success', 'Account created successfully. Please sign in.');
}


}




