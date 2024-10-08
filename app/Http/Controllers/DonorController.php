<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

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
