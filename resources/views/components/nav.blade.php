<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.title-meta')
    @include('layouts.head')

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <style>
        header .user-icons {
            background: transparent !important;
        }

        .nav-item .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            left: auto;
            transform: translateX(-100%);
            z-index: 1000;
        }
    </style>
</head>

<header class="header-center-home header-default header-sticky">
    <nav class="nav navbar navbar-expand-xl navbar-light iq-navbar header-hover-menu py-xl-0">
        <div class="container-fluid navbar-inner">
            <div class="d-flex align-items-center justify-content-between w-100 landing-header">
                <div class="d-flex gap-3 gap-xl-0 align-items-center">
                    <div>
                        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar_main" aria-controls="navbar_main" class="d-xl-none btn btn-primary rounded-pill p-1 pt-0 toggle-rounded-btn">
                            <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                            </svg>
                        </button>
                    </div>
                    <!--Logo -->
                    <div class="logo-default">
                        <a class="navbar-brand text-primary" href="{{ url('/') }}">
                            <img class="img-fluid logo" src="{{ asset('assets/images/logo.webp')}}" loading="lazy" alt="streamit" />
                        </a>
                    </div>
                    <div class="logo-hotstar">
                        <a class="navbar-brand text-primary" href="./index.html">
                            <img class="img-fluid logo" src="{{ asset('assets/images/logo-hotstar.webp')}}" loading="lazy" alt="streamit" />
                        </a>
                    </div>
                    <div class="logo-prime">
                        <a class="navbar-brand text-primary" href="./index.html">
                            <img class="img-fluid logo" src="{{ asset('assets/images/logo-prime.webp')}}" loading="lazy" alt="streamit" />
                        </a>
                    </div>
                    <div class="logo-hulu">
                        <a class="navbar-brand text-primary" href="./index.html">
                            <img class="img-fluid logo" src="{{ asset('assets/images/logo-hulu.webp')}}" loading="lazy" alt="streamit" />
                        </a>
                    </div>

                </div>
                <nav id="navbar_main" class="offcanvas mobile-offcanvas nav navbar navbar-expand-xl hover-nav horizontal-nav mega-menu-content py-xl-0">
                    <div class="container-fluid p-lg-0">
                        <div class="offcanvas-header px-0">
                            <div class="navbar-brand ms-3">
                                <!--Logo -->
                                <div class="logo-default">
                                    <a class="navbar-brand text-primary" href="./index.html">
                                        <img class="img-fluid logo" src="./assets/images/logo.webp" loading="lazy" alt="streamit" />
                                    </a>
                                </div>
                                <div class="logo-hotstar">
                                    <a class="navbar-brand text-primary" href="./index.html">
                                        <img class="img-fluid logo" src="./assets/images/logo-hotstar.webp" loading="lazy" alt="streamit" />
                                    </a>
                                </div>
                                <div class="logo-prime">
                                    <a class="navbar-brand text-primary" href="./index.html">
                                        <img class="img-fluid logo" src="./assets/images/logo-prime.webp" loading="lazy" alt="streamit" />
                                    </a>
                                </div>
                                <div class="logo-hulu">
                                    <a class="navbar-brand text-primary" href="./index.html">
                                        <img class="img-fluid logo" src="./assets/images/logo-hulu.webp" loading="lazy" alt="streamit" />
                                    </a>
                                </div>
                            </div>
                            <button type="button" class="btn-close float-end px-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <ul class="navbar-nav iq-nav-menu  list-unstyled" id="header-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">
                                    <span class="item-name">Home</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#pages" role="button" aria-expanded="false" aria-controls="homePages">
                                    <span class="item-name">Pages</span>
                                    <span class="menu-icon">
                                        <i class="fa fa-caret-down toggledrop-desktop right-icon" aria-hidden="true"></i>
                                        <span class="toggle-menu">
                                            <i class="fa fa-plus  arrow-active text-white" aria-hidden="true"></i>
                                            <i class="fa fa-minus  arrow-hover text-white" aria-hidden="true"></i>
                                        </span>
                                    </span>
                                </a>
                                <ul class="sub-nav collapse  list-unstyled" id="pages">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('about.index') }}"> Sobre Nós </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('contact.index') }}"> Contato </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('faq.index') }}"> FAQ </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('usage_policy.index') }}"> Políticas de Privacidade </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('plan.index') }}"> Planos </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('blog.index') }}"> Blog </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#shop" role="button" aria-expanded="false" aria-controls="shop">
                                    <span class="item-name">Shop</span>
                                    <span class="menu-icon">
                                        <i class="fa fa-caret-down toggledrop-desktop right-icon" aria-hidden="true"></i>
                                        <span class="toggle-menu">
                                            <i class="fa fa-plus  arrow-active text-white" aria-hidden="true"></i>
                                            <i class="fa fa-minus  arrow-hover text-white" aria-hidden="true"></i>
                                        </span>
                                    </span>
                                </a>
                                <ul class="sub-nav collapse  list-unstyled" id="shop">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('shop.index') }}"> Shop </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('view.cart')}}"> Cart Page </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('shop.wishlist') }}"> Wishlist Page </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('shop.checkout') }}"> Checkout Page </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('shop.detail') }}"> Order Tracking </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">
                                    <span class="item-name">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/deals') }}">
                                    <span class="item-name">Histórico</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/conta_investimento.index') }}">
                                    <span class="item-name">Conta Investimento</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- container-fluid.// -->
                </nav>
                <div class="right-panel">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-btn">
                            <span class="navbar-toggler-icon"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center ms-auto mb-2 mb-xl-0">
                            <li class="nav-item iq-responsive-menu mx-3">
                                <a href="{{ route('view.cart') }}" class="nav-link p-0" aria-label="Cart">
                                    <div class="btn-icon btn-sm rounded-pill btn-action">
                                        <span class="btn-inner">
                                            <i class="fa-solid fa-basket-shopping"></i>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item dropdown iq-responsive-menu">
                                <div class="search-box">
                                    <a href="#" class="nav-link p-0" id="search-drop" data-bs-toggle="dropdown">
                                        <div class="btn-icon btn-sm rounded-pill btn-action">
                                            <span class="btn-inner">
                                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </circle>
                                                <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                </svg>
                                            </span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu p-0 dropdown-search m-0 iq-search-bar" style="width: 20rem;">
                                        <li class="p-0">
                                            <div class="form-group input-group mb-0">
                                                <input type="text" class="form-control border-0" placeholder="Search...">
                                                <button type="submit" class="search-submit">
                                                    <svg class="icon-15" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </circle>
                                                    <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown" id="itemdropdown1">
                                <a class="nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="btn-icon rounded-pill user-icons">
                                        <span class="btn-inner">
                                            <svg class="icon-18" width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-user border-0 p-0 m-0" aria-labelledby="navbarDropdown">
                                    <li class="user-info d-flex align-items-center gap-3 mb-3">
                                        <img src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : './assets/images/user/user1.webp' }}" class="img-fluid" alt="profile image" loading="lazy">
                                        <span class="font-size-14 fw-500 text-capitalize text-white">{{Str::ucfirst(Auth::user()->name)}}</span>
                                    </li>
                                    <a class="dropdown-item" href="{{ route('myaccount.index') }}"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">@lang('translation.View_Profile')</span></a>
                                    @if(auth()->user()->can('admin'))
                                    <a class="dropdown-item" href="{{ route('manage.index') }}"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Gerenciar</span></a>
                                    @endif
                                    <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">@lang('translation.Sign_out')</span></a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @include('layouts.vendor-scripts')
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var dropdownToggle = document.getElementById('navbarDropdown');

        dropdownToggle.addEventListener('click', function (event) {
            event.stopPropagation();
            var dropdownMenu = this.nextElementSibling;

            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
            } else {

                document.querySelectorAll('.dropdown-menu.show').forEach(function (openMenu) {
                    openMenu.classList.remove('show');
                });

                dropdownMenu.classList.add('show');
            }
        });
    });

    window.addEventListener('click', function (event) {
        if (!event.target.matches('#navbarDropdown')) {
            var dropdowns = document.querySelectorAll('.dropdown-menu.show');
            dropdowns.forEach(function (openDropdown) {
                openDropdown.classList.remove('show');
            });
        }
    });
</script>