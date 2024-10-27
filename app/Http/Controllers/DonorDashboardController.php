<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;

class DonorDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->query('search');
    
        // Check if there's a search query
        if ($search) {
            // Filter the donors based on the search query
            $donors = Donor::where('donor_name', 'LIKE', "%{$search}%")
                        ->orWhere('donor_email', 'LIKE', "%{$search}%")
                        ->orWhere('fund_name', 'LIKE', "%{$search}%")
                        ->orWhere('year_of_establishment', 'LIKE', "%{$search}%")
                        ->paginate(10);
        } else {
            // Get all donors if no search query is present
            $donors = Donor::paginate(10);
        }
    
        // Pass the search term back to the view for displaying in the search input
        return view('dashboard.donor.index', compact('donors', 'search'));
    }
    


    public function donor_form()
    {
        return view('dashboard.donor.add_donors');
    }



    public function adddonors(Request $request)
    {
        // Validate the request data
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'fund_name' => 'required|string|max:255',
            'donor_email' => 'required|email|max:255|unique:donors,donor_email', // Unique email
            'password' => 'required|string|min:8', // Password validation
            'year_of_establishment' => 'required|integer',
            'amount_received' => 'required|regex:/^\d+(\.\d{1,2})?$/', // Decimal validation
            'number_of_beneficiaries' => 'required|integer',
            'donor_report_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // File validation (optional)
        ]);
    
        // Handle the file upload if it exists
        $filePath = null;
        if ($request->hasFile('donor_report_file')) {
            $file = $request->file('donor_report_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('student_reports'), $fileName);
    
            // Store the file path
            $filePath = 'student_reports/' . $fileName;
        }
    
        // Create a new donor and check for success
        $donor = Donor::create([
            'donor_name' => $request->donor_name,
            'fund_name' => $request->fund_name,
            'donor_email' => $request->donor_email,
            'password' => bcrypt($request->password), // Hash the password
            'year_of_establishment' => $request->year_of_establishment,
            'amount_received' => $request->amount_received,
            'number_of_beneficiaries' => $request->number_of_beneficiaries,
            'donor_report_file' => $filePath, // Store the file path in the database
        ]);
    
        // Redirect with appropriate message based on the outcome
        if ($donor) {
            return redirect()->back()->with('success', 'Donor information added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add donor');
        }
    }
    


public function edit($id)
{
    // Retrieve the donor by their ID
    $donors = Donor::find($id);

    if (!$donors) {
        return back()->with('error', 'Donor not found');
    }

    // Return the edit view without trying to decrypt the password
    return view('dashboard.donor.edit', compact('donors'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'donor_name' => 'required|string|max:255',
        'fund_name' => 'required|string|max:255',
        'donor_email' => 'required|email|max:255',
        'year_of_establishment' => 'required|integer|min:1900|max:' . date('Y'),
        'amount_received' => 'required|numeric|min:0',
        'number_of_beneficiaries' => 'required|integer|min:0',
        'password' => 'nullable|string|min:6|confirmed',
        'donor_report_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Validate file type and size
    ]);

    // Find the donor record
    $donors = Donor::find($id);

    if (!$donors) {
        return back()->with('error', 'Donor not found');
    }

    // Update donor details
    $donors->donor_name = $request->donor_name;
    $donors->fund_name = $request->fund_name;
    $donors->donor_email = $request->donor_email;
    $donors->year_of_establishment = $request->year_of_establishment;
    $donors->amount_received = $request->amount_received;
    $donors->number_of_beneficiaries = $request->number_of_beneficiaries;

    // Update password only if provided
    if ($request->filled('password')) {
        $donors->password = bcrypt($request->password);
    }

    // Check if a new donor report file has been uploaded
    if ($request->hasFile('donor_report_file')) {
        // Delete the old file if it exists
        if ($donors->donor_report_file) {
            $oldFilePath = public_path($donors->donor_report_file);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath); // Delete the existing file
            }
        }

        // Move the new file to the public directory
        $file = $request->file('donor_report_file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('student_reports'), $fileName);
    
        // Store the new file path
        $donors->donor_report_file = 'student_reports/' . $fileName;
    }

    // Save the updated donor record
    $donors->save();

    return redirect()->back()->with('success', 'Donor updated successfully');
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
