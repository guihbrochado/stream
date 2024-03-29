<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @include('layouts.title-meta')
  @include('layouts.head')

  <!-- Scripts -->
  @vite(['resources/js/app.js'])
</head>

<style>
  .embed-responsive {
  position: relative;
  display: block;
  height: 0;
  padding: 0;
  overflow: hidden;
}

.embed-responsive.embed-responsive-16by9 {
  padding-bottom: 56.25%; /* 16:9 ratio */
}

.embed-responsive .embed-responsive-item, .embed-responsive iframe, .embed-responsive embed, .embed-responsive object, .embed-responsive video {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.embed-responsive .card-img-top {
  max-width: 100%;
  height: auto;
}

</style>

<body class=" custom-header-relative ">
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
    @include('components.nav') <!--Nav End-->

    <!--bread-crumb-->
    <!--bread-crumb-->

    <!-- Banner Start -->
    <div class="iq-main-slider site-video">
      <div class="container-fluid">
        <div class="row mt-3">
          <div class="col-md-9">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item rounded-3" src="https://www.youtube.com/embed/{{$data->link}}" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-lg-3">

            <div class="widget widget_categories">
              @foreach ($modules as $row)
              <div class="d-flex justify-content-between" id="module{{ $row->id }}">
                <h5 class="widget-title position-relative">Módulo: {{ $row->module }}</h5>
                <i id="icon{{ $row->id }}" class="fa-solid fa-chevron-down"></i>
              </div>
              <ul class="p-0 m-0 list-unstyled " id="ul{{ $row->id }}">
                @foreach ($row['lessons'] as $rowlesson)
                <li>
                  <div class="d-flex justify-content-between">
                    <span class="post_count"><i class="fas fa-play"></i></span>
                    <a href="{{ route('course.lesson', ['id' => $rowlesson->id ]) }}" class="position-relative">{{ $rowlesson->lesson }}</a>

                  </div>
                </li>
                @endforeach
              </ul>

              <script>
                $("#module{{ $row->id }}").click(function(e) {
                  const isHidden = $("#ul{{ $row->id }}").hasClass('hide');
                  if (isHidden) {
                    $("#ul{{ $row->id }}").removeClass('hide');
                    $("#ul{{ $row->id }}").show();
                    $("#icon{{ $row->id }}").removeClass('fa-solid fa-chevron-down');
                    $("#icon{{ $row->id }}").addClass('fa-solid fa-chevron-up');
                  } else {
                    $("#ul{{ $row->id }}").addClass('hide');
                    $("#ul{{ $row->id }}").hide();


                    $("#icon{{ $row->id }}").removeClass('fa-solid fa-chevron-up');
                    $("#icon{{ $row->id }}").addClass('fa-solid fa-chevron-down');
                  }
                });
              </script>
              @endforeach
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
                    <h2 class="trending-text fw-bold texture-text text-uppercase my-0 fadeInLeft animated d-inline-block" data-animation-in="fadeInLeft" data-delay-in="0.6" style="opacity: 1; animation-delay: 0.6s">
                      {{$data->lesson}}
                    </h2>
                    <div class="slider-ratting d-flex align-items-center ms-lg-3 ms-0">
                      <ul class="ratting-start p-0 m-0 list-inline text-warning d-flex align-items-center justify-content-left">
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-half" aria-hidden="true"></i></li>
                      </ul>
                      <span class="text-white ms-2">4.8 (imdb)</span>
                    </div>
                  </div>
                  <ul class="p-0 mt-2 list-inline d-flex flex-wrap movie-tag">
                    <li class="trending-list"><a class="text-primary" href="./view-all-movie.html">Action</a></li>
                    <li class="trending-list"><a class="text-primary" href="./view-all-movie.html">Adventure</a></li>
                    <li class="trending-list"><a class="text-primary" href="./view-all-movie.html">Drama</a></li>
                  </ul>
                  <div class="d-flex flex-wrap align-items-center text-white text-detail flex-wrap mb-4">
                    <span class="badge bg-secondary">Horror</span>
                    <span class="ms-3 font-Weight-500 genres-info">{{$data->duration}}</span>
                  </div>
                  <div class="d-flex align-items-center gap-4 flex-wrap mb-4">
                    <ul class="list-inline p-0 share-icons music-play-lists mb-n2 mx-n2">
                      <li class="share">
                        <span><i class="fa-solid fa-share-nodes"></i></span>
                        <div class="share-box">
                          <svg width="15" height="40" viewBox="0 0 15 40" class="share-shape" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8842 40C6.82983 37.2868 1 29.3582 1 20C1 10.6418 6.82983 2.71323 14.8842 0H0V40H14.8842Z" fill="#191919"></path>
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
                    <div class="movie-detail-select">
                      <select name="movieselect" class="form-control movie-select select2-basic-single js-states">
                        <option value="1">Playlist</option>
                        <option value="2">Zombie Island</option>
                        <option value="3">Sand Dust</option>
                        <option value="4">Jumbo Queen</option>
                      </select>
                    </div>
                  </div>
                  <ul class="iq-blogtag list-unstyled d-flex flex-wrap align-items-center gap-3 p-0">
                    <li class="iq-tag-title text-primary mb-0">
                      <i class="fa fa-tags" aria-hidden="true"></i>
                      Tags:
                    </li>
                    <li><a class="title" href="./view-all-movie.html">Action</a><span class="text-secondary">,</span></li>
                    <li><a class="title" href="./view-all-movie.html">Adventure</a><span class="text-secondary">,</span></li>
                    <li><a class="title" href="./view-all-movie.html">Drama</a></li>
                  </ul>
                </div>
                <div class="trailor-video col-md-3 col-12 mt-lg-0 mt-4 mb-md-0 mb-1 text-lg-right">
                  <a data-fslightbox="html5-video" href="https://www.youtube.com/watch?v=QCGq1epI9pQ" class="video-open playbtn block-images position-relative playbtn_thumbnail">
                    <img src="./assets/images/genre/01.webp" class="attachment-medium-large size-medium-large wp-post-image" alt="" loading="lazy" />
                    <span class="content btn btn-transparant iq-button">
                      <i class="fa fa-play me-2 text-white"></i>
                      <span>Trailer Link</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <!-- Movie Description End --> <!-- Movie Source Start -->
            <div class="content-details trending-info">
              <ul class="iq-custom-tab tab-bg-gredient-center d-flex nav nav-pills align-items-center text-center mb-5 justify-content-center list-inline" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active show" data-bs-toggle="pill" href="#description-01" role="tab" aria-selected="true">
                    Descrição
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="pill" href="#review-01" role="tab" aria-selected="false">
                    Avalie </a>
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
                    <p>
                      {{$data->description}}
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
                <div id="source-01" class="tab-pane animated fadeInUp" role="tabpanel">
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

    <div class="cast-tabs">
      <div class="container-fluid">
        <div class="content-details trending-info g-border iq-rtl-direction">
          <ul class="iq-custom-tab tab-bg-fill d-flex nav nav-pills mb-5 " role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="pill" href="#cast-1" role="tab" aria-selected="true">Cast</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="pill" href="#crew-1" role="tab" aria-selected="false">Crew</a>
            </li>
          </ul>
          <div class="tab-content">
            <div id="cast-1" class="tab-pane animated fadeInUp active show" role="tabpanel">
              <div class="position-relative swiper swiper-card" data-slide="5" data-laptop="5" data-tab="3" data-mobile="2" data-mobile-sm="1" data-autoplay="false" data-loop="false" data-navigation="true" data-pagination="true">
                <ul class="list-inline swiper-wrapper">
                  <li class="swiper-slide">
                    <div class="cast-images m-0 row align-items-center position-relative">
                      <!-- <div class="col-4 img-box p-0">                                
                                    <img src="./assets/images/genre/g1.webp" class="img-fluid" alt="image" loading="lazy">
                                </div> -->
                      <div class="col-8 block-description">
                        <h6 class="iq-title">
                          <a tabindex="0">Autor: {{$data->author}}</a>
                        </h6>
                      </div>
                    </div>
                  </li>
                  <!-- <li class="swiper-slide">
                            <div class="cast-images m-0 row align-items-center position-relative">
                                <div class="col-4 img-box p-0">
                                    <img src="./assets/images/genre/g2.webp" class="img-fluid" alt="image" loading="lazy">
                                </div>
                                <div class="col-8 block-description">
                                    <h6 class="iq-title">
                                        <a href="./person-detail.html" tabindex="0">James Earl Jones </a>
                                    </h6>
                                    <div class="video-time d-flex align-items-center my-2">
                                        <small class="text-white">As Jones</small>
                                    </div>
                                </div>
                            </div>
                        </li> -->
                </ul>
              </div>
            </div>
            <div id="crew-1" class="tab-pane animated fadeInUp" role="tabpanel">
              <div class="position-relative swiper swiper-card" data-slide="5" data-laptop="5" data-tab="3" data-mobile="2" data-mobile-sm="2" data-autoplay="false" data-loop="false" data-navigation="true" data-pagination="true">
                <ul class="list-inline swiper-wrapper">
                  <li class="swiper-slide">
                    <div class="cast-images m-0 row align-items-center position-relative">
                      <div class="col-4 img-box p-0">
                        <img src="./assets/images/genre/g3.webp" class="img-fluid" alt="image" loading="lazy">
                      </div>
                      <div class="col-8 block-description starring-desc ">
                        <h6 class="iq-title">
                          <a href="./person-detail.html" tabindex="0"> Jeff Nathanson </a>
                        </h6>
                        <div class="video-time d-flex align-items-center my-2">
                          <small class="text-white">Writing</small>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide">
                    <div class="cast-images m-0 row align-items-center position-relative">
                      <div class="col-4 img-box p-0">
                        <img src="./assets/images/genre/g5.webp" class="person__poster--image img-fluid" alt="image" loading="lazy">
                      </div>
                      <div class="col-8 block-description starring-desc ">
                        <h6 class="iq-title">
                          <a href="./person-detail.html" tabindex="0"> Irene Mecchi </a>
                        </h6>
                        <div class="video-time d-flex align-items-center my-2">
                          <small class="text-white">Writing</small>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide">
                    <div class="cast-images m-0 row align-items-center position-relative">
                      <div class="col-4 img-box p-0">
                        <img src="./assets/images/genre/g4.webp" class="person__poster--image img-fluid" alt="image" loading="lazy">
                      </div>
                      <div class="col-8 block-description starring-desc ">
                        <h6 class="iq-title">
                          <a href="./person-detail.htmll" tabindex="0"> Karen Gilchrist </a>
                        </h6>
                        <div class="video-time d-flex align-items-center my-2">
                          <small class="text-white">Production</small>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="recommended-block">
      <div class="container-fluid">
        <div class="overflow-hidden">
          <div class="d-flex align-items-center justify-content-between px-3 pt-2 my-4">
            <h5 class="main-title text-capitalize mb-0">Cursos Recomendados</h5>
          </div>
          <div class="card-style-slider">
            <div class="position-relative swiper swiper-card" data-slide="5" data-laptop="5" data-tab="2" data-mobile="2" data-mobile-sm="2" data-autoplay="false" data-loop="true" data-navigation="true" data-pagination="true">
              <ul class="p-0 swiper-wrapper m-0  list-inline">
                @foreach ($coursesTop10 as $row)

                <li class="swiper-slide">
                  <div class="iq-card card-hover">
                    <div class="block-images position-relative w-100">
                      <div class="img-box w-100">
                        <a href="{{ route('course.detail', ['id' => $row->id]) }}" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                        <img src="{{asset('images/courses/' . $row->cover)}}" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                      </div>
                      <div class="card-description with-transition">
                        <div class="cart-content">
                          <div class="content-left">
                            <h5 class="iq-title text-capitalize">
                              <a href="./movie-detail.html">{{$row->course}}</a>
                            </h5>
                            <div class="movie-time d-flex align-items-center my-2">
                              <span class="movie-time-text font-normal">{{$row->duration}}</span>
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
                @endforeach

              </ul>
              <div class="swiper-button swiper-button-next"></div>
              <div class="swiper-button swiper-button-prev"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <section class="related-movie-block">
  <div class="container-fluid">
    <div class="overflow-hidden">
        <div class="d-flex align-items-center justify-content-between px-3 pt-2 my-4">
        <h5 class="main-title text-capitalize mb-0">Related Movies</h5>
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
                      <img src="./assets/images/movies/related/01.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">giikre</a>
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
                      <img src="./assets/images/movies/related/02.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">YoShi</a>
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
                      <img src="./assets/images/movies/related/03.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">We Gare</a>
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
                      <img src="./assets/images/movies/related/04.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">Avengers</a>
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
                      <img src="./assets/images/movies/related/05.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">Chosfies</a>
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
                      <img src="./assets/images/movies/related/06.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">Tf Oaler</a>
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
                      <img src="./assets/images/movies/related/07.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">Another Danger</a>
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
          </ul>
          <div class="swiper-button swiper-button-next"></div>
          <div class="swiper-button swiper-button-prev"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="video-block">
  <div class="container-fluid">
    <div class="overflow-hidden">
        <div class="d-flex align-items-center justify-content-between px-3 pt-2 my-4">
        <h5 class="main-title text-capitalize mb-0">Related Videos</h5>
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
                      <img src="./assets/images/movies/related/01.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">giikre</a>
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
                      <img src="./assets/images/movies/related/02.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">YoShi</a>
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
                      <img src="./assets/images/movies/related/03.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">We Gare</a>
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
                      <img src="./assets/images/movies/related/04.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">Avengers</a>
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
                      <img src="./assets/images/movies/related/05.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">Chosfies</a>
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
                      <img src="./assets/images/movies/related/06.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">Tf Oaler</a>
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
                      <img src="./assets/images/movies/related/07.webp" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                    </div>
                    <div class="card-description with-transition">
                      <div class="cart-content">
                        <div class="content-left">
                          <h5 class="iq-title text-capitalize">
                            <a href="./movie-detail.html">Another Danger</a>
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
          </ul>
          <div class="swiper-button swiper-button-next"></div>
          <div class="swiper-button swiper-button-prev"></div>
        </div>
      </div>
    </div>
  </div>
</section>

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
</section> -->

  </main>


  <div class="rtl-box">
    <a class="btn btn-fixed-end btn-icon btn-setting" id="settingbutton" data-bs-toggle="offcanvas" data-bs-target="#live-customizer" role="button" aria-controls="live-customizer">
      <svg xmlns="http://www.w3.org/2000/svg" width="1.875em" height="1.875em" viewBox="0 0 20 20" fill="white">
        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
      </svg>
    </a>
    <div class="offcanvas offcanvas-end live-customizer on-rtl end" tabindex="-1" id="live-customizer" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="live-customizer-label" aria-modal="true" role="dialog">
      <div class="offcanvas-header gap-3">
        <div class="d-flex align-items-center">
          <h5 class="offcanvas-title text-dark" id="live-customizer-label">Live Customizer</h5>
        </div>
        <div class="d-flex gap-1 align-items-center">
          <button class="btn btn-icon text-primary" data-reset="settings" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Reset All Settings" data-bs-original-title="Reset All Settings">
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
              <input type="radio" value="ltr" class="btn-check" name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-ltr" checked>
              <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-direction-ltr">
                LTR
              </label>
            </div>
          </div>
          <div class="col">
            <div data-setting="attribute" class="text-center w-100">
              <input type="radio" value="rtl" class="btn-check" name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-rtl">
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
                <input type="radio" value="dark" class="btn-check" name="theme_style_appearance" data-prop="data-bs-theme" id="theme-scheme-color-netflix" checked>
                <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-netflix">
                  Netflix
                </label>
              </div>
            </div>
            <div class="col mb-3">
              <div data-setting="attribute" class="text-center w-100">
                <input type="radio" value="hotstar" class="btn-check" name="theme_style_appearance" data-prop="data-bs-theme" id="theme-scheme-color-hotstar">
                <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-hotstar">
                  Hotstar
                </label>
              </div>
            </div>
            <div class="col">
              <div data-setting="attribute" class="text-center w-100">
                <input type="radio" value="amazonprime" class="btn-check" name="theme_style_appearance" data-prop="data-bs-theme" id="theme-scheme-color-prime">
                <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-prime">
                  Prime
                </label>
              </div>
            </div>
            <div class="col">
              <div data-setting="attribute" class="text-center w-100">
                <input type="radio" value="hulu" class="btn-check" name="theme_style_appearance" data-prop="data-bs-theme" id="theme-scheme-color-hulu">
                <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-hulu">
                  Hulu
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="back-to-top" style="display: none;">
    <a class="p-0 btn bg-primary btn-sm position-fixed top border-0 rounded-circle" id="top" href="#top">
      <i class="fa-solid fa-chevron-up"></i>
    </a>
  </div>
  <!-- Wrapper End-->
  <!-- Library Bundle Script -->
  <script src="./assets/js/core/libs.min.js"></script>
  <!-- Plugin Scripts -->


  <!-- SwiperSlider Script -->
  <script src="./assets/vendor/swiperSlider/swiper.min.js"></script>

  <script src="./assets/vendor/video/video.min.js"></script>
  <script src="./assets/vendor/videojs-youtube-master/youtube.js"></script>

  <!-- Select2 Script -->
  <script src="./assets/js/plugins/select2.js" defer></script>


  <!-- Lodash Utility -->
  <script src="./assets/vendor/lodash/lodash.min.js"></script>
  <!-- External Library Bundle Script -->
  <script src="./assets/js/core/external.min.js"></script>
  <!-- countdown Script -->
  <script src="./assets/js/plugins/countdown.js"></script>
  <!-- utility Script -->
  <script src="./assets/js/utility.js"></script>
  <!-- Setting Script -->
  <script src="./assets/js/setting.js"></script>
  <script src="./assets/js/setting-init.js" defer></script>
  <!-- Streamit Script -->
  <script src="./assets/js/streamit.js" defer></script>
  <script src="./assets/js/swiper.js" defer></script>
</body>

</html>