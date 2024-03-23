<!doctype html>
<html lang="en" data-bs-theme="dark">

    <head>

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
        <!-- loader END -->  <!-- loader END -->
        <main class="main-content">
            <!--Nav Start-->
            @include('components.nav')<!--Nav End-->

            <!--bread-crumb-->
            <!--bread-crumb-->

            <div class="section-padding">
                <div class="container-fluid">
                    <div class="row">
                        <h1>dsfaiufa</h1>
                      
                    </div>
                </div>
            </div>

        </main>

        @include('layouts.vendor-scripts')
    </body>

</html>