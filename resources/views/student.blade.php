@extends('layouts.app')

@section('title', 'الطالب | دروسي')

@section('content')
    <div class="container">
        <div class="first-std">
            <div class="teacherinfo">
                <p class="nameofstd text-muted">أهلا بك {{ Auth::user()->first_name }}....فلنبدأ</p>
                <form id="subjectForm" action="{{ route('subject.join') }}" method="POST">
                    @csrf
                    <input type="text" name="teacher_code" id="subject-code" placeholder="ادخل كود الماده" required autofocus>
                    <button type="submit" class="btn btn-success" id="sendCode">ارسال</button>
                </form>
            </div> <!--/teacherinfo-->

            <div id="teacher-card-container" class="d-flex flex-wrap">

                @foreach($subjects as $subject)

                    <div class="card"  style="width: 18rem;">
                        <form action="{{ route('subject.remove', ['subject' => $subject->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-custom-green btn-sm" style="position: absolute; top: 0; left: 0;">X</button>
                        </form>                        <img src="{{ Storage::url($subject->photos) }}" class="card-img-top" height="200">
                        <div class="card-body">
                            <h4 class="card-title">مادة {{ $subject->name }} </h4>
                            <p class="card-text">استاذ/ه : {{ $subject->teacher_name }} </p>
                            <a href="{{ route('subject.show', ['id' => $subject->id]) }}">
                                <input type="submit" class="btn btn-success" value="انضمام"/>
                            </a>
                        </div>
                    </div>
                @endforeach


            </div> <!--/teacher-card-container-->
        </div> <!-- /first-std -->
    </div> <!-- /container -->

    <style> .card  {
            transition: transform 0.5s; /* تحديد تأثير التحويل */
            transform: scale(1); /* حجم الكارد الافتراضي */
        }

        /* تكبير الكارد عند تمرير الماوس */
        .card:hover {
            transform: scale(1.2); /* زيادة حجم الكارد عند تمرير الماوس */
        }

    .btn-custom-green {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
    }

    .btn-custom-green:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
    </style>


@endsection
