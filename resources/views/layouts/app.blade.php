<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-breezed.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
</head>
<body style="background-image: url({{ asset('images/bg.jpg') }}); background-size:cover;background-attachment: fixed;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm " style = "background-color: rgba(0,0,0,0.1);backdrop-filter: blur(200px);border-radius:0px 0px 40px 40px;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h2 style="color:white">{{ config('app.name', 'Laravel') }}</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="/report" style="color:white">{{ __('الابلاغ عن مشكلة') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/mostvisited" style="color:white">{{ __('الأكثر زيارة') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/categories" style="color:white">{{ __('تصنيفات المصايف') }}</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="/login" style="color:white">{{ __('تسجيل الدخول') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/register" style="color:white">{{ __('إشتراك بالموقع') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/" style="color:white">{{ __('الصفحة الرئيسية') }}</a>
                                </li>
                        @else
                                <li class="nav-item">
                                    <a class="nav-link" style="color:white" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('تسجيل خروج') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                </li>
                                @if(auth::user()->user_type == 'owner')
                                <li class="nav-item">
                                    <a class="nav-link" href="/report" style="color:white">{{ __('الابلاغ عن مشكلة') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/myresshow/{{auth()->user()->id}}" style="color:white">{{ __('مصايفي') }}</a>
                                </li>
                                @elseif(auth::user()->user_type == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="/adminspanel" style="color:white">{{ __('لوحة التحكم') }}</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/report" style="color:white">{{ __('الابلاغ عن مشكلة') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/myres/{{auth()->user()->id}}" style="color:white">{{ __('حجوزاتي') }}</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="/mostvisited" style="color:white">{{ __('الأكثر زيارة') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/categories" style="color:white">{{ __('تصنيفات المصايف') }}</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="/" style="color:white">{{ __('الصفحة الرئيسية') }}</a>
                                </li>    
                        @endguest
                    </ul>
                    <div class="search-icon m-3">
                        <a href="#search"><i class="fa fa-search" style = "color: #5fb759"></i></a>
                    </div>
                    
                </div>
            </div>
        </nav>

        <div id="search" style="background-color:rgba(255,255,255,0.50)">
            <button type="button" class="close">×</button>
            <form id="contact"  action = "{{ route('search') }}" method="GET">
                <fieldset>
                    <input type="search" name="search" placeholder="SEARCH KEYWORD(s)" aria-label="Search through site content" style ="color:black" required>
                </fieldset>
                <fieldset>
                    <button type="submit" class="main-button">Search</button>
                </fieldset>
            </form>
            <!-- jQuery -->
            <script src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>

            <!-- Bootstrap -->
            <script src="{{asset('js/popper.js')}}"></script>
            <script src="{{asset('js/bootstrap.min.js')}}"></script>

            <!-- Plugins -->
            <script src="{{asset('js/owl-carousel.js')}}"></script>
            <script src="{{asset('js/scrollreveal.min.js')}}"></script>
            <script src="{{asset('js/waypoints.min.js')}}"></script>
            <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
            <script src="{{asset('js/imgfix.min.js')}}"></script> 
            <script src="{{asset('js/slick.js')}}"></script> 
            <script src="{{asset('js/lightbox.js')}}"></script> 
            <script src="{{asset('js/isotope.js')}}"></script> 

            <!-- Global Init -->
            <script src="{{asset('js/custom.js')}}"></script>

            <script>

                $(function() {
                    var selectedClass = "";
                    $("p").click(function(){
                    selectedClass = $(this).attr("data-rel");
                    $("#portfolio").fadeTo(50, 0.1);
                        $("#portfolio div").not("."+selectedClass).fadeOut();
                    setTimeout(function() {
                    $("."+selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                    }, 500);
                        
                    });
                });

            </script>
        </div>
        

        <main class="py-4" >
            @yield('content')
        </main>
        <section class="footer" style = "background-color: rgba(0,0,0,0.1);backdrop-filter: blur(200px);">
        <br>
        <div class="container">
            <div class="col">
                <a href="#" class="logo" style = "color:white"> <h4 align="right"> HAWAKOM </h4></a>
                <h5 align="right" style ="color:white">موقع هواكم يستخدم لأضافة المصايف وعرض تصنيفاتها والمصايف الأكثر زيارة  حيث يمكن إضافة المصيف الخاص بك بعد ان يتم تسجيل دخولك في الموقع  </h5>
            </div>
        </div>
        <br>
    </section>
    </div>
</body>
</html>
