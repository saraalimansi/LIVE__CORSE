<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\File;
use App\Models\StudentAssignment;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;


class TeacherController extends Controller
{

    public function showSubject($id)
    {
        $subject = Subject::findOrFail($id);
        $files = File::where('subject_id', $subject->id)->get();
        $assignments =Assignment::where('subject_id', $subject->id)->get();
        $studentSolutions = StudentAssignment::with('student')->where('subject_id', $id)->get();

        return view('teacher', compact('subject', 'files', 'assignments', 'studentSolutions'));
    }
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        // Create a new file instance
        $file = new File();
        $file->name = $request->file->getClientOriginalName();
        $file->subject_id = $request->subject_id;

        // Assign teacher id to the file
        $file->teacher_id = auth()->user()->teacher->id;

        // Save the file record
        $file->save();

        // Move the uploaded file to the 'public/files' directory
        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $request->file->move(public_path('files'), $fileName);

        // Update the file record with the new filename
        $file->name = $fileName;
        $file->save();

        return redirect()->back()->with('success', 'تم رفع الملف بنجاح');
    }


    public function deleteFile(Request $request)
    {
        $request->validate([
            'file_id' => 'required|exists:files,id',
        ]);

        File::destroy($request->file_id);
        return redirect()->back()->with('success', 'تم حذف الملف بنجاح');
    }

    public function createAssignment(Request $request)
    {
        $request->validate([
            'assignment' => 'required|file',
            'subject_id' => 'required|exists:subjects,id',

        ]);

        if ($request->hasFile('assignment')) {
            $assignment = new Assignment();
            $assignment->name = $request->assignment->getClientOriginalName();
            $assignment->subject_id = $request->subject_id;

            $assignment->teacher_id = auth()->user()->teacher->id;

            $assignment->save();

            // Save file to the public/assignments directory
            $assignmentName = time() . '_' . $request->assignment->getClientOriginalName();
            $request->assignment->move(public_path('assignments'), $assignmentName);

            // Update the assignment record with the new filename
            $assignment->name = $assignmentName;
            $assignment->save();

            return redirect()->back()->with('success', 'تم رفع الواجب بنجاح');
        }

    }


    public function deleteAssignment(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|exists:assignments,id',
        ]);

        Assignment::destroy($request->assignment_id);
        return redirect()->back()->with('success', 'تم حذف الواجب بنجاح');
    }


  
}


