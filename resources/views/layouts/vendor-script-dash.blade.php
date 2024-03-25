<!-- Library Bundle Script -->
<script src="{{ asset('assets/dashboard/js/core/libs.min.js') }}"></script>
<!-- Plugin Scripts -->
<!-- Tour plugin Start -->
<script src="{{ asset('assets/dashboard/vendor/sheperd/dist/js/sheperd.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/js/plugins/tour.js')}}" defer></script>


<!-- Flatpickr Script -->
<script src="{{ asset('assets/dashboard/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/js/plugins/flatpickr.js')}}" defer></script>



<!-- Select2 Script -->
<script src="{{ asset('assets/dashboard/js/plugins/select2.js')}}" defer></script>




<!-- Slider-tab Script -->
<script src="{{ asset('assets/dashboard/js/plugins/slider-tabs.js')}}"></script>





<!-- SwiperSlider Script -->
<script src="{{ asset('assets/dashboard/vendor/swiperSlider/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/js/plugins/swiper-slider.js')}}" defer></script>
<!-- Lodash Utility -->
<script src="{{ asset('assets/dashboard/vendor/lodash/lodash.min.js')}}"></script>
<!-- Utilities Functions -->
<script src="{{ asset('assets/dashboard/js/iqonic-script/utility.min.js')}}"></script>
<!-- Settings Script -->
<script src="{{ asset('assets/dashboard/js/iqonic-script/setting.min.js')}}"></script>
<!-- Settings Init Script -->
<script src="{{ asset('assets/dashboard/js/setting-init.js')}}"></script>
<!-- External Library Bundle Script -->
<script src="{{ asset('assets/dashboard/js/core/external.min.js')}}"></script>
<!-- Widgetchart Script -->
<script src="{{ asset('assets/dashboard/js/charts/widgetcharts.js?v=1.0.1')}}" defer></script>
<!-- Dashboard Script -->
<script src="{{ asset('assets/dashboard/js/charts/dashboard.js?v=1.0.1')}}" defer></script>
<!-- qompacui Script -->
<script src="{{ asset('assets/dashboard/js/streamit.js?v=1.0.1')}}" defer></script>
<script src="{{ asset('assets/dashboard/js/sidebar.js?v=1.0.1')}}" defer></script>
<script src="{{ asset('assets/dashboard/js/chart-custom.js?v=1.0.1')}}" defer></script>

<script src="{{ asset('assets/dashboard/js/plugins/select2.js?v=1.0.1')}}" defer></script>

<script src="{{ asset('assets/dashboard/js/plugins/flatpickr.js?v=1.0.1')}}" defer></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.maskmoney').mask('###.##0,00', {
        reverse: true
    });
    $('.maskmoney2').mask('#,##0.00', {
        reverse: true
    });

    $('.maskmoney3').mask('9.999,99', {
        reverse: true
    });

    $('.masklenght').mask('9,99', {
        reverse: true
    });

    $('.maskweight').mask('99,99', {
        reverse: true
    });

    $('.maskcep').mask('00000-000');
    $('.maskcpf').mask('000.000.000-00', {
        reverse: true
    });
    $('.maskpis').mask('000.00000.00-0', {
        reverse: true
    });
    $('.maskcnpj').mask('00.000.000/0000-00', {
        reverse: true
    });

    $('.maskcel').mask('(00) 00000-0000');

    $('.telcelular').mask('(00)00000-0000', {
        reverse: false
    });

    $('.creditcard').mask('0000 0000 0000 0000');

    $('.cvc').mask('000');
</script>