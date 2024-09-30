@extends('layouts.app')
@section('title')
تسجيل الدخول  | دروسي

     @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">


<body>

    <div class="login">
        <div class="container">
            <div class="row">

                <div class="col-lg-5">
                    <img src="images/login-security.gif">
                </div>

                <div class="col-lg-7">
                    <div class="logintext">
                     <h2>تسجيل الدخول</h2>
                     <p>استكشف، تعلم، ونمو معنا. استمتع برحلة تعليمية سلسة. لنبدأ!</p>
                    </div>  <!--/logintext-->

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <label> بريدك الالكتروني</label>
                        <br>


                       <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
                       @error('email')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                        <br>
                        <label>كلمه المرور</label>
                        <br>
                        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="أدخل كلمة مرور صالحة" autocomplete="current-password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        @if (Route::has('reset'))

                              <a  href="{{ route('reset') }}"> <span>هل نسيت كلمه المرور؟</span> </a>
                        @endif
                        <br>
                        <br>



                        <input type="submit" class="btn btn-success" value="تسجيل الدخول" />

                <div class="anothertext">
                    <p>ليس لديك حساب؟
                        <a href="/register">التسجيل</a>
                    </p>
                </div>  <!--/anothertext-->
                    </form>

            </div>


            </div>  <!--/row-->
        </div>  <!--/container-->
      </div>   <!--/login-->


</body>

@endsection
