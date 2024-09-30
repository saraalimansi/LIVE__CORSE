<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BroadcastController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');
Route::view('/about', 'about');
Route::view('/privacy', 'privacy');
//Route::view('/student', 'student')->name('student');
//Route::view('/teacher', 'teacher')->name('teacher');
Route::view('/terms', 'terms');
Route::view('/subject', 'subject');
Route::view('/question', 'question');
//Route::view('/broadcast', 'broadcast')->name('broadcast');


//***********************authentication********************//
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [RegisterController::class, 'login']);

Route::get('/reset-password', [RegisterController::class, 'showResetForm'])->name('reset');
Route::post('/reset-password', [RegisterController::class, 'reset'])->name('reset');

Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');


/*************************************/
//**********TEACHER*************//

Route::get('/teacher/{id}', [TeacherController::class, 'showSubject'])->name('showSubjects');
Route::post('/upload-file', [TeacherController::class, 'uploadFile'])->name('upload.file');
Route::post('/delete-file', [TeacherController::class, 'deleteFile'])->name('delete.file');
Route::post('/upload-assigment', [TeacherController::class, 'createAssignment'])->name('upload.assigment');
Route::post('/delete-assigment', [TeacherController::class, 'deleteAssignment'])->name('delete.assigment');


//**************student**************//

Route::post('/subject/join', [StudentController::class, 'joinSubject'])->name('subject.join');
// Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/student/{id}', [StudentController::class, 'index'])->name('student.view');


Route::delete('/remove-subject/{subject}', [StudentController::class, 'removeSubject'])->name('subject.remove');

//************subject**************//

Route::get('/subject/{id}', [SubjectController::class, 'show'])->name('subject.show');
Route::post('/upload-assignment', [SubjectController::class, 'upload'])->name('upload.assignment');
Route::post('/delete-assignment', [SubjectController::class, 'delete'])->name('delete.assignment');
Route::post('/delete-teacher-assignment', [SubjectController::class, 'deleteTeacherAssignment'])->name('delete.teacher.assignment');
Route::post('/delete-student-assignment', [SubjectController::class, 'deleteStudentAssignment'])->name('delete.student.assignment');
//*********LiveStream for teacher**********//
// Route::get('/live-stream', [TeacherController::class, 'showLiveStream'])->middleware('auth')->name('live_stream');
// Route::post('/broadcast', [TeacherController::class, 'broadcast'])->middleware('auth');
// Route::get('/stopBroadcast', [TeacherController::class, 'stopBroadcast'])->middleware('auth')->name('stopBroadcast');
//******************Broadcast student**********************//

// Route::post('/join-broadcast', [BroadcastController::class, 'joinBroadcast'])->name('joinBroadcast')->middleware('auth');
// Route::post('/removeStudent', [BroadcastController::class, 'removeStudent'])->name('removeStudent');

Route::middleware(['auth'])->group(function () {
        Route::get('/broadcast', [BroadcastController::class, 'showBroadcast'])->name('showBroadcast');
        Route::get('/student-broadcast/{teacherId}', [BroadcastController::class, 'showStudentBroadcast'])->name('showStudentBroadcast');
        Route::post('/stop-broadcast', [BroadcastController::class, 'stopBroadcast'])->name('stopBroadcast');
        Route::post('/enter-broadcast', [BroadcastController::class, 'enterBroadcast'])->name('enterBroadcast');
        Route::get('/currentStudents', [BroadcastController::class, 'currentStudents'])->name('currentStudents');
        Route::get('/exitBroadcast', [BroadcastController::class, 'exitBroadcast'])->name('exitBroadcast');
        Route::post('/remove-student/{studentId}', [BroadcastController::class, 'removeStudent'])->name('removeStudent');
        Route::post('/student/raise-hand', [BroadcastController::class, 'raiseHand'])->name('raiseHand');
        Route::post('/share_screen', [BroadcastController::class, 'shareScreen'])->name('shareScreen');
        Route::post('/stop_camera', [BroadcastController::class, 'stopCamera'])->name('stopCamera');
        Route::post('/send-message', [BroadcastController::class, 'sendMessage'])->name('sendMessage');
        Route::post('/start-broadcast', [BroadcastController::class, 'startBroadcast'])->name('startBroadcast');

    });


