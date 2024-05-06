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
                                <h2 class="title">Checkout</h2>
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li> 
                                    <li class="breadcrumb-item active">Checkout</li>
                                </ol>
                            </nav>
                        </div>
                    </div> 
                </div>
            </div>      <!--bread-crumb-->

            <div class="checkout-page  section-padding">
                <div class="container">
                    <div class="main-cart mb-3 mb-md-5 pb-0 pb-md-5">
                        <ul class="cart-page-items d-flex justify-content-center list-inline align-items-center gap-3 gap-md-5 flex-wrap">
                            <li class="cart-page-item">
                                <span class=" cart-pre-number  border-radius rounded-circle me-1"> 1 </span>
                                <span class="cart-page-link ">
                                    Carrinho</span>
                            </li>
                            <li class="cart-page-item">
                                <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12 21.2498C17.108 21.2498 21.25 17.1088 21.25 11.9998C21.25 6.89176 17.108 2.74976 12 2.74976C6.892 2.74976 2.75 6.89176 2.75 11.9998C2.75 17.1088 6.892 21.2498 12 21.2498Z"
                                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M10.5576 15.4709L14.0436 11.9999L10.5576 8.52895" stroke="currentColor"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </li>
                            <li class="cart-page-item  active">
                                <span class="cart-pre-heading badge cart-pre-number bg-primary border-radius rounded-circle me-1">
                                    2 </span>
                                <span class="cart-page-link ">
                                    Checkout </span>
                            </li>
                            <li class="cart-page-item">
                                <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12 21.2498C17.108 21.2498 21.25 17.1088 21.25 11.9998C21.25 6.89176 17.108 2.74976 12 2.74976C6.892 2.74976 2.75 6.89176 2.75 11.9998C2.75 17.1088 6.892 21.2498 12 21.2498Z"
                                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M10.5576 15.4709L14.0436 11.9999L10.5576 8.52895" stroke="currentColor"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </li>
                            <li class="cart-page-item ">
                                <span class=" cart-pre-number  border-radius rounded-circle me-1"> 3 </span>
                                <span class="cart-page-link ">
                                    Resumo </span>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-5">
                        <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                            <div class="woocommerce-info">
                                <span class="text-primary"><i class="fa-solid fa-percent"></i></span>
                                <span class="text-body ps-2">Possuí cupom?</span>
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#apply-coupon" class="text-white">Clique aqui para inserir seu código</a>
                            </div>                    
                        </div>
                        <div id="apply-coupon" class="collapse mt-5">
                            <form class="checkout-coupon">
                                <p class="mt-0">Se você tiver um código de cupom, aplique-o abaixo.</p>
                                <div class="iq-checkout-coupon">
                                    <input name="coupon-code" type="text" required="required" placeholder="Coupon code" class="form-control">
                                    <div class="iq-button">
                                        <a href="#" class="btn text-uppercase position-relative">
                                            <span class="button-text">Aplicar cupom</span>
                                            <i class="fa-solid fa-play"></i>
                                        </a>
                                    </div>
                                </div>               
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-7">
                            <form action="order-received.html">
                                <h5 class="mb-4">Detalhes de cobrança</h5>
                                <div class="mb-4">
                                    <input name="first-name" type="text" required="required" placeholder="First Name" class="form-control" value="{{ $user->name ?? '' }}">
                                </div>
                                <div class="mb-4">
                                    <input name="phone" type="tel" required="required" placeholder="Phone Number" class="form-control" value="{{ $user->phone ?? '' }}">
                                </div>
                                <div class="mb-4">
                                    <input name="billing-email" type="email" required="required" placeholder="E-mail Address" class="form-control" value="{{ $user->email ?? '' }}">
                                </div>
                                <div class="mb-4">
                                    <input name="billing-address" type="text" required="required" placeholder="House number and street name" class="form-control" value="{{ $address->street ?? '' }}">
                                </div>
                                <div class="mb-4">
                                    <input name="city" type="text" required="required" placeholder="Town / City" class="form-control" value="{{ $address->city ?? '' }}">
                                </div>
                                <div class="mb-4">
                                    <input name="city" type="text" required="required" placeholder="Town / City" class="form-control" value="{{ $address->district ?? '' }}">
                                </div>
                                <div class="mb-4">
                                    <input name="city" type="text" required="required" placeholder="Town / City" class="form-control" value="{{ $address->state ?? '' }}">
                                </div>                               
                            </form>
                        </div>
                        <div class="col-lg-4 col-md-5">
                            <div class="order_review-box border p-4">
                                <h5 class="mb-3 mt-0 mt-md-2">Product</h5>
                                <div class="checkout-review-order">
                                    <div class="table-responsive">
                                        <table class="table w-100">
                                            <tbody>
                                                @foreach ($cart->cartItems as $item)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        <div class="product-image">
                                                            <!-- Certifique-se de usar a função asset corretamente para o caminho da imagem -->
                                                            <img width="300" height="400" src="{{ asset('' . $item->product->imagem) }}" class="cartimg" alt="{{ $item->product->nome }}" loading="lazy">
                                                        </div>
                                                        <div class="text">
                                                            <span class="fw-500 text-body">{{ $item->product->nome }}</span><br>
                                                            <strong class="text-white font-size-12 fw-bold">QTY:&nbsp;{{ $item->quantity }}</strong>
                                                        </div>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="Price-amount"><bdi class="fw-500 text-body"><span>$</span>{{ number_format($item->price * $item->quantity, 2) }}</bdi></span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="border-bottom">
                                                    <td class="ps-0 p-3 fw-500 font-size-18">Subtotal</td>
                                                    <td class="pe-0 p-3 fw-500 text-end">
                                                        <span class="mb-0 text-body">${{ number_format($subtotal, 2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="ps-0 p-3 fw-500 font-size-18">Total</td>
                                                    <td class="pe-0 p-3 fw-500 text-end">
                                                        <span class="text-primary mb-0">${{ number_format($total, 2) }}</span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="checkout-payment mt-4 pt-3 pb-2">
                                            <div class="payment-box border-bottom mb-5 pb-4">
                                                <div class="accordion" id="accordionPayment">
                                                    <div class="accordion-item-payment">
                                                        <h6 class="accordion-header" id="payment-1">
                                                            <div class="accordion-button-payment" data-bs-toggle="collapse" data-bs-target="#collapseOnepayment" aria-expanded="true" aria-controls="collapseOnepayment">
                                                                <span class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked="checked">
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        Direct bank transfer
                                                                    </label>
                                                                </span>                                                    
                                                            </div>
                                                        </h6>
                                                        <div id="collapseOnepayment" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment">
                                                            <div class="accordion-body">
                                                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item-payment">
                                                        <h6 class="accordion-header" id="payment-2">
                                                            <div class="accordion-button-payment collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwopayment" aria-expanded="false" aria-controls="collapseTwopayment">
                                                                <span class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                                        Check payments
                                                                    </label>
                                                                </span>                                                    
                                                            </div>
                                                        </h6>
                                                        <div id="collapseTwopayment" class="accordion-collapse collapse" aria-labelledby="payment-2" data-bs-parent="#accordionPayment">
                                                            <div class="accordion-body">
                                                                Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item-payment">
                                                        <h6 class="accordion-header" id="payment-3">
                                                            <div class="accordion-button-payment collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThreepayment" aria-expanded="false" aria-controls="collapseThreepayment">
                                                                <span class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                                        Cash on delivery
                                                                    </label>
                                                                </span> 
                                                            </div>
                                                        </h6>
                                                        <div id="collapseThreepayment" class="accordion-collapse collapse" aria-labelledby="payment-3" data-bs-parent="#accordionPayment">
                                                            <div class="accordion-body">
                                                                Pay with cash upon delivery.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-5">
                                                Os seus dados pessoais serão utilizados para processar a sua encomenda,
                                                apoiar a sua experiência neste site e para outros fins descritos na nossa. <a href="{{ url('/usage_policy') }}">política de privacidade</a>
                                                .</p>
                                            <div class="iq-button">
                                                <a href="order-tracking.html" class="btn text-uppercase position-relative">
                                                    <span class="button-text">Finalizar pedido</span>
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
            </div>
        </main>

        <div id="back-to-top" style="display: none;">
            <a class="p-0 btn bg-primary btn-sm position-fixed top border-0 rounded-circle" id="top" href="#top">
                <i class="fa-solid fa-chevron-up"></i>
            </a>
        </div>
        @include('layouts.vendor-scripts')
    </body>

</html>