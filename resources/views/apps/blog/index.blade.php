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
      <img src="assets/images/loader.gif" alt="loader" class="img-fluid " width="300">
    </div>
  </div>
  <!-- loader END --> <!-- loader END -->
  <main class="main-content">
    <!--Nav Start-->
    @include('components.nav')<!--Nav End-->

    <!--bread-crumb-->
    <div class="iq-breadcrumb" style="background-image: url(assets/images/pages/01.webp);">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-sm-12">
            <nav aria-label="breadcrumb" class="text-center">
              <h2 class="title">Fique mais informados com nossos blogs.</h2>
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                <li class="breadcrumb-item active">Blog</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!--bread-crumb-->


    <div class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-sm-12">
            @forelse ($blogs as $row)
            <div class="blog-box">
              <img src="{{asset('images/blogstream/' . $row->imgcapa)}}" class="img-fluid mb-4 pb-3 rounded" id="01" alt="template">
              <div class="row mt-2 mb-2" <?= $row->audiofile == null ? 'hidden' : '' ?>>
                <audio controls>
                  <source src="{{asset('audios/blogstream/' . $row->audiofile)}}" type="audio/ogg">
                </audio>
              </div>
              <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="modal fade" id="commentModal-{{$row->id}}" tabindex="-1" aria-labelledby="commentModal-{{$row->id}}Label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="commentModal-{{$row->id}}Label">Comentários</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div id="comments-{{$row->id}}"></div>
                      </div>
                      <div class="modal-footer">
                        <!-- <div class="row">
                          <input type="text" class="form-control " id="input-comment{{$row->id}}" placeholder="Faça sua postagem">
                          <button type="button" id="btn-submit-comment{{$row->id}}" class="btn btn-primary">Enviar Mensagem</button>
                        </div> -->
                        <div class="input-group input-group-sm mb-3">
                          <input id="input-comment{{$row->id}}" placeholder="Faça sua postagem"
                           type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                          <span class="input-group-text btn btn-primary" id="btn-submit-comment{{$row->id}}">Enviar Mensagem</span>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <ul class="iq-blog-category-2 m-0  p-0 list-unstyled">
                  <li>
                    <a class="fw-500" href="blog/blog-category.html">{{$row->titulo}}</a>
                  </li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                  <span class="font-size-12"> Leitura de {{$row->duration}} </span>
                  <div>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2428 12.2419C10.4091 14.0758 7.69386 14.472 5.47185 13.4444C5.14382 13.3123 4.87489 13.2056 4.61922 13.2056C3.90709 13.2098 3.0207 13.9003 2.56002 13.4402C2.09933 12.9795 2.79036 12.0924 2.79036 11.3759C2.79036 11.1202 2.68785 10.8561 2.55579 10.5274C1.5277 8.30577 1.92447 5.58961 3.75816 3.75632C6.09896 1.41466 9.90201 1.41466 12.2428 3.75572C14.5878 6.101 14.5836 9.90086 12.2428 12.2419Z" stroke="#E50914" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M10.3637 8.24775H10.3691" stroke="#E50914" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M7.95843 8.24775H7.96383" stroke="#E50914" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M5.55316 8.24775H5.55856" stroke="#E50914" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <span data-bs-toggle="modal" data-bs-target="#commentModal-{{$row->id}}" class="font-size-12 btn-comments" data-idcomment="{{$row->id}}"> Comments</span>
                  </div>
                </div>
              </div>
              {!! $row->conteudo !!}
              <div class="iq-author-details d-flex align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center gap-2">
                  <div class="iq-author-image d-flex align-items-center gap-2">
                    <img src="assets/images/user/user1.webp" class="img-fluid avatar-40 rounded-circle" alt="user">
                  </div>
                  <span class="font-size-14">
                    <a href="#">{{ $row->author }}</a>
                  </span>
                </div>
                <div class="iq-published-date">
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.19336 5.59936H11.8109" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                    <path d="M9.39685 7.70678H9.40185" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                    <path d="M7.00232 7.70678H7.00732" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                    <path d="M4.60291 7.70678H4.6079" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                    <path d="M9.39685 9.80371H9.40185" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                    <path d="M7.00232 9.80371H7.00732" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                    <path d="M4.60291 9.80371H4.6079" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                    <path d="M9.18255 1.60425V3.37991" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                    <path d="M4.82318 1.60425V3.37991" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8571 2.4563H2.14453V12.3959H11.8571V2.4563Z" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                  </svg>
                  <span class="font-size-14 text-uppercase">
                    <a href="#">{{ date("d/m/Y", strtotime($row->created_at)) }}</a>
                  </span>
                </div>
              </div>
            </div>
            @empty
            <h3>Faça a primeira postagem</h3>
            @endforelse


            <div class="iq-blog-tag">
              <ul class="p-0 m-0 list-unstyled gap-2 widget_tags">
                <li>
                  <i class="fas fa-tags text-primary" aria-hidden="true"></i>
                  <span class="font-size-12 fw-semibold">TAGS:</span>
                </li>
                <li>
                  <a href="blog/blog-tag.html" class="position-relative">Action</a>
                </li>
                <li>
                  <a href="blog/blog-tag.html" class="position-relative">Comedies</a>
                </li>
                <li>
                  <a href="blog/blog-tag.html" class="position-relative">Comedy</a>
                </li>
              </ul>
            </div>
            <div class="widget my-5 my-md-0">
              <div class="iq-author-meta-details d-flex align-items-start align-items-md-center gap-4 flex-column flex-md-row">
                <div class="iq-author-image">
                  <img src="assets/images/user/user1.webp" class="img-fluid rounded" alt="user">
                </div>
                <div>
                  <h5>Jenny</h5>
                  <ul class="p-0 m-0 list-unstyled widget_social_media mt-4">
                    <li class="">
                      <a href="https://www.facebook.com/">
                        <i class="fab fa-facebook"></i>
                      </a>
                    </li>
                    <li class="">
                      <a href="https://www.instagram.com/">
                        <i class="fab fa-instagram"></i>
                      </a>
                    </li>
                    <li class="">
                      <a href="https://twitter.com/">
                        <i class="fab fa-twitter"></i>
                      </a>
                    </li>
                    <li class="">
                      <a href="https://dribbble.com/">
                        <i class="fab fa-dribbble"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="blog-nav row">
              <div class="blog-prev-post col-lg-6 mb-5 mb-lg-0">
                <a href="blog/blog-gallery.html">
                  <div class="blog-arrow font-size-14 fw-normal mb-3">
                    <i class="fas fa-arrow-left"></i>
                    <span class="previous fw-medium fst-italic"> Previous Post</span>
                  </div>
                  <span class="fw-semibold text-white">First Glass Photos Bring Unbreakable and Split Villians Together
                  </span>
                </a>
              </div>
              <div class="blog-next-post col-lg-6 text-start text-lg-end">
                <a href="blog/blog-detail.html">
                  <div class="blog-arrow font-size-14 fw-normal mb-3">
                    <span class="next fw-medium fst-italic"> Next Post</span>
                    <i class="fas fa-arrow-right"></i>
                  </div>
                  <span class="fw-semibold text-white">Birds Of Prey Star Says She’s Definitely Open To A Ghost
                    Return</span>
                </a>
              </div>
            </div>

            <form>
              <h4 class="fw-500 mb-3">Leave a Reply </h4>
              <p class="mb-4">Logged in as Jenny. <span class="text-primary">Edit your profile. Log out?</span>
                Required fields are marked *</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="comment" cols="5" rows="8" required="" placeholder="Comment"></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-submit mt-4">
                    <div class="iq-button">
                      <button name="submit" type="submit" id="submit" class="btn text-uppercase position-relative" value="Submit">
                        <span class="button-text">Post Comment</span>
                        <i class="fa-solid fa-play"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>

          </div>
          <div class="col-lg-4 col-sm-12 mt-5 mt-lg-0">
            <div class="widget-area">
              <div class="widget widget_search">
                <form method="get" class="search-form" action="#" autocomplete="off">
                  <div class="block-search_inside-wrapper position-relative d-flex">
                    <input type="search" class="form-control" placeholder="Search" required="">
                    <button type="submit" class="block-search_button">
                      <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                        <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                    </button>
                  </div>
                </form>
              </div>
              <div class="widget iq-widget-blog">
                <h5 class="widget-title position-relative">Postagens mais recentes</h5>
                <ul class="list-inline p-0 m-0">

                  @forelse ($recentPosts as $row)
                  <li class="d-flex align-items-center gap-4">
                    <div class="img-holder">
                      <a href="#">
                        <img src="{{asset('images/blogstream/' . $row->imgcapa)}}" alt="" class="img-fluid h-100 w-100 object-cover">
                      </a>
                    </div>
                    <div class="post-blog">
                      <a class="new-link" href="blog/blog-detail.html">
                        <h6 class="post-title">{{ $row->titulo }}</h6>
                      </a>
                      <ul class="list-inline mb-2">
                        <li class="list-inline-item border-0 mb-0 pb-0">
                          <span class="blog-data"> <i class="far fa-calendar-alt me-1" aria-hidden="true"></i>{{ date("d/m/Y", strtotime($row->created_at)) }}
                          </span>
                        </li>
                      </ul>
                    </div>
                  </li>
                  @empty
                  <h3>Faça a primeira postagem</h3>
                  @endforelse

                </ul>
              </div>
              <div class="widget widget_categories">
                <h5 class="widget-title position-relative">Categorias</h5>
                <ul class="p-0 m-0 list-unstyled">
                  @forelse ($categories as $row)
                  <li class="border-bottom-0">
                    <a href="{{ route('blogByCategory', ['idcategory' => $row->id]) }}" class="position-relative">{{ $row->description}}</a>
                    <span class="post_count"></span>
                  </li>
                  @empty
                  <h3>Crie a primeira categoria</h3>

                  @endforelse
                </ul>
              </div>
              <div class="widget">
                <h5 class="widget-title position-relative">Tags</h5>
                <ul class="p-0 m-0 list-unstyled gap-2 widget_tags">
                  <li>
                    <a href="blog/blog-tag.html" class="position-relative">Action</a>
                  </li>
                  <li>
                    <a href="blog/blog-tag.html" class="position-relative">Comedies</a>
                  </li>
                  <li>
                    <a href="blog/blog-tag.html" class="position-relative">comedy</a>
                  </li>
                  <li>
                    <a href="blog/blog-tag.html" class="position-relative">Dramas</a>
                  </li>
                  <li>
                    <a href="blog/blog-tag.html" class="position-relative">Historical</a>
                  </li>
                  <li>
                    <a href="blog/blog-tag.html" class="position-relative">Horror</a>
                  </li>
                  <li>
                    <a href="blog/blog-tag.html" class="position-relative">Movie</a>
                  </li>
                  <li>
                    <a href="blog/blog-tag.html" class="position-relative">Movie Trailers</a>
                  </li>
                  <li>
                    <a href="blog/blog-tag.html" class="position-relative">Mystery</a>
                  </li>
                  <li>
                    <a href="blog/blog-tag.html" class="position-relative">Rumors</a>
                  </li>
                </ul>
              </div>
              <div class="widget">
                <h5 class="widget-title position-relative">Follow Us :</h5>
                <ul class="p-0 m-0 list-unstyled widget_social_media">
                  <li class="">
                    <a href="https://www.facebook.com/" class="position-relative"><i class="fab fa-facebook"></i></a>
                  </li>
                  <li class="">
                    <a href="https://twitter.com/" class="position-relative"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li class="">
                    <a href="https://github.com/" class="position-relative"><i class="fab fa-github"></i></a>
                  </li>
                  <li class="">
                    <a href="https://www.instagram.com/" class="position-relative"><i class="fab fa-instagram"></i></a>
                  </li>
                </ul>
              </div>
              <div class="widget text-center">
                <a href="shop/shop.html"> <img class="img-fluid" src="assets/images/blog/01.webp" loading="lazy" alt="streamit" />
                </a>
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
                <a class="navbar-brand text-primary" href="index.html">
                  <img class="img-fluid logo" src="assets/images/logo.webp" loading="lazy" alt="streamit" />
                </a>
              </div>
              <div class="logo-hotstar">
                <a class="navbar-brand text-primary" href="index.html">
                  <img class="img-fluid logo" src="assets/images/logo-hotstar.webp" loading="lazy" alt="streamit" />
                </a>
              </div>
              <div class="logo-prime">
                <a class="navbar-brand text-primary" href="index.html">
                  <img class="img-fluid logo" src="assets/images/logo-prime.webp" loading="lazy" alt="streamit" />
                </a>
              </div>
              <div class="logo-hulu">
                <a class="navbar-brand text-primary" href="index.html">
                  <img class="img-fluid logo" src="assets/images/logo-hulu.webp" loading="lazy" alt="streamit" />
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
                <a href="about-us.html" class="ms-3">about us</a>
              </li>
              <li class="mb-3">
                <a href="blog/blog-listing.html" class="ms-3">Blog</a>
              </li>
              <li class="mb-3">
                <a href="pricing-plan.html" class="ms-3">Pricing Plan</a>
              </li>
              <li>
                <a href="faq.html" class="ms-3">FAQ</a>
              </li>
            </ul>
          </div>
          <div class="col-xl-2 col-lg-6 mb-5 mb-lg-0">
            <h4 class="footer-link-title">Movies to watch</h4>
            <ul class="list-unstyled footer-menu">
              <li class="mb-3">
                <a href="view-all-movie.html" class="ms-3">Top trending</a>
              </li>
              <li class="mb-3">
                <a href="view-all-movie.html" class="ms-3">Recommended</a>
              </li>
              <li>
                <a href="view-all-movie.html" class="ms-3">Popular</a>
              </li>
            </ul>
          </div>
          <div class="col-xl-2 col-lg-6 mb-5 mb-lg-0">
            <h4 class="footer-link-title">About company</h4>
            <ul class="list-unstyled footer-menu">
              <li class="mb-3">
                <a href="contact-us.html" class="ms-3">contact us</a>
              </li>
              <li class="mb-3">
                <a href="privacy-policy.html" class="ms-3">privacy policy</a>
              </li>
              <li>
                <a href="terms-of-use.html" class="ms-3">Terms of use</a>
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
                <a href="privacy-policy.html"> Privacy-Policy </a>
              </li>
              <li class="menu-item">
                <a href="faq.html"> FAQ </a>
              </li>
              <li class="menu-item">
                <a href="playlist.html"> Watch List </a>
              </li>
            </ul>
            <p class="font-size-14">© <span class="currentYear"></span> <span class="text-primary">STREAMIT</span>. All Rights Reserved. All videos and shows on this platform are trademarks of, and all related images and content are the property of, Streamit Inc. Duplication and copy of this is strictly prohibited. All rights reserved. </p>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <h6 class="font-size-14 pb-1">Download Streamit Apps </h6>
            <div class="d-flex align-items-center">
              <a class="app-image" href="#">
                <img src="assets/images/footer/google-play.webp" loading="lazy" alt="play-store" />
              </a>
              <br />
              <a class="ms-3 app-image" href="#">
                <img src="assets/images/footer/apple.webp" loading="lazy" alt="app-store" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

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
  @include('layouts.vendor-scripts')

  <script>
    $(".btn-comments").click(function(e) {

      const idComment = $(this).attr('data-idcomment');
      id="input-comment{{$row->id}}"
      const urlget = (`{{ url('/blogcomments/${idComment}') }}`);

      $.get(urlget, function(data) {
        $('#comments-' + idComment).html(data);
        console.log("Ajax comments concluído com sucesso!");
      });

      $("#btn-submit-comment" + idComment).click(function(e) {
        const comment = $("#input-comment" + idComment).val();

        const urlstore = (`{{ url('/bloginsertcomments/${idComment}/${comment}') }}`);

        $.get(urlstore, function(data) {
          console.log("Comentarioinserido concluído com sucesso!");

          $.get(urlget, function(data) {
            $('#comments-' + idComment).html(data);
            console.log("Ajax comments concluído com sucesso!");
            $("#input-comment" + idComment).val('');
          });

        });

      });

    });
  </script>

</body>

</html>