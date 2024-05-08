<!doctype html>
<html lang="en" data-bs-theme="dark">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.title-meta')
        @include('layouts.head')

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>

    <body class="  ">
        <span class="screen-darken"></span>
        <!-- loader Start -->
        <!-- loader Start -->
        <div class="loader simple-loader">
            <div class="loader-body">
                <img src="./assets/images/loader.gif" alt="loader" class="img-fluid " width="300">
            </div>
        </div>
        <!-- loader END --> <!-- loader END -->
        <main class="main-content">
            <!--Nav Start-->
            @include('components.nav')
            <!--Nav End-->

            <!--bread-crumb-->
            <!--bread-crumb-->


            <div class="iq-banner-thumb-slider" id="divinitialbanner">
                <div class="slider">
                    <div class="position-relative slider-bg d-flex justify-content-end">
                        <div class="position-relative my-auto">
                            <div class="horizontal_thumb_slider" data-swiper="slider-thumbs-ott">
                                <div class="banner-thumb-slider-nav">
                                    <div class="swiper-container " data-swiper="slider-thumbs-inner-ott">
                                        <div class="swiper-wrapper">
                                            @forelse ($data as $row)

                                            <div class="swiper-slide swiper-bg">
                                                <div class="block-images position-relative ">
                                                    <div class="img-box">
                                                        <img src="{{asset('images/courses/' . $row->cover)}}" class="img-fluid" alt="" loading="lazy">
                                                        <div class="block-description ps-3">
                                                            <h6 class="iq-title fw-500 mb-0">{{$row->course}}</h6>
                                                            <span class="fs-12">{{ $row->duration }} minutes</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <script>
                                                document.getElementById('divinitialbanner').style.display = 'none';
                                            </script>

                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="slider-prev swiper-button">
                                        <i class="iconly-Arrow-Left-2 icli"></i>
                                    </div>
                                    <div class="slider-next swiper-button">
                                        <i class="iconly-Arrow-Right-2 icli"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-images" data-swiper="slider-images-ott" id="secondbanner">
                            <div class="swiper-container" data-swiper="slider-images-inner-ott">
                                <div class="swiper-wrapper m-0">
                                    @forelse ($data as $row)
                                    <div class="swiper-slide p-0">
                                        <div class="slider--image block-images">
                                            <img src="{{asset('images/courses/' . $row->cover)}}" loading="lazy" alt="banner" />
                                        </div>
                                        <div class="description">
                                            <div class="row align-items-center h-100">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="slider-content">
                                                        <div class="d-flex align-items-center RightAnimate mb-3">
                                                            <ul class="p-0 mb-0 list-inline d-flex flex-wrap align-items-center movie-tag">
                                                                @foreach (explode(',', $row->tags) as $tag)
                                                                <li class="position-relative text-capitalize font-size-14 letter-spacing-1">
                                                                    <span class="text-decoration-none">{{ $tag }}</span>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <h1 class="texture-text big-font letter-spacing-1 line-count-1 text-capitalize RightAnimate-two"> {{$row->course}} </h1>
                                                        <p class="line-count-3 RightAnimate-two">{{$row->description}}</p>
                                                        <div class="d-flex flex-wrap align-items-center gap-3 RightAnimate-three">
                                                            <div class="slider-ratting d-flex align-items-center">
                                                                <ul class="ratting-start p-0 m-0 list-inline text-warning d-flex align-items-center justify-content-left">
                                                                    <li>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                    </li>
                                                                </ul>
                                                                <span class="text-white ms-2 font-size-14 fw-500">4.3/5</span>
                                                            </div>
                                                            <span class="font-size-14 fw-500">{{$row->duration}} minutes</span>
                                                            <div class="text-primary font-size-14 fw-500 text-capitalize">Possui certificado? : <span class="text-decoration-none ms-1">{{$row->certification == 1 ? 'Sim' : 'Não'}}</span>
                                                            </div>
                                                            <!-- <div class="text-primary font-size-14 fw-500 text-capitalize">Starting: <a href="person-detail.html" class="text-decoration-none ms-1">Jeffrey Silver</a>
                                                                    </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="RightAnimate-four">
                                                        <div class="iq-button">
                                                            <a href="{{ route('firstLessonRedirect', ['id' => $row->id]) }}" class="btn text-uppercase position-relative">
                                                                <span class="button-text">Assistir</span>
                                                                <i class="fa-solid fa-play"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <script>
                                        document.getElementById('secondbanner').style.display = 'none';
                                    </script>

                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="continue-watching-block section-padding-top">
                <div class="container-fluid">
                    @if (!empty($lastLessons))
                    <div class="overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between px-md-3 px-1 mb-4">
                            <h5 class="main-title text-capitalize mb-0">Continuar assistindo</h5>
                        </div>
                        <div class="position-relative swiper swiper-card" data-slide="5" data-laptop="5" data-tab="3" data-mobile="2" data-mobile-sm="2" data-autoplay="false" data-loop="false" data-navigation="true" data-pagination="true">
                            <ul class="p-0 swiper-wrapper m-0  list-inline">
                                @forelse ($lastLessons as $row)
                                <li class="swiper-slide">
                                    <div class="iq-watching-block">
                                        <div class="block-images position-relative">
                                            <div class="iq-image-box overly-images">
                                                <a target="_blank" href="{{route('course.lesson', ['id' => $row->idlesson])}}" class="d-block">
                                                    <img src="https://i.ytimg.com/vi/{{$row->link}}/hqdefault.jpg" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                </a>
                                            </div>
                                            <div class="iq-preogress">
                                                <span class="data-left-timing font-size-14 fw-500 text-lowercase">{{$row->lesson}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <h4>Assista sua primeira aula</h4>
                                @endforelse
                            </ul>
                            <div class="swiper-button swiper-button-next"></div>
                            <div class="swiper-button swiper-button-prev"></div>
                        </div>
                    </div>
                    @endif
                </div>
            </section>
            @if(count($coursesTop10) > 0)
            <div class="top-ten-block" id="divtop10">
                <div class="container-fluid">
                    <section class="overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between px-md-3 px-1 mb-4">
                            <h5 class="main-title text-capitalize mb-0">Top 10</h5>
                            <a href="#" class="text-primary iq-view-all text-decoration-none flex-none">View All</a>
                        </div>
                        <div class="position-relative swiper swiper-card iq-top-ten-block-slider" data-slide="6" data-laptop="6" data-tab="3" data-mobile="2" data-mobile-sm="2" data-autoplay="false" data-loop="false" data-navigation="true" data-pagination="true">
                            <ul class="p-0 swiper-wrapper mb-5 list-inline">
                                <?php $countTop10 = 1; ?>
                                @forelse ($coursesTop10 as $row)

                                <li class="swiper-slide">
                                    <div class="iq-top-ten-block">
                                        <div class="block-image position-relative">
                                            <div class="img-box">
                                                <a class="overly-images" href="{{ route('course.detail', ['id' => $row->id]) }}">
                                                    <img src="{{asset('images/courses/' . $row->cover)}}" alt="movie-card" class="img-fluid object-cover">
                                                </a>
                                                <span class="top-ten-numbers texture-text">{{$countTop10}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php $countTop10++; ?>
                                @empty
                                <script>
                                    document.getElementById('divtop10').style.display = 'none';
                                </script>

                                @endforelse
                            </ul>
                            <div class="swiper-button swiper-button-next"></div>
                            <div class="swiper-button swiper-button-prev"></div>
                        </div>
                    </section>
                </div>
            </div>
            @endif
            <div class="streamit-block" id="divdateOrder">
                <div class="container-fluid">
                    <div class="overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between px-md-3 px-1 my-4">
                            <h5 class="main-title text-capitalize mb-0">Cursos</h5>
                            <a href="view-all-movie.html" class="text-primary iq-view-all text-decoration-none flex-none">View All</a>
                        </div>
                        <div class="card-style-slider">
                            <div class="position-relative swiper swiper-card" data-slide="6" data-laptop="6" data-tab="3" data-mobile="2" data-mobile-sm="2" data-autoplay="false" data-loop="true" data-navigation="true" data-pagination="true">
                                <ul class="p-0 swiper-wrapper m-0  list-inline">
                                    @forelse ($dateOrder as $row)

                                    <li class="swiper-slide">
                                        <div class="iq-card card-hover">
                                            <div class="block-images position-relative w-100">
                                                <div class="img-box">
                                                    <a href="{{ route('course.detail', ['id' => $row->id]) }}" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                    <img src="{{asset('images/courses/' . $row->cover)}}" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                </div>
                                                <div class="card-description with-transition">
                                                    <div class="cart-content">
                                                        <div class="content-left">
                                                            <h5 class="iq-title text-capitalize">
                                                                <a href="{{ route('course.detail', ['id' => $row->id]) }}">{{$row->course}}</a>
                                                            </h5>
                                                            <div class="movie-time d-flex align-items-center my-2">
                                                                <span class="movie-time-text font-normal">{{$row->duration}} minutes</span>
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
                                                        <a href="{{ route('course.detail', ['id' => $row->id]) }}" class="btn text-uppercase position-relative rounded-circle">
                                                            <i class="fa-solid fa-play ms-0"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </li>
                                    @empty
                                    <script>
                                        document.getElementById('divdateOrder').style.display = 'none';
                                    </script>

                                    @endforelse
                                </ul>
                                <div class="swiper-button swiper-button-next"></div>
                                <div class="swiper-button swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="streamit-block" id="divsalaaovivo">
                <div class="container-fluid">
                    <div class="overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between px-md-3 px-1 my-4">
                            <h5 class="main-title text-capitalize mb-0">Salas ao Vivo </h5>
                            <a href="view-all-movie.html" class="text-primary iq-view-all text-decoration-none flex-none">View All</a>
                        </div>
                        <div class="card-style-slider">
                            <div class="position-relative swiper swiper-card" data-slide="6" data-laptop="6" data-tab="3" data-mobile="2" data-mobile-sm="2" data-autoplay="false" data-loop="true" data-navigation="true" data-pagination="true">
                                <ul class="p-0 swiper-wrapper m-0  list-inline">
                                    @forelse ($rooms as $room)
                                    <li class="swiper-slide">
                                        <div class="iq-card card-hover">
                                            <div class="block-images position-relative w-100">
                                                <div class="img-box w-100">
                                                    <a href="{{ route('rooms.detail', ['id' => $room->id]) }}" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                    <img src="{{ $room->cover ? asset('assets/images/rooms/' . $room->cover) : asset('assets/images/movies/related/01.webp') }}" alt="room-cover" class="img-fluid object-cover w-100 d-block border-0">
                                                </div>
                                                <div class="card-description with-transition">
                                                    <div class="cart-content">
                                                        <div class="content-left">
                                                            <h5 class="iq-title text-capitalize">
                                                                <a href="{{ route('rooms.show', ['room' => $room->id]) }}">{{$room->title}}</a>
                                                            </h5>
                                                            @if ($room->tags->isNotEmpty())
                                                            <div class="movie-time d-flex align-items-center my-2">
                                                                @foreach ($room->tags as $tag)
                                                                <span class="movie-time-text font-normal"> {{ $tag->tag_name }} </span>
                                                                @endforeach
                                                            </div>
                                                            @endif
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
                                                        <a href="{{ route('course.detail', ['id' => $row->id]) }}" class="btn text-uppercase position-relative rounded-circle">
                                                            <i class="fa-solid fa-play ms-0"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </li>
                                    @empty
                                    <script>
                                        document.getElementById('divsalaaovivo').style.display = 'none';
                                    </script>

                                    @endforelse
                                </ul>
                                <div class="swiper-button swiper-button-next"></div>
                                <div class="swiper-button swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="verticle-slider section-padding-bottom">
                <div class="slider">
                    <div class="slider-flex position-relative">
                        <div class="slider--col position-relative">
                            <div class="vertical-slider-prev swiper-button"><i class="iconly-Arrow-Up-2 icli"></i></div>
                            <div class="slider-thumbs" data-swiper="slider-thumbs">
                                <div class="swiper-container " data-swiper="slider-thumbs-inner">
                                    <div class="swiper-wrapper top-ten-slider-nav">
                                        @forelse ($data as $row)
                                        <div class="swiper-slide swiper-bg">
                                            <div class="block-images position-relative ">
                                                <div class="img-box slider--image">
                                                    <img src="{{ asset('images/courses/' . $row->cover) }}" class="img-fluid" alt="" loading="lazy">
                                                </div>
                                                <div class="block-description">
                                                    <h6 class="iq-title"><a href="tv-show-detail.html">{{ $row->course }}</a></h6>
                                                    <div class="movie-time d-flex align-items-center my-2">
                                                        <span class="text-body">{{ $row->duration }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="swiper-slide">
                                            <p>No content available</p>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-slider-next swiper-button"><i class="iconly-Arrow-Down-2 icli"></i></div>
                        </div>
                        <div class="slider-images" data-swiper="slider-images">
                            <div class="swiper-container " data-swiper="slider-images-inner">
                                <div class="swiper-wrapper">
                                    @forelse ($data as $row)
                                    <div class="swiper-slide">
                                        <div class="slider--image block-images"><img src="{{ asset('images/courses/' . $row->cover) }}" loading="lazy" alt="" /></div>
                                        <div class="description">
                                            <div class="block-description">
                                                <ul class="ps-0 mb-0 mb-1 pb-1 list-inline d-flex flex-wrap align-items-center movie-tag">
                                                    @foreach (explode(',', $row->tags) as $tag)
                                                    <li class="position-relative text-capitalize font-size-14 letter-spacing-1">
                                                        <a href="view-all-movie.html" class="text-white text-decoration-none">{{ $tag }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <h2 class="iq-title mb-3"><a href="tv-show-detail.html">{{ $row->course }}</a></h2>
                                                <div class="d-flex align-items-center gap-3 mb-3">
                                                    <div class="slider-ratting d-flex align-items-center">
                                                        <ul class="ratting-start p-0 m-0 list-inline text-warning d-flex align-items-center justify-content-left">
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                        <span class="text-white ms-2 font-size-14 fw-500">{{ $row->rating }}/5</span>                                     
                                                    </div>
                                                    <span class="text-body">{{ $row->duration }}</span>
                                                </div>
                                                <p class="mt-0 mb-3 line-count-2">{{ $row->description }}</p>
                                                <div class="iq-button">
                                                    <a href="{{ route('firstLessonRedirect', ['id' => $row->id]) }}" class="btn text-uppercase position-relative">
                                                        <span class="button-text">Assistir</span>
                                                        <i class="fa-solid fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="swiper-slide">
                                        <p>No content available</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div id="back-to-top" style="display: none;">
            <a class="p-0 btn bg-primary btn-sm position-fixed top border-0 rounded-circle" id="top" href="#top">
                <i class="fa-solid fa-chevron-up"></i>
            </a>
        </div>
        <!-- Wrapper End-->
        <!-- Library Bundle Script -->
        @include('layouts.vendor-scripts')

        <script>
            $(document).ready(function () {

            });

            $('.btnaulas').click(async function (e) {
                const idcourse = $(this).attr('idcourse')

                callAjaxModules(idcourse);

            });

            function callAjaxModules(idcourse) {
                var baseurl = "<?= url('/') ?>";
                var url = baseurl + '/ajaxCoursesModules/' + idcourse;

                $.get(url, function (data) {
                    $('.selectmodulesdiv').html(data);
                    console.log("Ajax callAjaxModules concluído com sucesso!");

                    getIdModule(idcourse);
                });
            }

            function getIdModule(idcourse) {
                const idmodule = $("#selectmodules" + idcourse).val();
                console.log(idmodule);
                // if(idmodule === undefined){
                //     callAjaxModules(idcourse);
                // }
                setTimeout(function () {
                    callAjaxLessons(idcourse, idmodule)
                }, 5000);

            }

            function callAjaxLessons(idcourse, idmodule) {
                var baseurl = "<?= url('/') ?>";
                var url = baseurl + '/ajaxCoursesLessons/' + idcourse + '/' + idmodule;

                $.get(url, function (data) {
                    $('.divCoursesLessons').html(data);
                    console.log("Ajax callAjaxLessons concluído com sucesso!");
                });
            }

            $(".selectmodules").change(function (e) {
                console.log('asdasd');
                const val = $(this).val()
                console.log(val);
            });
        </script>

    </body>

</html>