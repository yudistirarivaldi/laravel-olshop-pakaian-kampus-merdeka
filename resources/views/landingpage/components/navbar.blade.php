    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                    <div class="tip">2</div>
                </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                    <div class="tip">2</div>
                </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="{{ url('/') }}"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo text-header text-monospace">
                        <a href="{{ route('index') }}" class="text-logo">
                            <img src="{{ url('/landing/img/logo.png') }}" width="150px" />
                        </a>
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-9">
                    <nav class="header__menu text-center">
                        <ul>

                            <li class="{{ \Route::current()->getName() == 'index' ? 'active' : '' }}"><a
                                    href="{{ url('/') }}">Home</a></li>

                            <li class="{{ \Route::current()->getName() == 'shop_list' ? 'active' : '' }}"><a
                                    href="{{ url('/shop') }}">Shop</a></li>
                            <li class="{{ \Route::current()->getName() == 'contact' ? 'active' : '' }}">
                                <a href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        @auth
                            <div class="header__right__auth">
                                <a href="{{ route('login') }}">Dashboard</a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="ft-power"></i>
                                    Logout

                                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                                        @csrf
                                    </form>

                                </a>
                            </div>

                        @endauth
                        @guest
                            <div class="header__right__auth">
                                <a href="{{ route('login') }}">Login</a>
                                <a href="{{ route('register') }}">Register</a>
                            </div>
                        @endguest


                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="#"><span class="icon_heart_alt"></span>
                                    <div class="tip">2</div>
                                </a></li>
                            <li><a href="{{ __('/cart') }}">
                                    <span class="icon_bag_alt"></span>
                                    <div class="tip">2</div>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
