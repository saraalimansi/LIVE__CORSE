<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\LiveStream;
use App\Events\HandRaised;
use App\Events\ScreenShare;
use App\Events\CameraStopped;
use App\Events\NewMessage;
use App\Models\Student;
use App\Models\Teacher;

class BroadcastController extends Controller
{
    public function showBroadcast()
    {
        $teacher = Auth::user()->teacher;
        return view('broadcast', compact('teacher'));
    }

    public function showStudentBroadcast($teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);
        return view('student_broadcast', compact('teacher'));
    }

    public function currentStudents()
    {
        $students = Student::where('in_broadcast', true)->get();
        return response()->json($students);
    }

    public function enterBroadcast(Request $request)
    {
        $user = Auth::user();
        $student = $user->student;

        if ($student) {
            $teacher = $student->teacher()->where('broadcast_started', true)->first();

            if ($teacher) {
                $student->in_broadcast = true;
                $student->save();
                return redirect()->route('showStudentBroadcast', ['teacherId' => $teacher->id])->with('status', 'تم الانضمام إلى البث بنجاح');
            } else {
                return redirect()->back()->with('error', 'لم يبدأ المدرس البث بعد.');
            }
        }

        return redirect()->back()->with('error', 'تعذر العثور على بيانات الطالب.');
    }

    public function exitBroadcast(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'student') {
            $student = $user->student;
            if ($student) {
                $student->in_broadcast = false;
                $student->save();
                $subject = $student->subject()->first();

                if ($subject) {
                    $subjectId = $subject->id;
                    return redirect()->route('subject.show', ['id' => $subjectId])->with('status', 'تم الخروج من البث بنجاح');
                } else {
                    return redirect()->route('default.route')->with('status', 'تم الخروج من البث، لكن لم يتم العثور على المادة.');
                }
            }
        }
        

        if ($user->role === 'teacher') {
            $teacher = $user->teacher;
            if ($teacher) {
                $teacher->broadcast_started = false;
                $teacher->save();
                return redirect()->route('showSubjects', ['id' => $teacher->id])->with('status', 'تم الخروج من البث بنجاح');
            }
        }

        return redirect()->back()->with('error', 'تعذر العثور على بيانات المستخدم.');
    }

    public function startBroadcast(Request $request)
{
    $user = Auth::user();
    $teacher = Teacher::where('user_id', $user->id)->first();

    if ($teacher) {
        $teacher->broadcast_started = true;
        $teacher->save();

        broadcast(new LiveStream('start_broadcast', $teacher->id));

        return response()->json(['status' => 'success', 'message' => 'بدأ البث بنجاح']);
    }

    return response()->json(['status' => 'error', 'message' => 'تعذر العثور على بيانات المدرس.'], 404);
}

    public function removeStudent(Request $request, $studentId)
    {
        $user = Auth::user();

        if ($user->role === 'teacher') {
            $student = Student::find($studentId);
            if ($student) {
                $student->in_broadcast = false;
                $student->save();
                return redirect()->back()->with('status', 'تم إزالة الطالب من البث بنجاح');
            }
            return redirect()->back()->with('error', 'تعذر العثور على بيانات الطالب.');
        }

        return redirect()->back()->with('error', 'تعذر العثور على بيانات المستخدم.');
    }

    public function raiseHand(Request $request)
    {
        $user = Auth::user();
        if ($user->role === 'student') {
            $student = $user->student;
            if ($student) {
                $student->hand_raised = $request->input('hand_raised');
                $student->save();

                broadcast(new HandRaised($student))->toOthers();

                return response()->json(['status' => 'success']);
            }
        }

        return response()->json(['status' => 'error'], 403);
    }

    public function shareScreen(Request $request)
    {
        $user = Auth::user();
        if ($user->role === 'teacher' || $user->role === 'student') {
            $screenShareData = $request->input('screenShareData');

            broadcast(new ScreenShare($screenShareData))->toOthers();

            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error'], 403);
    }
    public function stopCamera(Request $request)
    {
        $user = Auth::user();
        if ($user->role === 'teacher') {
            $teacher = $user->teacher;
            if ($teacher) {
                broadcast(new CameraStopped($teacher->id))->toOthers();
                return response()->json(['status' => 'success']);
            }
        }

        return response()->json(['status' => 'error'], 403);
    }


    public function sendMessage(Request $request)
    {
        try {
            $message = $request->input('message');
            $sender = $request->input('sender');

            event(new NewMessage($sender, $message));

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}


