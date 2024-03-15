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
      @include('components.nav')      <!--Nav End-->

      <!--bread-crumb-->
      <div class="iq-breadcrumb" style="background-image: url(assets/images/pages/01.webp);">
         <div class="container-fluid">
            <div class="row align-items-center">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb" class="text-center">
                          <h2 class="title">Cart</h2>
                          <ol class="breadcrumb justify-content-center">
                              <li class="breadcrumb-item"><a href="index.html">Home</a></li> 
                              <li class="breadcrumb-item active">Cart</li>
                          </ol>
                      </nav>
                  </div>
              </div> 
         </div>
      </div>      <!--bread-crumb-->

<div class="cart-page  section-padding">
    <div class="container">
        <div class="main-cart mb-3 mb-md-5 pb-0 pb-md-5">
            <ul
                class="cart-page-items d-flex justify-content-center list-inline align-items-center gap-3 gap-md-5 flex-wrap">
                <li class="cart-page-item active">
                    <span class="cart-pre-heading badge cart-pre-number bg-primary border-radius rounded-circle me-1"> 1
                    </span>
                    <span class="cart-page-link ">
                        Shopping Cart </span>
                </li>
                <li>
                    <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 21.2498C17.108 21.2498 21.25 17.1088 21.25 11.9998C21.25 6.89176 17.108 2.74976 12 2.74976C6.892 2.74976 2.75 6.89176 2.75 11.9998C2.75 17.1088 6.892 21.2498 12 21.2498Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path d="M10.5576 15.4709L14.0436 11.9999L10.5576 8.52895" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </li>
                <li>
                    <span class=" cart-pre-number border-radius rounded-circle me-1">
                        2 </span>
                    <span class="cart-page-link ">
                        Checkout </span>
                </li>
                <li>
                    <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 21.2498C17.108 21.2498 21.25 17.1088 21.25 11.9998C21.25 6.89176 17.108 2.74976 12 2.74976C6.892 2.74976 2.75 6.89176 2.75 11.9998C2.75 17.1088 6.892 21.2498 12 21.2498Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path d="M10.5576 15.4709L14.0436 11.9999L10.5576 8.52895" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </li>
                <li>
                    <span class=" cart-pre-number border-radius rounded-circle me-1"> 3 </span>
                    <span class="cart-page-link ">
                        Order Summary </span>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table cart-table">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col" class="font-size-18 fw-500">Product</th>
                                <th scope="col" class="font-size-18 fw-500">Price</th>
                                <th scope="col" class="font-size-18 fw-500">Quantity</th>
                                <th scope="col" class="font-size-18 fw-500">Subtotal</th>
                                <th scope="col" class="font-size-18 fw-500"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-item="list">
                                <td>
                                    <div class="product-thumbnail d-flex align-items-center gap-3">
                                        <a class="d-block mb-2" href="">
                                            <img class="avatar-80" src="assets/images/shop/product/08.webp"
                                                alt="">
                                        </a>
                                        <span class="text-white">Coffee Cup</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-500">$15.00</span>
                                </td>
                                <td>
                                    <div class="btn-group iq-qty-btn border border-white rounded-0" data-qty="btn" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-light iq-quantity-minus text-white border-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="3" viewBox="0 0 6 3" fill="none">
                                            <path d="M5.22727 0.886364H0.136364V2.13636H5.22727V0.886364Z" fill="currentColor"></path>
                                            </svg>
                                        </button>
                                        <input type="text" class="btn btn-sm btn-outline-light input-display border-0" data-qty="input" pattern="^(0|[1-9][0-9]*)$" minlength="1" maxlength="2" value="2" title="Qty">
                                        <button type="button" class="btn btn-sm btn-outline-light iq-quantity-plus text-white border-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                            <path d="M3.63636 7.70455H4.90909V4.59091H8.02273V3.31818H4.90909V0.204545H3.63636V3.31818H0.522727V4.59091H3.63636V7.70455Z" fill="currentColor"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-500">$123.00</span>
                                </td>
                                <td>
                                    <button
                                        class="btn btn-icon btn-danger delete-btn text-end  bg-transparent text-body border-0">
                                        <span class="btn-inner">
                                            <i class="far fa-trash-alt"></i>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                            <tr data-item="list">
                                <td>
                                    <div class="product-thumbnail d-flex align-items-center gap-3">
                                        <a class="d-block mb-2" href="">
                                            <img class="avatar-80" src="assets/images/shop/product/09.webp"
                                                alt="">
                                        </a>
                                        <span class="text-white">Medical Box</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-500">$92.00</span>
                                </td>
                                <td>
                                    <div class="btn-group iq-qty-btn border border-white rounded-0" data-qty="btn" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-light iq-quantity-minus text-white border-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="3" viewBox="0 0 6 3" fill="none">
                                            <path d="M5.22727 0.886364H0.136364V2.13636H5.22727V0.886364Z" fill="currentColor"></path>
                                            </svg>
                                        </button>
                                        <input type="text" class="btn btn-sm btn-outline-light input-display border-0" data-qty="input" pattern="^(0|[1-9][0-9]*)$" minlength="1" maxlength="2" value="2" title="Qty">
                                        <button type="button" class="btn btn-sm btn-outline-light iq-quantity-plus text-white border-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                            <path d="M3.63636 7.70455H4.90909V4.59091H8.02273V3.31818H4.90909V0.204545H3.63636V3.31818H0.522727V4.59091H3.63636V7.70455Z" fill="currentColor"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-500">$92.00</span>
                                </td>
                                <td>
                                    <button
                                        class="btn btn-icon btn-danger delete-btn text-end  bg-transparent text-body border-0">
                                        <span class="btn-inner">
                                            <i class="far fa-trash-alt"></i>
                                        </span>
                                    </button>
                                    
                                </td>
                            </tr>
                            <tr data-item="list">
                                <td>
                                    <div class="product-thumbnail d-flex align-items-center gap-3">
                                        <a class="d-block mb-2" href="">
                                            <img class="avatar-80" src="assets/images/shop/product/10.webp"
                                                alt="">
                                        </a>
                                        <span class="text-white">Hand Sanitizer Bottle</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-500">$90.00</span>
                                </td>
                                <td>
                                    <div class="btn-group iq-qty-btn border border-white rounded-0" data-qty="btn" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-light iq-quantity-minus text-white border-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="3" viewBox="0 0 6 3" fill="none">
                                            <path d="M5.22727 0.886364H0.136364V2.13636H5.22727V0.886364Z" fill="currentColor"></path>
                                            </svg>
                                        </button>
                                        <input type="text" class="btn btn-sm btn-outline-light input-display border-0" data-qty="input" pattern="^(0|[1-9][0-9]*)$" minlength="1" maxlength="2" value="2" title="Qty">
                                        <button type="button" class="btn btn-sm btn-outline-light iq-quantity-plus text-white border-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                            <path d="M3.63636 7.70455H4.90909V4.59091H8.02273V3.31818H4.90909V0.204545H3.63636V3.31818H0.522727V4.59091H3.63636V7.70455Z" fill="currentColor"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-500">$90.00</span>
                                </td>
                                <td>
                                    <button
                                        class="btn btn-icon btn-danger delete-btn text-end  bg-transparent text-body border-0">
                                        <span class="btn-inner">
                                            <i class="far fa-trash-alt"></i>
                                        </span>
                                    </button>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div
                    class="coupon-main d-flex justify-content-between  gap-5 flex-wrap align-items-center pt-4 pb-5 border-bottom">
                    <div class="wrap-coupon d-flex align-items-center gap-3 flex-wrap">
                        <label>Coupon :</label>
                        <input class="form-control d-inline-block w-auto me-2" name="coupon_code" type="text"
                            placeholder="Coupon code">
                        <div class=" d-inline-block">
                            <div class="iq-button">
                                <a href="#" class="btn text-uppercase position-relative">
                                    <span class="button-text">Apply Coupon</span>
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="button-primary">
                        <div class="iq-button">
                            <a href="#" class="btn text-uppercase position-relative">
                                <span class="button-text">Update Cart</span>
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart_totals p-4">
                    <h5 class="mb-3 font-size-18 fw-500">Cart Totals</h5>
                    <div class="css_prefix-woocommerce-cart-box table-responsive">
                        <table class="table">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th class="border-0"><span class="fw-500">Subtotal</span></th>
                                    <td class="border-0">
                                        <span>$305.00</span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th class="border-0">
                                            <span class="fw-500"> Total </span>
                                             </th>
                                    <td class="border-0">
                                        <span class="fw-500 text-primary">$305.00</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="button-primary">
                            <div class="iq-button">
                                <a href="checkout.html" class="btn text-uppercase position-relative">
                                    <span class="button-text">Proceed to checkout</span>
                                    <i class="fa-solid fa-play"></i>
                                </a>
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