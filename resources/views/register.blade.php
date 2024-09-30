@extends('layouts.app')
@section('title')
التسجيل | دروسي
@endsection
@section('content')

 <section class="login reg">

        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="images/login-security.gif">
                </div>
                <div class="col-lg-7">
                    <div class="logintext">
                     <h2>  سجل اشتراكك هنا </h2>
                    </div>

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="username">الاسم الاول</label>
                            <br>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" placeholder="ادخل اسمك الاول" value="{{ old('first_name') }}"  autocomplete="first_name" required autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <br>
                        </div>


                            <div class="form-group">
                                <label for="username">الاسم الاخير</label>
                                <br>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" placeholder="ادخل اسمك الاخير" value="{{ old('last_name') }}"  autocomplete="last_name" required autofocus>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <br>
                            </div>


                            <div class="form-group">
                                <label for="emial"> بريدك الالكتروني</label>
                                <br>
                                <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="emial" placeholder="ادخل بريدك الالكتروني " autocomplete="email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <br>
                                </div>



 <div class="form-group">
    <label for="password">كلمة المرور</label>
    <br>
    <input type="password"class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="ادخل كلمة مرور صالحة" autocomplete="new-password" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
        </div>



        <div class="form-group">
            <label for="password">تأكيد كلمة المرور  </label>
            <br>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder=" تأكيد كلمة المرور" required autocomplete="new-password">
                 <br>
                </div>


        <div class="form-group">
          <label for="password">رقم هاتفك</label>
          <br>
          <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"  placeholder="ادخل رقم هاتفك" value="{{ old('phone') }}" required autocomplete="phone">
                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                            </div>


                            <label>طالب</label> <input type="radio" name="role" id='role' value="student" class="firstradio" required/>
                            <label>مدرس</label> <input type="radio"  value="teacher" id='role' name="role" required/>
                            <br>

                            <div class="form-group">
                              <label for="subject" >اسم الماده (للمدرسين فقط)</label>
                              <br>
                              <input type="text" class="form-control" id="subject" placeholder="ادخل اسم الماده" name="subject" autocomplete="on">
                              <br>
                            </div>
                            <div class="form-group">
                              <label >ارفق صوره لك (للمدرسين فقط)</label>
                              <br>
                              <input type="file" class="form-control" id="photos" name="photos">
                              <br>
                            </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                            <input type="submit" class="btn btn-success" value="التسجيل" />
                            <div class="anothertext">
                             <p>هل لديك حساب بالفعل؟
                                 <a href="/login">تسجيل الدخول</a>
                             </p>
                             </div>

                       </form>

                    </div>
                </div>
            </div>
          </section>

</body>

@endsection




