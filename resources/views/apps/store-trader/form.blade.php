@extends('layouts.master')
@section('title')
Traders
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle')
Loja
@endslot
@slot('title')
<a href="{{ route('store_trader.index') }}">Traders</a>
@endslot
@endcomponent

@php
$disabled = '';

// fields
$id = old('id') !== null ? old('id') : $store_trader->id;
$store_company_id = old('store_company_id') !== null ? old('store_company_id') : $store_trader->store_company_id;
$trader = old('trader') !== null ? old('trader') : $store_trader->trader;
$trader_image_path = old('trader_image_path') !== null ? old('trader_image_path') : $store_trader->trader_image_path;
$aux_image_path = old('aux_image_path') !== null ? old('aux_image_path') : $store_trader->aux_image_path;
$active = old('active') !== null ? old('active') : $store_trader->active;

if ($action == 'create') {
$route = route('store_trader.store');
$title = 'Cadastrar';
$card_title = 'Adicionar novo';
$button = 'Cadastrar';
} elseif ($action == 'edit') {
$route = route('store_trader.update', $store_trader->id);
$title = 'Editar';
$card_title = 'Editar';
$button = 'Atualizar';
} else {
$route = '';
$title = 'Visualização';
$card_title = 'Visualização';
$disabled = 'disabled';
}
@endphp

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card mb-4">
    <h5 class="card-header">{{ $card_title }}</h5>
    <form action="{{ $route }}" method="post" enctype="multipart/form-data" class="card-body">
        @csrf
        @if ($action == 'edit')
        @method('PATCH')
        @endif
        <div class="row g-3">
            <div class="col-md-5">
                <input id="id" name="id" type="hidden" value="{{ $id }} ">
                <label class="form-label" for="store_company_id">Empresa</label>
                <select id="store_company_id" name="store_company_id" required
                        class="form-control @error('store_company_id') is-invalid @enderror"
                        @if ($store_trader->id) disabled @else {{ $disabled }} @endif>
                    <option value="">Selecione a empresa</option>
                    @foreach ($store_companies as $store_company)
                    @if ($store_company_id == $store_company->id)
                    <option value="{{ $store_company->id }}" selected>{{ $store_company->company }}</option>
                    @else
                    <option value="{{ $store_company->id }}">{{ $store_company->company }}</option>
                    @endif
                    @endforeach
                </select>
                @error('store_company_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-7">
                <label class="form-label" for="trader">Trader</label>
                <input id="trader" name="trader" type="text"
                       class="form-control @error('trader') is-invalid @enderror"placeholder="Nome do trader"
                       value="{{ $trader }}" {{ $disabled }} required />
                @error('trader')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <label class="form-label" for="price">Preço</label>
                <input id="price" name="price" type="text" class="form-control @error('price') is-invalid @enderror"
                       value="{{ $price }}" {{ $disabled }} required />
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input id="active" name="active" type="checkbox" class="form-check-input" value="1"
                           @if ($active) checked @endif {{ $disabled }}>
                    <label class="form-check-label" for="active">
                        Ativo
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label" for="trader_image_path">Foto (opcional)</label>
                @if ($action != 'show')
                <input id="trader_image_path" name="trader_image_path" type="file"
                       class="form-control @error('trader_image_path') is-invalid @enderror" $disabled />
                @error('trader_image_path')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @endif
                @if (!is_null($trader_image_path) && $trader_image_path != '')
                <div class="mt-4">
                    <img src="{{ URL::asset('/images/traders/' . $trader_image_path) }}" width="200">
                </div>
                @endif
            </div>
            <div class="col-md-12">
                <label class="form-label" for="aux_image_path">Imagem adicional (opcional)</label>
                @if ($action != 'show')
                <input id="aux_image_path" name="aux_image_path" type="file"
                       class="form-control @error('aux_image_path') is-invalid @enderror" $disabled />
                @error('aux_image_path')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @endif
                @if (!is_null($aux_image_path) && $aux_image_path != '')
                <div class="mt-4">
                    <img src="{{ URL::asset('/images/traders/' . $aux_image_path) }}" width="200">
                </div>
                @endif
            </div>
        </div>
        @if ($action != 'show')
        <div class="pt-4">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ $button }}</button>
        </div>
        @endif
    </form>
</div>
@endsection
