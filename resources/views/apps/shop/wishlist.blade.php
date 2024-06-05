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
                    <h5 class="mb-5">Minha Lista de desejos</h5>
                    <div class="table-responsive">
                        <table class="table cart-table">
                            <thead class="border-bottom">
                                <tr>
                                    <th class="fw-500 font-size-18">Remover</th>
                                    <th class="fw-500 font-size-18">Produto</th>
                                    <th class="fw-500 font-size-18">Preço</th>
                                    <th class="fw-500 font-size-18"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlistItems as $item)
                                <tr data-item="list">
                                    <!-- Botão de Remoção -->
                                    <td>
                                        <form action="{{ route('wishlist.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-icon btn-danger delete-btn text-end bg-transparent text-body border-0">
                                                <span class="btn-inner">
                                                    <i class="far fa-trash-alt"></i>
                                                </span>
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Nome do Produto e Miniatura -->
                                    <td>
                                        <div class="product-thumbnail">
                                            <a class="mb-2 me-3" href="{{ route('product.detail', $item->product->id) }}">
                                                <img class="avatar-80" src="{{ asset('' . $item->product->imagem) }}" alt="">
                                            </a>
                                            <span class="mt-2">{{ $item->product->nome }}</span>
                                        </div>
                                    </td>

                                    <!-- Preço Unitário -->
                                    <td>
                                        <span class="fw-500">R${{ number_format($item->product->preco, 2) }}</span>
                                    </td>
                                    <!-- Link para o Produto -->
                                    <td>
                                        <div class="iq-button">
                                            <a href="{{ route('product.detail', $item->product->id) }}" class="btn text-uppercase position-relative">
                                                <span class="button-text">ver produto</span>
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="product-social-share mt-5 d-flex flex-wrap align-items-center gap-3">
                        <h5 class="mb-0">Nossas Redes:</h5>
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
        <div id="back-to-top" style="display: none;">
            <a class="p-0 btn bg-primary btn-sm position-fixed top border-0 rounded-circle" id="top" href="#top">
                <i class="fa-solid fa-chevron-up"></i>
            </a>
        </div>
        @include('layouts.vendor-scripts')
    </body>

</html>