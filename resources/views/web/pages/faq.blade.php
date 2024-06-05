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
        <img src="./assets/images/loader.gif" alt="loader" class="img-fluid " width="300">
      </div>
  </div>
  <!-- loader END -->  <!-- loader END -->
  <main class="main-content">
      <!--Nav Start-->
      @include('components.nav')     <!--Nav End-->

      <!--bread-crumb-->
      <div class="iq-breadcrumb" style="background-image: url(./assets/images/pages/01.webp);">
         <div class="container-fluid">
            <div class="row align-items-center">
                  <div class="col-sm-12">
                      <nav aria-label="breadcrumb" class="text-center">
                          <h2 class="title">FAQ</h2>
                          <ol class="breadcrumb justify-content-center">
                              <li class="breadcrumb-item"><a href="./index.html">Home</a></li> 
                              <li class="breadcrumb-item active">FAQ</li>
                          </ol>
                      </nav>
                  </div>
              </div> 
         </div>
      </div>      <!--bread-crumb-->


<div class="section-padding">
    <div class="container">
        <div class="iq-accordian iq-accordian-square">
            @foreach ($faq_categories as $category_id => $category)
                @if (isset($data[$category_id]))
                    <div class="iq-accordian-block">
                        <div class="iq-accordian-title text-capitalize">
                            <h4 class="mb-0 accordian-title">{{ $category->first()->title }}</h4>
                        </div>
                        @foreach ($data[$category_id] as $faq)
                            <div class="iq-accordian-details" style="display: block;">
                                <h5 class="accordian-title">{{ $faq->question }}</h5>
                                <p>{{ $faq->answer }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
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