<!-- JAVASCRIPT -->
 <script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/bootstrap/bootstrap.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/metismenu/metismenu.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/node-waves/node-waves.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/waypoints/waypoints.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/jquery-counterup/jquery-counterup.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/js/custom.js') }}"></script>

 @yield('script')

 <!-- App js -->
 <script src="{{ URL::asset('/assets/js/app.min.js')}}"></script>
 <script src="{{ asset('assets/js/core/libs.min.js')}}"></script>
        <!-- Plugin Scripts -->


        <!-- SwiperSlider Script -->
        <script src="{{ asset('assets/vendor/swiperSlider/swiper.min.js')}}"></script>




        <!-- Lodash Utility -->
        <script src="{{ asset('assets/vendor/lodash/lodash.min.js')}}"></script>
        <!-- External Library Bundle Script -->
        <script src="{{ asset('assets/js/core/external.min.js')}}"></script>
        <!-- countdown Script -->
        <script src="{{ asset('assets/js/plugins/countdown.js')}}"></script>
        <!-- utility Script -->
        <script src="{{ asset('assets/js/utility.js')}}"></script>
        <!-- Setting Script -->
        <script src="{{ asset('assets/js/setting.js')}}"></script>
        <script src="{{ asset('assets/js/setting-init.js')}}" defer></script>
        <!-- Streamit Script -->
        <script src="{{ asset('assets/js/streamit.js')}}" defer></script>
        <script src="{{ asset('assets/js/swiper.js')}}" defer></script>
 
 @yield('script-bottom')