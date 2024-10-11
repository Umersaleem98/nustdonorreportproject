<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DonorController extends Controller
{
    public function index(Request $request)
    {
        // Check if there is a search query
        $search = $request->input('search');
    
        // Fetch donors filtered by the search query
        $donors = Donor::when($search, function ($query, $search) {
            return $query->where('donor_name', 'like', "%{$search}%")
                         ->orWhere('donor_email', 'like', "%{$search}%");
        })->get();
    
        // Pass the donors to the view
        return view('layouts.donor.index', compact('donors'));
    }


    public function loginPage()
    {
        // // Check if donor ID is provided
        // $donor = null;
        // if ($id) {
        //     $donor = Donor::find($id);
        // }
    
        // Pass the donor data (if available) to the login view
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

    // public function show($id)
    // {
    //     // Fetch the donor by ID
    //     $donor = Donor::with('students')->find($id);
    //     return view('layouts.donor.show', compact('donor'));
    // }


}
