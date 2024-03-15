<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.title-meta')
        @include('layouts.head')

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>

<body class=" blog-quotes blog-single ">
  <span class="screen-darken"></span>
  <!-- loader Start -->
   <!-- loader Start -->
  <div class="loader simple-loader">
     <div class="loader-body">
        <img src="assets/images/loader.gif" alt="loader" class="img-fluid " width="300">
      </div>
  </div>
  <!-- loader END -->  <!-- loader END -->
  <main class="main-content">
      <!--Nav Start-->
      @include('components.nav')      <!--Nav End-->

      <!--bread-crumb-->
      <div class="iq-breadcrumb" style="background-image: url(assets/images/pages/01.webp);">
         <div class="container-fluid">
            <div class="row align-items-center">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb" class="text-center">
                          <h2 class="title">Saturday Night Live’ Re-Enacts Biden and Harris’ Victory Speeches</h2>
                          <ol class="breadcrumb justify-content-center">
                              <li class="breadcrumb-item"><a href="index.html">Home</a></li> 
                              <li class="breadcrumb-item active">Saturday Night Live’ Re-Enacts Biden and Harris’ Victory Speeches</li>
                          </ol>
                      </nav>
                  </div>
              </div> 
         </div>
      </div>      <!--bread-crumb-->


<div class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-xl-8">
        <div class="iq-blog blog-detail">

          <div class="iq-blog-box pt-4">
            <div class="iq-blog-meta d-flex mb-3">
              <ul class="iq-blogtag list-inline">
                <li class="border-gredient-left"><a href="blog/blog-author.html"><i class="far fa-user me-1"
                      aria-hidden="true"></i> Jenny</a></li>
              </ul>
              <ul class="list-inline mb-0 ms-2">
                <li class="border-gredient-left">
                  <a href="blog/blog-date.html"> <i class="far fa-calendar-alt me-1"
                      aria-hidden="true"></i>January 30, 2019</a>
                </li>
              </ul>
            </div>


            <div class="blockquote text-center mb-3">
              <div class="blockquote-icon">
                <i aria-hidden="true" class="fas fa-quote-right"></i>
              </div>
              <p>“ Movies can and do have tremendous influence in shaping young lives in the realm of entertainment
                towards
                the ideals and objectives of normal adulthood. </p>
              <div class="my-4">
                <h6 class="border-gredient-left d-inline-block ps-2 fw-normal py-1"> Walt Disney </h6>
              </div>
            </div>

            <p class="text-white"><strong>Praesent iaculis, purus ac vehicula mattis, arcu
                lorem blandit nisl, non laoreet dui mi eget elit. Donec porttitor ex vel
                augue maximus luctus. Vivamus finibus nibh eu nunc volutpat suscipit.</strong></p>
            <p>Nam vulputate libero quis nisi euismod rhoncus. Sed eu euismod felis.
              Aenean ullamcorper dapibus odio ac tempor. Aliquam iaculis, quam vitae
              imperdiet consectetur, mi ante semper metus, ac efficitur nisi justo ut
              eros. Maecenas suscipit turpis fermentum elementum scelerisque.</p>
            <p>Sed leo elit, volutpat quis aliquet eu, elementum eget arcu. Aenean ligula
              tellus, malesuada eu ultrices vel, vulputate sit amet metus. Donec tincidunt
              sapien ut enim feugiat, sed egestas dolor ornare.</p>

            <blockquote class="block-quote text-white">
              <p>\”Simon Doe has his tongue planted in his cheek as he describes the<br />fictional skills of his
                advancing agent.\”</p>
              <cite><a href="#">Steve Kowalsky</a></cite>
            </blockquote>
            <p>Potenti fusce himenaeos hac aenean quis donec vivamus aliquet, wprdpress
              integer inceptos curae sollicitudin in class sociosqu netus, euismod tempus
              fermentum odio gravida eleifend viverra pulvinar inceptos ligula consectetur.
              Potenti ante porttitor tristique curae scelerisque tristique, dictum eu donec
              conubia sit rutrum duis viverra in commodo.</p>
            <p>Nisi habitasse viverra praesent a maecenas odio erat tristique praesent
              elementum rutrum maecenas blandit nec curabitur donec, turpis varius etiam
              felis ultrices sit, per inceptos dapibus fames donec praesent quisque commodo
              primis proin leo nisl lacinia dictumst justo sagittis luctus vestibulum sed
              quisque.</p>

            <p>Potenti fusce himenaeos hac aenean quis donec vivamus aliquet, wprdpress
              integer inceptos curae sollicitudin in class sociosqu netus, euismod tempus
              fermentum odio gravida eleifend viverra pulvinar inceptos ligula consectetur.
              Potenti ante porttitor tristique curae scelerisque tristique, dictum eu donec
              conubia sit rutrum duis viverra in commodo.</p>

            <div class="iq-blog-tag">
              <div class="blog-nav row">
                <div class="blog-prev-post col-lg-6 mb-5 mb-lg-0 border-end">
                  <a href="blog/blog-template.html">
                    <div class="blog-arrow font-size-14 fw-normal mb-3">
                      <i class="fas fa-arrow-left"></i>
                      <span class="previous fw-medium fst-italic"> Previous Post</span>
                    </div>
                    <span class="fw-semibold text-white">Why Amy Adams Always Dreamed of Working </span>
                  </a>
                </div>
                <div class="blog-next-post col-lg-6 text-start text-lg-end">
                  <a href="blog/blog-audio.html">
                    <div class="blog-arrow font-size-14 fw-normal mb-3">
                      <span class="next fw-medium fst-italic"> Next Post</span>
                      <i class="fas fa-arrow-right"></i>
                    </div>
                    <span class="fw-semibold text-white">Gillian Anderson Shares the Photos From The Crown</span>
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
                      <textarea class="form-control" name="comment" cols="5" rows="8" required=""
                        placeholder="Comment"></textarea>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-submit mt-4">
                      <div class="iq-button">
                        <button name="submit" type="submit" id="submit" class="btn text-uppercase position-relative"
                          value="Submit">
                          <span class="button-text">Post Comment</span>
                          <i class="fa-solid fa-play"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 mt-5 mt-xl-0">
        <div class="widget-area">
           <div class="widget widget_search">
              <form method="get" class="search-form" action="#" autocomplete="off">
                 <div class="block-search_inside-wrapper position-relative d-flex">
                    <input type="search" class="form-control" placeholder="Search" required="">
                    <button type="submit" class="block-search_button">
                       <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5"
                             stroke-linecap="round" stroke-linejoin="round"></circle>
                          <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                             stroke-linecap="round" stroke-linejoin="round"></path>
                       </svg>
                    </button>
                 </div>
              </form>
           </div>
           <div class="widget iq-widget-blog">
              <h5 class="widget-title position-relative">Recent Post</h5>
              <ul class="list-inline p-0 m-0">
                 <li class="d-flex align-items-center gap-4">
                    <div class="img-holder">
                       <a href="#">
                          <img src="assets/images/blog/01.webp" alt="" class="img-fluid h-100 w-100 object-cover">
                       </a>
                    </div>
                    <div class="post-blog">               
                       <a class="new-link" href="blog/blog-detail.html">
                          <h6 class="post-title">The Most Anticipated Movies</h6>
                       </a>
                       <ul class="list-inline mb-2">
                          <li class="list-inline-item border-0 mb-0 pb-0">
                             <a href="#" class="blog-data"> <i class="far fa-calendar-alt me-1" aria-hidden="true"></i>September 23, 2022
                             </a>
                          </li>
                       </ul>
                    </div>
                 </li>
                 <li class="d-flex align-items-center gap-4">
                    <div class="img-holder">
                       <a href="#">
                       <img src="assets/images/blog/blog2.webp" alt="" class="img-fluid h-100 w-100 object-cover">
                       </a>
                    </div>
                    <div class="post-blog">
                       <a class="new-link" href="blog/blog-detail.html">
                          <h6 class="post-title">Amy Adams Always Dreamed</h6>
                       </a>
                       <ul class="list-inline mb-2">
                          <li class="list-inline-item border-0 mb-0 pb-0">
                             <a href="#" class="blog-data"> <i class="far fa-calendar-alt me-1" aria-hidden="true"></i>September 23, 2022 </a>
                          </li>
                       </ul>
                    </div>
                 </li>
                 <li class="d-flex align-items-center gap-4">
                    <div class="img-holder">
                       <a href="#">
                       <img src="assets/images/blog/blog3.webp" alt="" class="img-fluid h-100 w-100 object-cover">
                       </a>
                    </div>
                    <div class="post-blog">
                       <a class="new-link" href="blog/blog-detail.html">
                          <h6 class="post-title">WandaVision Will Reveal Scarlet Witch’s Untapped Powers </h6>
                       </a>
                       <ul class="list-inline mb-2">
                          <li class="list-inline-item  border-0 mb-0 pb-0">
                             <a href="#" class="blog-data"> <i class="far fa-calendar-alt me-1" aria-hidden="true"></i>September 23, 2022
                             </a>
                          </li>
                       </ul>
                    </div>
                 </li>
              </ul>
           </div>
           <div class="widget widget_categories">
              <h5 class="widget-title position-relative">Categories</h5>
              <ul class="p-0 m-0 list-unstyled">
                 <li>
                    <a href="blog/blog-category.html" class="position-relative">Dramas</a>
                    <span class="post_count"> (4) </span>
                 </li>
                 <li>
                    <a href="blog/blog-category.html" class="position-relative">Historical</a>
                    <span class="post_count"> (7) </span>
                 </li>
                 <li>
                    <a href="blog/blog-category.html" class="position-relative">Movie</a>
                    <span class="post_count"> (2) </span>
                 </li>
                 <li>
                    <a href="blog/blog-category.html" class="position-relative">Movie Trailers</a>
                    <span class="post_count"> (6) </span>
                 </li>
                 <li>
                    <a href="blog/blog-category.html" class="position-relative">Trailers</a>
                    <span class="post_count"> (4) </span>
                 </li>
                 <li>
                    <a href="blog/blog-category.html" class="position-relative">TV Comedies</a>
                    <span class="post_count"> (3) </span>
                 </li>
                 <li>
                    <a href="blog/blog-category.html" class="position-relative">TV Rumors</a>
                    <span class="post_count"> (4) </span>
                 </li>
                 <li class="border-bottom-0">
                    <a href="blog/blog-category.html" class="position-relative">TV Series</a>
                    <span class="post_count"> (5) </span>
                 </li>
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
               <a  href="shop/shop.html"> <img class="img-fluid"
                 src="assets/images/blog/01.webp" loading="lazy" alt="streamit" /> 
              </a>
           </div>
        </div>      </div>
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