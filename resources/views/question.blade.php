@extends('layouts.app')
@section('title')
الاسئله الشائعه | دروسي

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
                    <a href="/">الاسئله الشائعه</a>
                    <h1>الاسئله الشائعه</h1>
                </div>
                <div class="col-sm-6">
                    <img src="images/brd-book.png" alt="book" height="200" width="200" />
                </div>
            </div> <!-- /row -->
        </div> <!-- /container -->
    </div> <!-- /about-us -->

 </section>


<section class="questions">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="images/answers.jpg" width="500px " height="300px" alt="answerQuestions">
            </div>

            <div class="col-sm-6">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h5>كيف يمكنني ان اسجل في منصه دروسي</h5>
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          يمكنك التسجيل في منصه دروسي عن طريق ربط حساب البريد الالكتروني الخاص بك بالموقع هنا حتي تستطيع ان تستفاد بالتجربه
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                           <h5>كيف يمكنني ان استفيد بالتجربه هنا</h5>
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            يمكنك ان تستفيد من التجربه هنا اذا كنت مواظب علي دخول البث المباشر في وقته وحل الواجبات كامله ورفعها هنا ليتم مراجعتها
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h5>هل يمكن لاي طالب التسجيل هنا</h5>
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            نعم يمكن لاي طالب التسجيل هنا اذا كان له مدرس يعرفه يشرح هنا واذا لم يعرف ف تكون تجربه ممله
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

        </div> <!--/row-->
    </div> <!--/container-->
</section>



  

</body>

</html>
@endsection
