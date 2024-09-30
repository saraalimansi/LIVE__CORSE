<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index($id)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Retrieve the authenticated user
            $user = Auth::user();

            // Check if the authenticated user is a student
            if ($user->role === 'student') {
                // Retrieve the student record associated with the user
                $student = Student::find($id);

                // Retrieve the subjects associated with the student
                $subjects = $student->subject; // Assuming you have a relationship named subjects in your Student model

                // Pass the subjects to the view
                return view('student',compact('subjects', 'student'));
            } else {
                // Redirect to the appropriate page for non-student users
                return redirect()->route('home')->with('error', 'You are not authorized to access this page.');
            }
        } else {
            // Redirect to the login page for unauthenticated users
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
    }



    public function joinSubject(Request $request)
{
    // Validate the form input
    $request->validate([
        'teacher_code' => 'required|string',
    ]);

    // Retrieve teacher data based on the provided code
    $teacher = Teacher::where('code', $request->teacher_code)->first();

    // Check if teacher exists
    if (!$teacher) {
        return redirect()->back()->withErrors(['teacher_code' => 'Teacher not found.']);
    }

    // Retrieve the authenticated user
    $user = Auth::user();

    // Debugging information
    if (!$user) {
        return redirect()->route('home')->with('error', 'No authenticated user found.');
    }

    // Check if the authenticated user has a student role
    if ($user->role !== 'student') {
        return redirect()->route('home')->with('error', 'You are not authorized to access this page.');
    }

    // Retrieve the student record associated with the user
    $student = $user->student;

    // Check if the student record exists
    if (!$student) {
        return redirect()->route('home')->with('error', 'Student record not found.');
    }

    // Retrieve or create the subject
    $subject = Subject::firstOrCreate(
        ['name' => $teacher->subject],
        [
            'teacher_code' => $teacher->code,
            'teacher_name' => $teacher->first_name . ' ' . $teacher->last_name,
            'photos' => $teacher->photos
        ]
    );

    // Attach subject to student without detaching existing subjects
    $student->subject()->syncWithoutDetaching([$subject->id]);

    // Update student's record with the teacher code
    $student->teacher_code = $teacher->code;
    $student->teacher()->attach($teacher->id, ['teacher_code' => $request->teacher_code]);
    $student->save();

    return redirect()->back()->with('status', 'Subject added successfully!');
}
public function removeSubject(Request $request, $subjectId)
{
    // Retrieve the authenticated user's student record
    $student = Auth::user()->student;

    // Check if the student is associated with the subject
    if ($student->subject()->where('subject_id', $subjectId)->exists()) {
        // Detach the subject from the student
        $student->subject()->detach($subjectId);
        return redirect()->back()->with('status', 'Subject removed successfully!');
    }

    return redirect()->back()->with('error', 'Subject not found for the student.');
}

}
