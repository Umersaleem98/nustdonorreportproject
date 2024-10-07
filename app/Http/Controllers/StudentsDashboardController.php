<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\Imports\StudentssImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentsDashboardController extends Controller
{
    public function index()
    {
        // Set the number of students to display per page
        $perPage = 10; // You can change this number to any other value you prefer
    
        // Fetch paginated students from the database
        $students = Student::paginate($perPage);
    
        // Return the view with the students data
        return view('dashboard.Students.index', compact('students'));
    }
    
    public function import(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        // Import the data
        Excel::import(new StudentssImport, $request->file('file'));

        return back()->with('success', 'Students Imported Successfully!');
    }
}
