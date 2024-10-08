<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorDashboardController extends Controller
{
    public function index()
    {
        $perPage = 10; // You can change this number to any other value you prefer
    
        $donors = Donor::paginate($perPage);
        return view('dashboard.donor.index', compact('donors'));
    }
}
