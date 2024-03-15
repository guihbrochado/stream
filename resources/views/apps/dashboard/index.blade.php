@extends('layouts.master-without-nav')
@section('title')
Dashboard
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-search--dropdown {
        padding: 10px;
        background-color: transparent !important;
    }
</style>

@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle')
Core
@endslot
@slot('title')
Dashboard
@endslot
@endcomponent

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>StreamIT | Responsive Bootstrap 5 Template</title>
        <!-- Google Font Api KEY-->
        <meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">

        <!-- Favicon -->
        <link rel="shortcut icon" href="./assets/images/favicon.ico" />

        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="./assets/css/core/libs.min.css" />

        <!-- font-awesome css -->
        <link rel="stylesheet" href="./assets/vendor/font-awesome/css/all.min.css" />

        <!-- Iconly css -->
        <link rel="stylesheet" href="./assets/vendor/iconly/css/style.css" />

        <!-- Animate css -->
        <link rel="stylesheet" href="./assets/vendor/animate.min.css" />

        <!-- SwiperSlider css -->
        <link rel="stylesheet" href="./assets/vendor/swiperSlider/swiper.min.css">





        <!-- Streamit Design System Css -->
        <link rel="stylesheet" href="./assets/css/streamit.min.css?v=1.0.0" />

        <!-- Custom Css -->
        <link rel="stylesheet" href="./assets/css/custom.min.css?v=1.0.0" />

        <!-- Rtl Css -->
        <link rel="stylesheet" href="./assets/css/rtl.min.css?v=1.0.0" />

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap" rel="stylesheet">

    </head>

<header class="header-center-home header-default header-sticky">
                <nav class="nav navbar navbar-expand-xl navbar-light iq-navbar header-hover-menu py-xl-0">
                    <div class="container-fluid navbar-inner">
                        <div class="d-flex align-items-center justify-content-between w-100 landing-header">
                            <div class="d-flex gap-3 gap-xl-0 align-items-center">
                                <div>
                                    <button type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar_main"
                                            aria-controls="navbar_main"
                                            class="d-xl-none btn btn-primary rounded-pill p-1 pt-0 toggle-rounded-btn">
                                        <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                                        </svg>
                                    </button>
                                </div>
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
                                            <a class="nav-link" data-bs-toggle="collapse" href="#homePages" role="button" aria-expanded="false" aria-controls="homePages">
                                                <span class="item-name">Home</span>
                                                <span class="menu-icon">
                                                    <i class="fa fa-caret-down toggledrop-desktop right-icon" aria-hidden="true"></i>
                                                    <span class="toggle-menu">
                                                        <i class="fa fa-plus  arrow-active text-white" aria-hidden="true"></i>
                                                        <i class="fa fa-minus  arrow-hover text-white" aria-hidden="true"></i>
                                                    </span>
                                                </span>
                                            </a>
                                            <ul class="sub-nav mega-menu-item collapse justify-content-center list-unstyled" id="homePages">
                                                <li class="nav-item">
                                                    <a class="nav-link p-0 active" href="./index.html">
                                                        <img src="./assets/images/mega-menu/new-home.webp" alt="img" class="img-fluid d-xl-block d-none">
                                                        <span class="d-inline-block ">OTT Home</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link p-0 " href="./home.html">
                                                        <img src="./assets/images/mega-menu/home.webp" alt="img" class="img-fluid d-xl-block d-none">
                                                        <span class="d-inline-block ">Home</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link p-0 " href="./movie.html">
                                                        <img src="./assets/images/mega-menu/movie.webp" alt="img" class="img-fluid d-xl-block d-none">
                                                        <span class="d-inline-block ">Movie</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link p-0 " href="./tv-show.html">
                                                        <img src="./assets/images/mega-menu/tv-show.webp" alt="img" class="img-fluid d-xl-block d-none">
                                                        <span class="d-inline-block ">TV Show</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link p-0 " href="./video.html">
                                                        <img src="./assets/images/mega-menu/video.webp" alt="img" class="img-fluid d-xl-block d-none">
                                                        <span class="d-inline-block ">Video</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link p-0 " href="./merchandise-store.html">
                                                        <img src="./assets/images/mega-menu/shop-home.webp" alt="img" class="img-fluid d-xl-block d-none">
                                                        <span class="d-inline-block ">Merchandise Store</span>
                                                    </a>
                                                </li>
                                            </ul>
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
                                                    <a class="nav-link " href="./about-us.html"> Sobre Nós </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="./contact-us.html"> Contato </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="./faq.html"> FAQ </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="./privacy-policy.html"> Políticas de Privacidade </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="./pricing-plan.html"> Planos </a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="collapse" href="#blog" role="button" aria-expanded="false" aria-controls="blog">
                                                <span class="item-name">Blog</span>
                                                <span class="menu-icon">
                                                    <i class="fa fa-caret-down toggledrop-desktop right-icon" aria-hidden="true"></i>
                                                    <span class="toggle-menu">
                                                        <i class="fa fa-plus  arrow-active text-white" aria-hidden="true"></i>
                                                        <i class="fa fa-minus  arrow-hover text-white" aria-hidden="true"></i>
                                                    </span>
                                                </span>
                                            </a>
                                            <ul class="sub-nav collapse  list-unstyled" id="blog">
                                                <li class="nav-item">
                                                    <a class="nav-link " href="./blog/blog-listing.html"> Listing </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="collapse" href="#blog-grid" role="button" aria-expanded="false" aria-controls="blog-grid">
                                                        <span class="item-name">Blog Grid</span>
                                                        <span class="menu-icon">
                                                            <i class="fa fa-caret-right toggledrop-desktop right-icon" aria-hidden="true"></i>
                                                            <span class="toggle-menu">
                                                                <i class="fa fa-plus  arrow-active text-white" aria-hidden="true"></i>
                                                                <i class="fa fa-minus  arrow-hover text-white" aria-hidden="true"></i>
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <ul class="sub-nav collapse  list-unstyled" id="blog-grid">
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/one-column.html"> 1 Column </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/two-column.html"> 2 Column </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/three-column.html"> 3 Column </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/four-column.html"> 4 Column </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="collapse" href="#blog-sidebar" role="button" aria-expanded="false" aria-controls="blog-sidebar">
                                                        <span class="item-name">Blog Sidebar</span>
                                                        <span class="menu-icon">
                                                            <i class="fa fa-caret-right toggledrop-desktop right-icon" aria-hidden="true"></i>
                                                            <span class="toggle-menu">
                                                                <i class="fa fa-plus  arrow-active text-white" aria-hidden="true"></i>
                                                                <i class="fa fa-minus  arrow-hover text-white" aria-hidden="true"></i>
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <ul class="sub-nav collapse  list-unstyled" id="blog-sidebar">
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/left-sidebar.html"> Left Sidebar </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/right-sidebar.html"> Right Sidebar </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="collapse" href="#blog-single" role="button" aria-expanded="false" aria-controls="blog-single">
                                                        <span class="item-name">Blog Single</span>
                                                        <span class="menu-icon">
                                                            <i class="fa fa-caret-right toggledrop-desktop right-icon" aria-hidden="true"></i>
                                                            <span class="toggle-menu">
                                                                <i class="fa fa-plus  arrow-active text-white" aria-hidden="true"></i>
                                                                <i class="fa fa-minus  arrow-hover text-white" aria-hidden="true"></i>
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <ul class="sub-nav collapse  list-unstyled" id="blog-single">
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/blog-template.html"> Blog Template </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/blog-detail.html"> Standard </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/blog-audio.html"> Audio </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/blog-video.html"> Video </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/blog-link.html"> Link </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/blog-quote.html"> Quote </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " href="./blog/blog-gallery.html"> Gallery </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
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
                                                    <a class="nav-link " href="./shop/shop.html"> Shop </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="./shop/my-account.html"> My Account Page </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="./shop/cart.html"> Cart Page </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="./shop/wishlist.html"> Wishlist Page </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="./shop/checkout.html"> Checkout Page </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="./shop/order-tracking.html"> Order Tracking </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/dashboard') }}">
                                                <span class="item-name">Dashboard</span>
                                            </a>
                                            
                                        </li>
                                    </ul>
                                </div>
                                <!-- container-fluid.// -->
                            </nav>            <div class="right-panel">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <span class="navbar-toggler-btn">
                                        <span class="navbar-toggler-icon"></span>
                                    </span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav align-items-center ms-auto mb-2 mb-xl-0">
                                        <li class="nav-item dropdown iq-responsive-menu">
                                            <div class="search-box">
                                                <a href="#" class="nav-link p-0" id="search-drop" data-bs-toggle="dropdown">
                                                    <div class="btn-icon btn-sm rounded-pill btn-action">
                                                        <span class="btn-inner">
                                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor"
                                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </circle>
                                                            <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round">
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
                                                                <svg class="icon-15" width="15" viewBox="0 0 24 24" fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor"
                                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                                </circle>
                                                                <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                                                                      stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown" id="itemdropdown1">
                                            <a class="nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="btn-icon rounded-pill user-icons">
                                                    <span class="btn-inner">
                                                        <svg class="icon-18" width="18" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z"
                                                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                              stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z"
                                                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                              stroke-linejoin="round"></path>
                                                        <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-user border-0 p-0 m-0"
                                                aria-labelledby="navbarDropdown">
                                                <li class="user-info d-flex align-items-center gap-3 mb-3">
                                                    <img src="./assets/images/user/user1.webp" class="img-fluid" alt="" loading="lazy">
                                                    <span class="font-size-14 fw-500 text-capitalize text-white">{{Str::ucfirst(Auth::user()->name)}}</span>
                                                </li>
                                                <a class="dropdown-item" href="{{ route('profile.show', ['id' => Auth::id()]) }}"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">@lang('translation.View_Profile')</span></a>
                                                <a class="dropdown-item" href="#"><i class="uil uil-wallet font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">@lang('translation.My_Wallet')</span></a>
                                                <a class="dropdown-item d-block" href="#"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">@lang('translation.Settings')</span> <span class="badge bg-soft-success rounded-pill mt-1 ms-2">03</span></a>
                                                <a class="dropdown-item" href="#"><i class="uil uil-lock-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">@lang('translation.Lock_screen')</span></a>
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
            </header> 

<div class="row p-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!-- Main page content-->

                <div class="card mb-0">
                    <h5 class="card-header">Filtro</h5>
                    <form action="{{ route('dashboard.index') }}" method="post" class="card-body">
                        @csrf
                        <input id="user" name="user"type="hidden" value="{{ auth()->user()->id }}" />

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Período:</label>
                                    <div class="input-daterange input-group" id="periodo"
                                         data-date-format="dd/mm/yyyy" data-date-autoclose="true"
                                         data-provide="datepicker" data-date-container='#periodo'>
                                        <input type="text" class="form-control" name="date_from"
                                               placeholder="Data Inical" value="{{ $date_from }}" />
                                        <input type="text" class="form-control" name="date_to"
                                               placeholder="Data Final" value="{{ $date_to }}" />
                                    </div>
                                </div>
                            </div>

                            @if ($show_clients)
                            <div class="col-md-6">
                                <label for="client" class="form-label">Cliente</label>
                                <select id="client" name="client" class="form-select">
                                    <option selected value="-1">Todos</option>
                                    @foreach ($users as $user)
                                    @if ($client == $user->id)
                                    <option value="{{ $user->id }}" selected>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                    @else
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @endif

                            <div class="col-md-4">
                                <label for="account" class="form-label">Conta</label>
                                <select id="account" name="account" class="form-select">
                                    <option selected value="-1">Todas</option>
                                    @foreach ($accounts as $conta)
                                    @if ($account == $conta->account)
                                    <option value="{{ $conta->account }}" selected>
                                        {{ $conta->account }}
                                    </option>
                                    @else
                                    <option value="{{ $conta->account }}">
                                        {{ $conta->account }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            @if ($show_clients)
                            <div class="col-md-8">
                                <label for="ea" class="form-label">Expert Advisor</label>
                                <select id="ea" name="ea" class="form-select">
                                    <option selected value="-1">Todos</option>
                                    @foreach ($experts as $expert)
                                    @if ($ea == $expert->id)
                                    <option value="{{ $expert->id }}" selected>
                                        {{ $expert->name }}
                                    </option>
                                    @else
                                    <option value="{{ $expert->id }}">
                                        {{ $expert->name }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>
                        <div class="pt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Aplicar Filtro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<div class="row p-5">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1">R$ {{ number_format($data['saldo_total'], 2, ',', '') }}</h4>
                    <p class="text-muted mb-0">Saldo das operações</p>
                </div>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1">{{ number_format($data['fator_lucro'], 2, ',', '') }}</h4>
                    <p class="text-muted mb-0">Fator de Lucro</p>
                </div>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1">{{ number_format($data['taxa_acerto'], 2, ',', '') }}%</h4>
                    <p class="text-muted mb-0">Taxa de acerto</p>
                </div>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="growth-chart" data-colors='["--bs-warning"]'></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1">R$ {{ number_format($data['drawdown_maximo'], 2, ',', '') }}</h4>
                    <p class="text-muted mb-0">Drawdown máximo</p>
                </div>
            </div>
        </div>
    </div> <!-- end col-->
</div> <!-- end row-->

<div class="row p-5">
    <div class="col-xl-9">
        <div class="card">
            <div class="mt-3" style="margin-left: 25px;">
                <h4 class="card-title">Curva de capital</h4>
            </div>
            <div class="card-body" style="height: 405px;">
                <canvas id="chart_curva_capital"></canvas>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-3">

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                </div>
                <div>
                    <p class="text-muted mb-0">Payoff</p>
                    <h4 class="mb-1 mt-1">{{ number_format($data['payoff'], 2, ',', '') }}</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                </div>
                <div>
                    <p class="text-muted mb-0">Média das operações</p>
                    <h4 class="mb-1 mt-1">R$ {{ number_format($data['media_operacoes'], 2, ',', '') }}</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                </div>
                <div>
                    <p class="text-muted mb-0">Média das operações positivas</p>
                    <h4 class="mb-1 mt-1">R$ {{ number_format($data['media_profit'], 2, ',', '') }}</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                </div>
                <div>
                    <p class="text-muted mb-0">Média das operações negativas</p>
                    <h4 class="mb-1 mt-1">R$ {{ number_format($data['media_perdas'], 2, ',', '') }}</h4>
                </div>
            </div>
        </div>

    </div> <!-- end Col -->
</div> <!-- end row-->

<div class="row p-5">
    <div class="col-xl-9">
        <div class="card">
            <div class="mt-3" style="margin-left: 25px;">
                <h4 class="card-title">Lucro/perda diária</h4>
            </div>
            <div class="card-body" style="height: 405px;">
                <canvas id="chart_lucro_perda"></canvas>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-3">

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                </div>
                <div>
                    <p class="text-muted mb-0">Maior operação com lucro</p>
                    <h4 class="mb-1 mt-1">R$ {{ number_format($data['maior_profit'], 2, ',', '') }}</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                </div>
                <div>
                    <p class="text-muted mb-0">Maior operação com prejuízo</p>
                    <h4 class="mb-1 mt-1">R$ {{ number_format($data['maior_perda'], 2, ',', '') }}</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                </div>
                <div>
                    <p class="text-muted mb-0">Dias positivos</p>
                    <h4 class="mb-1 mt-1">{{ $data['qtd_dias_positivo'] }}</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                </div>
                <div>
                    <p class="text-muted mb-0">Dias negativos</p>
                    <h4 class="mb-1 mt-1">{{ $data['qtd_dias_negativo'] }}</h4>
                </div>
            </div>
        </div>
    </div> <!-- end Col -->
</div> <!-- end row-->

@php
/*
echo URL::to('/');
echo route('root');
*/
$datas_lucro_perda = json_encode($data['datas_lucro_perda']);
$lucro = json_encode($data['lucro']);
$perda = json_encode($data['perda']);

$curva_datas = json_encode($data['curva_datas']);
$curva_valor = json_encode($data['curva_valor']);
@endphp
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>

<script src="{{ URL::asset('/assets/libs/moment/moment.min.js') }}"></script>

<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('/assets/libs/chart-js/chart-js.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
$(document).ready(function () {
$('#client').select2({
    placeholder: "Selecione um cliente",
    allowClear: true,
    width: '100%'
});
});
</script>

<script>
    $("#client").on('change', function () {
        $.ajax({
            type: "POST",
            url: '/api/dashboard/filtros',
            data: {
                client: document.getElementById('client').value,
                account: document.getElementById('account').value,
                ea: document.getElementById('ea').value,
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                // atualiza as contas do cliente
                var account_selected = document.getElementById('account').value
                $('#account').empty();
                var $select = $('#account');
                var o = $('<option/>', {
                    value: "-1"
                })
                        .text("Todas")
                        .prop('selected', account_selected == -1)
                o.appendTo($select);
                for (var i = 0; i < data.accounts.length; i++) {
                    var o = $('<option/>', {
                        value: data.accounts[i]["account"]
                    })
                            .text(data.accounts[i]["account"])
                            .prop('selected', account_selected == data.accounts[i]["account"]);
                    o.appendTo($select);
                }

                // atualiza os eas para o cliente
                var ea_selected = document.getElementById('ea').value
                $('#ea').empty();
                var $select = $('#ea');
                var o = $('<option/>', {
                    value: "-1"
                })
                        .text("Todos")
                        .prop('selected', ea_selected == -1)
                o.appendTo($select);
                for (var i = 0; i < data.eas.length; i++) {
                    var o = $('<option/>', {
                        value: data.eas[i]["id"]
                    })
                            .text(data.eas[i]["name"])
                            .prop('selected', ea_selected == data.eas[i]["id"])
                    o.appendTo($select);
                }
            },
            error: function (data, textStatus, errorThrown) {
                //console.log(data);
            },
        });
    });

    $("#account").on('change', function () {
        $.ajax({
            type: "POST",
            url: '/api/dashboard/filtros',
            data: {
                client: ($('#client').length > 0) ? document.getElementById('client').value : 0,
                account: document.getElementById('account').value,
                ea: ($('#ea').length > 0) ? document.getElementById('ea').value : 0,
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {

                // atualiza os clientes para a conta
                if ($('#client').length > 0) {
                    var client_selected = document.getElementById('client').value
                    $('#client').empty();
                    var $select = $('#client');
                    var o = $('<option/>', {
                        value: "-1"
                    })
                            .text("Todos")
                            .prop('selected', client_selected == -1)
                    o.appendTo($select);
                    for (var i = 0; i < data.users.length; i++) {
                        var o = $('<option/>', {
                            value: data.users[i]["id"]
                        })
                                .text(data.users[i]["name"] + "(" + data.users[i]["email"] + ")")
                                .prop('selected', client_selected == data.users[i]["id"])
                        o.appendTo($select);
                    }
                }

                // atualiza os eas para a conta
                if ($('#ea').length > 0) {
                    var ea_selected = document.getElementById('ea').value
                    $('#ea').empty();
                    var $select = $('#ea');
                    var o = $('<option/>', {
                        value: "-1"
                    })
                            .text("Todos")
                            .prop('selected', ea_selected == -1)
                    o.appendTo($select);
                    for (var i = 0; i < data.eas.length; i++) {
                        var o = $('<option/>', {
                            value: data.eas[i]["id"]
                        })
                                .text(data.eas[i]["name"])
                                .prop('selected', data.eas[i]["id"] == ea_selected)
                        o.appendTo($select);
                    }
                }
            },
            error: function (data, textStatus, errorThrown) {
                //console.log(data);
            },
        });
    });

    $("#ea").on('change', function () {
        $.ajax({
            type: "POST",
            url: '/api/dashboard/filtros',
            data: {
                client: ($('#client').length > 0) ? document.getElementById('client').value : 0,
                account: document.getElementById('account').value,
                ea: document.getElementById('ea').value,
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                // atualiza os clientes para a conta
                if ($('#client').length > 0) {
                    var client_selected = document.getElementById('client').value
                    $('#client').empty();
                    var $select = $('#client');
                    var o = $('<option/>', {
                        value: "-1"
                    })
                            .text("Todos")
                            .prop('selected', client_selected == -1)
                    o.appendTo($select);
                    for (var i = 0; i < data.users.length; i++) {
                        var o = $('<option/>', {
                            value: data.users[i]["id"]
                        })
                                .text(data.users[i]["name"] + "(" + data.users[i]["email"] + ")")
                                .prop('selected', client_selected == data.users[i]["id"])
                        o.appendTo($select);
                    }
                }

                // atualiza as contas do cliente
                var account_selected = document.getElementById('account').value
                $('#account').empty();
                var $select = $('#account');
                var o = $('<option/>', {
                    value: "-1"
                })
                        .text("Todas")
                        .prop('selected', account_selected == -1)
                o.appendTo($select);
                for (var i = 0; i < data.accounts.length; i++) {
                    var o = $('<option/>', {
                        value: data.accounts[i]["account"]
                    })
                            .text(data.accounts[i]["account"])
                            .prop('selected', account_selected == data.accounts[i]["account"]);
                    o.appendTo($select);
                }
            },
            error: function (data, textStatus, errorThrown) {
                //console.log(data);
            },
        });
    });

    const ctx1 = document.getElementById('chart_curva_capital');

    let curva_datas = {!! $curva_datas !!}
    ;
            let curva_valor = {!! $curva_valor !!}
    ;

    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: curva_datas,
            datasets: [{
                    label: 'Saldo acumulado',
                    data: curva_valor,
                    fill: false,
                    backgroundColor: 'rgb(75, 192, 192)',
                    borderColor: 'rgb(75, 192, 192)',
                }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true
        }
    });

    const ctx2 = document.getElementById('chart_lucro_perda');

    let datas = { !! $datas_lucro_perda !! }}
    let lucro = { !! $lucro !! }}
    let perda = { !! $perda !!}

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: datas,
            datasets: [{
                    label: 'Lucro',
                    data: lucro,
                    fill: false,
                    backgroundColor: 'rgb(51,102,255)',
                    borderColor: 'rgb(51, 102, 204)',
                }, {
                    label: 'Perda',
                    data: perda,
                    fill: false,
                    backgroundColor: 'rgb(255,51,102)',
                    borderColor: 'rgb(255, 51, 51)',
                }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
