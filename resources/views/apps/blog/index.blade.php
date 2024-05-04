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
    <!-- loader END --> <!-- loader END -->
    <main class="main-content">
        <!--Nav Start-->
        @include('components.nav')<!--Nav End-->


        <div class="iq-breadcrumb" style="background-image: url(assets/images/pages/01.webp);">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <nav aria-label="breadcrumb" class="text-center">
                            <h2 class="title">Fique mais informado com nossos blogs.</h2>
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        @forelse ($blogs as $row)
                        <div class="blog-box">
                            <img src="{{asset('images/blogstream/' . $row->imgcapa)}}" class="img-fluid mb-4 pb-3 rounded" id="01" alt="template">
                            <div class="row mt-2 mb-2" <?= $row->audiofile == null ? 'hidden' : '' ?>>
                                <audio controls>
                                    <source src="{{asset('audios/blogstream/' . $row->audiofile)}}" type="audio/ogg">
                                </audio>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="modal fade" id="commentModal-{{$row->id}}" tabindex="-1" aria-labelledby="commentModal-{{$row->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="btn btn-primary btn-comments" data-id="{{$row->id}}" data-bs-toggle="modal" data-bs-target="#commentModal-{{$row->id}}">
                                                    Comentários
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="comments-{{$row->id}}"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <!-- <div class="row">
                                                      <input type="text" class="form-control " id="input-comment{{$row->id}}" placeholder="Faça sua postagem">
                                                      <button type="button" id="btn-submit-comment{{$row->id}}" class="btn btn-primary">Enviar Mensagem</button>
                                                    </div> -->
                                                <div class="input-group input-group-sm mb-3">
                                                    <input id="input-comment{{$row->id}}" placeholder="Faça sua postagem" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                    <span class="input-group-text btn btn-primary" id="btn-submit-comment{{$row->id}}">Enviar Mensagem</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="iq-blog-category-2 m-0  p-0 list-unstyled">
                                    <li>
                                        <span class="fw-500">{{$row->titulo}}</span>
                                    </li>
                                </ul>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="font-size-12"> Leitura de {{$row->duration}} </span>
                                    <div>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2428 12.2419C10.4091 14.0758 7.69386 14.472 5.47185 13.4444C5.14382 13.3123 4.87489 13.2056 4.61922 13.2056C3.90709 13.2098 3.0207 13.9003 2.56002 13.4402C2.09933 12.9795 2.79036 12.0924 2.79036 11.3759C2.79036 11.1202 2.68785 10.8561 2.55579 10.5274C1.5277 8.30577 1.92447 5.58961 3.75816 3.75632C6.09896 1.41466 9.90201 1.41466 12.2428 3.75572C14.5878 6.101 14.5836 9.90086 12.2428 12.2419Z" stroke="#E50914" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M10.3637 8.24775H10.3691" stroke="#E50914" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M7.95843 8.24775H7.96383" stroke="#E50914" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M5.55316 8.24775H5.55856" stroke="#E50914" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <span data-bs-toggle="modal" data-bs-target="#commentModal-{{$row->id}}" class="font-size-12 btn-comments" data-idcomment="{{$row->id}}"> Comments</span>
                                    </div>
                                </div>
                            </div>
                            {!! $row->conteudo !!}
                            <div class="iq-author-details d-flex align-items-center justify-content-between gap-2">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="iq-author-image d-flex align-items-center gap-2">
                                        <img src="assets/images/user/user1.webp" class="img-fluid avatar-40 rounded-circle" alt="user">
                                    </div>
                                    <span class="font-size-14">
                                        <a href="#">{{ $row->author }}</a>
                                    </span>
                                </div>
                                <div class="iq-published-date">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.19336 5.59936H11.8109" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                                        <path d="M9.39685 7.70678H9.40185" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                                        <path d="M7.00232 7.70678H7.00732" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                                        <path d="M4.60291 7.70678H4.6079" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                                        <path d="M9.39685 9.80371H9.40185" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                                        <path d="M7.00232 9.80371H7.00732" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                                        <path d="M4.60291 9.80371H4.6079" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                                        <path d="M9.18255 1.60425V3.37991" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                                        <path d="M4.82318 1.60425V3.37991" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8571 2.4563H2.14453V12.3959H11.8571V2.4563Z" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
                                    </svg>
                                    <span class="font-size-14 text-uppercase">
                                        <span>{{ date("d/m/Y", strtotime($row->created_at)) }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h5>Sem postagens no momento</h5>
                        @endforelse

                    </div>
                    <div class="col-lg-4 col-sm-12 mt-5 mt-lg-0">
                        <div class="widget-area">
                            <div class="widget widget_search">
                                <form method="get" class="search-form" action="#" autocomplete="off">
                                    <div class="block-search_inside-wrapper position-relative d-flex">
                                        <input type="search" class="form-control" placeholder="Search" required="">
                                        <button type="submit" class="block-search_button">
                                            <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                                                <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="widget iq-widget-blog">
                                <h5 class="widget-title position-relative">Postagens mais recentes</h5>
                                <ul class="list-inline p-0 m-0">

                                    @forelse ($recentPosts as $row)
                                    <li class="d-flex align-items-center gap-4">
                                        <div class="img-holder">
                                            <a href="#">
                                                <img src="{{asset('images/blogstream/' . $row->imgcapa)}}" alt="" class="img-fluid h-100 w-100 object-cover">
                                            </a>
                                        </div>
                                        <div class="post-blog">
                                            <a class="new-link" href="blog/blog-detail.html">
                                                <h6 class="post-title">{{ $row->titulo }}</h6>
                                            </a>
                                            <ul class="list-inline mb-2">
                                                <li class="list-inline-item border-0 mb-0 pb-0">
                                                    <span class="blog-data"> <i class="far fa-calendar-alt me-1" aria-hidden="true"></i>{{ date("d/m/Y", strtotime($row->created_at)) }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    @empty
                                    <h5>Sem postagens no momento</h5>
                                    @endforelse

                                </ul>
                            </div>
                            <div class="widget widget_categories">
                                <h5 class="widget-title position-relative">Categorias</h5>
                                <ul class="p-0 m-0 list-unstyled">
                                    @forelse ($categories as $row)
                                    <li class="border-bottom-0">
                                        <a href="{{ route('blogByCategory', ['idcategory' => $row->id]) }}" class="position-relative">{{ $row->description}}</a>
                                        <span class="post_count"></span>
                                    </li>
                                    @empty
                                    <h5>Sem categorias</h5>

                                    @endforelse
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widget-title position-relative">Nossas redes sociais:</h5>
                                <ul class="p-0 m-0 list-unstyled widget_social_media">
                                    <li class="">
                                        <a href="https://www.facebook.com/" class="position-relative"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li class="">
                                        <a href="https://twitter.com/" class="position-relative"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="">
                                        <a href="https://github.com/" class="position-relative"><i class="fab fa-github"></i></a>
                                    </li>
                                    <li class="">
                                        <a href="https://www.instagram.com/" class="position-relative"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Seleciona todos os botões de comentários
            var commentButtons = document.querySelectorAll('.btn-comments');

            // Adiciona evento de clique a cada botão
            commentButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Obtém o ID do post a partir do botão clicado
                    var postId = button.getAttribute('data-id');

                    // Seleciona o corpo do modal correspondente ao post
                    var modalBody = document.querySelector('#commentModal-' + postId + ' .modal-body');

                    // Constrói a URL para obter os comentários
                    var urlGetComments = `{{ url('/blogcomments') }}/${postId}`;

                    // Carrega os comentários
                    fetch(urlGetComments)
                        .then(response => response.text())
                        .then(html => {
                            modalBody.innerHTML = html;

                            // Seleciona o botão de enviar comentário dentro do modal carregado
                            var submitButton = document.querySelector('#btn-submit-comment' + postId);

                            // Adiciona evento de clique ao botão de enviar comentário
                            submitButton.addEventListener('click', function() {
                                var commentInput = document.querySelector('#input-comment' + postId);
                                var comment = commentInput.value;

                                // Constrói a URL para enviar o comentário
                                var urlSubmitComment = `{{ url('/bloginsertcomments') }}/${postId}/${comment}`;

                                // Envia o comentário
                                fetch(urlSubmitComment)
                                    .then(response => response.text())
                                    .then(data => {
                                        console.log("Comentário inserido com sucesso!");
                                        commentInput.value = ''; // Limpa o campo de entrada

                                        // Recarrega os comentários
                                        fetch(urlGetComments)
                                            .then(response => response.text())
                                            .then(html => {
                                                modalBody.innerHTML = html;
                                            });
                                    });
                            });
                        });
                });
            });
        });
    </script>

</body>

</html>