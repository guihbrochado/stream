<!doctype html>
<html lang="en" data-bs-theme="dark">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.css" rel="stylesheet">

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
                <img src="../assets/images/loader.gif" alt="loader" class="img-fluid " width="300">
            </div>
        </div>
        <!-- loader END --> <!-- loader END -->
        <main class="main-content">
            <!--Nav Start-->
            @include('components.nav')<!--Nav End-->

            <!--bread-crumb-->
            <!--bread-crumb-->

            <div class="section-padding-top product-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-tab-slider">
                                <div class="swiper product-tab-slider-thumb" data-swiper="slider-product-images">
                                    <div class="swiper-wrapper m-0">
                                        <!-- Exibindo a imagem única do produto -->
                                        <div class="swiper-slide p-0">
                                            <a data-fslightbox="product" href="{{ asset($product->imagem) }}">
                                                <img src="{{ asset($product->imagem) }}" class="img-fluid product-detail-image" alt="{{ $product->nome }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-lg-0 mt-5 ps-lg-5">
                            <h3>{{ $product->nome }}</h3>
                            <div class="mt-2">
                                @for ($i = 0; $i < 5; $i++) <span>
                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                </span>
                                @endfor
                            </div>
                            <h4 class="price mt-3 mb-0 ">${{ number_format($product->preco, 2) }}</h4>
                            <p class="mt-4 mb-0">{{ $product->descricao }}</p>
                            <div class="add-product-wrapper mt-5 pb-5">
                                <ul class="list-inline m-0 p-0 d-flex align-items-center gap-3 flex-wrap">
                                    <li>
                                        <div class="btn-group iq-qty-btn border border-white rounded-0" data-qty="btn" role="group">
                                            <button type="button" class="btn btn-sm btn-outline-light iq-quantity-minus text-white border-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="3" viewBox="0 0 6 3" fill="none">
                                                <path d="M5.22727 0.886364H0.136364V2.13636H5.22727V0.886364Z" fill="currentColor"></path>
                                                </svg>
                                            </button>
                                            <input type="text" class="btn btn-sm btn-outline-light input-display border-0" data-qty="input" pattern="^(0|[1-9][0-9]*)$" minlength="1" maxlength="2" value="1" title="Qty">
                                            <button type="button" class="btn btn-sm btn-outline-light iq-quantity-plus text-white border-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                                <path d="M3.63636 7.70455H4.90909V4.59091H8.02273V3.31818H4.90909V0.204545H3.63636V3.31818H0.522727V4.59091H3.63636V7.70455Z" fill="currentColor"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </li>
                                    <li>
                                        <form action="{{ route('wishlist.add') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="add_to_wishlist wishlist-btn">
                                                <i class="fa-solid fa-heart"></i>
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <div class="iq-button">
                                            <button type="button" class="add-to-cart btn btn-sm cart-btn text-uppercase position-relative" data-productid="{{ $product->id }}" data-productname="{{ $product->nome }}" data-productprice="{{ $product->preco }}">
                                                <span class="button-text">Adicionar ao carrinho</span>
                                                <i class="fa-solid fa-play"></i>
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-meta-wrapper">
                                <ul class="list-inline m-0 p-0">
                                    <li class="mb-2">
                                        <span class="text-white fw-semibold">ID Produto :</span>
                                        <h6 class="d-inline">{{ $product->id }}</h6>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-white fw-semibold">Categories :</span>
                                        @if ($product->category)
                                        <h6 class="d-inline text-primary">{{ $product->category->nome }}</h6>
                                        @else
                                        <h6 class="d-inline text-primary">No Category</h6>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="section-padding-top px-0">
                        <div class="product-detail-tabs">
                            <ul class="list-inline nav nav-pills justify-content-center iq-custom-tab tab-bg-gredient-center flex-md-row flex-column gap-md-5 gap-3 mb-5" id="product-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="javascript:void(0)" class="nav-link active bg-transparent" data-bs-toggle="tab" data-bs-target="#description" role="tab" aria-selected="true">Descrição</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="javascript:void(0)" class="nav-link bg-transparent" data-bs-toggle="tab" data-bs-target="#additional-information" role="tab" aria-selected="false">Additional information</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="javascript:void(0)" class="nav-link bg-transparent" data-bs-toggle="tab" data-bs-target="#reviews" role="tab" aria-selected="false">Avaliações</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="product-tab-content">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <p class="m-0">{{ $product->descricao }}</p>
                                </div>
                                <div class="tab-pane fade" id="additional-information" role="tabpanel">
                                    <div class="table-responsive additional-info-table">
                                        <table class="table table-border">
                                            <tbody>
                                                <tr class="text-body">
                                                    <th class="text-white">Color</th>
                                                    <td>Blue, Green, Red</td>
                                                </tr>
                                                <tr class="text-body">
                                                    <th class="text-white">Size</th>
                                                    <td>L, M, S</td>
                                                </tr>
                                                <tr class="text-body">
                                                    <th class="text-white">Weight</th>
                                                    <td>50ml, 100ml</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <h4 class="mb-4">Avaliações</h4>
                                    <div class="product-review-list">
                                        <ul class="list-inline m-0 p-0">
                                            @foreach ($product->reviews as $review)
                                            <li class="pb-5 mb-5 border-bottom">
                                                <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-start gap-4">
                                                    {{-- User Image --}}
                                                    <div class="user-image flex-shrink-0">
                                                        <img src="{{ asset('path/to/user/image') }}" alt="user-image" class="img-fluid">
                                                    </div>
                                                    <div class="about-user">
                                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                                            <h5 class="mb-0">{{ $review->user->name }}</h5>
                                                            <span class="text-uppercase fst-italic fw-semibold published-date">
                                                                <i class="fas fa-minus fa-xs"></i> {{ $review->created_at->format('F d, Y') }}
                                                            </span>
                                                            <div class="lh-1 ratting">
                                                                {{-- Repeat for star rating --}}
                                                                @for ($i = 1; $i <= 5; $i++) <span>
                                                                    <i class="fa fa-star {{ $i <= $review->rating ? 'text-warning' : '' }}" aria-hidden="true"></i>
                                                                </span>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <p class="mt-2 mb-0">{{ $review->comment }}</p>

                                                        {{-- Edit and Delete Buttons (shown only to the author of the review) --}}
                                                        @if(auth()->id() === $review->user_id)
                                                        <div class="review-actions d-flex justify-content-end mt-2">
                                                            <!-- Botão para editar o comentário -->
                                                            <button type="button" class="btn btn-sm me-2 text-blue-600" data-bs-toggle="modal" data-bs-target="#editReviewModal">
                                                                <i class="fa fa-pencil-alt"></i>
                                                            </button>

                                                            <!-- Formulário para deletar o comentário -->
                                                            <form method="POST" action="{{ route('review.destroy', $review->id) }}" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="mt-5 review-form">
                                        <h4>Add a review</h4>
                                        <p class="mb-5">Your email address will not be published. Required fields are marked *</p>
                                        <form action="{{ route('submit.review', $product->id) }}" method="POST" class="needs-validation" novalidate>
                                            @csrf
                                            <div class="ratting mb-2">
                                                <!-- Botões ocultos para definir a classificação da estrela -->
                                                @for ($i = 1; $i <= 5; $i++) <button type="button" class="star-rating-btn" data-rating="{{ $i }}">
                                                    <i class="fa fa-star {{ $i <= old('rating') ? 'text-warning' : '' }}" aria-hidden="true"></i>
                                                </button>
                                                @endfor
                                                <input type="hidden" name="rating" value="{{ old('rating') }}" required>
                                            </div>
                                            <div class="mb-5 mt-4">
                                                <label class="form-label">Your review *</label>
                                                <textarea class="form-control rounded-0" name="comment" required>{{ old('comment') }}</textarea>
                                            </div>
                                            <div class="mb-5">
                                                <label class="form-label">Name*</label>
                                                <input type="text" class="form-control rounded-0" value="{{ old('name') }}" name="name" required>
                                            </div>
                                            <div class="mb-5">
                                                <label class="form-label">Email*</label>
                                                <input type="email" class="form-control rounded-0" value="{{ old('email') }}" name="email" required>
                                            </div>
                                            <div class="mb-5 form-check">
                                                <input type="checkbox" class="form-check-input rounded-0" id="exampleCheck1" required>
                                                <label class="form-check-label" for="exampleCheck1">Save my name, email, and website in this browser for the next time I comment.</label>
                                            </div>
                                            <div class="iq-button">
                                                <button type="submit" class="btn text-uppercase position-relative">
                                                    <span class="button-text">Submit</span>
                                                    <i class="fa-solid fa-play"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    @if($review)
                                    <div class="modal fade" id="editReviewModal" tabindex="-1" aria-labelledby="editReviewModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editReviewModalLabel">Editar Avaliação</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editReviewForm" action="{{ route('review.update', $review->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="reviewRating" class="form-label">Sua Avaliação</label>
                                                            <select id="reviewRating" name="rating" class="form-select">
                                                                <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1 Estrela</option>
                                                                <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2 Estrelas</option>
                                                                <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3 Estrelas</option>
                                                                <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4 Estrelas</option>
                                                                <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5 Estrelas</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="reviewComment" class="form-label">Seu Comentário</label>
                                                            <textarea id="reviewComment" name="comment" class="form-control" required>{{ $review->comment }}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                            <button type="submit" class="btn btn-primary">Salvar Mudanças</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="related-product-block section-padding-top">
                        <div class="container p-0">
                            <div class="overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between px-3 my-4">
                                    <h5 class="main-title text-capitalize mb-0">Related Products</h5>
                                    <a href="shop/view-all-product.html" class="text-primary iq-view-all text-decoration-none flex-none">Want More?</a>
                                </div>
                                <div class="card-style-slider">
                                    <div class="position-relative swiper swiper-card" data-slide="4" data-laptop="4" data-tab="3" data-mobile="2" data-mobile-sm="2" data-autoplay="true" data-loop="true" data-navigation="true" data-pagination="true">
                                        <ul class="p-0 swiper-wrapper m-0 list-inline">
                                            @foreach($relatedProducts as $relatedProduct)
                                            <li class="swiper-slide">
                                                <div class="product-block">
                                                    @if($relatedProduct->is_on_sale)
                                                    <span class="onsale bg-primary">Sale!</span>
                                                    @endif
                                                    <div class="image-wrap">
                                                        <a href="{{ route('product.detail', $relatedProduct->id) }}">
                                                            <div class="product-image">
                                                                <img src="{{ asset($relatedProduct->imagem) }}" class="img-fluid w-100" alt="{{ $relatedProduct->nome }}" loading="lazy" />
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
                                                                    <a href="#" class="add_to_wishlist wishlist-btn">
                                                                        <i class="fa-solid fa-heart"></i>
                                                                    </a>
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
                                                            <a href="{{ route('product.detail', $relatedProduct->id) }}" class="title-link">{{ $relatedProduct->nome }}</a>
                                                        </h5>
                                                        <div class="price-detail">
                                                            <div class="price">
                                                                ${{ number_format($relatedProduct->preco, 2) }}
                                                            </div>
                                                        </div>
                                                        <div class="container-rating">
                                                            <div class="star-rating text-primary">
                                                                @for($i = 0; $i < 5; $i++)
                                                                <span>
                                                                    <i class="fa fa-star{{ $i < $relatedProduct->rating ? ' text-warning' : '-o' }}" aria-hidden="true"></i>
                                                                </span>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
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
                                            <img src="" class="object-cover" alt="shop-img">
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
                    <script>
                        document.querySelectorAll('.star-rating-btn').forEach(button => {
                            button.addEventListener('click', (e) => {
                                e.preventDefault();
                                const rating = button.getAttribute('data-rating');
                                document.querySelector('input[name="rating"]').value = rating;
                                updateStarRating(rating);
                            });
                        });

                        function updateStarRating(rating) {
                            document.querySelectorAll('.star-rating-btn').forEach(button => {
                                const star = button.querySelector('i');
                                if (parseInt(button.getAttribute('data-rating')) <= rating) {
                                    star.classList.add('text-warning');
                                } else {
                                    star.classList.remove('text-warning');
                                }
                            });
                        }

                        document.querySelectorAll('.add-to-cart').forEach(button => {
                            button.addEventListener('click', function () {
                                const productId = this.getAttribute('data-productid');
                                const productName = this.getAttribute('data-productname');
                                const productPrice = this.getAttribute('data-productprice');

                                fetch('/stream/public/add-to-cart', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({
                                        id: productId,
                                        name: productName,
                                        price: productPrice,
                                        quantity: 1
                                    })
                                })
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error('Network response was not ok');
                                            }
                                            return response.json();
                                        })
                                        .then(data => {
                                            console.log('Item adicionado ao carrinho:', data);
                                        })
                                        .catch(error => console.error('Erro ao adicionar ao carrinho:', error));
                            });
                        });

                        $('#editReviewModal').on('show.bs.modal', function (event) {
                            var button = $(event.relatedTarget);
                            var reviewId = button.data('review-id');
                            var modal = $(this);
                            modal.find('#reviewId').val(reviewId);
                        });
                    </script>
                    </body>

                    </html>