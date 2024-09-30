
@extends('layouts.app')
@section('title')
   تغير كلمه المرور

@endsection
@section('content')


    <section class="pass-sec">
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="card text-center">
                        <div class="card-header">
                            إعادة تعيين كلمة المرور
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('reset') }}">
                                @csrf

                                    <input id="email" type="email" class="form-control" name="email" placeholder="بريدك الإلكتروني" autocomplete="on" required>
                                <br>
                                <input id="password" type="password" class="form-control" name="password" placeholder="كلمة المرور الجديدة" required>
                                <br>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>
                                <br>
                                <input type="submit" class="btn btn-success pass" value="ارسال الرابط" />
                            </form>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
