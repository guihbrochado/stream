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
      @include('components.nav') 
      
      <!-- ==================
      Cart Sidebar
      ========================= -->
      <div class="offcanvas offcanvas-end sidebar-cart border-0" tabindex="-1" id="offcanvasCart">
          <div class="offcanvas-header py-4">
              <h5 class="offcanvas-title">Shopping Cart (3)</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body py-5">
              <div class="sidebar-cart-content d-flex flex-column justify-content-between">
                  <div class="cart-items-container">
                      <ul class="cart-items-list m-0 list-inline">
                          <li class="cart-item mb-4 pb-4 border-bottom">
                              <div class="cart-item-block d-flex gap-3">
                                  <div class="image flex-shrink-0">
                                      <img src="assets/images/shop/product/02.webp" width="90" alt="product-image"
                                          class="img-fluid object-cover">
                                  </div>
                                  <div class="cart-block-content position-relative flex-grow-1 pe-5">
                                      <h6 class="mb-36 text-capitalize">Believe Mask</h6>
                                      <span class="text-primary small">$13.00</span>
                                      <div class="mt-3">
                                          <div class="btn-group iq-qty-btn border border-white rounded-0" data-qty="btn"
                                              role="group">
                                              <button type="button"
                                                  class="btn btn-sm btn-outline-light iq-quantity-minus text-white border-0">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="6" height="3" viewBox="0 0 6 3"
                                                      fill="none">
                                                      <path d="M5.22727 0.886364H0.136364V2.13636H5.22727V0.886364Z"
                                                          fill="currentColor"></path>
                                                  </svg>
                                              </button>
                                              <input type="text" class="btn btn-sm btn-outline-light input-display border-0"
                                                  data-qty="input" pattern="^(0|[1-9][0-9]*)$" minlength="1" maxlength="2"
                                                  value="2" title="Qty">
                                              <button type="button"
                                                  class="btn btn-sm btn-outline-light iq-quantity-plus text-white border-0">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8"
                                                      fill="none">
                                                      <path
                                                          d="M3.63636 7.70455H4.90909V4.59091H8.02273V3.31818H4.90909V0.204545H3.63636V3.31818H0.522727V4.59091H3.63636V7.70455Z"
                                                          fill="currentColor"></path>
                                                  </svg>
                                              </button>
                                          </div>
                                      </div>
                                      <div class="position-absolute top-0 end-0">
                                          <a href="javascript:void();" class="text-white delete-btn text-capitalize">delete</a>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <li class="cart-item mb-4 pb-4 border-bottom">
                              <div class="cart-item-block d-flex gap-3">
                                  <div class="image flex-shrink-0">
                                      <img src="assets/images/shop/product/04.webp" width="90" alt="product-image"
                                          class="img-fluid object-cover">
                                  </div>
                                  <div class="cart-block-content position-relative flex-grow-1 pe-5">
                                      <h6 class="mb-36 text-capitalize">Black Cap</h6>
                                      <span class="text-primary small">$18.00</span>
                                      <div class="mt-3">
                                          <div class="btn-group iq-qty-btn border border-white rounded-0" data-qty="btn"
                                              role="group">
                                              <button type="button"
                                                  class="btn btn-sm btn-outline-light iq-quantity-minus text-white border-0">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="6" height="3" viewBox="0 0 6 3"
                                                      fill="none">
                                                      <path d="M5.22727 0.886364H0.136364V2.13636H5.22727V0.886364Z"
                                                          fill="currentColor"></path>
                                                  </svg>
                                              </button>
                                              <input type="text" class="btn btn-sm btn-outline-light input-display border-0"
                                                  data-qty="input" pattern="^(0|[1-9][0-9]*)$" minlength="1" maxlength="2"
                                                  value="2" title="Qty">
                                              <button type="button"
                                                  class="btn btn-sm btn-outline-light iq-quantity-plus text-white border-0">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8"
                                                      fill="none">
                                                      <path
                                                          d="M3.63636 7.70455H4.90909V4.59091H8.02273V3.31818H4.90909V0.204545H3.63636V3.31818H0.522727V4.59091H3.63636V7.70455Z"
                                                          fill="currentColor"></path>
                                                  </svg>
                                              </button>
                                          </div>
                                      </div>
                                      <div class="position-absolute top-0 end-0">
                                          <a href="javascript:void();" class="text-white delete-btn text-capitalize">delete</a>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <li class="cart-item">
                              <div class="cart-item-block d-flex gap-3">
                                  <div class="image flex-shrink-0">
                                      <img src="assets/images/shop/product/05.webp" width="90" alt="product-image"
                                          class="img-fluid object-cover">
                                  </div>
                                  <div class="cart-block-content position-relative flex-grow-1 pe-5">
                                      <h6 class="mb-36 text-capitalize">Boxing Gloves</h6>
                                      <span class="text-primary small">$18.00</span>
                                      <div class="mt-3">
                                          <div class="btn-group iq-qty-btn border border-white rounded-0" data-qty="btn"
                                              role="group">
                                              <button type="button"
                                                  class="btn btn-sm btn-outline-light iq-quantity-minus text-white border-0">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="6" height="3" viewBox="0 0 6 3"
                                                      fill="none">
                                                      <path d="M5.22727 0.886364H0.136364V2.13636H5.22727V0.886364Z"
                                                          fill="currentColor"></path>
                                                  </svg>
                                              </button>
                                              <input type="text" class="btn btn-sm btn-outline-light input-display border-0"
                                                  data-qty="input" pattern="^(0|[1-9][0-9]*)$" minlength="1" maxlength="2"
                                                  value="2" title="Qty">
                                              <button type="button"
                                                  class="btn btn-sm btn-outline-light iq-quantity-plus text-white border-0">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8"
                                                      fill="none">
                                                      <path
                                                          d="M3.63636 7.70455H4.90909V4.59091H8.02273V3.31818H4.90909V0.204545H3.63636V3.31818H0.522727V4.59091H3.63636V7.70455Z"
                                                          fill="currentColor"></path>
                                                  </svg>
                                              </button>
                                          </div>
                                      </div>
                                      <div class="position-absolute top-0 end-0">
                                          <a href="javascript:void();" class="text-white delete-btn text-capitalize">delete</a>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </div>
                  <div class="cart-progress-container mt-5 pt-5 border-top">
                      <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                          <h5 class="m-0 fw-bold">Subtotal</h5>
                          <h5 class="m-0 fw-bold">$49.00</h5>
                      </div>
                      <div class="d-grid gap-3 mt-4">
                          <a href="shop/checkout.html" class="btn bg-primary text-uppercase fw-medium w-100 text-white">
                              <span class="button-text small">checkout</span>
                          </a>
      
                          <a href="shop/cart.html" class="btn bg-light text-uppercase fw-medium w-100 text-dark">
                              <span class="button-text small">view cart</span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>      <!--Nav End-->

      <!--bread-crumb-->
      <div class="iq-breadcrumb" style="background-image: url(assets/images/pages/01.webp);">
         <div class="container-fluid">
            <div class="row align-items-center">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb" class="text-center">
                          <h2 class="title">Shop</h2>
                          <ol class="breadcrumb justify-content-center">
                              <li class="breadcrumb-item"><a href="index.html">Home</a></li> 
                              <li class="breadcrumb-item active">Shop</li>
                          </ol>
                      </nav>
                  </div>
              </div> 
         </div>
      </div>      <!--bread-crumb-->

<div class="section-padding">
   <div class="container">
      <div class="row">
         <div class="col-xl-3">
            <div class="pe-3">
                <div class="shop-box">
                    <h5 class="mb-4 text-uppercase">Product categories</h5>
                    <ul class="list-unstyled p-0 m-0 shop-list-checkbox">
                        <li>
                            Activeman (4)
                        </li>
                        <li>
                            <div class="d-flex align-items-center justify-content-between">
                                <span>Disney World (2)</span>
                                <a class="checkbox" data-bs-toggle="collapse" href="#categoriesone" role="button" aria-expanded="false" aria-controls="categoriesone">
                                </a>
                            </div>
                            <div class="collapse" id="categoriesone">
                                <ul class="list-unstyled ps-2 mt-3">
                                    <li>Fantasia (1)</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            Galaxy Heaven (1)
                        </li>
                        <li>
                            Haunted Halloween (6)
                        </li>
                         <li>
                            Marvel Studios (3)
                        </li>
                        <li>
                            Monster-House (4)
                        </li>
                        <li>
                            Quid Game (1)
                        </li>
                        <li>
                            The Flashv (1)
                        </li>
                        <li>
                            The Madrid (3)
                        </li>
                        <li>
                            The-Champion(4)
                        </li>
                        <li>
                            Uptight Birds (1)
                        </li>
                         <li>
                            Warner Bros Films (2)
                        </li>
                    </ul>
                </div>
                <div class="shop-box">
                    <h5 class="">PRICE FILTER </h5>
                    <div class="form-group my-4 product-range">
                        <div class="range-slider" id="product-price-range"></div>
                    </div>
                    <div class=" d-flex align-items-center my-3">
                        <small>Price: &nbsp;</small>
                        <small id="lower-value">&nbsp; $11</small>
                        <small id="lower-value1">&nbsp; - &nbsp;</small>
                        <small id="upper-value">&nbsp;$50</small>
                    </div>
                </div>
                
                 <div class="shop-box">
                    <h5 class="mb-4">PRODUCT SIZE</h5>
                    <ul class="shop_list_checkbox list-unstyled">
                        <li>
                            <label class="shop_checkbox_label">L</label>
                            <input type="hidden" value="L" />
                        </li>
                        <li>
                            <label class="shop_checkbox_label">M</label>
                            <input type="hidden" value="M" />
                        </li>
                        <li>
                            <label class="shop_checkbox_label">S</label>
                            <input type="hidden" value="S" />
                        </li>
                    </ul>
                </div>
                <div class="shop-box border-bottom-0">
                    <h5 class="mb-4">PRODUCTS</h5>
                    <ul class="list-unstyled m-0 p-0 shop-product">
                        <li class="d-flex align-items-center mb-4">
                            <div class="top-product-img pe-3">
                                <img src="assets/images/shop/product/01.webp" class="img-fluid" alt="img">
                                </div>
                                <div class="">
                                <a href="product-detail.html" class="">Magic Hat</a>
                                <p>$10.00</p>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <div class="top-product-img pe-3">
                            <img src="assets/images/shop/product/30.webp" class="img-fluid" alt="img">
                            </div>
                            <div class="product-detail.html">
                            <a href="" class="">Green Specs</a>
                            <div>
                                <del>$22.00</del> $18.00
                            </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="top-product-img pe-3">
                            <img src="assets/images/shop/product/07.webp" class="img-fluid" alt="img">
                            </div>
                            <div class="product-detail.html">
                            <a href="" class="">Cartoon Character</a>
                            <p class="mb-0">
                                $25.00
                            </p>
                            </div>
                        </li>
                    </ul>
                </div>            </div>
         </div>
         <div class="col-xl-9">
            <div class="d-flex align-items-center justify-content-between mb-5 shop-filter flex-wrap">
                    <p>Showing 1–10 of 31 results </p>
                    <div class="d-flex align-items-center ">
                        <div class="product-view-button">
                            <ul class="nav_shop nav d-flex nav-pills mb-0 iq-product-filter d-flex bg-transparent align-items-center list-inline"
                                id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                        <button class="nav-link btn-sm btn-icon rounded-pill p-0"
                                            id="list-view-tab" data-bs-toggle="pill" data-bs-target="#pills-list-view"
                                            type="button" role="tab" aria-controls="pills-list-view"
                                            aria-selected="true">
                                            <span class="btn-inner">
                                                <svg class="hover_effect active_effect" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1379_355)">
                                                            <path d="M3.42857 0H0V3.42857H3.42857V0Z" fill=""></path>
                                                            <path d="M18 0.857422H6V2.57171H18V0.857422Z" fill="">
                                                            </path>
                                                            <path d="M3.42857 6H0V9.42857H3.42857V6Z" fill=""></path>
                                                            <path d="M18 6.85742H6V8.57171H18V6.85742Z" fill=""></path>
                                                            <path d="M3.42857 12H0V15.4286H3.42857V12Z" fill=""></path>
                                                            <path d="M18 12.8574H6V14.5717H18V12.8574Z" fill=""></path>
                                                    </g>
                                                    <defs>
                                                            <clipPath id="clip0_1379_355">
                                                                <rect width="18" height="15.4286" fill=""></rect>
                                                            </clipPath>
                                                    </defs>
                                                </svg>
                                            </span>
                                        </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                        <button class="nav-link btn-sm btn-icon rounded-pill p-0" id="grid-view-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-grid-view" type="button"
                                            role="tab" aria-controls="pills-grid-view" aria-selected="false">
                                            <span class="btn-inner">
                                                <svg class="hover_effect active_effect" width="18" height="18"
                                                    viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.57143 0H0V8.57143H8.57143V0Z" fill=""></path>
                                                    <path d="M17.9999 0H9.42847V8.57143H17.9999V0Z" fill=""></path>
                                                    <path d="M8.57143 9.42871H0V18.0001H8.57143V9.42871Z" fill="">
                                                    </path>
                                                    <path d="M17.9999 9.42871H9.42847V18.0001H17.9999V9.42871Z"
                                                            fill=""></path>
                                                </svg>
                                            </span>
                                        </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                        <button class="nav-link btn-sm btn-icon rounded-pill p-0 active"
                                            id="grid-three-view-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-grid-three-view-tab" type="button" role="tab"
                                            aria-controls="pills-grid-three-view-tab" aria-selected="false">
                                            <span class="btn-inner">
                                                <svg class="hover_effect active_effect" width="18" height="18"
                                                    viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.90909 0H0V4.90909H4.90909V0Z" fill=""></path>
                                                    <path d="M11.4545 0H6.54541V4.90909H11.4545V0Z" fill=""></path>
                                                    <path d="M17.9999 0H13.0908V4.90909H17.9999V0Z" fill=""></path>
                                                    <path d="M4.90909 6.5459H0V11.455H4.90909V6.5459Z" fill="">
                                                    </path>
                                                    <path d="M11.4545 6.5459H6.54541V11.455H11.4545V6.5459Z" fill="">
                                                    </path>
                                                    <path d="M17.9999 6.5459H13.0908V11.455H17.9999V6.5459Z" fill="">
                                                    </path>
                                                    <path d="M4.90909 13.0908H0V17.9999H4.90909V13.0908Z" fill="">
                                                    </path>
                                                    <path d="M11.4545 13.0908H6.54541V17.9999H11.4545V13.0908Z"
                                                            fill=""></path>
                                                    <path d="M17.9999 13.0908H13.0908V17.9999H17.9999V13.0908Z"
                                                            fill=""></path>
                                                </svg>
                                            </span>
                                        </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                        <button class="nav-link btn-sm btn-icon rounded-pill p-0"
                                            id="grid-three-four-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-grid-three-four-view-tab" type="button" role="tab"
                                            aria-controls="pills-grid-three-four-view-tab" aria-selected="false">
                                            <span class="btn-inner">
                                                <svg class="hover_effect active_effect" width="18" height="18"
                                                    viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.85714 0H0V3.85714H3.85714V0Z" fill=""></path>
                                                    <path d="M8.5715 0H4.71436V3.85714H8.5715V0Z" fill=""></path>
                                                    <path d="M13.2856 0H9.42847V3.85714H13.2856V0Z" fill=""></path>
                                                    <path d="M18 0H14.1428V3.85714H18V0Z" fill=""></path>
                                                    <path d="M3.85714 4.71387H0V8.57101H3.85714V4.71387Z" fill="">
                                                    </path>
                                                    <path d="M8.5715 4.71387H4.71436V8.57101H8.5715V4.71387Z"
                                                            fill=""></path>
                                                    <path d="M13.2856 4.71387H9.42847V8.57101H13.2856V4.71387Z"
                                                            fill=""></path>
                                                    <path d="M18 4.71387H14.1428V8.57101H18V4.71387Z" fill=""></path>
                                                    <path d="M3.85714 9.42871H0V13.2859H3.85714V9.42871Z" fill="">
                                                    </path>
                                                    <path d="M8.5715 9.42871H4.71436V13.2859H8.5715V9.42871Z"
                                                            fill=""></path>
                                                    <path d="M13.2856 9.42871H9.42847V13.2859H13.2856V9.42871Z"
                                                            fill=""></path>
                                                    <path d="M18 9.42871H14.1428V13.2859H18V9.42871Z" fill=""></path>
                                                    <path d="M3.85714 14.1426H0V17.9997H3.85714V14.1426Z" fill="">
                                                    </path>
                                                    <path d="M8.5715 14.1426H4.71436V17.9997H8.5715V14.1426Z"
                                                            fill=""></path>
                                                    <path d="M13.2856 14.1426H9.42847V17.9997H13.2856V14.1426Z"
                                                            fill=""></path>
                                                    <path d="M18 14.1426H14.1428V17.9997H18V14.1426Z" fill=""></path>
                                                </svg>
                                            </span>
                                        </button>
                                </li>
                            </ul>
                        </div>
                        <div class="iq-custom-select d-inline-block shop-select">
                            <select name="cars" class="form-control season-select select2-basic-single js-states">
                                <option value="season1">Default sorting</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by latest</option>
                                <option>Sort by price: low to high</option>
                                <option>Sort by price: high to low</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade " id="pills-list-view" role="tabpanel" aria-labelledby="list-view-tab">
                    <div class="row row-cols-1">
                        <div class="col">
                            <div class="product-block product-list">
                              <div class="row">
                                <div class="col-md-4 ps-0">
                                    <span class="onsale bg-primary">
                                      Sale!
                                    </span>
                                  <div class="image-wrap">
                                    <a href="shop/product-detail.html">
                                      <div class="product-image">
                                        <img src="assets/images/shop/product/01.webp" class="img-fluid w-100" alt="productImg-"
                                          loading="lazy" />
                                      </div>
                                    </a>
                                    <div class="buttons-holder">
                                      <ul class="list-unstyled m-0 p-0">
                                        <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-caption">
                                      <h5 class="product__title">
                                        <a href="shop/product-detail.html" class="title-link">
                                          Bag Pack</a>
                                      </h5>
                                      <div class="price-detail">
                                        <div class="price">
                                          <del>$48.00</del>$28.00
                                        </div>
                                      </div>
                                      <div class="container-rating">
                                        <div class="star-rating text-primary">
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star-half text-warning" aria-hidden="true"></i>
                                                        </span>
                                        </div>
                                      </div>
                                      <ul class="iq-button-holder list-inline d-flex flex-wrap gap-3">
                                        <li>
                                          <div class="iq-button">
                                            <a href="#" class="btn btn-sm cart-btn text-uppercase position-relative">
                                                <span class="button-text">add to cart</span>
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                          </div>
                                        </li>
                                         <li>
                                          <a href="#" class="add_to_wishlist wishlist-btn"><i class="far fa-heart"></i></a>
                                        </li>
                                      </ul>
                                      <p class="blog-desc line-count-2">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable.</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block product-list">
                              <div class="row">
                                <div class="col-md-4 ps-0">
                                  <div class="image-wrap">
                                    <a href="shop/product-detail.html">
                                      <div class="product-image">
                                        <img src="assets/images/shop/product/02.webp" class="img-fluid w-100" alt="productImg-"
                                          loading="lazy" />
                                      </div>
                                    </a>
                                    <div class="buttons-holder">
                                      <ul class="list-unstyled m-0 p-0">
                                        <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-caption">
                                      <h5 class="product__title">
                                        <a href="shop/product-detail.html" class="title-link">
                                          Believe Mask</a>
                                      </h5>
                                      <div class="price-detail">
                                        <div class="price">
                                          <del></del>$13.00
                                        </div>
                                      </div>
                                      <div class="container-rating">
                                        <div class="star-rating text-primary">
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                        </div>
                                      </div>
                                      <ul class="iq-button-holder list-inline d-flex flex-wrap gap-3">
                                        <li>
                                          <div class="iq-button">
                                            <a href="#" class="btn btn-sm cart-btn text-uppercase position-relative">
                                                <span class="button-text">add to cart</span>
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                          </div>
                                        </li>
                                         <li>
                                          <a href="#" class="add_to_wishlist wishlist-btn"><i class="far fa-heart"></i></a>
                                        </li>
                                      </ul>
                                      <p class="blog-desc line-count-2">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable.</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block product-list">
                              <div class="row">
                                <div class="col-md-4 ps-0">
                                    <span class="onsale bg-primary">
                                      Sale!
                                    </span>
                                  <div class="image-wrap">
                                    <a href="shop/product-detail.html">
                                      <div class="product-image">
                                        <img src="assets/images/shop/product/03.webp" class="img-fluid w-100" alt="productImg-"
                                          loading="lazy" />
                                      </div>
                                    </a>
                                    <div class="buttons-holder">
                                      <ul class="list-unstyled m-0 p-0">
                                        <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-caption">
                                      <h5 class="product__title">
                                        <a href="shop/product-detail.html" class="title-link">
                                          Black Bow</a>
                                      </h5>
                                      <div class="price-detail">
                                        <div class="price">
                                          <del></del>$18.00 - $45.00
                                        </div>
                                      </div>
                                      <div class="container-rating">
                                        <div class="star-rating text-primary">
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                        </div>
                                      </div>
                                      <ul class="iq-button-holder list-inline d-flex flex-wrap gap-3">
                                        <li>
                                          <div class="iq-button">
                                            <a href="#" class="btn btn-sm cart-btn text-uppercase position-relative">
                                                <span class="button-text">add to cart</span>
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                          </div>
                                        </li>
                                         <li>
                                          <a href="#" class="add_to_wishlist wishlist-btn"><i class="far fa-heart"></i></a>
                                        </li>
                                      </ul>
                                      <p class="blog-desc line-count-2">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable.</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block product-list">
                              <div class="row">
                                <div class="col-md-4 ps-0">
                                    <span class="onsale bg-primary">
                                      New!
                                    </span>
                                  <div class="image-wrap">
                                    <a href="shop/product-detail.html">
                                      <div class="product-image">
                                        <img src="assets/images/shop/product/04.webp" class="img-fluid w-100" alt="productImg-"
                                          loading="lazy" />
                                      </div>
                                    </a>
                                    <div class="buttons-holder">
                                      <ul class="list-unstyled m-0 p-0">
                                        <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-caption">
                                      <h5 class="product__title">
                                        <a href="shop/product-detail.html" class="title-link">
                                          Black Cap</a>
                                      </h5>
                                      <div class="price-detail">
                                        <div class="price">
                                          <del>$20.00</del>$18.00
                                        </div>
                                      </div>
                                      <div class="container-rating">
                                        <div class="star-rating text-primary">
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                        </div>
                                      </div>
                                      <ul class="iq-button-holder list-inline d-flex flex-wrap gap-3">
                                        <li>
                                          <div class="iq-button">
                                            <a href="#" class="btn btn-sm cart-btn text-uppercase position-relative">
                                                <span class="button-text">add to cart</span>
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                          </div>
                                        </li>
                                         <li>
                                          <a href="#" class="add_to_wishlist wishlist-btn"><i class="far fa-heart"></i></a>
                                        </li>
                                      </ul>
                                      <p class="blog-desc line-count-2">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable.</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block product-list">
                              <div class="row">
                                <div class="col-md-4 ps-0">
                                  <div class="image-wrap">
                                    <a href="shop/product-detail.html">
                                      <div class="product-image">
                                        <img src="assets/images/shop/product/05.webp" class="img-fluid w-100" alt="productImg-"
                                          loading="lazy" />
                                      </div>
                                    </a>
                                    <div class="buttons-holder">
                                      <ul class="list-unstyled m-0 p-0">
                                        <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-caption">
                                      <h5 class="product__title">
                                        <a href="shop/product-detail.html" class="title-link">
                                          Boxing Gloves</a>
                                      </h5>
                                      <div class="price-detail">
                                        <div class="price">
                                          <del>$20.00</del>$18.00
                                        </div>
                                      </div>
                                      <div class="container-rating">
                                        <div class="star-rating text-primary">
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                                        <span>
                                                          <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                        </span>
                                        </div>
                                      </div>
                                      <ul class="iq-button-holder list-inline d-flex flex-wrap gap-3">
                                        <li>
                                          <div class="iq-button">
                                            <a href="#" class="btn btn-sm cart-btn text-uppercase position-relative">
                                                <span class="button-text">add to cart</span>
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                          </div>
                                        </li>
                                         <li>
                                          <a href="#" class="add_to_wishlist wishlist-btn"><i class="far fa-heart"></i></a>
                                        </li>
                                      </ul>
                                      <p class="blog-desc line-count-2">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable.</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2">
                        <div class="col">
                            <div class="product-block">
                              <span class="onsale bg-primary">
                                Sale!
                              </span>
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/01.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Bag Pack</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$48.00</del>$28.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star-half text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/02.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Believe Mask</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$13.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <span class="onsale bg-primary">
                                Sale!
                              </span>
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/03.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Black Bow</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$18.00 - $45.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <span class="onsale bg-primary">
                                New!
                              </span>
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/04.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Black Cap</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$20.00</del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/05.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Boxing Gloves</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$20.00</del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/06.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Carry Bag</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$20.00</del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="pills-grid-three-view-tab" role="tabpanel"
                    aria-labelledby="grid-three-view-tab">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                        <div class="col">
                            <div class="product-block">
                              <span class="onsale bg-primary">
                                Sale!
                              </span>
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/01.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Bag Pack</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$48.00</del>$28.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star-half text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/02.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Believe Mask</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$13.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <span class="onsale bg-primary">
                                Sale!
                              </span>
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/03.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Black Bow</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$18.00 - $45.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <span class="onsale bg-primary">
                                New!
                              </span>
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/04.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Black Cap</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$20.00</del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/05.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Boxing Gloves</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$20.00</del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/06.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Carry Bag</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/07.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    cartoon-character</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$25.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/08.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Coffee Cup</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$20.00</del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/09.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Crown</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$10.00</del>$07.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-grid-three-four-view-tab" role="tabpanel">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                        <div class="col">
                            <div class="product-block">
                              <span class="onsale bg-primary">
                                Sale!
                              </span>
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/01.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Bag Pack</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$48.00</del>$28.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star-half text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/02.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Believe Mask</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$13.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <span class="onsale bg-primary">
                                Sale!
                              </span>
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/03.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Black Bow</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$18.00 - $45.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <span class="onsale bg-primary">
                                New!
                              </span>
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/04.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Black Cap</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$20.00</del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/05.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Boxing Gloves</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$20.00</del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/06.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Carry Bag</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/07.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    cartoon-character</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$25.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/08.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Coffee Cup</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$20.00</del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/09.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Crown</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$10.00</del>$07.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                         <div class="col">
                            <div class="product-block">
                              <span class="onsale bg-primary">
                                Sale!
                              </span>
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/10.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Daily Diary</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del>$20.00</del>$18.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                         <div class="col">
                            <div class="product-block">
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/11.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Floral Badges</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$20
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star-half text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star-half text-warning" aria-hidden="true"></i>
                                                  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                         <div class="col">
                            <div class="product-block">
                              <span class="onsale bg-primary">
                                Sale!
                              </span>
                              <div class="image-wrap">
                                <a href="shop/product-detail.html">
                                  <div class="product-image">
                                    <img src="assets/images/shop/product/12.webp" class="img-fluid w-100" alt="productImg-"
                                      loading="lazy" />
                                  </div>
                                </a>
                                <div class="buttons-holder">
                                  <ul class="list-unstyled m-0 p-0">
                                    <li>
                                          <a class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#woosq-popup">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                    </li>
                                    <li>
                                      <a href="#" class="add_to_wishlist wishlist-btn"><i class="fa-solid fa-heart"></i></a>
                                    </li>
                                    <li>
                                      <a href="#" class="added_to_cart cart-btn d-flex align-items-center">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="product-caption">
                                <h5 class="product__title">
                                  <a href="shop/product-detail.html" class="title-link">
                                    Ghost Cap</a>
                                </h5>
                                <div class="price-detail">
                                  <div class="price">
                                    <del></del>$90.00
                                  </div>
                                </div>
                                <div class="container-rating">
                                  <div class="star-rating text-primary">
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                  </span>
                                                  <span>
                                                    <i class="fa fa-star-half text-warning" aria-hidden="true"></i>
                                                  </span>
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
   </div>
</div>
<div class="modal fade" id="woosq-popup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered positon-relative">
      <div class="modal-content rounded-0 border-0">
         <div class="modal-body p-0">
            <button type="button" class="btn-close position-absolute end-0" data-bs-dismiss="modal"
               aria-label="Close"></button>
            <div class="row align-items-center">
               <div class="col-md-6">
                  <img src="assets/images/shop/product/01.webp" class="object-cover" alt="shop-img">
               </div>
               <div class="col-md-6">
                  <div class="entry-summary p-md-4">
                     <h3>Bag Pack</h3>
                     <div class="review">
                                   <span>
                                     <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                   </span>
                                   <span>
                                     <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                   </span>
                                   <span>
                                     <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                   </span>
                                   <span>
                                     <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                   </span>
                                   <span>
                                     <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                   </span>
                     </div>
                     <h4 class="price text-white mt-3"><del class="text-body fw-normal me-1">$48.00</del>$28.00 </h4>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable.
                     </p>
                     <ul class="list-inline m-0 p-0 d-flex align-items-center gap-3 flex-wrap pt-0 pt-md-4 pb-5">
                        <li>
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
                        </li>
                        <li>
                           <div class="iq-button">
                            <a href="#" class="btn btn-sm text-uppercase position-relative cart-btn">
                                <span class="button-text">add to cart</span>
                                <i class="fa-solid fa-play"></i>
                            </a>
                            </div>
                        </li>
                     </ul>
                     <div class="d-flex align-items-center gap-2">
                        <span class="fw-semibold text-white">SKU :</span>
                        <span>Bag Pack</span>
                     </div>
                     <div class="d-flex align-items-center gap-2">
                        <span class="fw-semibold text-white">Category :</span>
                        <span class="text-primary">Uptight Birds</span>
                     </div>
                     <div class="d-flex align-items-center gap-2">
                        <span class="fw-semibold text-white">Tags :</span>
                        <span class="text-primary">Costume,</span>
                        <span class="text-primary">Lighting</span>
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