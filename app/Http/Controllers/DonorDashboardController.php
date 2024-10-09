<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorDashboardController extends Controller
{
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
        'password' => 'required|string|min:8|max:255', // Set proper password validation
        'year_of_establishment' => 'required|digits:4|integer|min:1900|max:' . date('Y'), // Year should be valid and within a range
        'amount_received' => 'required|numeric|min:0', // Ensure amount is numeric and not negative
        'number_of_beneficiaries' => 'required|integer|min:1', // Must be a positive integer
    ]);

    // Find the donor by ID
    $donor = Donor::find($id);

    if (!$donor) {
        return redirect()->back()->with('error', 'Donor not found');
    }

    // Update the donor's information
    $donor->donor_name = $request->donor_name;
    $donor->fund_name = $request->fund_name;
    $donor->donor_email = $request->donor_email;
    $donor->password = bcrypt($request->password); // Encrypt the password
    $donor->year_of_establishment = $request->year_of_establishment;
    $donor->amount_received = $request->amount_received;
    $donor->number_of_beneficiaries = $request->number_of_beneficiaries;

    // Save the updated donor information
    $donor->save();

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

}
