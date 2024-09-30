@extends('layouts.app')
@section('title')
    منصه دروسي
     @endsection
@section('content')

@section('active1')
active

          @endsection

<!DOCTYPE html>
<html lang="en">

<body>


     <main>
        <div class="cover">
            <div class="overley">
                <div class="cover-content" data-aos="zoom-in" data-aos-delay="100">
                    <h1>اهلا بك في منصه دروسي</h1>
                    <p> نحن هنا من أجلك!</p>
                    <a href="/login"><input type="button" value="ابدأ الان" class="btn"/></a>
                </div> <!-- /content -->
            </div> <!-- /overley -->
        </div> <!-- /cover -->
     </main>




    <section class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="images/c (3).jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h2>نبذه عن موقع دروسي</h2>
            <p class="fst-italic">
                موقع دروس أون لاين لتسهيل عمليه التواصل بين المدرس والطالب والذي ينقل مستواك التعليمى الى مستوى آخر من التميز .
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i>التعليم الالكتروني</li>
              <li><i class="bi bi-check-circle"></i>دروسك اونلاين</li>
              <li><i class="bi bi-check-circle"></i>تفاعل فوري</li>
            </ul>

            <button class="learn-more-btn">المزيد</button>
          </div> <!-- /content -->

        </div> <!--/row-->
      </div> <!--container-->
    </section> <!--/About -->


     <section class="counts section-bg">
        <div class="container">
            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
                    <p>الطلاب</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="9" data-purecounter-duration="1" class="purecounter"></span>
                    <p>المواد</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                    <p>البث المباشر</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
                    <p>المدرسين</p>
                </div>

             </div> <!--/counters-->
        </div> <!--/container-->
     </section>   <!--/counts-->



 <section class="services">
    <div class="container" data-aos="fade-up">

      <div class="services-title">
        <h1>اهم الميزات</h1>
        <p>منصتنا التعليمية تقدم محاضرات مميزة وتعليمية عالية الجودة تقدمها مدرسين محترفين
            <br />
            في مجموعة متنوعة من المواضيع. تتيح لك هذه المنصة تعلم المفاهيم بسهولة وبشكل تفاعلي.</p>
      </div> <!--/services-title-->

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="/">محاضرات حيه</a></h4>
            <p>شارك في جلسات تعليمية مباشرة مع المدسين المحترفين</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="/">تعليم تفاعلي</a></h4>
            <p>نوفر ادوات تفاعلية تضمن تفاعل الطالب و المدرس بما ينعكس على جودة العملية التعليمية</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4><a href="/">وفر وقتك</a></h4>
           <p>ادرس مع مدرسينك من اي مكان في العالم </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-pen"></i></div>
            <h4><a href="/">تفاعل مع مدرسك</a></h4>
            <p>حل الواجبات وتصحيحها</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="/">قابليه الوصول</a></h4>
              <p>بالامكان الوصول الى دروسك من المتصفح او الاجهزة الذكية</p>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-play"></i></div>
            <h4><a href="/">البث المباشر</a></h4>
            <p>توفير احدث التقنيات بكفاءه عاليه لسهوله التواصل</p>
          </div>
        </div>

      </div> <!--/row-->
    </div> <!--/container-->
  </section> <!--/services-->


      <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

          <div class="comments-title">
            <h3>    بعض من اراء الطلاب والمدرسين
              <br>
               عن منصه <span>دروسي</span></h3>
            <hr class="line">
          </div>

          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="comment-img">
                      <img src="images/comments/c (1).jpg" class="testimonial-img" alt="">
                    </div> <!--/comment-img-->

                    <div class="comment-info">

                    <h3>سالي احمد</h3>
                    <h4>عربي &amp; انجليزي</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      أنا حقا أحب هذه المنصه لانها ساعدتني علي التواصل مع طلابي بكل سهوله
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    </div> <!--/comment-info-->

                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="comment-img">
                      <img src="images/comments/c (4).jpg" class="testimonial-img" alt="">
                    </div> <!--/comment-img-->

                    <div class="comment-info">
                    <h3>اماني سعد</h3>
                    <h4>علوم</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                     هذه المنصه وفرت علينا كثير من الجهد والوقت اعتقد انها افضل منصه علي الاطلاق
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    </div> <!--/comment-info-->
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="comment-img">
                      <img src="images/comments/c (8).jpg" class="testimonial-img" alt="">
                    </div> <!--/comment-img-->

                    <div class="comment-info">

                    <h3>يوسف اسامه</h3>
                    <h4>طالب</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      هذه المنصه ساعدتني كثيرا ووفرت لي كثير من الجهد ارشحها لكم بجدراره هي سبب نجاحي
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    </div> <!--/comment-info-->
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="comment-img">
                      <img src="images/comments/c (2).jpg" class="testimonial-img" alt="">
                    </div> <!--/comment-img-->

                    <div class="comment-info">

                    <h3>هنا احمد</h3>
                    <h4>طالبه</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      انا احب منصه دروسي كثيرا واحب ميس سالي
                      <br>
                      شكرا لكم
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    </div> <!--/comment-info-->

                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <div class="comment-img">
                      <img src="images/comments/c (5).jpg" class="testimonial-img" alt="">
                    </div> <!--/comment-img-->

                    <div class="comment-info">

                    <h3>عمر عصام</h3>
                    <h4>طالب</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      منصه دروسي سهله الاستخدام عن باقي المنصات ارشحها لاي طالب يريد التفوق والتميز
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    </div> <!--/comment-info-->

                  </div>
                </div>
              </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section>  <!--/testimonials-->






</body>

</html>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/purecounter.js"></script>
    <script src="assets/js/main.js"></script>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/x-icon" src="images/cap.png" >




    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/purecounter/purecounter_vanilla.js " rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/all.css" rel="stylesheet">
@endsection
