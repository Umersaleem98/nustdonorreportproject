<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\Imports\StudentssImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentsDashboardController extends Controller
{
    public function index(Request $request)
{
    // Set the number of students to display per page
    $perPage = 10; // You can change this number to any other value you prefer

    // Initialize the query for students
    $query = Student::query();

    // Check if a search term is provided
    if ($request->has('search') && $request->input('search') != '') {
        $search = $request->input('search');
        
        // Modify the query to filter based on the search term
        $query->where(function($q) use ($search) {
            $q->where('name_of_student', 'LIKE', "%$search%")
              ->orWhere('qalam_id', 'LIKE', "%$search%");
        });
    }

    // Fetch paginated students from the database
    $students = $query->paginate($perPage);

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

    public function editstudents($id)
    {
        $students = Student::find($id);

        return view('dashboard.Students.edit', compact('students'));
    }

    public function updatestudent(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'qalam_id' => 'required|string|max:255',
        'name_of_student' => 'required|string|max:255',
        'father_profession' => 'required|string|max:255',
        'institutions' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'program' => 'required|string|max:255',
        'nust_trust_fund_donor_name' => 'required|string|max:255',
        'degree' => 'required|string|max:255',
        'year_of_admission' => 'required|integer',
        'remarks_status' => 'required|string|max:255',
        'donor_id' => 'required|integer',
        'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
    ]);

    // Find the student by ID
    $student = Student::findOrFail($id);

    // Update the student's information
    $student->qalam_id = $request->qalam_id;
    $student->name_of_student = $request->name_of_student;
    $student->father_profession = $request->father_profession;
    $student->institutions = $request->institutions;
    $student->city = $request->city;
    // Assuming semester fields are also in the request
    $student->semester_1 = $request->semester_1;
    $student->semester_2 = $request->semester_2;
    $student->semester_3 = $request->semester_3;
    $student->semester_4 = $request->semester_4;
    $student->semester_5 = $request->semester_5;
    $student->semester_6 = $request->semester_6;
    $student->semester_7 = $request->semester_7;
    $student->semester_8 = $request->semester_8;
    $student->program = $request->program;
    $student->nust_trust_fund_donor_name = $request->nust_trust_fund_donor_name;
    $student->degree = $request->degree;
    $student->year_of_admission = $request->year_of_admission;
    $student->remarks_status = $request->remarks_status;
    $student->donor_id = $request->donor_id;

    // Handle image upload if present
    if ($request->hasFile('images')) {
        // Check if there is an existing image
        if ($student->images) {
            // Define the image path
            $existingImagePath = public_path('student_images/' . $student->images);

            // Delete the existing image if it exists
            if (file_exists($existingImagePath)) {
                unlink($existingImagePath);
            }
        }

        // Process and move the new uploaded image
        $file = $request->file('images');
        $fileName = time() . '_' . $file->getClientOriginalName();
        if ($file->move(public_path('student_images'), $fileName)) {
            // Update the images attribute on the student model
            $student->images = $fileName;
        } else {
            // Handle file upload error
            return redirect()->back()->with('error', 'Failed to upload image');
        }
    }

    // Save the updated student data
    $student->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Student information updated successfully');
}






    public function delete($id)
    {
        // Find the donor by ID
        $students = Student::find($id);

        // Check if the stud$students exists
        if (!$students) {
            return redirect()->back()->with('error', 'students not found');
        }

        // Delete the stud$students record
        $students->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'students deleted successfully');
    }
}
