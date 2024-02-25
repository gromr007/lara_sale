


<!-- Header Start  -->
<div class="header-area header-sticky d-none d-lg-block">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <!-- Header Logo Start -->
                <div class="header-logo">
                    <a href="/"><img src="/images/logo.png" alt="Logo"></a>
                </div>
                <!-- Header Logo End -->
            </div>
            <div class="col-lg-6">
                <div class="header-menu">
                    <ul class="nav-menu">
                        <li><a href="/">Домой</a></li>
                        <li><a href="{{route('cart')}}">Корзина</a></li>
                        <li><a href="{{route('account')}}">Аккаунт</a></li>
                    </ul>

                </div>
            </div>
            <div class="col-lg-3">
                <!-- Header Meta Start -->
                <div class="header-meta">

                    <div class="dropdown">
                        <a class="action" href="#" role="button" data-bs-toggle="dropdown"> <i class="pe-7s-search"></i> </a>
                        <div class="dropdown-menu dropdown-search">
                            <!-- Header Search Start -->
                            <div class="header-search">
                                <form action="#">
                                    <input type="text" placeholder="Введите название товара ... ">
                                    <button><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                            <!-- Header Search End -->
                        </div>
                    </div>

                    <div class="dropdown">
                        <a class="action" href="#" role="button" data-bs-toggle="dropdown"><i class="pe-7s-user"></i></a>

                        <ul class="dropdown-menu dropdown-profile">
                            <li><a href="/">Домой</a></li>
                            <li><a href="{{route('cart')}}">Корзина</a></li>
                            <li><a href="{{route('account')}}">Аккаунт</a></li>
                            @auth
                                <li><a href="{{ route('logoutGet') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Выйти</a></li>
                            @else
                                <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Войти</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Регистрация</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                    <a class="action" href="#"><i class="pe-7s-like"></i></a>

                    <div class="dropdown">


                        {{--Миникорзина--}}
                        <x-minibasket />

                    </div>
                </div>
                <!-- Header Meta End -->
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Header Mobile Start -->
<div class="header-mobile section d-lg-none">

    <!-- Header Mobile top Start -->
    <div class="header-mobile-top header-sticky">
        <div class="container">
            <div class="row row-cols-3 gx-2 align-items-center">
                <div class="col">

                    <!-- Header Toggle Start -->
                    <div class="header-toggle">
                        <button class="mobile-menu-open">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <!-- Header Toggle End -->

                </div>
                <div class="col">

                    <!-- Header Logo Start -->
                    <div class="header-logo text-center">
                        <a href="/"><img src="/images/logo.png" alt="Logo"></a>
                    </div>
                    <!-- Header Logo End -->

                </div>
                <div class="col">

                    <!-- Header Action Start -->
                    <div class="header-meta">
                        <div class="dropdown">
                            <a class="action" href="#" role="button" data-bs-toggle="dropdown"><i class="pe-7s-user"></i></a>

                            <ul class="dropdown-menu dropdown-profile">
                                <li><a href="/">Домой</a></li>
                                <li><a href="{{route('cart')}}">Корзина</a></li>
                                <li><a href="{{route('account')}}">Аккаунт</a></li>
                                @auth
                                    <li><a href="{{ route('logoutGet') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Выйти</a></li>
                                @else
                                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Войти</a></li>
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Регистрация</a></li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                        <a class="action" href="{{route('cart')}}">
                            <i class="pe-7s-shopbag"></i>
                            <span class="number">3</span>
                        </a>
                    </div>
                    <!-- Header Action End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Header Mobile top End -->

    <!-- Header Mobile Bottom End -->
    <div class="header-mobile-bottom">
        <div class="container">

            <!-- Header Search Start -->
            <div class="header-search">
                <form action="#">
                    <input type="text" placeholder="Введите название товара ">
                    <button><i class="pe-7s-search"></i></button>
                </form>
            </div>
            <!-- Header Search End -->

        </div>
    </div>
    <!-- Header Mobile Bottom End -->

</div>
<!-- Header Mobile End -->

<!-- off Canvas Start -->
<div class="off-canvas-box">

    <!-- Canvas Action Start -->
    <div class="canvas-action">
        <a class="action" href="{{route('account')}}"><i class="icon-sliders"></i> Аккаунт <span class="action-num"></span></a>
        <a class="action" href="{{route('cart')}}"><i class="icon-heart"></i> Корзина <span class="action-num">(3)</span></a>
    </div>
    <!-- Canvas Action end -->

    <!-- Canvas Close bar Start -->
    <div class="canvas-close-bar">
        <span>Menu</span>
        <a class="menu-close" href="javascript:;"><i class="pe-7s-angle-left"></i></a>
    </div>
    <!-- Canvas Close bar End -->

    <!-- Canvas Menu Start -->
    <div class="canvas-menu">
        <nav>
            <ul class="nav-menu">

                <li><a href="/">Домой</a></li>
                <li><a href="{{route('cart')}}">Корзина</a></li>
                <li><a href="{{route('account')}}">Аккаунт</a></li>
                @auth
                    <li><a href="{{ route('logoutGet') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Выйти</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Войти</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Регистрация</a></li>
                    @endif
                @endauth

            </ul>

        </nav>
    </div>
    <!-- Canvas Menu End -->

</div>
<!-- off Canvas End -->

<div class="menu-overlay"></div>

<!-- Page Banner Section Start -->
<div class="section page-banner-section">
    <div class="container">

        <!-- Page Banner Content End -->
        <div class="page-banner-content">
            <h2 class="title">Твои Предметы</h2>

            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Твои Предметы</li>
            </ul>
        </div>
        <!-- Page Banner Content End -->

    </div>
</div>
<!-- Page Banner Section End -->

