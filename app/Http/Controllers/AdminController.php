<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donor;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
   // AdminController.php

public function index()
{
    $students = Student::all();
    $studentsCount = $students->count();  // Count total donors
    $donors = Donor::all();  // Retrieve all donors
    $donorCount = $donors->count();  // Count total donors
    return view('dashboard', compact('donors', 'donorCount', 'students','studentsCount')); // Pass donors and donorCount to the view
}

    
    public function loginindex()
    {
        return view('userslogin');
    }
    
    public function loginsubmit(Request $request)
{
    // Validate the request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Attempt to log the user in with credentials
    $credentials = $request->only('email', 'password');

    // Check if the credentials match a user
    if (Auth::attempt($credentials)) {
        // Authentication passed, redirect to /admin
        return redirect()->intended('/admin');  // You can customize the dashboard route if needed
    }

    // Authentication failed, redirect back to /userlogin with an error message
    return redirect('/userlogin')->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput();
}



    public function register()
    {
        return view('signup');
    }



    public function registersubmit(Request $request)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Optionally, you can log the user in after registration
        // Auth::login($user);

        // Redirect the user to a different page (like a dashboard or login page)
        return redirect()->route('userlogin')->with('success', 'Registration successful. Please log in.');
    }



    public function logout(Request $request)
{
    Auth::logout(); // Logs out the user
    
    // Invalidate the session and regenerate the CSRF token
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/userlogin'); // Redirect to the login page after logout
}

}
