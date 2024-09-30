<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\StudentAssignment;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function show($id)
    {
        $subject = Subject::with(['teacher', 'files'])->findOrFail($id);

        $teacherAssignments = Assignment::where('subject_id', $id)->get();
        $studentAssignments = StudentAssignment::where('subject_id', $id)->get();

        return view('subject', compact('subject', 'teacherAssignments', 'studentAssignments'));
    }




    public function upload(Request $request)
    {
        $request->validate([
            'assignment' => 'required|file',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        if ($request->hasFile('assignment')) {
            $assignment = new StudentAssignment();
            $assignment->name = $request->assignment->getClientOriginalName();
            $assignment->subject_id = $request->subject_id;
            $assignment->student_id = auth()->user()->student->id;

            $assignment->save();

            $assignmentName = time() . '_' . $request->assignment->getClientOriginalName();
            $request->assignment->move(public_path('assignmentstudent'), $assignmentName);

            $assignment->name = $assignmentName;
            $assignment->save();

            return redirect()->back()->with('success', 'تم رفع الواجب بنجاح');
        }
    }


    public function deleteTeacherAssignment(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|exists:teacher_assignments,id',
        ]);

        $assignment = Assignment::findOrFail($request->assignment_id);
        $assignment->delete();

        return redirect()->back()->with('success', 'تم حذف الواجب بنجاح');
    }

    public function deleteStudentAssignment(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|exists:student_assignments,id',
        ]);

        $assignment = StudentAssignment::findOrFail($request->assignment_id);
        $assignment->delete();

        return redirect()->back()->with('success', 'تم حذف الواجب بنجاح');
    }




}
