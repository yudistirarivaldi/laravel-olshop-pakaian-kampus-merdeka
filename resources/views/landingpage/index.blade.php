<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trixie</title>

    <!-- Google Font -->
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Cookie&display=swap') }}" rel="stylesheet">
    <link
        href="{{ url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap') }}"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing/css/auth.css') }}" type="text/css">
    <link rel="icon" href="{{ asset('landing/img/logo.png') }}" type="image/icon type">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('landingpage.components.navbar')

    <!-- Categories Section Begin -->
    @yield('content')
    <!-- Services Section End -->

    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="{{ asset('landing/img/instagram/insta-1.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="{{ asset('landing/img/instagram/insta-2.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="{{ asset('landing/img/instagram/insta-3.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="{{ asset('landing/img/instagram/insta-4.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="{{ asset('landing/img/instagram/insta-5.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg"
                        data-setbg="{{ asset('landing/img/instagram/insta-6.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram End -->

    @include('landingpage.components.footer')

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('landing/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('landing/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('landing/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('landing/js/main.js') }}"></script>
    <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "1b4c9c05-bffa-4a8d-b859-919d2bb09353";
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "{{ url('https://client.crisp.chat/l.js') }}";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>
    <script>
        $('.color-btn').click(function() {
            $('.input-color').css({
                color: '#FFFFFF',
                'background-color': '#FFC3C3'
            });
        });
    </script>
    {{-- <script type="text/javascript">
            const search = document.getElementById('search');
            const tableBody = document.getElementById('product');
            function getContent(){

            const searchValue = search.value;

                const xhr = new XMLHttpRequest();
                xhr.open('GET','{{route('search')}}/?search=' + searchValue ,true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function() {

                    if(xhr.readyState == 4 && xhr.status == 200)
                    {
                        tableBody.innerHTML = xhr.responseText;
                    }
                }
                xhr.send()
            }
            search.addEventListener('input',getContent);
        </script> --}}
</body>

</html>
