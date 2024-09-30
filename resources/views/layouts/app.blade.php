<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>.highlight {
        background-color: darkgreen;
        font-weight: bold;
    }


    </style>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<head><title>@yield('title')</title></head>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href=" {{ mix('css/app.css')}}">
    <script src="{{ mix('js/app.js') }}"></script>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


{{--    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>--}}
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
{{--    <script src="assets/vendor/aos/aos.js"></script>--}}
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
{{--    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
{{--    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>--}}
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
{{--    <script src="assets/vendor/php-email-form/validate.js"></script>--}}

{{--    <script src="assets/js/bootstrap.bundle.min.js"></script>--}}
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
{{--    <script src="path/to/purecounter.js"></script>--}}

{{--    <script src="assets/js/main.js"></script>--}}
    <script src="{{asset('assets/js/main.js')}}"></script>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/x-icon" src="images/cap.png" >




    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}} " rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/all.css')}}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">
              <h1 class="logo ms-auto"><a href="/">
                <img src="{{asset('images/cap.png')}}" width="50" height="40" alt="logo" />
                دروسي
              </a></h1>
              <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                  <li><a class="@yield('active1')" href="/"><i class="fas fa-home"></i>الصفحه الرئيسيه</a></li>
                  <li><a class="@yield('active2')" href="/login">تسجيل الدخول</a></li>
                  <li><a class="@yield('active3')" href="/register">اشترك الان</a></li>
                    <li>
                        <a href="/" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            تسجيل الخروج
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
                  <form id="searchForm" class="d-flex">
                      <input id="searchInput" class="form-control me-2" type="search" placeholder="ابحث هنا" aria-label="Search" autocomplete="on">
                      <button id="searchBtn" class="btn btn-outline-success" type="button"><i class="fa fa-search"></i></button>
                  </form>
                  <div id="searchResults"></div>


                  <i class="bi bi-list mobile-nav-toggle"></i>
              </nav> <!-- /navbar -->
            </div> <!-- /container -->
        </header> <!--/Header -->

        @yield('content')



        <footer>
            <div class="footer-section text-center">
              <div class="container">
                <div class="row">
                  <div class="col-md-4 footer-col">
                    <h3>تواصل معنا</h3>

                    <div class="contact-details ">
                    <i class="fa fa-phone"> </i>  +01 1234567890 <br>
                    <i class="fa fa-envelope"> </i> drosy29@gmail.com
                   </div>
                  </div>

                 <div class="col-md-4 footer-col">
                     <div class="feane-footer">
                     <a href="/">دروسي</a>
                     <p>منصه دروس اونلاين بتوفرلك الكادر الاقوي والافضل لعرض المحاضرات لافضل المدرسين والذي ينقل مستواك التعليمى الى مستوى آخر من التميز والتفوق.</p>
                     </div> <!--/feane-footer-->
                 </div>

                   <div class="col-md-4 footer-col">
                     <h3>المساعده</h3>
                     <a href="/about"> من نحن</a>
                     <br />
                     <br />
                     <a href="/privacy"> سياسه الخصوصيه </a>
                     <br />
                     <br />
                     <a href="/terms"> الاحكام والشروط</a>
                     <br />
                     <br />
                     <a href="/question"> الاسئله الشائعه</a>
                  </div>
                </div> <!-- /row -->
              </div> <!-- /container -->
            </div>  <!--/footer-section-->
          </footer>

        <main class="py-4">

        </main>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('searchBtn').addEventListener('click', function() {
                var searchTerm = document.getElementById('searchInput').value.trim();
                var content = document.body.innerHTML;
                var regex = new RegExp(searchTerm, 'gi');
                var highlightedContent = content.replace(regex, '<span class="highlight">$&</span>');
                document.body.innerHTML = highlightedContent;
            });

            // Reset highlighting when input field changes
            document.getElementById('searchInput').addEventListener('input', function() {
                var spans = document.querySelectorAll('.highlight');
                spans.forEach(function(span) {
                    span.outerHTML = span.innerHTML;
                });
            });
        });
    </script>
</body>
</html>
