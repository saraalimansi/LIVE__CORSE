@extends('layouts.app')
@section('title')
من نحن | دروسي

  @endsection
@section('content')

<!DOCTYPE html>
<html lang="en">



<body>



 <section>
    <div class="fixed-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 fixed-sec-info">
                    <a href="/"><i class="fas fa-home"></i>الصفحه الرئيسيه</a>
                    <i class="fas fa-chevron-left"></i>
                    <a href="/">من نحن</a>
                    <h1>من نحن</h1>
                </div>
                <div class="col-sm-6">
                    <img src="images/brd-book.png" alt="book" height="200" width="200" />
                </div>
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /about-us -->

 </section>


<section class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>نحن منصة تعليمية عبر الإنترنت تأسست عام 2023م </h2>
                <p>تختص بتدريس جميع المناهج</p>
                <p>تسعى منصة دروس أون لاين لتلبية جميع احتياجات</p>
                <p>الطلبه من توفير بث مباشر لتوفير وقتهم والجهد</p>
                <p>كما توفر المنصة لطلابها تصحيح الواجبات ومراجعتها </p>
                <p>على مدار العام الدراسي.</p>
            </div>
        </div> <!--/row-->
    </div> <!--/container-->
</section>


</body>

</html>
@endsection
