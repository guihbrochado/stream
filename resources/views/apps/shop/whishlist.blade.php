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
  <!-- loader END -->  <!-- loader END -->
  <main class="main-content">
      <!--Nav Start-->
      @include('components.nav')<!--Nav End-->

      <!--bread-crumb-->
      <div class="iq-breadcrumb" style="background-image: url(assets/images/pages/01.webp);">
         <div class="container-fluid">
            <div class="row align-items-center">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb" class="text-center">
                          <h2 class="title">Wishlist</h2>
                          <ol class="breadcrumb justify-content-center">
                              <li class="breadcrumb-item"><a href="index.html">Home</a></li> 
                              <li class="breadcrumb-item active">Wishlist</li>
                          </ol>
                      </nav>
                  </div>
              </div> 
         </div>
      </div>      <!--bread-crumb-->

<div class="wishlist-page section-padding">
    <div class="container">
        <h5 class="mb-5">My Wishlist</h5>
        <div class="table-responsive">
            <table class="table cart-table">
                <thead class="border-bottom">
                    <tr>
                        <th class="fw-500 font-size-18"></th>
                        <th class="fw-500 font-size-18">Product Name</th>
                        <th class="fw-500 font-size-18">Unit Price</th>
                        <th class="fw-500 font-size-18">Stock Status</th>
                        <th class="fw-500 font-size-18"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-item="list">
                        <td>
                            <button
                                class="btn btn-icon btn-danger delete-btn text-end  bg-transparent text-body border-0">
                                <span class="btn-inner">
                                    <i class="far fa-trash-alt"></i>
                                </span>
                            </button>
                        </td>
                        <td>
                            <div class="product-thumbnail">
                                <a class="mb-2 me-3" href="">
                                    <img class="avatar-80" src="assets/images/shop/product/01.webp" alt="">
                                </a>
                                <span class="mt-2">Bag Pack</span>
                            </div>
                        </td>
                        <td>
                            <span class="fw-500">$25.00</span>
                        </td>
                        <td>
                            <span>In Stock</span>
                        </td>
                        <td>
                            <div class="iq-button">
                                <a href="product-detail.html" class="btn text-uppercase position-relative">
                                    <span class="button-text">view product</span>
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr data-item="list">
                        <td>
                            <button
                                class="btn btn-icon btn-danger delete-btn text-end  bg-transparent text-body border-0">
                                <span class="btn-inner">
                                    <i class="far fa-trash-alt"></i>
                                </span>
                            </button>
                        </td>
                        <td>
                            <div class="product-thumbnail">
                                <a class="mb-2 me-3" href="">
                                    <img class="avatar-80" src="assets/images/shop/product/02.webp" alt="">
                                </a>
                                <span class="mt-2">Believe Mask</span>
                            </div>
                        </td>
                        <td>
                            <span class="fw-500">$13.00</span>
                        </td>
                        <td>
                            <span>In Stock</span>
                        </td>
                        <td>
                            <div class="iq-button">
                                <a href="product-detail.html" class="btn text-uppercase position-relative">
                                    <span class="button-text">view product</span>
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr data-item="list">
                        <td>
                            <button
                                class="btn btn-icon btn-danger delete-btn text-end  bg-transparent text-body border-0">
                                <span class="btn-inner">
                                    <i class="far fa-trash-alt"></i>
                                </span>
                            </button>
                        </td>
                        <td>
                            <div class="product-thumbnail">
                                <a class="mb-2 me-3" href="">
                                    <img class="avatar-80" src="assets/images/shop/product/03.webp" alt="">
                                </a>
                                <span class="mt-2">Black Bow</span>
                            </div>
                        </td>
                        <td>
                            <span class="fw-500">$18.00 – $45.00</span>
                        </td>
                        <td>
                            <span>Out of Stock</span>
                        </td>
                        <td>
                            <div class="iq-button">
                                <a href="product-detail.html" class="btn text-uppercase position-relative">
                                    <span class="button-text">view product</span>
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="product-social-share mt-5 d-flex flex-wrap align-items-center gap-3">
            <h5 class="mb-0">Share On:</h5>
            <ul class="list-inline m-0 p-0 d-flex flex-wrap align-items-center gap-2">
                <li class="flex-shrink-0">
                    <a href="https://www.facebook.com/"
                        class="d-inline-block border-radius rounded-circle bg-primary text-white text-center"
                        target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="flex-shrink-0">
                    <a href="https://twitter.com/"
                        class="d-inline-block border-radius rounded-circle bg-info text-white text-center"
                        target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="flex-shrink-0">
                    <a href="https://in.pinterest.com/"
                        class="d-inline-block border-radius rounded-circle bg-danger text-white text-center"
                        target="_blank">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                </li>
                <li class="flex-shrink-0">
                    <a href="https://iqonic.design/"
                        class="d-inline-block border-radius rounded-circle bg-warning text-white text-center"
                        target="_blank">
                        <i class="far fa-envelope"></i>
                    </a>
                </li>
                <li class="flex-shrink-0">
                    <a href="https://www.whatsapp.com/"
                        class="d-inline-block border-radius rounded-circle bg-success text-white text-center"
                        target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </li>
            </ul>
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