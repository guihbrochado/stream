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
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Cursos</h4>
                                </div>

                                <div>
                                    <a href="" class="btn btn-primary "> Adicionar</a>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive border rounded py-4">
                                    <table id="datatable" class="table " data-toggle="data-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sala</th>
                                                <th class="text-center">Descrição</th>
                                                <th class="text-center">Paga/Gratuira</th>
                                                <th class="text-center">Preço</th>
                                                <th class="text-center">Criado</th>
                                                <th class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center">
                                                    <a href=""> <i class="fa-solid fa-eye  me-2 lh-lg"></i> </a>
                                                    <a href=""> <i class="fa-solid fa-user-edit  me-2 lh-lg"></i> </a>
                                                    <a href=""> <i class="fa-solid fa-trash  me-2 lh-lg"></i> </a>
                                                </td>
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