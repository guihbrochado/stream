@extends('layouts.master')
@section('title')
    @lang('translation.Starter_Page')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Tridar @endslot
        @slot('title') Recurso em desenvolvimento @endslot
    @endcomponent

    <div class="my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="home-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-sm-5">
                                <div class="maintenance-img">
                                    <img src="{{ URL::asset('/assets/images/maintenance.png') }}" alt=""
                                        class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-5">Recurso em desenvolvimento</h3>
                        <p>Por favor volte mais tarde.</p>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </div>
@endsection
