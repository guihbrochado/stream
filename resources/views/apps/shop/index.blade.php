<!doctype html>
<html lang="en" data-bs-theme="dark">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.css" rel="stylesheet">

        @include('layouts.title-meta')
        @include('layouts.head')

        <!-- Scripts -->
        @vite(['resources/js/app.js'])

        <style>
            /* Adicione ao seu arquivo CSS ou dentro da tag <style> no HTML */
            .custom-wishlist-btn {
                background-color: transparent;
                border: none;
                color: inherit;
                cursor: pointer;
                padding: 0;
            }

            .custom-wishlist-btn:hover {
                color: #FF0000; /* Exemplo de cor de hover */
            }
        </style>
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
                                            <img src="assets/images/shop/product/02.webp" width="90" alt="product-image" class="img-fluid object-cover">
                                        </div>
                                        <div class="cart-block-content position-relative flex-grow-1 pe-5">
                                            <h6 class="mb-36 text-capitalize">Believe Mask</h6>
                                            <span class="text-primary small">$13.00</span>
                                            <div class="mt-3">
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
                                            <img src="assets/images/shop/product/04.webp" width="90" alt="product-image" class="img-fluid object-cover">
                                        </div>
                                        <div class="cart-block-content position-relative flex-grow-1 pe-5">
                                            <h6 class="mb-36 text-capitalize">Black Cap</h6>
                                            <span class="text-primary small">$18.00</span>
                                            <div class="mt-3">
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
                                            <img src="assets/images/shop/product/05.webp" width="90" alt="product-image" class="img-fluid object-cover">
                                        </div>
                                        <div class="cart-block-content position-relative flex-grow-1 pe-5">
                                            <h6 class="mb-36 text-capitalize">Boxing Gloves</h6>
                                            <span class="text-primary small">$18.00</span>
                                            <div class="mt-3">
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
            </div> <!--Nav End-->

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
            </div> <!--bread-crumb-->

            <div class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="pe-3">
                                <div class="shop-box">
                                    <h5 class="mb-4 text-uppercase">Categorias</h5>
                                    <ul class="list-unstyled p-0 m-0 shop-list-checkbox">
                                        @foreach ($categories as $row)
                                        <li>
                                            {{$row->nome}} (4)
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="shop-box">
                                    <h5 class="">FILTRAR PREÇO </h5>
                                    <div class="form-group my-4 product-range">
                                        <div class="range-slider" id="product-price-range"></div>
                                    </div>
                                    <div class=" d-flex align-items-center my-3">
                                        <small>Preço: &nbsp;</small>
                                        <small id="lower-value">&nbsp; $11</small>
                                        <small id="lower-value1">&nbsp; - &nbsp;</small>
                                        <small id="upper-value">&nbsp;$50</small>
                                    </div>
                                </div>
                                <div class="shop-box border-bottom-0">
                                    <h5 class="mb-4">PRODUTOS</h5>
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
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <div class="d-flex align-items-center justify-content-between mb-5 shop-filter flex-wrap">
                                <p>Showing 1–10 of 31 results </p>
                                <div class="d-flex align-items-center ">
                                    <div class="product-view-button">
                                        <ul class="nav_shop nav d-flex nav-pills mb-0 iq-product-filter d-flex bg-transparent align-items-center list-inline" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link btn-sm btn-icon rounded-pill p-0 active" id="grid-three-view-tab" data-bs-toggle="pill" data-bs-target="#pills-grid-three-view-tab" type="button" role="tab" aria-controls="pills-grid-three-view-tab" aria-selected="false">
                                                    <span class="btn-inner">
                                                        <svg class="hover_effect active_effect" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                        <path d="M11.4545 13.0908H6.54541V17.9999H11.4545V13.0908Z" fill=""></path>
                                                        <path d="M17.9999 13.0908H13.0908V17.9999H17.9999V13.0908Z" fill=""></path>
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
                                <div class="tab-pane fade show active" id="pills-grid-three-view-tab" role="tabpanel" aria-labelledby="grid-three-view-tab">
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                                        @foreach($products as $product)
                                        <div class="col">

                                            <div class="product-block">
                                                <span class="onsale bg-primary">
                                                    Sale!
                                                </span>
                                                <div class="image-wrap">
                                                    <a href="{{ url('shop/product-detail', $product->id) }}">
                                                        <div class="product-image">
                                                            <img src="{{ asset($product->imagem) }}" class="img-fluid w-100" alt="{{ $product->nome }}" loading="lazy" />
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
                                                                <form action="{{ route('wishlist.add') }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                    <button type="submit" class="custom-wishlist-btn">
                                                                        <i class="fa-solid fa-heart"></i>
                                                                    </button>
                                                                </form>
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
                                                        <a href="{{ url('shop/product-detail', $product->id) }}" class="title-link">
                                                            {{ $product->nome }}</a>
                                                    </h5>
                                                    <div class="price-detail">
                                                        <div class="price">
                                                            {{-- Adicione aqui a lógica para preço com desconto, se houver --}}
                                                            <del>{{ $product->preco_antigo ? 'R$' . $product->preco_antigo : '' }}</del>R${{ $product->preco }}
                                                        </div>
                                                    </div>
                                                    <div class="container-rating">
                                                        {{-- Aqui você pode incluir a lógica de classificação, caso exista --}}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
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
                            <button type="button" class="btn-close position-absolute end-0" data-bs-dismiss="modal" aria-label="Close"></button>
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
        <div id="back-to-top" style="display: none;">
            <a class="p-0 btn bg-primary btn-sm position-fixed top border-0 rounded-circle" id="top" href="#top">
                <i class="fa-solid fa-chevron-up"></i>
            </a>
        </div>
        @include('layouts.vendor-scripts')
        <script src="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
document.addEventListener('DOMContentLoaded', (event) => {
    var priceRange = document.getElementById('product-price-range');
    var products = document.querySelectorAll('.product-block');

    noUiSlider.create(priceRange, {
        start: [0, 2000],
        connect: true,
        range: {
            'min': 0,
            'max': 2000
        },
        format: {
            to: function (value) {
                return value.toFixed(2);
            },
            from: function (value) {
                return Number(value);
            }
        }
    });

    priceRange.noUiSlider.on('update', function (values, handle) {
        var minValue = parseFloat(values[0]);
        var maxValue = parseFloat(values[1]);

        products.forEach(function (product) {
            var priceText = product.querySelector('.price').textContent;
            var price = parseFloat(priceText.replace('R$', '').replace(',', '.'));
            if (price >= minValue && price <= maxValue) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });

        document.getElementById('lower-value').textContent = 'R$' + values[0];
        document.getElementById('upper-value').textContent = 'R$' + values[1];
    });
});

$(document).ready(function () {
    $('.season-select').on('change', function () {
        var selectedOption = $(this).find('option:selected').text();
        var $products = $('.product-list .product');

        switch (selectedOption) {
            case 'Default sorting':
                // Implementar lógica de ordenação padrão, por exemplo, por ID
                $products.sort(function (a, b) {
                    return $(a).data('id') - $(b).data('id');
                });
                break;
            case 'Sort by popularity':
                $products.sort(function (a, b) {
                    return $(b).data('popularity') - $(a).data('popularity');
                });
                break;
            case 'Sort by average rating':
                $products.sort(function (a, b) {
                    return $(b).data('rating') - $(a).data('rating');
                });
                break;
            case 'Sort by latest':
                // Implementar lógica de ordenação por novidade, por exemplo, data de adição
                $products.sort(function (a, b) {
                    return new Date($(b).data('date-added')) - new Date($(a).data('date-added'));
                });
                break;
            case 'Sort by price: low to high':
                $products.sort(function (a, b) {
                    return parseFloat($(a).data('price')) - parseFloat($(b).data('price'));
                });
                break;
            case 'Sort by price: high to low':
                $products.sort(function (a, b) {
                    return parseFloat($(b).data('price')) - parseFloat($(a).data('price'));
                });
                break;
        }
        $('.product-list').html($products);
    })
})
        </script>

    </body>

</html>