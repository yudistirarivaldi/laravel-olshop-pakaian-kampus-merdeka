    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">

        </ul>
        <div class="offcanvas__logo">
            <a href="{{ url('/') }}"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            @auth

                <ul class="header__right__widget">

                    {{-- Untuk total keranjang cart --}}

                    @php
                        $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                    @endphp

                    @if ($carts > 0)
                        <li><a href="{{ __('/cart') }}">
                                <span class="icon_bag_alt"></span>
                                <div class="tip">{{ $carts }}</div>
                            </a></li>
                    @else
                        <li><a href="{{ __('/cart') }}">
                                <span class="icon_bag_alt"></span>

                            </a></li>
                    @endif
                </ul>
                <div class="header__menu_auth header__right__auth ml-4">
                    <ul>
                        <li><a href="#">{{ Auth::user()->name }}</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ft-power"></i> Logout
                                        <form action="{{ route('logout') }}" id="logout-form" method="POST">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endauth

            @guest
                <div class="header__right__auth">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            @endguest
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
                                    href="{{ url('/shop_list') }}">Shop</a></li>

                            <li class="{{ \Route::current()->getName() == 'contact' ? 'active' : '' }}">
                                <a href="{{ url('/contact') }}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        @auth

                            <ul class="header__right__widget">

                                {{-- Untuk total keranjang cart --}}

                                @php
                                    $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                                @endphp

                                @if ($carts > 0)
                                    <li><a href="{{ __('/cart') }}">
                                            <span class="icon_bag_alt"></span>
                                            <div class="tip">{{ $carts }}</div>
                                        </a></li>
                                @else
                                    <li><a href="{{ __('/cart') }}">
                                            <span class="icon_bag_alt"></span>

                                        </a></li>
                                @endif
                            </ul>
                            <div class="header__menu_auth header__right__auth ml-4">
                                <ul>
                                    <li><a href="#">{{ Auth::user()->name }}</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="ft-power"></i> Logout
                                                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                                                        @csrf
                                                    </form>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @endauth

                        @guest
                            <div class="header__right__auth">
                                <a href="{{ route('login') }}">Login</a>
                                <a href="{{ route('register') }}">Register</a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
