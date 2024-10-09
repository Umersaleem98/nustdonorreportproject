<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorDashboardController extends Controller
{
<<<<<<< HEAD
    public function index(Request $request)
{
    // Get the search query from the request
    $search = $request->query('search');

    // If there's a search query, filter the donors, otherwise return all
    if ($search) {
        $donors = Donor::where('donor_name', 'LIKE', "%{$search}%")
                    ->orWhere('donor_email', 'LIKE', "%{$search}%")
                    ->orWhere('year_of_establishment', 'LIKE', "%{$search}%")
                    ->paginate(10);
    } else {
        // Return all donors if no search query is present
        $donors = Donor::paginate(10);
    }

    // Return the view with the donors data
    return view('dashboard.donor.index', compact('donors'));
}



    public function edit($id)
    {
        $donors = Donor::find($id);
        return view('dashboard.donor.edit', compact('donors'));
    }


    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'fund_name' => 'required|string|max:255',
            'donor_email' => 'required|email|max:255',
            'year_of_establishment' => 'required|numeric',
            'amount_received' => 'required|numeric',
            'number_of_beneficiaries' => 'required|numeric',
        ]);

        // Find the donor by ID
        $donors = Donor::find($id);

        if (!$donors) {
            return redirect()->back()->with('error', 'Donor not found');
        }

        // Update the donor's information
        $donors->donor_name = $request->donor_name;
        $donors->fund_name = $request->fund_name;
        $donors->donor_email = $request->donor_email;
        $donors->year_of_establishment = $request->year_of_establishment;
        $donors->amount_received = $request->amount_received;
        $donors->number_of_beneficiaries = $request->number_of_beneficiaries;

        // Save the updated donor information
        $donors->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Donor information updated successfully');
    }

    public function delete($id)
    {
        // Find the donor by ID
        $donor = Donor::find($id);

        // Check if the donor exists
        if (!$donor) {
            return redirect()->back()->with('error', 'Donor not found');
        }

        // Delete the donor record
        $donor->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Donor deleted successfully');
    }

=======
    public function index()
    {
        $perPage = 10; // You can change this number to any other value you prefer
    
        $donors = Donor::paginate($perPage);
        return view('dashboard.donor.index', compact('donors'));
    }
>>>>>>> 16e7b67daf41c455376adb2b8c94c1fd4e3932be
}
