@extends('layouts.master-without-nav')

@section('content')
<script src="{{ asset('assets/js/webrtc.js') }}"></script>
@endsection

<!doctype html>
<html lang="en" data-bs-theme="dark">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.title-meta')
        @include('layouts.head')

        <!-- Scripts -->
        @vite(['resources/js/app.js'])

        <style>
            .video-container {
                position: relative;
                max-width: 100%; /* Utilize 100% para largura total, ajuste conforme necessário */
                margin: auto;
                overflow: hidden; /* Para garantir que nada saia fora do contêiner */
            }

            .video-cover {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover; /* Isso garante que a imagem cubra o espaço sem perder as proporções */
                z-index: 2; /* Garante que a imagem fique sobre o vídeo */
            }

            #localVideo {
                width: 100%;
                height: auto;
            }

            .btn-play {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 10;
                background: rgba(0, 0, 0, 0.7); /* Fundo semi-transparente */
                border-radius: 50%; /* Faz o botão redondo */
                padding: 15px; /* Tamanho do botão */
                border: none; /* Remove a borda do botão */
                outline: none; /* Remove o contorno quando focado */
                cursor: pointer; /* Muda o cursor para indicar que é clicável */
            }

            .btn-play svg {
                fill: white; /* Cor do ícone de play */
            }

            .btn-play:hover {
                background: rgba(0, 0, 0, 0.8); /* Muda o fundo para um pouco mais escuro quando passa o mouse */
            }

            .btn-play:focus {
                outline: none; /* Remove o contorno quando clicado */
            }
        </style>
    </head>

    <body class=" custom-header-relative ">
        <span class="screen-darken"></span>
        <!-- loader Start -->
        <!-- loader Start -->
        <div class="loader simple-loader">
            <div class="loader-body">
                <img src="{{ asset('assets/images/loader.gif')}}" alt="loader" class="img-fluid " width="300">
            </div>
        </div>
        <!-- loader END -->  <!-- loader END -->
        <main class="main-content">
            <!--Nav Start-->
            @include('components.nav')
            <!--Nav End-->

            <!--bread-crumb-->
            <!--bread-crumb-->

            <!-- Banner Start -->
            <div class="iq-main-slider site-video">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="video-container pt-0" style="height: 700px;">
                                <img id="videoCover" src="{{ $room->cover ? asset('assets/images/rooms/' . $room->cover) : asset('assets/images/movies/related/01.webp') }}" alt="video cover" class="video-cover">
                                <video id="localVideo" class="video-js vjs-big-play-centered" controls preload="auto" autoplay muted>
                                    <source src="./assets/images/video/sample-video.mp4" type="video/mp4" />
                                    <source src="MY_VIDEO.webm" type="video/webm" />
                                </video>
                                <!-- Botões exibidos apenas para administradores -->
                                @if(auth()->user() && auth()->user()->isAdmin())
                                <button id="startButton" class="start-button btn-play">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                    </svg>
                                </button>
                                <button id="shareScreenButton">Compartilhar Tela</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner End -->

            <div class="details-part">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Movie Description Start-->
                            <div class="trending-info mt-4 pt-0 pb-4">
                                <div class="row">
                                    <div class="col-md-9 col-12 mb-auto">
                                        <div class="d-block d-lg-flex align-items-center">
                                            <h2 class="trending-text fw-bold texture-text text-uppercase my-0 fadeInLeft animated d-inline-block"
                                                data-animation-in="fadeInLeft" data-delay-in="0.6" style="opacity: 1; animation-delay: 0.6s">
                                                {{ $room->title }}
                                            </h2>
                                            <div class="slider-ratting d-flex align-items-center ms-lg-3 ms-0">
                                                <ul class="ratting-start p-0 m-0 list-inline text-warning d-flex align-items-center justify-content-left">
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-half" aria-hidden="true"></i></li>
                                                </ul>
                                            </div>
                                        </div>

                                        @if ($room->tags->isNotEmpty())
                                        <ul class="p-0 mt-2 list-inline d-flex flex-wrap movie-tag">
                                            @foreach ($room->tags as $tag)
                                            <li class="tag trending-list"><span class="text-primary">{{ $tag->tag_name }}</span></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        <div class="d-flex flex-wrap align-items-center text-white text-detail flex-wrap mb-4">
                                            <span class="badge bg-secondary">Criada</span>
                                            <span class="ms-3 font-Weight-500 genres-info">{{ date("d/m/Y", strtotime($room->created_at)) }}</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-4 flex-wrap mb-4">
                                            <ul class="list-inline p-0 share-icons music-play-lists mb-n2 mx-n2">
                                                <li class="share">
                                                    <span><i class="fa-solid fa-share-nodes"></i></span>
                                                    <div class="share-box">
                                                        <svg width="15" height="40" viewBox="0 0 15 40" class="share-shape" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M14.8842 40C6.82983 37.2868 1 29.3582 1 20C1 10.6418 6.82983 2.71323 14.8842 0H0V40H14.8842Z"
                                                              fill="#191919"></path>
                                                        </svg>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="share-ico"><i class="fa-brands fa-facebook-f"></i></a>
                                                            <a href="#" class="share-ico"><i class="fa-brands fa-twitter"></i></a>
                                                            <a href="#" class="share-ico"><i class="fa-solid fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><span><i class="fa-solid fa-heart"></i></span></li>
                                                <li><span><i class="fa-solid fa-plus"></i></span></li>
                                                <li><span><i class="fa-solid fa-download"></i></span></li>
                                            </ul>
                                        </div>
                                        @if ($room->tags->isNotEmpty())
                                        <ul class="iq-blogtag list-unstyled d-flex flex-wrap align-items-center gap-3 p-0">
                                            <li class="iq-tag-title text-primary mb-0">
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                Tags:
                                            </li>
                                            @foreach ($room->tags as $tag)
                                            <li>
                                                <span class="tag title">{{ $tag->tag_name }}</span>
                                            </li>
                                            @endforeach

                                        </ul>
                                        @endif
                                    </div>
                                    <div class="trailor-video col-md-3 col-12 mt-lg-0 mt-4 mb-md-0 mb-1 text-lg-right">
                                        <a data-fslightbox="html5-video" href="https://www.youtube.com/watch?v=QCGq1epI9pQ"
                                           class="video-open playbtn block-images position-relative playbtn_thumbnail">
                                            <img src="./assets/images/genre/01.webp"
                                                 class="attachment-medium-large size-medium-large wp-post-image" alt="" loading="lazy" />
                                            <span class="content btn btn-transparant iq-button">
                                                <i class="fa fa-play me-2 text-white"></i>
                                                <span>Trailer Link</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Movie Description End -->                <!-- Movie Source Start -->
                            <div class="content-details trending-info">
                                <ul class="iq-custom-tab tab-bg-gredient-center d-flex nav nav-pills align-items-center text-center mb-5 justify-content-center list-inline"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-bs-toggle="pill" href="#description-01" role="tab" aria-selected="true">
                                            Descrição
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="pill" href="#review-01" role="tab" aria-selected="false">
                                            Materiais
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="pill" href="#source-01" role="tab" aria-selected="false">
                                            Sources
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="description-01" class="tab-pane animated fadeInUp active show" role="tabpanel">
                                        <div class="description-content">
                                            <p>{{ $room->description }}
                                            </p>
                                        </div>
                                    </div>
                                    <div id="review-01" class="tab-pane animated fadeInUp" role="tabpanel">
                                        <div class="streamit-reviews">
                                            <div id="comments" class="comments-area validate-form">
                                                <p class="masvideos-noreviews mt-3">
                                                    There are no reviews yet.
                                                </p>
                                            </div>
                                            <div class="review_form">
                                                <div class="comment-respond">
                                                    <h3 class="fw-500 my-2">
                                                        Be the first to review “Zombie Island”
                                                    </h3>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="mb-2">
                                                                    Your review
                                                                    <span class="required">
                                                                        *
                                                                    </span>
                                                                </label>
                                                                <textarea class="form-control" name="comment" cols="5" rows="8" required=""></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="mb-2">
                                                                    Name
                                                                    <span class="required">
                                                                        *
                                                                    </span>
                                                                </label>
                                                                <input class="form-control" name="author" type="text" value="" size="30" required="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="mb-2">
                                                                    Email&nbsp;
                                                                    <span class="required">
                                                                        *
                                                                    </span>
                                                                </label>
                                                                <input class="form-control" name="email" type="email" value="" size="30" required="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mt-3 mt-3 d-flex gap-2 align-items-center">
                                                                <input class="form-check-input mt-0" type="checkbox" value="" id="check1" checked />
                                                                <label class="form-check-label" for="check1">
                                                                    Save my name, email, and website in this browser for the
                                                                    next time I comment.
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-submit mt-4">
                                                                <div class="iq-button">
                                                                    <button name="submit" type="submit" id="submit" class="btn text-uppercase position-relative" value="Submit">
                                                                        <span class="button-text">Submit</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Movie Source End -->            </div>
                    </div>
                </div>
            </div>

            @if(count($otherRooms) > 0)
            <section class="recommended-block">
                <div class="container-fluid">
                    <div class="overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between px-3 pt-2 my-4">
                            <h5 class="main-title text-capitalize mb-0">Recomendados</h5>
                        </div>
                        <div class="card-style-slider">
                            <div class="position-relative swiper swiper-card" data-slide="5" data-laptop="5" data-tab="2" data-mobile="2"
                                 data-mobile-sm="2" data-autoplay="false" data-loop="true" data-navigation="true" data-pagination="true">
                                <ul class="p-0 swiper-wrapper m-0  list-inline">
                                    @foreach($otherRooms as $rooms)
                                    <li class="swiper-slide">
                                        <div class="iq-card card-hover">
                                            <div class="block-images position-relative w-100">
                                                <div class="img-box w-100">
                                                    <a href="{{ route('rooms.show', ['room' => $rooms->id]) }}" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                    <img src="{{ $rooms->cover ? asset('assets/images/rooms/' . $rooms->cover) : asset('assets/images/movies/related/01.webp') }}" alt="room-cover" class="img-fluid object-cover w-100 d-block border-0">
                                                </div>
                                                <div class="card-description with-transition">
                                                    <div class="cart-content">
                                                        <div class="content-left">
                                                            <h5 class="iq-title text-capitalize">
                                                                <a href="{{ route('rooms.show', ['room' => $rooms->id]) }}">{{ $rooms->title }}</a>
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
                                                        <a href="{{ route('rooms.show', ['room' => $rooms->id]) }}" class="btn text-uppercase position-relative rounded-circle">
                                                            <i class="fa-solid fa-play ms-0"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="swiper-button swiper-button-next"></div>
                                <div class="swiper-button swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- Upcoming Start -->
            <section class="upcomimg-block">
                <div class="container-fluid">
                    <div class="overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between px-3 pt-2 my-4">
                            <h5 class="main-title text-capitalize mb-0">Upcoming</h5>
                        </div>
                        <div class="card-style-slider">
                            <div class="position-relative swiper swiper-card" data-slide="5" data-laptop="5" data-tab="2" data-mobile="2"
                                 data-mobile-sm="2" data-autoplay="false" data-loop="true" data-navigation="true" data-pagination="true">
                                <ul class="p-0 swiper-wrapper m-0  list-inline">
                                    <li class="swiper-slide">
                                        <div class="iq-card card-hover">
                                            <div class="block-images position-relative w-100">
                                                <div class="img-box w-100">
                                                    <a href="./movie-detail.html" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                    <img src="./assets/images/movies/upcoming/01.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                </div>
                                                <div class="card-description with-transition">
                                                    <div class="cart-content">
                                                        <div class="content-left">
                                                            <h5 class="iq-title text-capitalize">
                                                                <a href="./movie-detail.html">dinoosaur</a>
                                                            </h5>
                                                            <div class="movie-time d-flex align-items-center my-2">
                                                                <span class="movie-time-text font-normal">2hr : 12mins</span>
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


                                    </li>
                                    <li class="swiper-slide">
                                        <div class="iq-card card-hover">
                                            <div class="block-images position-relative w-100">
                                                <div class="img-box w-100">
                                                    <a href="./movie-detail.html" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                    <img src="./assets/images/movies/upcoming/02.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                </div>
                                                <div class="card-description with-transition">
                                                    <div class="cart-content">
                                                        <div class="content-left">
                                                            <h5 class="iq-title text-capitalize">
                                                                <a href="./movie-detail.html">godilla</a>
                                                            </h5>
                                                            <div class="movie-time d-flex align-items-center my-2">
                                                                <span class="movie-time-text font-normal">1hr : 22mins</span>
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


                                    </li>
                                    <li class="swiper-slide">
                                        <div class="iq-card card-hover">
                                            <div class="block-images position-relative w-100">
                                                <div class="img-box w-100">
                                                    <a href="./movie-detail.html" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                    <img src="./assets/images/movies/upcoming/03.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                </div>
                                                <div class="card-description with-transition">
                                                    <div class="cart-content">
                                                        <div class="content-left">
                                                            <h5 class="iq-title text-capitalize">
                                                                <a href="./movie-detail.html">batter caill</a>
                                                            </h5>
                                                            <div class="movie-time d-flex align-items-center my-2">
                                                                <span class="movie-time-text font-normal">1hr : 55mins</span>
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


                                    </li>
                                    <li class="swiper-slide">
                                        <div class="iq-card card-hover">
                                            <div class="block-images position-relative w-100">
                                                <div class="img-box w-100">
                                                    <a href="./movie-detail.html" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                    <img src="./assets/images/movies/upcoming/04.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                </div>
                                                <div class="card-description with-transition">
                                                    <div class="cart-content">
                                                        <div class="content-left">
                                                            <h5 class="iq-title text-capitalize">
                                                                <a href="./movie-detail.html">the co nouerllng</a>
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


                                    </li>
                                    <li class="swiper-slide">
                                        <div class="iq-card card-hover">
                                            <div class="block-images position-relative w-100">
                                                <div class="img-box w-100">
                                                    <a href="./movie-detail.html" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                    <img src="./assets/images/movies/upcoming/05.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                </div>
                                                <div class="card-description with-transition">
                                                    <div class="cart-content">
                                                        <div class="content-left">
                                                            <h5 class="iq-title text-capitalize">
                                                                <a href="./movie-detail.html">fast furious</a>
                                                            </h5>
                                                            <div class="movie-time d-flex align-items-center my-2">
                                                                <span class="movie-time-text font-normal">2hr : 45mins</span>
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


                                    </li>
                                    <li class="swiper-slide">
                                        <div class="iq-card card-hover">
                                            <div class="block-images position-relative w-100">
                                                <div class="img-box w-100">
                                                    <a href="./movie-detail.html" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                    <img src="./assets/images/movies/upcoming/06.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                </div>
                                                <div class="card-description with-transition">
                                                    <div class="cart-content">
                                                        <div class="content-left">
                                                            <h5 class="iq-title text-capitalize">
                                                                <a href="./movie-detail.html">spiderman</a>
                                                            </h5>
                                                            <div class="movie-time d-flex align-items-center my-2">
                                                                <span class="movie-time-text font-normal">1hr : 45mins</span>
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


                                    </li>
                                    <li class="swiper-slide">
                                        <div class="iq-card card-hover">
                                            <div class="block-images position-relative w-100">
                                                <div class="img-box w-100">
                                                    <a href="./movie-detail.html" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                    <img src="./assets/images/movies/upcoming/07.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                </div>
                                                <div class="card-description with-transition">
                                                    <div class="cart-content">
                                                        <div class="content-left">
                                                            <h5 class="iq-title text-capitalize">
                                                                <a href="./movie-detail.html">onepeoc</a>
                                                            </h5>
                                                            <div class="movie-time d-flex align-items-center my-2">
                                                                <span class="movie-time-text font-normal">2hr : 30mins</span>
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


                                    </li>
                                </ul>
                                <div class="swiper-button swiper-button-next"></div>
                                <div class="swiper-button swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Upcoming End -->

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

        <script>
document.addEventListener('DOMContentLoaded', (event) => {
    const localVideo = document.getElementById('localVideo');
    const startButton = document.getElementById('startButton');

    if (localVideo && startButton) {
        localVideo.addEventListener('play', () => {
            startButton.style.display = 'none';
        });

        localVideo.addEventListener('pause', () => {
            startButton.style.display = 'block';
        });

        startButton.addEventListener('click', () => {
            if (localVideo.paused) {
                localVideo.play();
            } else {
                localVideo.pause();
            }
        });
    }
});

document.getElementById('startButton').addEventListener('click', function () {
    var videoElement = document.getElementById('localVideo');
    var coverElement = document.getElementById('videoCover');

    // Verifica se o vídeo está pausado antes de tentar reproduzir
    if (videoElement.paused) {
        videoElement.play();
        coverElement.style.display = 'none'; // Oculta a imagem de capa
    } else {
        videoElement.pause();
    }
});
        </script>
    </body>

</html>