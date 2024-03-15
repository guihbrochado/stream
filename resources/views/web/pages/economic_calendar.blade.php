@extends('layouts.master')
@section('title')
    Calendário Econômico
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Tridar
        @endslot
        @slot('title')
            Calendário Econômico
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body container text-center">

                    <iframe
                        src="https://sslecal2.investing.com?columns=exc_flags,exc_currency,exc_importance,exc_actual,exc_forecast,exc_previous&features=datepicker,timezone,timeselector,filters&countries=110,17,29,25,32,6,37,36,26,5,22,39,14,48,10,35,7,43,38,4,12,72&calType=week&timeZone=12&lang=12"
                        width="650" height="467" frameborder="0" allowtransparency="true" marginwidth="0"
                        marginheight="0"></iframe>
                    <div class="poweredBy" style="font-family: Arial, Helvetica, sans-serif;"><span
                            style="font-size: 11px;color: #faf5f5;text-decoration: none;">Calendário Econômico fornecido por
                            <a href="https://br.investing.com/" rel="nofollow" target="_blank"
                                style="font-size: 11px;color: #06529D; font-weight: bold;"
                                class="underline_link">Investing.com Brasil</a>, o portal líder financeiro.</span></div>

                </div>
            </div>
        </div> <!-- end col-->
    </div> <!-- end row-->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
@endsection
