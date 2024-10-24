<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DonorController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the search query
        $query = $request->input('search');
    
        // Fetch donors based on the search query
        $donors = Donor::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('donor_name', 'like', "%{$query}%")
                                ->orWhere('donor_email', 'like', "%{$query}%");
        })->get();
    
        // Pass the donors and the query to the view
        return view('layouts.donor.index', compact('donors', 'query'));
    }
    


    public function loginPage()
    {
        return view('layouts.donor.auth');
    }
    

    public function authenticate(Request $request)
    {
        $credentials = $request->only('donor_email', 'password');
    
        // Check if the donor exists and password is correct
        $donor = Donor::where('donor_email', $credentials['donor_email'])->first();
    
        if ($donor && Hash::check($credentials['password'], $donor->password)) {
            // If credentials match, redirect to donor's profile with a success message
            return redirect()->route('donor_show', ['id' => $donor->id])->with('success', 'Login successful! Welcome back, ' . $donor->donor_name . '!');
        } else {
            // If credentials do not match, return to the login page with an error message
            return redirect()->route('login')->with('error', 'Invalid email or password. Please try again.');
        }
    }
    
    public function show($id)
    {
        // Fetch the donor by ID
        $donor = Donor::find($id);
        return view('layouts.donor.show', compact('donor'));
    }

    public function logout_donor()
    {
        Auth::logout(); // Logs out the user
        
        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Redirect to the login page after logout
    }


}
