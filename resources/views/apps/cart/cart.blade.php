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
                                    Carrinho de compras </span>
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
                                            <th scope="col" class="font-size-18 fw-500">Produto</th>
                                            <th scope="col" class="font-size-18 fw-500">Preço</th>
                                            <th scope="col" class="font-size-18 fw-500">Quantidade</th>
                                            <th scope="col" class="font-size-18 fw-500">Subtotal</th>
                                            <th scope="col" class="font-size-18 fw-500"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cart->cartItems ?? [] as $item)
                                        <tr data-item="list">
                                            <td>
                                                <div class="product-thumbnail d-flex align-items-center gap-3">
                                                    <a class="d-block mb-2" href="#">
                                                        <img class="avatar-80" src="{{ asset('' . $item->product->imagem) }}" alt="{{ $item->product->nome }}">
                                                    </a>
                                                    <span class="text-white">{{ $item->product->nome }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="fw-500">${{ number_format($item->product->preco, 2) }}</span>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('cart.update', $item->id) }}" class="d-flex align-items-center">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="number" class="form-control text-center" name="quantity" value="{{ $item->quantity }}" min="1" style="width: auto;">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm ms-2">
                                                        <i class="fas fa-sync"></i> <!-- Ícone de atualizar -->
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <span class="fw-500">${{ number_format($item->quantity * $item->product->preco, 2) }}</span>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        <i class="fas fa-trash"></i> <!-- Ícone de lixeira -->
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5">Carrinho vazio</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="coupon-main d-flex justify-content-between  gap-5 flex-wrap align-items-center pt-4 pb-5 border-bottom">
                                <div class="wrap-coupon d-flex align-items-center gap-3 flex-wrap">
                                    <label>Cupom:</label>
                                    <form action="{{ route('apply.coupon') }}" method="POST" class="d-flex align-items-center gap-3">
                                        @csrf
                                        <input class="form-control d-inline-block w-auto me-2" name="coupon_code" type="text" placeholder="Código">
                                        <button type="submit" class="btn text-uppercase">
                                            Aplicar Cupom <i class="fa-solid fa-play"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart_totals p-4">
                                <h5 class="mb-3 font-size-18 fw-500">Total</h5>
                                <div class="css_prefix-woocommerce-cart-box table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th class="border-0"><span class="fw-500">Subtotal</span></th>
                                                <td class="border-0">
                                                    <span>R${{ session('subtotal', $subtotal) }}</span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th class="border-0"><span class="fw-500">Total</span></th>
                                                <td class="border-0">
                                                    <span class="fw-500 text-primary">R${{ session('total', $total) }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="button-primary">
                                        <div class="iq-button">
                                            <a href="{{ route('shop.checkout') }}" class="btn text-uppercase position-relative">
                                                <span class="button-text">Checkout</span>
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
        <div id="back-to-top" style="display: none;">
            <a class="p-0 btn bg-primary btn-sm position-fixed top border-0 rounded-circle" id="top" href="#top">
                <i class="fa-solid fa-chevron-up"></i>
            </a>
        </div>
        @include('layouts.vendor-scripts')
    </body>

</html>