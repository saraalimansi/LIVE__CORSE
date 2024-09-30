
@extends('layouts.app')
@section('title')
المدرس | دروسي
     @endsection
@section('content')

<!DOCTYPE html>
<html lang="en">



<body>
    <section class="sec-teacher">
      <div class="container">
        <div class="zoom-container">
         <div class="teacher-page">
          <div class="row">
            <div class="col-lg-12">
              <p class="nameofstd text-muted"> أهلا بك أستاذ/ة {{ Auth::user()->first_name }} </p>
                <p class="code">الكود الخاص بك هو: {{ Auth::user()->code }}</p>
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
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab1-tab" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">التسليمات</a>
                  </li>
              </ul>


              <div class="tab-content mt-5">
                  <div class="tab-pane fade mt-0" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">

                  قم برفع الملفات الخاصه بك

                      <form action="{{ route('upload.file') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="file" name="file" required>
                          <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                          <button type="submit">رفع الملف</button>
                      </form>
                      <p class="mt-5">الملفات المرفوعة :</p>

                      @foreach($files as $file)
                          <div>

                              @php
                                  $fileUrl = asset('files/' . $file->name);
                              @endphp
                              <a href="{{ $fileUrl }}" target="_blank">{{ $file->name }}</a>
                              <br>
                              <form action="{{ route('delete.file') }}" method="post">
                                  @csrf
                                  <input type="hidden" name="file_id" value="{{ $file->id }}">
                                  <button type="submit">حذف</button>
                              </form>
                          </div>
                      @endforeach
                  </div>
                  <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                      هل تريد انشاء بث ؟
                      <br>
                      <br>

                      <a href="{{ route('showBroadcast') }}" class="btn btn-secondary m-auto liveBtn">انشاء</a>

                  </div>
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">

                    من فضلك قم برفع الواجب المطلوب حله هنا

                    <form action="{{ route('upload.assigment') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="file" name="assignment" required>
                          <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                          <button type="submit">رفع الملف</button>
                      </form>
                    <p class="mt-5">الواجب :</p>

                @foreach($assignments  as  $assignment )
                          <div>
                              <a href="{{ asset('assignments/' . $assignment->name) }}" target="_blank">{{ $assignment->name }}</a>
                              <form action="{{ route('delete.assigment') }}" method="post">
                                  @csrf
                                  <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                                  <button type="submit">حذف</button>
                              </form>
                          </div>
                      @endforeach
                  </div>


                 <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab1-tab">

                     <br>
                     <br>
                     @foreach($studentSolutions as $solution)
                         <p>{{ $solution->student->first_name }} {{ $solution->student->last_name }}:
                             <a href="{{ asset('assignmentstudent/' . $solution->name) }}" target="_blank">{{ $solution->name }}</a>
                         </p>
                     @endforeach
                 </div>



              </div>
            </div>
          </div>
          </div>
          </div>
        </div>
      </div> <!--/container-->
    </section>    <!--/sec-teacher-->






</body>
</html>
@endsection
