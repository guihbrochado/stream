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
                          <h2 class="title">My Account</h2>
                          <ol class="breadcrumb justify-content-center">
                              <li class="breadcrumb-item"><a href="index.html">Home</a></li> 
                              <li class="breadcrumb-item active">My Account</li>
                          </ol>
                      </nav>
                  </div>
              </div> 
         </div>
      </div>      <!--bread-crumb-->

<div class="section-padding service-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="acc-left-menu p-4 mb-5 mb-lg-0 mb-md-0">
                    <div class="product-menu">
                        <ul class="list-inline m-0 nav nav-tabs flex-column bg-transparent border-0" role="tablist">
                            <li class="pb-3 nav-item">
                                <button class="nav-link active p-0 bg-transparent" data-bs-toggle="tab"
                                    data-bs-target="#dashboard" type="button" role="tab" aria-selected="true"><i
                                        class="fas fa-tachometer-alt"></i><span class="ms-2">Dashboard</span></button>
                            </li>
                            <li class="py-3 nav-item">
                                <button class="nav-link p-0 bg-transparent" data-bs-toggle="tab"
                                    data-bs-target="#orders" type="button" role="tab" aria-selected="true"><i
                                        class="fas fa-list"></i><span class="ms-2">Orders</span></button>
                            </li>
                            <li class="py-3 nav-item">
                                <button class="nav-link p-0 bg-transparent" data-bs-toggle="tab"
                                    data-bs-target="#downloads" type="button" role="tab" aria-selected="true"><i
                                        class="fas fa-download"></i><span class="ms-2">Downloads</span></button>
                            </li>
                            <li class="py-3 nav-item">
                                <button class="nav-link p-0 bg-transparent" data-bs-toggle="tab"
                                    data-bs-target="#address" type="button" role="tab" aria-selected="true"><i
                                        class="fas fa-map-marker-alt"></i><span class="ms-2">Address</span></button>
                            </li>
                            <li class="py-3 nav-item">
                                <button class="nav-link p-0 bg-transparent" data-bs-toggle="tab"
                                    data-bs-target="#account-details" type="button" role="tab" aria-selected="true"><i
                                        class="fas fa-user"></i><span class="ms-2">Account details</span></button>
                            </li>
                            <li class="pt-3 nav-item">
                                <button class="nav-link p-0 bg-transparent" data-bs-toggle="tab"
                                    data-bs-target="#logout" type="button" role="tab" aria-selected="true"><i
                                        class="fas fa-sign-out-alt"></i><span class="ms-2">Logout</span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content" id="product-menu-content">
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                        <div class="myaccount-content text-body p-4">
                            <p>Hello Jenny (not Jenny? <a href="login.html">Log out</a>)</p>
                            <p>From your account dashboard you can view your <a href="javascript:void(0)">recent orders</a>,
                                manage your <a href="javascript:void(0)">shipping and billing addresses</a>, and <a href="javascript:void(0)">edit your password and account details</a>.
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="orders-table text-body p-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="border-bottom">
                                            <th class="fw-bolder p-3">Order</th>
                                            <th class="fw-bolder p-3">Date</th>
                                            <th class="fw-bolder p-3">Status</th>
                                            <th class="fw-bolder p-3">Total</th>
                                            <th class="fw-bolder p-3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-bottom">
                                            <td class="text-primary fs-6">#32604</td>
                                            <td>October 28, 2022</td>
                                            <td>Cancelled</td>
                                            <td>$215.00 For 0 Items</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">pay</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">view</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">cancel</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td class="text-primary fs-6">#32584</td>
                                            <td>October 27, 2022</td>
                                            <td>On Hold</td>
                                            <td>$522.00 For 0 Items</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">pay</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">view</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">cancel</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td class="text-primary fs-6">#31756</td>
                                            <td>October 19, 2022</td>
                                            <td>Processing</td>
                                            <td>$243.00 For 0 Items</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">pay</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">view</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">cancel</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td class="text-primary fs-6">#23663</td>
                                            <td>October 7, 2022</td>
                                            <td>Completed</td>
                                            <td>$123.00 For 0 Items</td>
                                            <td class="fs-6">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">view</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td class="text-primary fs-6">#23612</td>
                                            <td>October 7, 2022</td>
                                            <td>Completed</td>
                                            <td>$64.00 For 0 Items</td>
                                            <td class="fs-6">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">view</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-primary fs-6">#19243</td>
                                            <td>April 1, 2022</td>
                                            <td>Completed</td>
                                            <td>$159.00 For 0 Items</td>
                                            <td class="fs-6">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">view</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="downloads" role="tabpanel">
                        <div class="orders-table text-body p-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="border-bottom">
                                            <th class="fw-bolder p-3">Product</th>
                                            <th class="fw-bolder p-3">Downloads Remaining</th>
                                            <th class="fw-bolder p-3">Expires</th>
                                            <th class="fw-bolder p-3">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-3 fs-6">Electric Toothbrush</td>
                                            <td class="p-3">∞</td>
                                            <td class="p-3 fs-6">Never</td>
                                            <td class="p-3"><a href="#" class="p-2 bg-primary text-white fs-6"
                                                    download>Product
                                                    Demo</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="address" role="tabpanel">
                        <div class="text-body p-4">
                            <p class="my-3">The following addresses will be used on the checkout page by default.</p>
                            <div class="d-flex align-items-center justify-content-between my-5 gap-2 flex-wrap">
                                <h4 class="mb-0">Billing Address.</h4>
                                <div class="iq-button">
                                    <a href="#" class="btn text-uppercase position-relative" data-bs-toggle="collapse"
                                    data-bs-target="#edit-address-1" aria-expanded="false">
                                        <span class="button-text">Edit</span>
                                        <i class="fa-solid fa-play"></i>
                                    </a>
                                </div>                                
                            </div>
                            <div id="edit-address-1" class="collapse">
                                <div class="text-body mb-4">
                                    <form>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">First name&nbsp; <span class="text-danger">*</span></label>
                                            <input type="text" name="first-name" value="John" class="form-control" required="required">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Last name&nbsp; <span class="text-danger">*</span></label>
                                            <input type="text" name="last-name" value="deo" class="form-control" required="required">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Company name (optional)</label>
                                            <input type="text" name="last-name" value="Iqonic Design" class="form-control">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Country / Region &nbsp; <span class="text-danger">*</span></label>
                                            <div class="mb-5">
                                                <select class="select2-basic-single js-states form-control" aria-label="select country"
                                                    required="required">
                                                    <option value="" selected>Choose a country</option>
                                                    <option value="1">India</option>
                                                    <option value="2">United Kingdom</option>
                                                    <option value="3">United States</option>
                                                    <option value="4">Australia</option>
                                                    <option value="5">North Corea</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Street address&nbsp; <span class="text-danger">*</span></label>
                                            <input type="text" name="address" placeholder="House number and street name"
                                                value="4517 Kentucky" class="form-control mb-3 rounded-0"
                                                required="required">
                                            <input type="text" name="address" placeholder="Apartment, suite, unit, etc. (optional)"
                                                class="form-control">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Town / City&nbsp; <span class="text-danger">*</span></label>
                                            <input type="text" name="city" value="Navsari" class="form-control" required="required">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">State&nbsp; <span class="text-danger">*</span></label>
                                            <div class="mb-5">
                                                <select class="select2-basic-single js-states form-control" aria-label="select state">
                                                    <option value="" selected>Choose a State</option>
                                                    <option value="1">Gujarat</option>
                                                    <option value="2">Delhi</option>
                                                    <option value="3">Goa</option>
                                                    <option value="4">Haryana</option>
                                                    <option value="5">Ladakh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">PIN code&nbsp; <span class="text-danger">*</span></label>
                                            <input type="text" name="pin code" value="396321" class="form-control" required="required">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Phone&nbsp; <span class="text-danger">*</span></label>
                                            <input type="tel" name="number" value="1234567890" class="form-control" required="required">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Email address&nbsp; <span class="text-danger">*</span></label>
                                            <input type="email" name="email" value="johndeo@gmail.com" class="form-control" required="required">
                                        </div>
                                        <div class="form-group mb-5">
                                            <div class="iq-button">
                                                <a href="" class="btn text-uppercase position-relative">
                                                    <span class="button-text">Save Address</span>
                                                    <i class="fa-solid fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="edit-address w-100">
                                    <tr>
                                        <td class="label-name p-2">Name</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">john deo</td>
                                    </tr>
                                    <tr>
                                        <td class="label-name p-2">Company</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">Iqonic Design</td>
                                    </tr>
                                    <tr>
                                        <td class="label-name p-2">Country</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">India</td>
                                    </tr>
                                    <tr>
                                        <td class="label-name p-2">Address</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">4517 Washington Ave, Manchester.</td>
                                    </tr>
                                    <tr>
                                        <td class="label-name p-2">E-mail</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">johndeo@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td class="label-name p-2">Phone</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">1234567890</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="d-flex align-items-center justify-content-between my-5 gap-2 flex-wrap">
                                <h4 class="mb-0">Shipping Address</h4>
                                <div class="iq-button">
                                    <a href="#" class="btn text-uppercase position-relative" data-bs-toggle="collapse"
                                    data-bs-target="#edit-address-2" aria-expanded="false">
                                        <span class="button-text">Edit</span>
                                        <i class="fa-solid fa-play"></i>
                                    </a>
                                </div>                               
                            </div>
                            <div id="edit-address-2" class="collapse">
                                <div class="text-body mb-4">
                                    <form>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">First name&nbsp; <span class="text-danger">*</span></label>
                                            <input type="text" name="first-name" value="John" class="form-control" required="required">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Last name&nbsp; <span class="text-danger">*</span></label>
                                            <input type="text" name="last-name" value="deo" class="form-control" required="required">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Company name (optional)</label>
                                            <input type="text" name="last-name" value="Iqonic Design" class="form-control">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Country / Region &nbsp; <span class="text-danger">*</span></label>
                                            <div class="mb-5">
                                                <select class="select2-basic-single js-states" aria-label="select country"
                                                    required="required">
                                                    <option value="" selected>Choose a country</option>
                                                    <option value="1">India</option>
                                                    <option value="2">United Kingdom</option>
                                                    <option value="3">United States</option>
                                                    <option value="4">Australia</option>
                                                    <option value="5">North Corea</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Street address&nbsp; <span class="text-danger">*</span></label>
                                            <input type="text" name="address" placeholder="House number and street name"
                                                value="4517 Kentucky" class="form-control mb-3 rounded-0" required="required">
                                            <input type="text" name="address" placeholder="Apartment, suite, unit, etc. (optional)"
                                                class="form-control mb-5 rounded-0">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Town / City&nbsp; <span class="text-danger">*</span></label>
                                            <input type="text" name="city" value="Navsari" class="form-control" required="required">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">State&nbsp; <span class="text-danger">*</span></label>
                                            <div class="mb-5">
                                                <select class="select2-basic-single js-states" aria-label="select state">
                                                    <option value="" selected>Choose a State</option>
                                                    <option value="1">Gujarat</option>
                                                    <option value="2">Delhi</option>
                                                    <option value="3">Goa</option>
                                                    <option value="4">Haryana</option>
                                                    <option value="5">Ladakh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">PIN code&nbsp; <span class="text-danger">*</span></label>
                                            <input type="text" name="pin code" value="396321" class="form-control" required="required">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Phone&nbsp; <span class="text-danger">*</span></label>
                                            <input type="tel" name="number" value="1234567890" class="form-control" required="required">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="mb-2">Email address&nbsp; <span
                                                class="text-danger">*</span></label>
                                            <input type="email" name="email" value="johndeo@gmail.com" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <div class="iq-button">
                                                <a href="" class="btn text-uppercase position-relative">
                                                    <span class="button-text">Save Address</span>
                                                    <i class="fa-solid fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="edit-address w-100">
                                    <tr>
                                        <td class="label-name p-2">Name</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">john deo</td>
                                    </tr>
                                    <tr>
                                        <td class="label-name p-2">Company</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">Iqonic Design</td>
                                    </tr>
                                    <tr>
                                        <td class="label-name p-2">Country</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">India</td>
                                    </tr>
                                    <tr>
                                        <td class="label-name p-2">Address</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">4517 Washington Ave, Manchester.</td>
                                    </tr>
                                    <tr>
                                        <td class="label-name p-2">E-mail</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">johndeo@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td class="label-name p-2">Phone</td>
                                        <td class="seprator p-2"><span>:</span></td>
                                        <td class="p-2">1234567890</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-details" role="tabpanel">
                        <div class=" p-4 text-body">
                            <form>
                                <div class="form-group mb-5">
                                    <label class="mb-2">First name&nbsp; <span class="text-danger">*</span></label>
                                    <input type="text" name="first-name" value="John" class="form-control" required="required">
                                </div>
                                <div class="form-group mb-5">
                                    <label class="mb-2">Last name&nbsp; <span class="text-danger">*</span></label>
                                    <input type="text" name="last-name" value="deo" class="form-control" required="required">
                                </div>
                                <div class="form-group mb-5">
                                    <label class="mb-2">Display name&nbsp; <span class="text-danger">*</span></label>
                                    <input type="text" name="display-name" value="John" class="form-control" required="required">
                                </div>
                                 <em class="d-block mb-5">This will be how your name will be displayed in the account
                                    section and in reviews</em>
                                <div class="form-group mb-5">
                                    <label class="mb-2">Email address&nbsp; <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="johndeo@gmail.com" class="form-control" required="required">
                                </div>
                                <h4 class="fw-normal mb-5">Password change</h4>
                                <div class="form-group mb-5">
                                    <label class="mb-2">Current password (leave blank to leave unchanged)</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group mb-5">
                                    <label class="mb-2">New password (leave blank to leave unchanged)</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group mb-5">
                                    <label class="mb-2">Confirm new password</label>
                                    <input type="password" name="password" class="form-control">  
                                </div>
                                <div class="form-group">
                                    <div class="iq-button">
                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                            <span class="button-text">save changes</span>
                                            <i class="fa-solid fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="logout" role="tabpanel">
                        <div class="p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-5 text-primary">Login</h4>
                                    <form method="post">
                                        <div class="mb-4">
                                            <input type="text" name="user-name" class="form-control" placeholder="Username or email address *" required>
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                                        </div>                                  
                                        <label class="custom-form-field mb-5">
                                            <input type="checkbox" required="required" class="mr-2">
                                            <span class="checkmark"></span>
                                            <span>Remember me</span>
                                        </label>
                                        <div class="iq-button">
                                            <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                <span class="button-text">Login</span>
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                        </div>
                                    </form>
                                    <div class="mt-3">
                                        <div class="iq-button link-button">
                                            <a href="javascript:void(0)" class="btn text-capitalize position-relative">
                                                <span class="button-text">Lost your password?</span>
                                            </a>
                                        </div>
                                    </div>                           
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-5 mt-5 mt-lg-0 mt-md-0 text-primary">Register</h4>
                                    <form method="post">
                                        <div class="mb-4">
                                            <input type="text" name="user-name" placeholder="Username *" class="form-control" required>
                                        </div>
                                        <div class="mb-4">
                                            <input type="email" name="email-address" placeholder="Email address *" class="form-control" required>
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" name="password" placeholder="Password *"
                                            class="form-control" required>
                                        </div>                                                                    
                                        <p class="mb-5"> Your personal data will be used to support your experience
                                            throughout this
                                            website, to manage access to your account, and for other purposes described in
                                            our <a href="privacy-policy.html"> privacy policy</a>.
                                        </p>
                                        <div class="iq-button">
                                            <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                <span class="button-text">register</span>
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                        </div>
                                    </form>
                                </div>
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