<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::all();
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
