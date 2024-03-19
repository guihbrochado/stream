<!doctype html>
<html lang="en" data-bs-theme="dark">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.title-meta')
        @include('layouts.head')

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>

    <body class=" custom-header-relative ">
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
            <!--bread-crumb-->

            <div class="section-padding">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-5">
                            <div class="cast-box position-relative">
                                <img src="./assets/images/cast/01.webp" class="img-fluid object-cover w-100" alt="person" loading="lazy">

                                <!-- Botão Assistir Agora com estilos do Bootstrap -->
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <a href="{{ route('course.lesson') }}" class="btn btn-primary waves-effect waves-light">Assistir Agora</a>
                                </div>

                                <ul class="p-0 m-0 list-unstyled widget_social_media position-absolute w-100 text-center">
                                    <li class="">
                                        <a href="https://www.facebook.com/" class="position-relative">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="https://twitter.com/" class="position-relative">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="https://github.com/" class="position-relative">
                                            <i class="fab fa-github"></i>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="https://www.instagram.com/" class="position-relative">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <h5 class="mt-5 mb-4 text-white fw-500">Personal Details</h5>
                            <h6 class="font-size-18 text-white fw-500">Official Sites :</h6>
                            <p><a href="https://iqonic.design/" target="_blank" class="text-uppercase">Iqonic Design</a></p>
                            <h6 class="font-size-18 text-white fw-500">Born :</h6>
                            <div class="seperator d-flex align-items-center flex-wrap mb-3">
                                <span>October 15, 1982</span>
                                <span class="circle"></span>
                                <span>Westminster, London, England, UK</span>
                            </div>
                            <h6 class="font-size-18 text-white fw-500">Height :</h6>
                            <p>6′ 1¾″ (1.87 m)</p>
                            <h6 class="font-size-18 text-white fw-500">Parents & Relatives :</h6>
                            <p class="mb-0">Diana Patricia (Servaes), <span class="text-primary">Emma Hiddleston</span>(Sibling) </p>
                        </div>
                        <div class="col-lg-9 col-md-7 mt-5 mt-md-0">
                            <h4 class="fw-500">Debbi Bossi</h4>
                            <div class="seperator d-flex align-items-center flex-wrap mb-3">
                                <span class="fw-semibold">Director</span>
                                <span class="circle"></span>
                                <span class="fw-semibold">Writer</span>
                                <span class="circle"></span>
                                <span class="fw-semibold">Actor</span>
                            </div>
                            <p>"Many actors have left a lasting impact on the world of entertainment. They bring characters to life on
                                screen, captivating audiences with their talent and charisma. From classic Hollywood icons like Marilyn Monroe
                                and Humphrey Bogart to contemporary stars like Leonardo DiCaprio and Scarlett Johansson, actors have played a
                                vital role in shaping the world of cinema. Each actor has their unique style and contribution to the art of
                                <span class="text-primary">storytelling (2001)</span>, making
                            </p>
                            <div class="awards-box border-bottom">
                                <h5>Awards</h5>
                                <span class="text-white fw-500">56 WINS & 83 NOMINATIONS</span>
                            </div>
                            <div class="pb-md-5">
                                <h5 class="main-title text-capitalize mb-4">Most View Movies</h5>
                                <div class="card-style-grid mb-5">
                                    <div class="row row-cols-xl-5 row-cols-sm-2 row-cols-1">
                                        <div class="col mb-4">
                                            <div class="iq-card card-hover">
                                                <div class="block-images position-relative w-100">
                                                    <div class="img-box w-100">
                                                        <a href="./movie-detail.html" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                        <img src="./assets/images/movies/popular/01.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                    </div>
                                                    <div class="card-description with-transition">
                                                        <div class="cart-content">
                                                            <div class="content-left">
                                                                <h5 class="iq-title text-capitalize">
                                                                    <a href="./movie-detail.html">CRW</a>
                                                                </h5>
                                                                <div class="movie-time d-flex align-items-center my-2">
                                                                    <span class="movie-time-text font-normal">2hr
                                                                        : 12mins</span>
                                                                </div>
                                                            </div>
                                                            <div class="watchlist">
                                                                <a class="watch-list-not" href="playlist.html">
                                                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-10">
                                                                    <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span class="watchlist-label"> Watchlist </span>
                                                                </a>
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
                                                            <a href="movie-detail.html" class="btn text-uppercase position-relative rounded-circle">
                                                                <i class="fa-solid fa-play ms-0"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col mb-4">
                                            <div class="iq-card card-hover">
                                                <div class="block-images position-relative w-100">
                                                    <div class="img-box w-100">
                                                        <a href="./movie-detail.html" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                        <img src="./assets/images/movies/popular/03.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                    </div>
                                                    <div class="card-description with-transition">
                                                        <div class="cart-content">
                                                            <div class="content-left">
                                                                <h5 class="iq-title text-capitalize">
                                                                    <a href="./movie-detail.html">Goal</a>
                                                                </h5>
                                                                <div class="movie-time d-flex align-items-center my-2">
                                                                    <span class="movie-time-text font-normal">2hr
                                                                        : 30mins</span>
                                                                </div>
                                                            </div>
                                                            <div class="watchlist">
                                                                <a class="watch-list-not" href="playlist.html">
                                                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-10">
                                                                    <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span class="watchlist-label"> Watchlist </span>
                                                                </a>
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
                                                            <a href="movie-detail.html" class="btn text-uppercase position-relative rounded-circle">
                                                                <i class="fa-solid fa-play ms-0"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col mb-4">
                                            <div class="iq-card card-hover">
                                                <div class="block-images position-relative w-100">
                                                    <div class="img-box w-100">
                                                        <a href="./movie-detail.html" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                        <img src="./assets/images/movies/popular/04.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                    </div>
                                                    <div class="card-description with-transition">
                                                        <div class="cart-content">
                                                            <div class="content-left">
                                                                <h5 class="iq-title text-capitalize">
                                                                    <a href="./movie-detail.html">Dandacg</a>
                                                                </h5>
                                                                <div class="movie-time d-flex align-items-center my-2">
                                                                    <span class="movie-time-text font-normal">1hr : 30mins</span>
                                                                </div>
                                                            </div>
                                                            <div class="watchlist">
                                                                <a class="watch-list-not" href="playlist.html">
                                                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-10">
                                                                    <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span class="watchlist-label"> Watchlist </span>
                                                                </a>
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
                                                            <a href="movie-detail.html" class="btn text-uppercase position-relative rounded-circle">
                                                                <i class="fa-solid fa-play ms-0"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col mb-4">
                                            <div class="iq-card card-hover">
                                                <div class="block-images position-relative w-100">
                                                    <div class="img-box w-100">
                                                        <a href="./movie-detail.html" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                        <img src="./assets/images/movies/popular/05.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                    </div>
                                                    <div class="card-description with-transition">
                                                        <div class="cart-content">
                                                            <div class="content-left">
                                                                <h5 class="iq-title text-capitalize">
                                                                    <a href="./movie-detail.html">Mexcan</a>
                                                                </h5>
                                                                <div class="movie-time d-flex align-items-center my-2">
                                                                    <span class="movie-time-text font-normal">1hr : 30mins</span>
                                                                </div>
                                                            </div>
                                                            <div class="watchlist">
                                                                <a class="watch-list-not" href="playlist.html">
                                                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-10">
                                                                    <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                    <span class="watchlist-label"> Watchlist </span>
                                                                </a>
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
                                                            <a href="movie-detail.html" class="btn text-uppercase position-relative rounded-circle">
                                                                <i class="fa-solid fa-play ms-0"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col d-xl-block d-none"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-details trending-info">
                                <ul class="nav nav-underline d-flex nav nav-pills align-items-center text-center mb-5 gap-5" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-bs-toggle="pill" href="#all" role="tab" aria-selected="true">
                                            All
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="pill" href="#movies" role="tab" aria-selected="false">
                                            Movies
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="pill" href="#tvshows" role="tab" aria-selected="false">
                                            TV Shows
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="all" class="tab-pane animated fadeInUp active show" role="tabpanel">
                                        <div class="description-content">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="w-15"><img src="./assets/images/movies/latest/01.webp" alt="image-icon"
                                                                                  class="img-fluid person-img object-cover"></td>
                                                            <td class="w-20">
                                                                <div class="font-size-18 d-flex gap-4 text-white fw-500">
                                                                    <span>1</span>
                                                                    <span class="text-capitalize">Mortal Norris <span class="fw-normal text-body">as Christina
                                                                            Ricci</span></span>
                                                                </div>
                                                            </td>
                                                            <td><span class="fw-500 font-size-18 text-white">2009</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-15"><img src="./assets/images/movies/latest/02.webp" alt="image-icon"
                                                                                  class="img-fluid person-img object-cover"></td>
                                                            <td class="w-20">
                                                                <div class="font-size-18 d-flex gap-4 text-white fw-500">
                                                                    <span>2</span>
                                                                    <span class="text-capitalize">Advetre <span class="fw-normal text-body">as Christina
                                                                            Ricci</span></span>
                                                                </div>
                                                            </td>
                                                            <td><span class="fw-500 font-size-18 text-white">2009</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-15"><img src="./assets/images/movies/latest/03.webp" alt="image-icon"
                                                                                  class="img-fluid person-img object-cover"></td>
                                                            <td class="w-20">
                                                                <div class="font-size-18 d-flex gap-4 text-white fw-500">
                                                                    <span>3</span>
                                                                    <span class="text-capitalize">Net Ailo <span class="fw-normal text-body">as Christina
                                                                            Ricci</span></span>
                                                                </div>
                                                            </td>
                                                            <td><span class="fw-500 font-size-18 text-white">2009</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-15"><img src="./assets/images/movies/latest/04.webp" alt="image-icon"
                                                                                  class="img-fluid person-img object-cover"></td>
                                                            <td class="w-20">
                                                                <div class="font-size-18 d-flex gap-4 text-white fw-500">
                                                                    <span>4</span>
                                                                    <span class="text-capitalize">Ariivaal <span class="fw-normal text-body">as Christina Ricci
                                                                            (3 Seasons)</span></span>
                                                                </div>
                                                            </td>
                                                            <td><span class="fw-500 font-size-18 text-white">2009</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="movies" class="tab-pane animated fadeInUp" role="tabpanel">
                                        <div class="description-content">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="w-15"><img src="./assets/images/movies/latest/04.webp" alt="image-icon"
                                                                                  class="img-fluid person-img object-cover"></td>
                                                            <td class="w-20">
                                                                <div class="font-size-18 d-flex gap-4 text-white fw-500">
                                                                    <span>4</span>
                                                                    <span class="text-capitalize">Ariivaal <span class="fw-normal text-body">as Christina Ricci
                                                                            (3 Seasons)</span></span>
                                                                </div>
                                                            </td>
                                                            <td><span class="fw-500 font-size-18 text-white">2009</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-15"><img src="./assets/images/movies/latest/03.webp" alt="image-icon"
                                                                                  class="img-fluid person-img object-cover"></td>
                                                            <td class="w-20">
                                                                <div class="font-size-18 d-flex gap-4 text-white fw-500">
                                                                    <span>3</span>
                                                                    <span class="text-capitalize">Net Ailo <span class="fw-normal text-body">as Christina
                                                                            Ricci</span></span>
                                                                </div>
                                                            </td>
                                                            <td><span class="fw-500 font-size-18 text-white">2009</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="tvshows" class="tab-pane animated fadeInUp" role="tabpanel">
                                        <div class="source-list-content table-responsive">
                                            <table class="table custom-table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Links
                                                        </th>
                                                        <th>
                                                            Quality
                                                        </th>
                                                        <th>
                                                            Language
                                                        </th>
                                                        <th>
                                                            Player
                                                        </th>
                                                        <th>
                                                            Date Added
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="iq-button">
                                                                <a href="./movie-detail.html" class="btn text-uppercase position-relative">
                                                                    <span class="button-text"> Play Now</span>
                                                                    <i class="fa-solid fa-play"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            1080p
                                                        </td>
                                                        <td>
                                                            english
                                                        </td>
                                                        <td>
                                                            MusicBee
                                                        </td>
                                                        <td>
                                                            2021-11-28
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="iq-button">
                                                                <a href="./movie-detail.html" class="btn text-uppercase position-relative">
                                                                    <span class="button-text"> Play Now</span>
                                                                    <i class="fa-solid fa-play"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            800p
                                                        </td>
                                                        <td>
                                                            english
                                                        </td>
                                                        <td>
                                                            5KPlayer
                                                        </td>
                                                        <td>
                                                            2021-11-25
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="iq-button">
                                                                <a href="./movie-detail.html" class="btn text-uppercase position-relative">
                                                                    <span class="button-text"> Play Now</span>
                                                                    <i class="fa-solid fa-play"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            720p
                                                        </td>
                                                        <td>
                                                            English
                                                        </td>
                                                        <td>
                                                            MediaMonkey
                                                        </td>
                                                        <td>
                                                            2021-11-20
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <footer class="footer footer-default">
            <div class="container-fluid">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 mb-5 mb-lg-0">
                            <div class="footer-logo">
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
                            <p class="mb-4 font-size-14">Email us: <span class="text-white">customer@streamit.com</span>
                            </p>
                            <p class="text-uppercase letter-spacing-1 font-size-14 mb-1">customer services</p>
                            <p class="mb-0 contact text-white">+ (480) 555-0103</p>
                        </div>
                        <div class="col-xl-2 col-lg-6 mb-5 mb-lg-0">
                            <h4 class="footer-link-title">Quick Links</h4>
                            <ul class="list-unstyled footer-menu">
                                <li class="mb-3">
                                    <a href="./about-us.html" class="ms-3">about us</a>
                                </li>
                                <li class="mb-3">
                                    <a href="./blog/blog-listing.html" class="ms-3">Blog</a>
                                </li>
                                <li class="mb-3">
                                    <a href="./pricing-plan.html" class="ms-3">Pricing Plan</a>
                                </li>
                                <li>
                                    <a href="./faq.html" class="ms-3">FAQ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-2 col-lg-6 mb-5 mb-lg-0">
                            <h4 class="footer-link-title">Movies to watch</h4>
                            <ul class="list-unstyled footer-menu">
                                <li class="mb-3">
                                    <a href="./view-all-movie.html" class="ms-3">Top trending</a>
                                </li>
                                <li class="mb-3">
                                    <a href="./view-all-movie.html" class="ms-3">Recommended</a>
                                </li>
                                <li>
                                    <a href="./view-all-movie.html" class="ms-3">Popular</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-2 col-lg-6 mb-5 mb-lg-0">
                            <h4 class="footer-link-title">About company</h4>
                            <ul class="list-unstyled footer-menu">
                                <li class="mb-3">
                                    <a href="./contact-us.html" class="ms-3">contact us</a>
                                </li>
                                <li class="mb-3">
                                    <a href="./privacy-policy.html" class="ms-3">privacy policy</a>
                                </li>
                                <li>
                                    <a href="./terms-of-use.html" class="ms-3">Terms of use</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <h4 class="footer-link-title">Subscribe Newsletter</h4>
                            <div class="mailchimp mailchimp-dark">
                                <div class="input-group mb-3 mt-4">
                                    <input type="text" class="form-control mb-0 font-size-14" placeholder="Email*" aria-describedby="button-addon2">
                                    <div class="iq-button">
                                        <button type="submit" class="btn btn-sm" id="button-addon2">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-5">
                                <span class="font-size-14 me-2">Follow Us:</span>
                                <ul class="p-0 m-0 list-unstyled widget_social_media">
                                    <li class="">
                                        <a href="https://www.facebook.com/" class="position-relative">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="https://twitter.com/" class="position-relative">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="https://github.com/" class="position-relative">
                                            <i class="fab fa-github"></i>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="https://www.instagram.com/" class="position-relative">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom border-top">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <ul class="menu list-inline p-0 d-flex flex-wrap align-items-center">
                                <li class="menu-item">
                                    <a href="#"> Terms Of Use </a>
                                </li>
                                <li id="menu-item-7316" class="menu-item">
                                    <a href="./privacy-policy.html"> Privacy-Policy </a>
                                </li>
                                <li class="menu-item">
                                    <a href="./faq.html"> FAQ </a>
                                </li>
                                <li class="menu-item">
                                    <a href="./playlist.html"> Watch List </a>
                                </li>
                            </ul>
                            <p class="font-size-14">© <span class="currentYear"></span> <span class="text-primary">STREAMIT</span>. All Rights Reserved. All videos and shows on this platform are trademarks of, and all related images and content are the property of, Streamit Inc. Duplication and copy of this is strictly prohibited. All rights reserved. </p>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <h6 class="font-size-14 pb-1">Download Streamit Apps </h6>
                            <div class="d-flex align-items-center">
                                <a class="app-image" href="#">
                                    <img src="./assets/images/footer/google-play.webp" loading="lazy" alt="play-store" />
                                </a>
                                <br />
                                <a class="ms-3 app-image" href="#">
                                    <img src="./assets/images/footer/apple.webp" loading="lazy" alt="app-store" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

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