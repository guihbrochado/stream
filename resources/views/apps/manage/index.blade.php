<!doctype html>
<html lang="en" dir="">

@include('components.headdash')
<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body ">
                <img src="{{ asset('assets/dashboard/images/loader.gif')}}" alt="loader" class="image-loader img-fluid ">
            </div>
        </div>
    </div>
    <!-- loader END -->

    @include('components.sidebardash')
    <main class="main-content">
        <!-- Nav START -->
        @include('layouts.navdash')
        <!--Nav End-->
        </div>
        <div class="content-inner container-fluid pb-0" id="page_layout">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="iq-cart-text text-capitalize">
                                                <p class="mb-0">
                                                    view
                                                </p>
                                            </div>
                                            <div class="icon iq-icon-box-top rounded-circle bg-primary">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1614 12.0531C15.1614 13.7991 13.7454 15.2141 11.9994 15.2141C10.2534 15.2141 8.83838 13.7991 8.83838 12.0531C8.83838 10.3061 10.2534 8.89111 11.9994 8.89111C13.7454 8.89111 15.1614 10.3061 15.1614 12.0531Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.998 19.355C15.806 19.355 19.289 16.617 21.25 12.053C19.289 7.48898 15.806 4.75098 11.998 4.75098H12.002C8.194 4.75098 4.711 7.48898 2.75 12.053C4.711 16.617 8.194 19.355 12.002 19.355H11.998Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <h4 class=" mb-0">+24K</h4>
                                            <p class="mb-0 text-primary"><span><i class="fa fa-caret-down me-2"></i></span>35%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="iq-cart-text text-capitalize">
                                                <p class="mb-0 font-size-14">
                                                    Rated This App
                                                </p>
                                            </div>
                                            <div class="icon iq-icon-box-top rounded-circle bg-warning">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <h4 class=" mb-0">+55K</h4>
                                            <p class="mb-0 text-warning"><span><i class="fa fa-caret-up me-2"></i></span>50%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="iq-cart-text text-capitalize">
                                                <p class="mb-0 font-size-14">
                                                    Downloaded
                                                </p>
                                            </div>
                                            <div class="icon iq-icon-box-top rounded-circle bg-info">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.75 12C2.75 17.108 6.891 21.25 12 21.25C17.108 21.25 21.25 17.108 21.25 12C21.25 6.892 17.108 2.75 12 2.75C6.891 2.75 2.75 6.892 2.75 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.52832 10.5576L11.9993 14.0436L15.4703 10.5576" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <h4 class=" mb-0">+1M</h4>
                                            <p class="mb-0 text-info"><span><i class="fa fa-caret-up me-2"></i></span>80%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="iq-cart-text text-uppercase">
                                                <p class="mb-0 font-size-14">
                                                    Visitors
                                                </p>
                                            </div>
                                            <div class="icon iq-icon-box-top rounded-circle bg-success">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9849 15.3462C8.11731 15.3462 4.81445 15.931 4.81445 18.2729C4.81445 20.6148 8.09636 21.2205 11.9849 21.2205C15.8525 21.2205 19.1545 20.6348 19.1545 18.2938C19.1545 15.9529 15.8735 15.3462 11.9849 15.3462Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9849 12.0059C14.523 12.0059 16.5801 9.94779 16.5801 7.40969C16.5801 4.8716 14.523 2.81445 11.9849 2.81445C9.44679 2.81445 7.3887 4.8716 7.3887 7.40969C7.38013 9.93922 9.42394 11.9973 11.9525 12.0059H11.9849Z" stroke="currentColor" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <h4 class=" mb-0">+2M</h4>
                                            <p class="mb-0 text-success"><span><i class="fa fa-caret-up me-2"></i></span>80%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center top-rated-slider">
                                <div class="iq-header-title ">
                                    <h4 class="card-title">Top Rated Item </h4>
                                </div>
                                <div class="top-swiper-arrow d-flex align-items-center">
                                    <div class="swiper-button-prev me-2"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="swiper pt-2 pt-md-4 pt-lg-4 overflow-hidden" data-swiper="top-slider">
                                    <ul class="swiper-wrapper list-inline p-0 m-0">
                                        <li class="iq-rated-box swiper-slide">
                                            <div class="iq-card mb-0">
                                                <div class="iq-card-body p-0">
                                                    <div class="iq-thumb">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/dashboard/images/dashboard/01.jpg" class="img-fluid w-100 img-border-radius" alt="topImg-01">
                                                        </a>
                                                    </div>
                                                    <div class="iq-feature-list mt-3">
                                                        <h6 class="font-weight-600 mb-0">The
                                                            Last Breath</h6>
                                                        <p class="mb-0 mt-2">T.v Show</p>
                                                        <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                                            <p class="mb-0 me-2"><i class="fa-regular fa-eye me-1"></i>134</p>
                                                            <p class="mb-0 "><i class="fa-solid fa-download ms-2 me-1"></i>30k</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="iq-rated-box swiper-slide">
                                            <div class="iq-card mb-0">
                                                <div class="iq-card-body p-0">
                                                    <div class="iq-thumb">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/dashboard/images/dashboard/02.jpg" class="img-fluid w-100 img-border-radius" alt="topImg-02">
                                                        </a>
                                                    </div>
                                                    <div class="iq-feature-list mt-3">
                                                        <h6 class="font-weight-600 mb-0">Last
                                                            Night</h6>
                                                        <p class="mb-0 mt-2">Movie</p>
                                                        <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                                            <p class="mb-0 me-2"><i class="fa-regular fa-eye me-1"></i>133</p>
                                                            <p class="mb-0 "><i class="fa-solid fa-download ms-2 me-1"></i>20k</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="iq-rated-box swiper-slide">
                                            <div class="iq-card mb-0">
                                                <div class="iq-card-body p-0">
                                                    <div class="iq-thumb">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/dashboard/images/dashboard/03.jpg" class="img-fluid w-100 img-border-radius" alt="topImg-03">
                                                        </a>
                                                    </div>
                                                    <div class="iq-feature-list mt-3">
                                                        <h6 class="font-weight-600 mb-0">Jeon
                                                            Woochie</h6>
                                                        <p class="mb-0 mt-2">Movie</p>
                                                        <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                                            <p class="mb-0 me-2"><i class="fa-regular fa-eye me-1"></i>222</p>
                                                            <p class="mb-0 "><i class="fa-solid fa-download ms-2 me-1"></i>40k</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="iq-rated-box swiper-slide">
                                            <div class="iq-card mb-0">
                                                <div class="iq-card-body p-0">
                                                    <div class="iq-thumb">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/dashboard/images/dashboard/04.jpg" class="img-fluid w-100 img-border-radius" alt="topImg-04">
                                                        </a>
                                                    </div>
                                                    <div class="iq-feature-list mt-3">
                                                        <h6 class="font-weight-600 mb-0">Dino
                                                            Land</h6>
                                                        <p class="mb-0 mt-2">T.V Show</p>
                                                        <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                                            <p class="mb-0 me-2"><i class="fa-regular fa-eye me-1"></i>122</p>
                                                            <p class="mb-0 "><i class="fa-solid fa-download ms-2 me-1"></i>25k</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="iq-rated-box swiper-slide">
                                            <div class="iq-card mb-0">
                                                <div class="iq-card-body p-0">
                                                    <div class="iq-thumb">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/dashboard/images/dashboard/05.jpg" class="img-fluid w-100 img-border-radius" alt="topImg-05">
                                                        </a>
                                                    </div>
                                                    <div class="iq-feature-list mt-3">
                                                        <h6 class="font-weight-600 mb-0">Last
                                                            Race</h6>
                                                        <p class="mb-0 mt-2">T.V Show</p>
                                                        <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                                            <p class="mb-0 me-2"><i class="fa-regular fa-eye me-1"></i>144</p>
                                                            <p class="mb-0 "><i class="fa-solid fa-download ms-2 me-1"></i>35k</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="iq-rated-box swiper-slide">
                                            <div class="iq-card mb-0">
                                                <div class="iq-card-body p-0">
                                                    <div class="iq-thumb">
                                                        <a href="javascript:void(0)">
                                                            <img src="assets/dashboard/images/dashboard/06.jpg" class="img-fluid w-100 img-border-radius" alt="topImg-06">
                                                        </a>
                                                    </div>
                                                    <div class="iq-feature-list mt-3">
                                                        <h6 class="font-weight-600 mb-0">Open
                                                            Dead Shot</h6>
                                                        <p class="mb-0 mt-2">T.V Show</p>
                                                        <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                                            <p class="mb-0 me-2"><i class="fa-regular fa-eye me-1"></i>134</p>
                                                            <p class="mb-0 "><i class="fa-solid fa-download ms-2 me-1"></i>30k</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card card-block card-stretch card-height">
                            <div class="card-header">
                                <div class="iq-header-title">
                                    <h4 class="card-title text-center">User's Of Product</h4>
                                </div>
                            </div>
                            <div class="card-body pb-0">
                                <div id="view-chart-01">
                                </div>
                                <div class="row mt-1">
                                    <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                                        <div class="card border-0">
                                            <div class="card-body bg-body p-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="iq-user-box bg-primary"></div>
                                                    <div class=" ">
                                                        <p class="mb-0 font-size-14 line-height">New <br>
                                                            Customer
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                                        <div class="card border-0">
                                            <div class="card-body bg-body p-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="iq-user-box bg-warning"></div>
                                                    <div class=" ">
                                                        <p class="mb-0 font-size-14 line-height">Exsisting <br>
                                                            Subscriber's
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                                        <div class="card border-0">
                                            <div class="card-body bg-body p-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="iq-user-box bg-info"></div>
                                                    <div class=" ">
                                                        <p class="mb-0 font-size-14 line-height">Daily<br>
                                                            Visitor's
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                                        <div class="card border-0">
                                            <div class="card-body bg-body p-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="iq-user-box bg-danger"></div>
                                                    <div class=" ">
                                                        <p class="mb-0 font-size-14 line-height">Extented <br>
                                                            Subscriber's
                                                        </p>
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
                <div class="row">
                    <div class="col-sm-12  col-lg-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Categories</h4>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div id="view-chart-03"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Top Category</h4>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center seasons">
                                    <div class="iq-custom-select d-inline-block sea-epi s-margin">
                                        <select name="cars" class="form-control season-select">
                                            <option value="season1">Today</option>
                                            <option value="season2">This Week</option>
                                            <option value="season2">This Month</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body row align-items-center">
                                <div class="col-lg-7">
                                    <div class="row list-unstyled mb-0 pb-0">
                                        <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                            <div class="iq-progress-bar progress-bar-vertical iq-bg-primary">
                                                <span class="bg-primary" data-percent="100" style="transition: height 2s ease 0s; width: 100%; height: 40%;"></span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="iq-icon-box-view rounded me-3 text-primary">
                                                    <i class="fa-solid fa-film font-size-32"></i>
                                                </div>
                                                <div class=" ">
                                                    <h6 class="mb-0 font-size-14 line-height">Actions</h6>
                                                    <small class="text-primary mb-0">+34%</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                            <div class="iq-progress-bar progress-bar-vertical iq-bg-secondary">
                                                <span class="bg-secondary" data-percent="100" style="transition: height 2s ease 0s; width: 100%; height: 70%;"></span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="iq-icon-box-view rounded me-3 text-secondary">
                                                    <i class="fa-solid fa-masks-theater font-size-32"></i>
                                                </div>
                                                <div class=" ">
                                                    <p class="mb-0 font-size-14 line-height">Comedy</p>
                                                    <small class="text-secondary mb-0">+44%</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                            <div class="iq-progress-bar progress-bar-vertical iq-bg-info">
                                                <span class="bg-info" data-percent="100" style="transition: height 2s ease 0s; width: 100%; height: 40%;"></span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="iq-icon-box-view rounded me-3 text-info">
                                                    <i class="fa-solid fa-skull-crossbones font-size-32"></i>
                                                </div>
                                                <div class=" ">
                                                    <p class="mb-0 font-size-14 line-height">Horror</p>
                                                    <small class="text-info mb-0">+56%</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                            <div class="iq-progress-bar progress-bar-vertical iq-bg-warning">
                                                <span class="bg-warning" data-percent="100" style="transition: height 2s ease 0s; width: 40%; height: 40%;"></span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="iq-icon-box-view rounded me-3 text-warning">
                                                    <i class="fa-solid fa-masks-theater font-size-32"></i>
                                                </div>
                                                <div class=" ">
                                                    <p class="mb-0 font-size-14 line-height">Drama</p>
                                                    <small class="text-warning mb-0">+65%</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6 mb-lg-0 mb-3">
                                            <div class="iq-progress-bar progress-bar-vertical iq-bg-success">
                                                <span class="bg-success" data-percent="100" style="transition: height 2s ease 0s; width: 60%; height: 60%;"></span>
                                            </div>
                                            <div class="d-flex align-items-center mb-lg-0 mb-3">
                                                <div class="iq-icon-box-view rounded me-3 text-success">
                                                    <i class="fa-solid fa-child font-size-32"></i>
                                                </div>
                                                <div class=" ">
                                                    <p class="mb-0 font-size-14 line-height">Kids</p>
                                                    <small class="text-success mb-0">+74%</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6  mb-lg-0 mb-3">
                                            <div class="iq-progress-bar progress-bar-vertical iq-bg-danger">
                                                <span class="bg-danger" data-percent="100" style="transition: height 2s ease 0s; width: 80%; height: 80%;"></span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="iq-icon-box-view rounded me-3 text-danger">
                                                    <i class="fa-solid fa-face-grin-beam-sweat font-size-32"></i>
                                                </div>
                                                <div class=" ">
                                                    <p class="mb-0 font-size-14 line-height">Thrilled</p>
                                                    <small class="text-danger mb-0">+40%</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div id="view-chart-02" class="view-cahrt-02"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">
                                    <h4>Recently Viewed Items</h4>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center seasons">
                                    <div class="iq-custom-select d-inline-block sea-epi s-margin">
                                        <select name="cars" class="form-control season-select">
                                            <option value="season1">Most Likely</option>
                                            <option value="season2">Unlikely</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-view table-space">
                                    <table class="data-tables table custom-table movie_table" style="width:100%" data-toggle="data-table">
                                        <thead>
                                            <tr>
                                                <th style="width:20%;">Movie</th>
                                                <th style="width:10%;">Rating</th>
                                                <th style="width:20%;">Category</th>
                                                <th style="width:10%;">Download/Views</th>
                                                <th style="width:10%;">User</th>
                                                <th style="width:20%;">Date</th>
                                                <th style="width:10%;"><i class="fa-solid fa-heart"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="iq-movie">
                                                            <a href="javascript:void(0);"><img src="assets/dashboard/images/movie-thumb/07.jpg" class="img-border-radius avatar-40 img-fluid" alt="recentlyImg-01"></a>
                                                        </div>
                                                        <div class="text-start ms-3">
                                                            <p class="mb-0">Boop Bitty</p>
                                                            <small></small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="lar la-star me-2"></i>8.2</td>
                                                <td>Thriller</td>
                                                <td>
                                                    <i class="fa-regular fa-eye"></i>
                                                </td>
                                                <td>Unsubcriber</td>
                                                <td>23 July,2020</td>
                                                <td><i class="fa-solid fa-heart text-primary"></i></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="iq-movie">
                                                            <a href="javascript:void(0);"><img src="assets/dashboard/images/movie-thumb/01.jpg" class="img-border-radius avatar-40 img-fluid" alt="recentlyImg-02"></a>
                                                        </div>
                                                        <div class="text-start ms-3">
                                                            <p class="mb-0">Chamions</p>
                                                            <small>1h 40min</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="lar la-star me-2"></i>9.2</td>
                                                <td>Horror</td>
                                                <td>
                                                    <i class="fa-regular fa-eye"></i>
                                                </td>
                                                <td>Unsubcriber</td>
                                                <td>21 July,2020</td>
                                                <td><i class="fa-solid fa-heart text-primary"></i></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="iq-movie">
                                                            <a href="javascript:void(0);"><img src="assets/dashboard/images/movie-thumb/05.jpg" class="img-border-radius avatar-40 img-fluid" alt="recentlyImg-03"></a>
                                                        </div>
                                                        <div class="text-start ms-3">
                                                            <p class="mb-0">Last Race</p>
                                                            <small></small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="lar la-star me-2"></i>7.2</td>
                                                <td>Horror</td>
                                                <td>
                                                    <i class="fa-regular fa-eye"></i>
                                                </td>
                                                <td>Subcriber</td>
                                                <td>22 July,2020</td>
                                                <td><i class="fa-solid fa-heart text-primary"></i></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="iq-movie">
                                                            <a href="javascript:void(0);"><img src="assets/dashboard/images/movie-thumb/10.jpg" class="img-border-radius avatar-40 img-fluid" alt="recentlyImg-04"></a>
                                                        </div>
                                                        <div class="text-start ms-3">
                                                            <p class="mb-0">Dino Land</p>
                                                            <small></small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="lar la-star me-2"></i>8.5</td>
                                                <td>Action</td>
                                                <td>
                                                    <i class="fa-regular fa-eye"></i>
                                                </td>
                                                <td>Unsubcriber</td>
                                                <td>24 July,2020</td>
                                                <td><i class="fa-solid fa-heart text-primary"></i></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="iq-movie">
                                                            <a href="javascript:void(0);"><img src="assets/dashboard/images/movie-thumb/04.jpg" class="img-border-radius avatar-40 img-fluid" alt="recentlyImg-05"></a>
                                                        </div>
                                                        <div class="text-start ms-3">
                                                            <p class="mb-0">The Last Breath</p>
                                                            <small></small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="lar la-star me-2"></i>8.9</td>
                                                <td>Horror</td>
                                                <td>
                                                    <i class="fa-regular fa-eye"></i>
                                                </td>
                                                <td>Subcriber</td>
                                                <td>25 July,2020</td>
                                                <td><i class="fa-solid fa-heart text-primary"></i></td>
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
        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="footer-body">
                <ul class="left-panel list-inline mb-0 p-0">
                    <li class="list-inline-item"><a href="javascript:void(0);">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="javascript:void(0);">Terms of Use</a></li>
                </ul>
                <div class="right-panel">
                    ©<script>
                        2022
                    </script> <span data-setting="app_name">Streamit</span>, Made with
                    <span class="text-gray">
                        <svg class="icon-16" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z" fill="currentColor"></path>
                        </svg>
                    </span> by <a href="https://iqonic.design/" target="_blank">IQONIC Design</a>.
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </main>
    <!-- Wrapper End-->
    <!-- Live Customizer start -->
    <!-- Setting offcanvas start here -->
    <div class="offcanvas offcanvas-end live-customizer" tabindex="-1" id="live-customizer" data-bs-backdrop="false" data-bs-scroll="true" aria-labelledby="live-customizer-label" aria-modal="true" role="dialog">
        <div class="offcanvas-header pb-0">
            <div class="d-flex align-items-center">
                <h4 class="offcanvas-title" id="live-customizer-label">Setting Pannel</h4>
            </div>
            <div class="close-icon" data-bs-dismiss="offcanvas">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <div class="offcanvas-body data-scrollbar">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="text-center mb-4">
                            <h5 class="d-inline-block">Style Setting</h5>
                        </div>
                        <div>
                            <!-- Theme start here -->
                            <div class="mb-4">
                                <h5 class="mb-3">Theme</h5>
                                <div class=" mb-3" data-setting="radio">
                                    <div class="form-check mb-0 w-100">
                                        <input class="form-check-input custom-redio-btn" type="radio" value="light" name="theme_scheme" id="color-mode-light" checked="">
                                        <label class="form-check-label d-flex align-items-center justify-content-between" for="color-mode-light">
                                            <span>Light Theme</span>
                                            <div class="text-primary ">
                                                <svg width="60" height="27" viewBox="0 0 60 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125" fill="white"></rect>
                                                    <circle cx="9.75" cy="9.75" r="3.75" fill="#80868B"></circle>
                                                    <rect x="16.5" y="8.25" width="37.5" height="3" rx="1.5" fill="#DADCE0">
                                                    </rect>
                                                    <rect x="6" y="18" width="48" height="3" rx="1.5" fill="currentColor">
                                                    </rect>
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125" stroke="#DADCE0" stroke-width="0.75"></rect>
                                                </svg>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class=" mb-3" data-setting="radio">
                                    <div class="form-check mb-0 w-100 ">
                                        <input class="form-check-input custom-redio-btn" type="radio" value="dark" name="theme_scheme" id="color-mode-dark">
                                        <label class="form-check-label d-flex align-items-center justify-content-between" for="color-mode-dark">
                                            <span>Dark Theme</span>
                                            <div class="text-primary ">
                                                <svg width="60" height="27" viewBox="0 0 60 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125" fill="#1E2745"></rect>
                                                    <circle cx="9.75" cy="9.75" r="3.75" fill="#80868B"></circle>
                                                    <rect x="16.5" y="8.25" width="37.5" height="3" rx="1.5" fill="#DADCE0">
                                                    </rect>
                                                    <rect x="6" y="18" width="48" height="3" rx="1.5" fill="currentColor">
                                                    </rect>
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125" stroke="currentColor" stroke-width="0.75"></rect>
                                                </svg>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between" data-setting="radio">
                                    <div class="form-check mb-0 w-100">
                                        <input class="form-check-input custom-redio-btn" type="radio" value="auto" name="theme_scheme" id="color-mode-auto">
                                        <label class="form-check-label d-flex align-items-center justify-content-between" for="color-mode-auto">
                                            <span>Device Default</span>
                                            <div class="text-primary ">
                                                <svg class="rounded" width="60" height="27" viewBox="0 0 60 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125" fill="#1E2745"></rect>
                                                    <circle cx="9.75" cy="9.75" r="3.75" fill="#80868B"></circle>
                                                    <rect x="16.5" y="8.25" width="37.5" height="3" rx="1.5" fill="#DADCE0">
                                                    </rect>
                                                    <rect x="6" y="18" width="48" height="3" rx="1.5" fill="currentColor">
                                                    </rect>
                                                    <g clip-path="url(#clip0_507_92)">
                                                        <rect width="30" height="27" fill="white"></rect>
                                                        <circle cx="9.75" cy="9.75" r="3.75" fill="#80868B"></circle>
                                                        <rect x="16.5" y="8.25" width="37.5" height="3" rx="1.5" fill="#DADCE0"></rect>
                                                        <rect x="6" y="18" width="48" height="3" rx="1.5" fill="currentColor"></rect>
                                                    </g>
                                                    <rect x="0.375" y="0.375" width="59.25" height="26.25" rx="4.125" stroke="#DADCE0" stroke-width="0.75"></rect>
                                                    <defs>
                                                        <clipPath id="clip0_507_92">
                                                            <rect width="30" height="27" fill="white"></rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <!-- Color customizer end here -->
                            <hr class="hr-horizontal">
                            <!-- Menu start here -->
                            <div>
                                <h6 class="mt-4 mb-3">Menu Color</h6>
                                <div class="d-grid gap-3 grid-cols-3 mb-3">
                                    <div data-setting="radio">
                                        <input type="radio" value="sidebar-white" class="btn-check" name="sidebar_color" id="sidebar-white" checked="">
                                        <label class="btn btn-border d-block" for="sidebar-white" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="White Menu">
                                            Light
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="sidebar-dark" class="btn-check" name="sidebar_color" id="sidebar-dark">
                                        <label class="btn btn-border d-block" for="sidebar-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Dark Menu">
                                            Dark
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="sidebar-color" class="btn-check" name="sidebar_color" id="sidebar-color">
                                        <label class="btn btn-border d-block" for="sidebar-color" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Colored Menu">
                                            Color
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-horizontal">
                            <!-- Menu Style start here -->
                            <div>
                                <h5 class="mt-4 mb-3">Menu Style</h5>
                                <div class="d-grid gap-3 grid-cols-3 mb-4">
                                    <div data-setting="checkbox" class="text-center">
                                        <input type="checkbox" value="sidebar-mini" class="btn-check" name="sidebar_type" id="sidebar-mini">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden" for="sidebar-mini">
                                            Mini
                                        </label>
                                    </div>
                                    <div data-setting="checkbox" class="text-center">
                                        <input type="checkbox" value="sidebar-hover" data-extra="{target: '.sidebar', ClassListAdd: 'sidebar-mini'}" class="btn-check" name="sidebar_type" id="sidebar-hover">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden" for="sidebar-hover">
                                            Hover
                                        </label>
                                    </div>
                                    <div data-setting="checkbox" class="text-center">
                                        <input type="checkbox" value="sidebar-soft" class="btn-check" name="sidebar_type" id="sidebar-soft">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden" for="sidebar-soft">
                                            Soft
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Style end here -->

                            <hr class="hr-horizontal">

                            <!-- Active Menu Style start here -->

                            <div class="mb-4">
                                <h5 class="mt-4 mb-3">Active Menu Style</h5>
                                <div class="d-grid gap-3 grid-cols-2">
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-rounded" class="btn-check" name="sidebar_menu_style" id="navs-rounded">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden" for="navs-rounded">
                                            Rounded One
                                        </label>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-rounded-all" class="btn-check" name="sidebar_menu_style" id="navs-rounded-all">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden" for="navs-rounded-all">
                                            Rounded All
                                        </label>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-pill" class="btn-check" name="sidebar_menu_style" id="navs-pill">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden" for="navs-pill">
                                            Pill One Side
                                        </label>
                                    </div>
                                    <div data-setting="radio" class="text-center">
                                        <input type="radio" value="sidebar-default navs-pill-all" class="btn-check" name="sidebar_menu_style" id="navs-pill-all">
                                        <label class="btn btn-border btn-setting-panel d-block overflow-hidden" for="navs-pill-all">
                                            Pill All
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-horizontal">
                            <!-- Color customizer start here -->
                            <div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mt-4 mb-3">Color Customizer</h6>
                                    <div class="d-flex align-items-center">
                                        <a href="#custom-color" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="custom-color">Custom</a>
                                        <div data-setting="radio">
                                            <input type="radio" value="theme-color-default" class="btn-check" name="theme_color" id="theme-color-default" data-colors="{&quot;primary&quot;: &quot;#b00c1f&quot;, &quot;secondary&quot;: &quot;#aca4bc&quot;}">
                                            <label class="btn bg-transparent px-2 border-0" for="theme-color-default" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Reset Color" aria-label="Reset Color">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z" fill="#fff"></path>
                                                    <path d="M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z" fill="#fff"></path>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="custom-color">
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <label class="" for="custom-primary-color">Primary</label>
                                        <input class="" name="theme_color" data-extra="primary" type="color" id="custom-primary-color" value="#7016d0" data-setting="color">
                                    </div>
                                    <div class="form-group d-flex d-flex justify-content-between align-items-center">
                                        <label class="" for="custom-secondary-color">Secondary</label>
                                        <input class="" name="theme_color" data-extra="secondary" type="color" id="custom-secondary-color" value="#08B1BA" data-setting="color">
                                    </div>
                                </div>
                                <div class="grid-cols-2 mb-4 d-grid gap-3">
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-blue" class="btn-check" name="theme_color" id="theme-color-1" data-colors="{&quot;primary&quot;: &quot;#e50914&quot;, &quot;secondary&quot;: &quot;#adafb8&quot;, &quot;tertiray&quot;: &quot;#adafb8&quot;}">
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Theme-1" aria-label="Theme-1">
                                            Netflix
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-gray" class="btn-check" name="theme_color" id="theme-color-2" data-colors="{&quot;primary&quot;: &quot;#0959E4&quot;, &quot;secondary&quot;: &quot;#adafb8&quot;, &quot;tertiray&quot;: &quot;#EA4335&quot;}">
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Theme-2" aria-label="Theme-2">
                                            Hotstar
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-red" class="btn-check" name="theme_color" id="theme-color-3" data-colors="{&quot;primary&quot;: &quot;#1A98FF&quot;, &quot;secondary&quot;: &quot;#adafb8&quot;, &quot;tertiray&quot;: &quot;#89F425&quot;}">
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Theme-3" aria-label="Theme-3">
                                            Prime
                                        </label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="theme-color-yellow" class="btn-check" name="theme_color" id="theme-color-4" data-colors="{&quot;primary&quot;: &quot;#3ee783&quot;, &quot;secondary&quot;: &quot;#adafb8&quot;, &quot;tertiray&quot;: &quot;#0E0E0E&quot;}">
                                        <label class="btn btn-border d-block bg-transparent" for="theme-color-4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Theme-4" aria-label="Theme-4">
                                            Hulu
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Color customizer end here -->
                            <hr class="hr-horizontal">
                            <div>
                                <h6 class="d-inline-block mb-3 me-2">Page Style </h6>
                                <div class="d-grid gap-3 grid-cols-2 mb-4">
                                    <div data-setting="radio">
                                        <input type="radio" value="container" class="btn-check" name="page_layout" id="page-layout-boxed">
                                        <label class="btn btn-border d-block" for="page-layout-boxed">Boxed</label>
                                    </div>
                                    <div data-setting="radio">
                                        <input type="radio" value="container-fluid" class="btn-check" name="page_layout" id="page-layout-full-width" checked="">
                                        <label class="btn btn-border d-block" for="page-layout-full-width">Full
                                            Width</label>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr-horizontal">
                            <!-- Direction customizer start here -->
                            <div>
                                <h5 class="mb-3 mt-4">Direction</h5>
                                <div class=" mb-3" data-setting="radio">
                                    <div class="form-check mb-0 w-100">
                                        <input class="form-check-input custom-redio-btn" type="radio" value="ltr" name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-ltr" checked="">
                                        <label class="form-check-label d-flex align-items-center justify-content-between" for="theme-scheme-direction-ltr">
                                            <span>LTR</span>
                                            <svg class="text-primary" width="60" height="27" viewBox="0 0 60 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="11.5" cy="13.5002" r="6.5" fill="currentColor"></circle>
                                                <rect x="21" y="7.70026" width="34" height="5" rx="2" fill="#80868B"></rect>
                                                <rect opacity="0.5" x="21" y="16.1003" width="25.6281" height="3.2" rx="1.6" fill="#80868B"></rect>
                                                <rect x="0.375" y="0.375244" width="59.25" height="26.25" rx="4.125" stroke="currentColor" stroke-width="0.75"></rect>
                                            </svg>
                                        </label>
                                    </div>

                                </div>
                                <div class="mb-3" data-setting="radio">
                                    <div class="form-check mb-0 w-100">
                                        <input class="form-check-input custom-redio-btn" type="radio" value="rtl" name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-rtl">
                                        <label class="form-check-label d-flex align-items-center justify-content-between " for="theme-scheme-direction-rtl">
                                            <span>RTL</span>
                                            <svg class="text-primary" width="60" height="27" viewBox="0 0 60 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle r="6.5" transform="matrix(-1 0 0 1 48.5 13.5002)" fill="currentColor"></circle>
                                                <rect width="34" height="5" rx="2" transform="matrix(-1 0 0 1 39 7.70026)" fill="#80868B"></rect>
                                                <rect opacity="0.5" width="25.6281" height="3.2" rx="1.6" transform="matrix(-1 0 0 1 39 16.1003)" fill="#80868B"></rect>
                                                <rect x="-0.375" y="0.375" width="59.25" height="26.25" rx="4.125" transform="matrix(-1 0 0 1 59.25 0.000244141)" stroke="currentColor" stroke-width="0.75"></rect>
                                            </svg>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <!-- Direction customizer end here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Settings sidebar end here -->

    <a class="btn btn-fixed-end btn-warning btn-icon btn-setting" id="settingbutton" data-bs-toggle="offcanvas" data-bs-target="#live-customizer" role="button" aria-controls="live-customizer">
        <svg class="icon-24 animated-rotate" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
        </svg>
    </a> <!-- Live Customizer end -->

    <!-- Library Bundle Script -->
    <script src="assets/dashboard/js/core/libs.min.js"></script>
    <!-- Plugin Scripts -->
    <!-- Tour plugin Start -->
    <script src="assets/dashboard/vendor/sheperd/dist/js/sheperd.min.js"></script>
    <script src="assets/dashboard/js/plugins/tour.js" defer></script>


    <!-- Flatpickr Script -->
    <script src="assets/dashboard/vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/dashboard/js/plugins/flatpickr.js" defer></script>



    <!-- Select2 Script -->
    <script src="assets/dashboard/js/plugins/select2.js" defer></script>




    <!-- Slider-tab Script -->
    <script src="assets/dashboard/js/plugins/slider-tabs.js"></script>





    <!-- SwiperSlider Script -->
    <script src="assets/dashboard/vendor/swiperSlider/swiper-bundle.min.js"></script>
    <script src="assets/dashboard/js/plugins/swiper-slider.js" defer></script>
    <!-- Lodash Utility -->
    <script src="assets/dashboard/vendor/lodash/lodash.min.js"></script>
    <!-- Utilities Functions -->
    <script src="assets/dashboard/js/iqonic-script/utility.min.js"></script>
    <!-- Settings Script -->
    <script src="assets/dashboard/js/iqonic-script/setting.min.js"></script>
    <!-- Settings Init Script -->
    <script src="assets/dashboard/js/setting-init.js"></script>
    <!-- External Library Bundle Script -->
    <script src="assets/dashboard/js/core/external.min.js"></script>
    <!-- Widgetchart Script -->
    <script src="assets/dashboard/js/charts/widgetcharts.js?v=1.0.1" defer></script>
    <!-- Dashboard Script -->
    <script src="assets/dashboard/js/charts/dashboard.js?v=1.0.1" defer></script>
    <!-- qompacui Script -->
    <script src="assets/dashboard/js/streamit.js?v=1.0.1" defer></script>
    <script src="assets/dashboard/js/sidebar.js?v=1.0.1" defer></script>
    <script src="assets/dashboard/js/chart-custom.js?v=1.0.1" defer></script>

    <script src="assets/dashboard/js/plugins/select2.js?v=1.0.1" defer></script>

    <script src="assets/dashboard/js/plugins/flatpickr.js?v=1.0.1" defer></script>

</body>

</html>