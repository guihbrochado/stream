@extends('layouts.master')
@section('title')
@lang('translation.Shops')
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Ecommerce @endslot
@slot('title') Shops @endslot
@endcomponent

@if(Auth::check())
<div class="row mb-2">
    @can('admin')
    <div class="col-md-6">
        <div class="mb-3">
            <a href="{{ route('store_trader.create') }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus me-2"></i> Add New</a>
        </div>
    </div>
    @endcan
    <div class="col-md-6">
        <div class="d-flex justify-content-end align-items-center mb-3">
            <a href="{{ route('view.cart') }}" class="btn btn-primary me-2">
                <i class="mdi mdi-cart"></i> Carrinho
            </a>
            <div class="search-box">
                <div class="position-relative">
                    <input type="text" class="form-control rounded border-0" placeholder="Search...">
                    <i class="mdi mdi-magnify search-icon"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- end row -->

<div class="row">
    <!-- Loop para exibir os itens da loja -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @foreach ($data as $item)
    @if ($item->active == 1)
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-4">
                        <div class="avatar-sm">
                            @if(file_exists('images/traders/' . $item->trader_image_path) && $item->trader_image_path)
                            <img src="{{ asset('images/traders/' . $item->trader_image_path ) }}" class="avatar-title bg-soft-primary text-primary font-size-16 rounded-circle" />
                            @else
                            <span class="avatar-title bg-soft-primary text-primary font-size-16 rounded-circle">{{ strtoupper(substr($item->trader, 0, 1)) }}</span>

                            @endif
                        </div>
                    </div>
                    <div class="row">


                    </div>
                    <div class="flex-grow-1 align-self-center">
                        <div class="row">
                            <div class="border-bottom pb-1 col-6">
                                <h5 class="text-truncate font-size-16 mb-1">
                                    <a href="#" class="text-dark">{{ $item->company }}</a>
                                </h5>
                                <p class="text-muted">
                                    <i class="mdi mdi-account me-1"></i> {{ $item->trader }}
                                </p>
                            </div>
                            <div class="col-6 border-bottom pb-1">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Preço</p>
                                    <h5 class="font-size-16 mb-0">{{ $item->price }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Codigo do Trader</p>
                                    <h5 class="font-size-16 mb-0">{{ $item->id }}</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Média das operações</p>
                                    <h5 class="font-size-16 mb-0">{{ $item->mediaOperacoes }}</h5>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('add.to.cart', $item->id) }}" class="btn btn-primary mt-3">Adicionar ao carrinho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
<!-- end row -->

@php
$count = count($data);
@endphp


<!-- end row -->
@endsection