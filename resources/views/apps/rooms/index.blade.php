@extends('layouts.master-without-nav')

@section('content')

<script src="{{ asset('assets/js/webrtc.js') }}"></script>
@endsection

<!doctype html>
<html lang="en" data-bs-theme="dark">

    @include('layouts.head')

    <body class="  ">
        <span class="screen-darken"></span>
        <!-- loader Start -->
        <!-- loader Start -->
        <div class="loader simple-loader">
            <div class="loader-body">
                <img src="./assets/images/loader.gif" alt="loader" class="img-fluid " width="300">
            </div>
        </div>
        <!-- loader END -->  <!-- loader END -->
        <main class="main-content">
            <!--Nav Start-->
            @include('components.nav')<!--Nav End-->

            <!--bread-crumb-->
            <div class="iq-breadcrumb" style="background-image: url(./assets/images/pages/01.webp);">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <nav aria-label="breadcrumb" class="text-center">
                                <h2 class="title">Salas Ao Vivo Disponíveis</h2>
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="./index.html">Home</a></li> 
                                    <li class="breadcrumb-item active">View All</li>
                                </ol>
                            </nav>
                        </div>
                    </div> 
                </div>
            </div>      <!--bread-crumb-->


            <div class="section-padding">
                <div class="container-fluid">       
                    <div class="card-style-grid">
                        <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1">
                            @foreach($rooms as $room)
                            <div class="col mb-4">
                                <div class="iq-card card-hover">
                                    <div class="block-images position-relative w-100">
                                        <div class="img-box w-100">
                                            <a href="{{ route('rooms.show', ['room' => $room->id]) }}" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                            <img src="./assets/images/movies/related/01.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                        </div>
                                        <div class="card-description with-transition">
                                            <div class="cart-content">
                                                <div class="content-left">
                                                    <h5 class="iq-title text-capitalize">
                                                        <a href="{{ route('rooms.show', ['room' => $room->id]) }}">{{ $room->title }}</a>
                                                    </h5>
                                                    <div class="movie-time d-flex align-items-center my-2">
                                                        <span class="movie-time-text font-normal">2hr : 12mins</span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="block-social-info align-items-center">
                                            <ul class="p-0 m-0 d-flex gap-2 music-play-lists">
                                                <li class="share position-relative d-flex align-items-center text-center mb-0">
                                                    <span class="w-100 h-100 d-inline-block bg-transparent">
                                                        <i class="fas fa-share-alt"></i>
                                                    </span>
                                                    <div class="share-wrapper">
                                                        <div class="share-boxs d-inline-block">
                                                            <svg width="15" height="40" class="share-shape" viewBox="0 0 15 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8842 40C6.82983 37.2868 1 29.3582 1 20C1 10.6418 6.82983 2.71323 14.8842 0H0V40H14.8842Z" fill="#191919"></path>
                                                            </svg>
                                                            <div class=" overflow-hidden">
                                                                <a href="" target="_blank">
                                                                    <i class="fab fa-facebook-f"></i>
                                                                </a>
                                                                <a href="" target="_blank">
                                                                    <i class="fab fa-twitter"></i>
                                                                </a>
                                                                <a href="#">
                                                                    <i class="fas fa-link"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="share position-relative d-flex align-items-center text-center mb-0">
                                                    <span class="w-100 h-100 d-inline-block bg-transparent">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </span>
                                                    <div class="share-wrapper">
                                                        <div class="share-boxs d-inline-block">
                                                            <svg width="15" height="40" class="share-shape" viewBox="0 0 15 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8842 40C6.82983 37.2868 1 29.3582 1 20C1 10.6418 6.82983 2.71323 14.8842 0H0V40H14.8842Z" fill="#191919"></path>
                                                            </svg>
                                                            <div class=" overflow-hidden">
                                                                <span>+51</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="iq-button">
                                                <a href="{{ route('rooms.show', ['room' => $room->id]) }}" class="btn text-uppercase position-relative rounded-circle">
                                                    <i class="fa-solid fa-play ms-0"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <div class="rtl-box">
            <a class="btn btn-fixed-end btn-icon btn-setting" id="settingbutton" data-bs-toggle="offcanvas"
               data-bs-target="#live-customizer" role="button" aria-controls="live-customizer">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.875em" height="1.875em" viewBox="0 0 20 20" fill="white">
                <path fill-rule="evenodd"
                      d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                      clip-rule="evenodd" />
                </svg>
            </a>
            <div class="offcanvas offcanvas-end live-customizer on-rtl end" tabindex="-1" id="live-customizer"
                 data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="live-customizer-label" aria-modal="true"
                 role="dialog">
                <div class="offcanvas-header gap-3">
                    <div class="d-flex align-items-center">
                        <h5 class="offcanvas-title text-dark" id="live-customizer-label">Live Customizer</h5>
                    </div>
                    <div class="d-flex gap-1 align-items-center">
                        <button class="btn btn-icon text-primary" data-reset="settings" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Reset All Settings"
                                data-bs-original-title="Reset All Settings">
                            <span class="btn-inner">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </span>
                        </button>
                        <button type="button" class="btn btn-icon btn-close px-0 text-reset shadow-none text-dark" data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>            
                </div>
                <div class="offcanvas-body pt-0">
                    <div class="modes row row-cols-2 gx-2">
                        <div class="col">
                            <div data-setting="attribute" class="text-center w-100">
                                <input type="radio" value="ltr" class="btn-check" name="theme_scheme_direction" data-prop="dir"
                                       id="theme-scheme-direction-ltr" checked>
                                <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-direction-ltr">
                                    LTR
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-setting="attribute" class="text-center w-100">
                                <input type="radio" value="rtl" class="btn-check" name="theme_scheme_direction" data-prop="dir"
                                       id="theme-scheme-direction-rtl">
                                <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-direction-rtl">
                                    RTL
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modes mt-3">
                        <div class="color-customizer mb-3">
                            <h6 class="mb-0 title-customizer">Color Customizer</h6>
                        </div>
                        <div class="row row-cols-2 gx-2">
                            <div class="col mb-3">
                                <div data-setting="attribute" class="text-center w-100">
                                    <input type="radio" value="dark" class="btn-check" name="theme_style_appearance"
                                           data-prop="data-bs-theme" id="theme-scheme-color-netflix" checked>
                                    <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-netflix">
                                        Netflix
                                    </label>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div data-setting="attribute" class="text-center w-100">
                                    <input type="radio" value="hotstar" class="btn-check" name="theme_style_appearance"
                                           data-prop="data-bs-theme" id="theme-scheme-color-hotstar">
                                    <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-hotstar">
                                        Hotstar
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div data-setting="attribute" class="text-center w-100">
                                    <input type="radio" value="amazonprime" class="btn-check" name="theme_style_appearance"
                                           data-prop="data-bs-theme" id="theme-scheme-color-prime">
                                    <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-prime">
                                        Prime
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div data-setting="attribute" class="text-center w-100">
                                    <input type="radio" value="hulu" class="btn-check" name="theme_style_appearance"
                                           data-prop="data-bs-theme" id="theme-scheme-color-hulu">
                                    <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-hulu">
                                        Hulu
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  <div id="back-to-top" style="display: none;">
            <a class="p-0 btn bg-primary btn-sm position-fixed top border-0 rounded-circle" id="top" href="#top">
                <i class="fa-solid fa-chevron-up"></i>
            </a>
        </div>
        @include('layouts.vendor-scripts')
    </body>

</html>