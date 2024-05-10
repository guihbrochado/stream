<!doctype html>
<html lang="en" data-bs-theme="dark">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.title-meta')
        @include('layouts.head')

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>

    <style>
        .embed-responsive {
            position: relative;
            display: block;
            height: 0;
            padding: 0;
            overflow: hidden;
        }

        .embed-responsive.embed-responsive-16by9 {
            padding-bottom: 56.25%;
            /* 16:9 ratio */
        }

        .embed-responsive .embed-responsive-item,
        .embed-responsive iframe,
        .embed-responsive embed,
        .embed-responsive object,
        .embed-responsive video {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .embed-responsive .card-img-top {
            max-width: 100%;
            height: auto;
        }
    </style>

    <body class=" custom-header-relative ">
        <span class="screen-darken"></span>
        <!-- loader Start -->
        <!-- loader Start -->
        <div class="loader simple-loader">
            <div class="loader-body">
                <img src="./assets/images/loader.gif" alt="loader" class="img-fluid " width="300">
            </div>
        </div>
        <!-- loader END --> <!-- loader END -->
        <main class="main-content">
            <!--Nav Start-->
            @include('components.nav') <!--Nav End-->

            <!--bread-crumb-->
            <!--bread-crumb-->

            <!-- Banner Start -->
            <div class="iq-main-slider site-video">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col-md-9">
                            <div class="embed-responsive embed-responsive-16by9" id="lesson-video">
                                <video autoplay controls class="embed-responsive-item rounded-3" id="lessonVideo">
                                    <source src="{{ asset($data->link) }}" type="video/mp4">
                                    Seu navegador não suporta o elemento de vídeo.
                                </video>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <!-- Sidebar com módulos e lições -->
                            <div class="widget widget_categories" style="border-radius: 8px;">
                                @foreach ($modules as $row)
                                <div class="d-flex justify-content-between" id="module{{ $row->id }}">
                                    <h6 class="widget-title position-relative">Módulo: {{ $row->module }}</h6>
                                    <i id="icon{{ $row->id }}" class="fa-solid fa-chevron-down"></i>
                                </div>
                                <ul class="p-0 m-0 list-unstyled" id="ul{{ $row->id }}">
                                    @foreach ($row['lessons'] as $rowlesson)
                                    <li>
                                        <div class="d-flex justify-content-between">
                                            <span class="post_count mt-1"><i class="fas fa-play"></i></span>
                                            &nbsp; &nbsp;
                                            <a href="{{ route('course.lesson', ['id' => $rowlesson->id]) }}" class="position-relative font-size-14">{{$rowlesson->lessonnumber}}&nbsp;&nbsp;-&nbsp;&nbsp;{{ $rowlesson->lesson }}</a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>

                                <script>
                                    $("#module{{ $row->id }}").click(function (e) {
                                        const isHidden = $("#ul{{ $row->id }}").hasClass('hide');
                                        if (isHidden) {
                                            $("#ul{{ $row->id }}").removeClass('hide').show();
                                            $("#icon{{ $row->id }}").removeClass('fa-solid fa-chevron-down').addClass('fa-solid fa-chevron-up');
                                        } else {
                                            $("#ul{{ $row->id }}").addClass('hide').hide();
                                            $("#icon{{ $row->id }}").removeClass('fa-solid fa-chevron-up').addClass('fa-solid fa-chevron-down');
                                        }
                                    });
                                    document.addEventListener("DOMContentLoaded", function () {
                                        const videoElement = document.getElementById("lessonVideo");
                                        if (videoElement) {
                                            videoElement.autoplay = true; // Ativa o autoplay
                                            videoElement.muted = true;    // Silencia o vídeo para permitir autoplay
                                            videoElement.load();          // Recarrega o vídeo para aplicar as alterações
                                        }
                                    });
                                </script>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner End -->

            <div class="details-part">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Movie Description Start-->
                            <div class="trending-info mt-4 pt-0 pb-4">
                                <div class="row">
                                    <div class="col-md-9 col-12 mb-auto">
                                        <div class="d-block d-lg-flex align-items-center">
                                            <h2 class="trending-text fw-bold texture-text text-uppercase my-0 fadeInLeft animated d-inline-block" data-animation-in="fadeInLeft" data-delay-in="0.6" style="opacity: 1; animation-delay: 0.6s">
                                                {{$data->lesson}}
                                            </h2>
                                            <div id="rating" class="slider-ratting d-flex align-items-center ms-lg-3 ms-0">

                                            </div>
                                        </div>                                        
                                        <ul class="p-0 mt-2 list-inline d-flex flex-wrap movie-tag">
                                            @foreach (explode(',', $data->tags) as $tag)
                                            <li class="trending-list"><a class="text-primary" href="./view-all-movie.html">{{$tag}}</a></li>
                                            @endforeach
                                        </ul>
                                        
                                        <div class="d-flex flex-wrap align-items-center text-white text-detail mb-4">
                                            <span class="ms-3 font-Weight-500 genres-info">Duração: {{$data->duration}}</span>
                                        </div>
                                        
                                        <ul class="iq-blogtag list-unstyled d-flex flex-wrap align-items-center gap-3 p-0">
                                            <li class="iq-tag-title text-primary mb-0">
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                Tags:
                                            </li>
                                            <li><span class="title">{{$data->lesson}}</span></li>
                                        </ul>
                                    </div>
                                    <div class="trailor-video col-md-3 col-12 mt-lg-0 mt-4 mb-md-0 mb-1 text-lg-right">
                                        <a data-fslightbox="html5-video" href="https://www.youtube.com/watch?v=QCGq1epI9pQ" class="video-open playbtn block-images position-relative playbtn_thumbnail">
                                            <img src="./assets/images/genre/01.webp" class="attachment-medium-large size-medium-large wp-post-image" alt="" loading="lazy" />
                                            <span class="content btn btn-transparant iq-button">
                                                <i class="fa fa-play me-2 text-white"></i>
                                                <span>Trailer Link</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Movie Description End --> <!-- Movie Source Start -->
                            <div class="content-details trending-info">
                                <ul class="iq-custom-tab tab-bg-gredient-center d-flex nav nav-pills align-items-center text-center mb-5 justify-content-center list-inline" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-bs-toggle="pill" href="#description-01" role="tab" aria-selected="true">
                                            Descrição
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="pill" href="#review-01" role="tab" aria-selected="false">Comentários</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="description-01" class="tab-pane animated fadeInUp active show" role="tabpanel">
                                        <div class="description-content">
                                            <p>
                                                Descrição: {{$data->description}}
                                            </p>
                                        </div>
                                    </div>
                                    <div id="description-01" class="tab-pane animated fadeInUp active show" role="tabpanel">
                                        <div class="description-content">
                                            <p>Autor: {{$data->author}} </p>
                                        </div>
                                    </div>


                                    <div id="review-01" class="tab-pane animated fadeInUp" role="tabpanel">
                                        <div class="streamit-reviews">
                                            <div id="divcomments" class="comments-area validate-form tab-bg-gredient-center">

                                            </div>
                                            <div class="review_form">
                                                <div class="comment-respond">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="mb-2">
                                                                    Digite seu comentário
                                                                    <span class="required">
                                                                        *
                                                                    </span>
                                                                </label>
                                                                <textarea class="form-control" id="inputcomment" cols="5" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-submit mt-4">
                                                                <div class="iq-button">
                                                                    <button name="submit" type="submit" id="submitcomment" class="btn text-uppercase position-relative" value="Submit">
                                                                        <span class="button-text">Enviar</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </button>
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
                </div>
            </div>

            <section class="recommended-block">
                <div class="container-fluid">
                    <div class="overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between px-3 pt-2 my-4">
                            <h5 class="main-title text-capitalize mb-0">Cursos Recomendados</h5>
                        </div>
                        <div class="card-style-slider">
                            <div class="position-relative swiper swiper-card" data-slide="5" data-laptop="5" data-tab="2" data-mobile="2" data-mobile-sm="2" data-autoplay="false" data-loop="true" data-navigation="true" data-pagination="true">
                                <ul class="p-0 swiper-wrapper m-0  list-inline">
                                    @foreach ($coursesTop10 as $row)

                                    <li class="swiper-slide">
                                        <div class="iq-card card-hover">
                                            <div class="block-images position-relative w-100">
                                                <div class="img-box w-100">
                                                    <a href="{{ route('course.detail', ['id' => $row->id]) }}" class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                                    <img src="{{asset('images/courses/' . $row->cover)}}" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
                                                </div>
                                                <div class="card-description with-transition">
                                                    <div class="cart-content">
                                                        <div class="content-left">
                                                            <h5 class="iq-title text-capitalize">
                                                                <a href="./movie-detail.html">{{$row->course}}</a>
                                                            </h5>
                                                            <div class="movie-time d-flex align-items-center my-2">
                                                                <span class="movie-time-text font-normal">{{$row->duration}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="watchlist">
                                                            <a class="watch-list-not" href="playlist.html">
                                                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-10">
                                                                <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                                <span class="watchlist-label"> Watchlist </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="block-social-info align-items-center">
                                                    <ul class="p-0 m-0 d-flex gap-2 music-play-lists">
                                                        <li class="share position-relative d-flex align-items-center text-center mb-0">
                                                            <span class="w-100 h-100 d-inline-block bg-transparent">
                                                                <i class="fas fa-share-alt"></i>
                                                            </span>
                                                            <div class="share-wrapper">
                                                                <div class="share-boxs d-inline-block">
                                                                    <svg width="15" height="40" class="share-shape" viewBox="0 0 15 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8842 40C6.82983 37.2868 1 29.3582 1 20C1 10.6418 6.82983 2.71323 14.8842 0H0V40H14.8842Z" fill="#191919"></path>
                                                                    </svg>
                                                                    <div class=" overflow-hidden">
                                                                        <a href="" target="_blank">
                                                                            <i class="fab fa-facebook-f"></i>
                                                                        </a>
                                                                        <a href="" target="_blank">
                                                                            <i class="fab fa-twitter"></i>
                                                                        </a>
                                                                        <a href="#">
                                                                            <i class="fas fa-link"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="share position-relative d-flex align-items-center text-center mb-0">
                                                            <span class="w-100 h-100 d-inline-block bg-transparent">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>
                                                            <div class="share-wrapper">
                                                                <div class="share-boxs d-inline-block">
                                                                    <svg width="15" height="40" class="share-shape" viewBox="0 0 15 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8842 40C6.82983 37.2868 1 29.3582 1 20C1 10.6418 6.82983 2.71323 14.8842 0H0V40H14.8842Z" fill="#191919"></path>
                                                                    </svg>
                                                                    <div class=" overflow-hidden">
                                                                        <span>+51</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="iq-button">
                                                        <a href="movie-detail.html" class="btn text-uppercase position-relative rounded-circle">
                                                            <i class="fa-solid fa-play ms-0"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </li>
                                    @endforeach

                                </ul>
                                <div class="swiper-button swiper-button-next"></div>
                                <div class="swiper-button swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <div id="back-to-top" style="display: none;">
            <a class="p-0 btn bg-primary btn-sm position-fixed top border-0 rounded-circle" id="top" href="#top">
                <i class="fa-solid fa-chevron-up"></i>
            </a>
        </div>
        <!-- Wrapper End-->
        <!-- Library Bundle Script -->
        <script src="./assets/js/core/libs.min.js"></script>
        <!-- Plugin Scripts -->

        <!-- SwiperSlider Script -->
        <script src="./assets/vendor/swiperSlider/swiper.min.js"></script>
        <script src="./assets/vendor/video/video.min.js"></script>
        <script src="./assets/vendor/videojs-youtube-master/youtube.js"></script>

        <!-- Select2 Script -->
        <script src="./assets/js/plugins/select2.js" defer></script>

        <!-- Lodash Utility -->
        <script src="./assets/vendor/lodash/lodash.min.js"></script>
        <!-- External Library Bundle Script -->
        <script src="./assets/js/core/external.min.js"></script>
        <!-- countdown Script -->
        <script src="./assets/js/plugins/countdown.js"></script>
        <!-- utility Script -->
        <script src="./assets/js/utility.js"></script>
        <!-- Setting Script -->
        <script src="./assets/js/setting.js"></script>
        <script src="./assets/js/setting-init.js" defer></script>
        <!-- Streamit Script -->
        <script src="./assets/js/streamit.js" defer></script>
        <script src="./assets/js/swiper.js" defer></script>

        <script>
                                    $(document).ready(function () {
                                        // Carregar a classificação inicial
                                        var url = "{{ route('lessonrating', ['idlesson' => $data->id, 'rate' => $rate]) }}";
                                        $.get(url, function (data) {
                                            $('#rating').html(data);
                                        });

                                        // Carregar os comentários iniciais
                                        getComment();

                                        // Evento para enviar o comentário
                                        $("#submitcomment").click(function (e) {
                                            e.preventDefault(); // Evitar o comportamento padrão

                                            const comment = $("#inputcomment").val().trim(); // Obter o valor do comentário
                                            const idlesson = Number('{{$data->id}}'); // Obter o ID da lição

                                            // Verificar se o comentário está vazio
                                            if (comment === "") {
                                                alert("Por favor, insira um comentário.");
                                                return;
                                            }

                                            // Fazer a requisição POST via AJAX
                                            $.ajax({
                                                url: "{{ route('lesson.commentstore') }}",
                                                type: 'POST',
                                                data: {
                                                    _token: '{{ csrf_token() }}', // Token CSRF para validação
                                                    idlesson: idlesson,
                                                    comment: comment
                                                },
                                                success: function (data) {
                                                    // Atualizar os comentários após o envio bem-sucedido
                                                    getComment();
                                                    $("#inputcomment").val(""); // Limpar o campo de entrada
                                                },
                                                error: function (jqXHR, textStatus, errorThrown) {
                                                    console.error("Erro ao enviar o comentário: ", textStatus, errorThrown);
                                                    alert("Erro ao salvar o comentário. Por favor, tente novamente.");
                                                }
                                            });
                                        });

                                        // Função para obter comentários
                                        function getComment() {
                                            const idlesson = Number('{{ $data->id }}');
                                            const urlget = (`{{ url('/lesson-comment/${idlesson}') }}`);

                                            $.get(urlget, function (data) {
                                                $('#divcomments').html(data);
                                            });
                                        }

                                        function editComment(idcomment, currentComment) {
                                            const newComment = prompt("Edite seu comentário:", currentComment);

                                            if (newComment !== null) {
                                                $.ajax({
                                                    url: "{{ route('lesson.commentupdate') }}",
                                                    type: 'POST',
                                                    data: {
                                                        _token: '{{ csrf_token() }}',
                                                        idcomment: idcomment,
                                                        comment: newComment
                                                    },
                                                    success: function (data) {
                                                        alert(data.message);
                                                        getComment(); // Atualiza os comentários após a edição
                                                    },
                                                    error: function (jqXHR, textStatus, errorThrown) {
                                                        console.error("Erro ao editar o comentário: ", textStatus, errorThrown);
                                                        alert("Erro ao editar o comentário. Por favor, tente novamente.");
                                                    }
                                                });
                                            }
                                        }

// Função para remover um comentário
                                        function deleteComment(idcomment) {
                                            if (confirm("Tem certeza que deseja excluir este comentário?")) {
                                                $.ajax({
                                                    url: "{{ route('lesson.commentdelete') }}",
                                                    type: 'DELETE',
                                                    data: {
                                                        _token: '{{ csrf_token() }}',
                                                        idcomment: idcomment
                                                    },
                                                    success: function (data) {
                                                        alert(data.message);
                                                        getComment(); // Atualiza os comentários após a exclusão
                                                    },
                                                    error: function (jqXHR, textStatus, errorThrown) {
                                                        console.error("Erro ao excluir o comentário: ", textStatus, errorThrown);
                                                        alert("Erro ao excluir o comentário. Por favor, tente novamente.");
                                                    }
                                                });
                                            }
                                        }
                                    });
        </script>

        <script>
            $(document).ready(function () {
                const idlesson = Number('{{$data->id}}');

                setTimeout(function () {
                    console.log('Await 2m');
                    const urlget = (`{{ url('/course-last-lesson/${idlesson}') }}`);
                    $.get(urlget, function (data) {
                    });
                }, 60); // 120000 - 2 minute  60000 1 minute

                // document.querySelector('#lesson-iframe').on("mouseover", function() {        
                //   console.log('sdohasdiokj');
                //   // document.querySelector('.ytp-cued-thumbnail-overlay-image').click();
                // })
            });
        </script>

    </body>


</html>