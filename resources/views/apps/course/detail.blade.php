<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.title-meta')
    @include('layouts.head')

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

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
        @include('components.nav')<!--Nav End-->

        <!--bread-crumb-->
        <!--bread-crumb-->

        <div class="section-padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="cast-box position-relative">
                            <img src="{{asset('images/courses/' . $data->cover)}}" class="img-fluid object-cover w-100" alt="person" loading="lazy">

                            <!-- Botão Assistir Agora com estilos do Bootstrap -->
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <a href="{{ route('course.lesson', ['id' => $firstLesson]) }}" class="btn btn-primary waves-effect waves-light">Assistir Agora</a>
                            </div>

                            <ul class="p-0 m-0 list-unstyled widget_social_media position-absolute w-100 text-center">
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
                        <h5 class="mt-5 mb-4 text-white fw-500">Detalhes do Curso</h5>
                        <p>{{$data->description}}</a></p>

                        <h6 class="font-size-18 text-white fw-500">Duração: {{$data->duration}} horas</h6>

                        <?php if ($data->certification === true) { ?>
                            <h6 class="font-size-18 text-white fw-500">Possui Certificado</h6>
                        <?php } ?>

                        <?php if ($data->isfree === true) { ?>
                            <h6 class="font-size-18 text-white fw-500">Curso Gratuito</h6>
                        <?php } else { ?>
                            <h6 class="font-size-18 text-white fw-500">Preço: {{$data->price}}</h6>
                        <?php } ?>
                    </div>
                    <div class="col-lg-9 col-md-7 mt-5 mt-md-0">
                        <h4 class="fw-500">{{$data->course}}</h4>
                        <div class="seperator d-flex align-items-center flex-wrap mb-3">
                            <ul class="p-0 mb-0 list-inline d-flex flex-wrap align-items-center movie-tag">
                                @foreach (explode(',', $data->tags) as $tag)
                                <li class="position-relative text-capitalize font-size-14 letter-spacing-1">
                                    <span class="text-decoration-none">{{ $tag }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <p>{{$data->description}}</p>
                        <!-- <div class="awards-box border-bottom">
                                <h5>Awards</h5>
                                <span class="text-white fw-500">56 WINS & 83 NOMINATIONS</span>
                            </div> -->
                        <div class="pb-md-5">
                            <h5 class="main-title mb-4">Cursos com melhor nota</h5>
                            <div class="card-style-grid mb-5">
                                <div class="row row-cols-xl-5 row-cols-sm-2 row-cols-1">
                                    @foreach ($coursesTop10 as $row)
                                    <div class="col mb-4">
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
                                                                <a href="{{ route('course.detail', ['id' => $row->id]) }}">{{$row->course}}</a>
                                                            </h5>
                                                            <div class="movie-time d-flex align-items-center my-2">
                                                                <span class="movie-time-text font-normal">2hr
                                                                    : 12mins</span>
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
                                    </div>
                                    @endforeach
                                    <div class="col d-xl-block d-none"></div>
                                </div>
                            </div>
                        </div>
                        <div class="content-details trending-info">
                            <ul class="nav nav-underline d-flex nav nav-pills align-items-center text-center mb-5 gap-5" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-bs-toggle="pill" href="#all" role="tab" aria-selected="true">
                                        Todos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#movies" role="tab" aria-selected="false">
                                        Módulos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#tvshows" role="tab" aria-selected="false">
                                        Aulas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#evaluation" role="tab" aria-selected="false">
                                        Avaliações
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="all" class="tab-pane animated fadeInUp active show" role="tabpanel">
                                    <div class="description-content">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    @php $countAllcourses = 1; @endphp
                                                    @foreach ($allCourses as $row)

                                                    <tr>
                                                        <td class="w-15"><img src="{{asset('images/courses/' . $row->cover)}}" alt="image-icon" class="img-fluid person-img object-cover"></td>
                                                        <td class="w-20">
                                                            <div class="font-size-18 d-flex gap-4 text-white fw-500">
                                                                <span>{{$countAllcourses}}</span>
                                                                <span class="text-capitalize">{{$row->course}}</span>
                                                            </div>
                                                        </td>
                                                        <td><span class="fw-500 font-size-18 text-white">{{date("d/m/Y", strtotime($row->created_at))}}</span></td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="movies" class="tab-pane animated fadeInUp" role="tabpanel">
                                    <div class="description-content">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    @foreach ($modules as $row)
                                                    <tr>
                                                        <td class="">
                                                            <div class="font-size-18 d-flex gap-4 text-white fw-500 align-items-center">
                                                                <span class="btn btn-secondary selectmodule" idmodule="{{$row->id}}"> Selecionar</span>
                                                                <span class="text-capitalize">{{$row->module}}</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div id="tvshows" class="tab-pane animated fadeInUp" role="tabpanel">
                                    <div class="source-list-content table-responsive">
                                        <table class="table custom-table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Selecione
                                                    </th>
                                                    <th>
                                                        Aulas
                                                    </th>
                                                    <th>
                                                        Duração
                                                    </th>
                                                    <th>
                                                        Autor
                                                    </th>
                                                    <th>
                                                        Data de criação
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="divCoursesLessons">
                                                <tr>
                                                    <th colspan="5" class="text-center">
                                                        Selecione um módulo
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="evaluation" class="tab-pane animated fadeInUp mb-2" role="tabpanel">
                                    <form action="{{ route('courseevaluation.store', ['idcourse' => $data->id]) }}" method="post">
                                        @csrf
                                        <div class="d-flex gap-1 align-items-center">
                                            <input class="form-check-input rate" type="radio" name="rate" id="rate1" hidden value="1" />
                                            <label class="form-check-label" for="rate1" id="labelrate1">
                                                <i id="iconrate1" class="far fa-star fa-2xl icon" style="color: #ecba12;"></i>
                                            </label>

                                            <input class="form-check-input rate" type="radio" name="rate" id="rate2" hidden value="2" />
                                            <label class="form-check-label" for="rate2" id="labelrate2">
                                                <i id="iconrate2" class="far fa-star fa-2xl icon" style="color: #ecba12;"></i>
                                            </label>

                                            <input class="form-check-input rate" type="radio" name="rate" id="rate3" hidden value="3" />
                                            <label class="form-check-label" for="rate3" id="labelrate3">
                                                <i id="iconrate3" class="far fa-star fa-2xl icon" style="color: #ecba12;"></i>
                                            </label>

                                            <input class="form-check-input rate" type="radio" name="rate" id="rate4" hidden value="4" />
                                            <label class="form-check-label" for="rate4" id="labelrate4">
                                                <i id="iconrate4" class="far fa-star fa-2xl icon" style="color: #ecba12;"></i>
                                            </label>

                                            <input class="form-check-input rate" type="radio" name="rate" id="rate5" hidden value="5" />
                                            <label class="form-check-label" for="rate5" id="labelrate5">
                                                <i id="iconrate5" class="far fa-star fa-2xl icon" style="color: #ecba12;"></i>
                                            </label>

                                            <textarea required name="textevaluation" id="textevaluation" placeholder="Faça sua avaliação..." cols="200" rows="2"></textarea>
                                            <button id="btnEvaluation" type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </form>

                                    <div class="source-list-content table-responsive">
                                        <table class="table custom-table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Usuário
                                                    </th>
                                                    <th>
                                                        Nota
                                                    </th>
                                                    <th>
                                                        Comentário
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($courseEvaluation as $row)
                                                <tr>
                                                    <td>
                                                        {{$row->name}}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-1 align-content-center">
                                                            <input class="form-check-input rate" type="radio" name="rate" id="rate1" hidden value="1" />
                                                            <label class="form-check-label" for="rate1" id="labelrate1">
                                                                <i id="iconrate1" class="<?= $row->rate >= '1' ? 'fas fa-star' : 'far fa-star'; ?> fa-2xl icon" style="color: #ecba12;"></i>
                                                            </label>

                                                            <input class="form-check-input rate" type="radio" name="rate" id="rate2" hidden value="2" />
                                                            <label class="form-check-label" for="rate2" id="labelrate2">
                                                                <i id="iconrate2" class="<?= $row->rate >= '2' ? 'fas fa-star' : 'far fa-star'; ?> fa-2xl icon" style="color: #ecba12;"></i>
                                                            </label>

                                                            <input class="form-check-input rate" type="radio" name="rate" id="rate3" hidden value="3" />
                                                            <label class="form-check-label" for="rate3" id="labelrate3">
                                                                <i id="iconrate3" class="<?= $row->rate >= '3' ? 'fas fa-star' : 'far fa-star'; ?> fa-2xl icon" style="color: #ecba12;"></i>
                                                            </label>

                                                            <input class="form-check-input rate" type="radio" name="rate" id="rate4" hidden value="4" />
                                                            <label class="form-check-label" for="rate4" id="labelrate4">
                                                                <i id="iconrate4" class="<?= $row->rate >= '4' ? 'fas fa-star' : 'far fa-star'; ?> fa-2xl icon" style="color: #ecba12;"></i>
                                                            </label>

                                                            <input class="form-check-input rate" type="radio" name="rate" id="rate5" hidden value="5" />
                                                            <label class="form-check-label" for="rate5" id="labelrate5">
                                                                <i id="iconrate5" class="<?= $row->rate >= '5' ? 'fas fa-star' : 'far fa-star'; ?> fa-2xl icon" style="color: #ecba12;"></i>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p>{{$row->comment}}</p>
                                                    </td>
                                                </tr>
                                                @empty
                                                <h3> Faça a primeira avaliação!</h3>
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <div class="rtl-box">
        <a class="btn btn-fixed-end btn-icon btn-setting" id="settingbutton" data-bs-toggle="offcanvas" data-bs-target="#live-customizer" role="button" aria-controls="live-customizer">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.875em" height="1.875em" viewBox="0 0 20 20" fill="white">
                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
            </svg>
        </a>
        <div class="offcanvas offcanvas-end live-customizer on-rtl end" tabindex="-1" id="live-customizer" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="live-customizer-label" aria-modal="true" role="dialog">
            <div class="offcanvas-header gap-3">
                <div class="d-flex align-items-center">
                    <h5 class="offcanvas-title text-dark" id="live-customizer-label">Live Customizer</h5>
                </div>
                <div class="d-flex gap-1 align-items-center">
                    <button class="btn btn-icon text-primary" data-reset="settings" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Reset All Settings" data-bs-original-title="Reset All Settings">
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
                            <input type="radio" value="ltr" class="btn-check" name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-ltr" checked>
                            <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-direction-ltr">
                                LTR
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div data-setting="attribute" class="text-center w-100">
                            <input type="radio" value="rtl" class="btn-check" name="theme_scheme_direction" data-prop="dir" id="theme-scheme-direction-rtl">
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
                                <input type="radio" value="dark" class="btn-check" name="theme_style_appearance" data-prop="data-bs-theme" id="theme-scheme-color-netflix" checked>
                                <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-netflix">
                                    Netflix
                                </label>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div data-setting="attribute" class="text-center w-100">
                                <input type="radio" value="hotstar" class="btn-check" name="theme_style_appearance" data-prop="data-bs-theme" id="theme-scheme-color-hotstar">
                                <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-hotstar">
                                    Hotstar
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-setting="attribute" class="text-center w-100">
                                <input type="radio" value="amazonprime" class="btn-check" name="theme_style_appearance" data-prop="data-bs-theme" id="theme-scheme-color-prime">
                                <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-prime">
                                    Prime
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-setting="attribute" class="text-center w-100">
                                <input type="radio" value="hulu" class="btn-check" name="theme_style_appearance" data-prop="data-bs-theme" id="theme-scheme-color-hulu">
                                <label class="btn dir-btn cutomizer-button w-100" for="theme-scheme-color-hulu">
                                    Hulu
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="back-to-top" style="display: none;">
        <a class="p-0 btn bg-primary btn-sm position-fixed top border-0 rounded-circle" id="top" href="#top">
            <i class="fa-solid fa-chevron-up"></i>
        </a>
    </div>
    @include('layouts.vendor-scripts')

    <script>
        $(".selectmodule").click(function(e) {
            $(".selectmodule").addClass("btn-secondary")
            $(this).removeClass("btn-secondary")
            $(this).addClass("btn-primary")

            const idmodule = $(this).attr('idmodule')
            const idcourse = '{{$data->id}}'

            var baseurl = "<?= url('/') ?>";
            var url = baseurl + '/course-detail-ajax/' + idcourse + '/' + idmodule;

            $.get(url, function(data) {
                $('.divCoursesLessons').html(data);
                console.log("Ajax course-detail-ajax concluído com sucesso!");
            });
        });

        $('.rate').click(function(e) {
            $('.text-primary').removeClass('text-primary');

            var rate = $(this).val()
            console.log(rate);
            $('.icon').removeClass("far fa-star")
            $('.icon').removeClass("fas fa-star")

            paintStar(rate);
        });

        function paintStar(rate) {

            if (rate === '1') {
                console.log(rate);
                $('.icon').addClass("far fa-star")
                $('#iconrate1').addClass("fas fa-star")
            }
            if (rate === '2') {
                $('.icon').addClass("far fa-star")
                $('#iconrate1').addClass("fas fa-star")
                $('#iconrate2').addClass("fas fa-star")
            }
            if (rate === '3') {
                $('.icon').addClass("far fa-star")
                $('#iconrate1').addClass("fas fa-star")
                $('#iconrate2').addClass("fas fa-star")
                $('#iconrate3').addClass("fas fa-star")
            }
            if (rate === '4') {
                $('.icon').addClass("far fa-star")
                $('#iconrate1').addClass("fas fa-star")
                $('#iconrate2').addClass("fas fa-star")
                $('#iconrate3').addClass("fas fa-star")
                $('#iconrate4').addClass("fas fa-star")
            }
            if (rate === '5') {
                $('.icon').removeClass("far fa-star")
                $('.icon').addClass("fas fa-star")
            }
        }
    </script>
</body>

</html>