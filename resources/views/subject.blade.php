@extends('layouts.app')

@section('content')
    <section class="tabs-sub">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <p class="nameofstd text-muted mb-0">أهلا بك {{ Auth::user()->first_name }}....فلنبدأ</p>
                <a href="{{ route('student.view', ['id' => Auth::user()->student->id]) }}" class="btn btn-primary">الرجوع</a>
            </div>


                 <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">الواجبات</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">البث المباشر</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">الملفات</a>
            </li>
        </ul>

        <div class="tab-content mt-5">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <!-- نموذج رفع الواجب -->
                <form action="{{ route('upload.assignment') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="assignmentFile" class="form-label">رفع الواجب</label>
                        <input type="file" class="form-control" id="assignmentFile" name="assignment">
                    </div>
                    <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                    <button type="submit" class="btn btn-primary">تأكيد الرفع</button>
                </form>

                <p class="mt-3">قائمة الواجبات:</p>

                {{-- واجبات المدرس --}}
                <h4>الواجبات الخاصه بالمدرس:</h4>
                @if($teacherAssignments->isEmpty())
                    <p>لا يوجد واجبات حالياً.</p>
                @else
                    <ul>
                        @foreach($teacherAssignments as $assignment)
                            <li>
                                <a href="{{ asset('assignments/' . $assignment->name) }}" target="_blank">{{ $assignment->name }}</a>
                    
                            </li>
                        @endforeach
                    </ul>
                @endif

                {{-- واجبات الطلاب --}}
                <h4>الحلول الخاصه بالطالب:</h4>
                @if($studentAssignments->isEmpty())
                    <p>لا يوجد واجبات حالياً.</p>
                @else
                    <ul>
                        @foreach($studentAssignments as $assignment)
                            <li>
                                <a href="{{ asset('assignmentstudent/' . $assignment->name) }}" target="_blank">{{ $assignment->name }}</a>
                                <form action="{{ route('delete.student.assignment') }}" method="post" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="assignment_id" value="{{ $assignment->id }}"><br>
                                    <button type="submit" >حذف</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </div>


            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                هل تريد الانضمام للبث ؟
                <br>
                <br>
                <form action="{{ route('enterBroadcast') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary m-auto liveBtn">انضمام</button>
                </form>
            </div>


            <div class="tab-pane fade mt-0" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                @if($subject->files->isEmpty())
                    <p>لا يوجد ملفات الآن.</p>
                @else
                    <ul>
                        @foreach($subject->files as $file)
                            <li>
                                <a href="{{ asset('files/' . $file->name) }}" target="_blank">{{ $file->name }}</a>
                                <span style="margin-right: 30px;">نوع: ملف</span>
                            </li>
                        @endforeach

                    </ul>
                @endif
            </div>
        </div>
    </div> <!--/container-->
</section>


@endsection



