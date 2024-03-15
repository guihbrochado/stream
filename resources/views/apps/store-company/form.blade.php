@extends('layouts.master')
@section('title')
    Empresas
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
            <a href="{{ route('store_company.index') }}">Empresas</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';
        // fields
        $company = old('store_company') !== null ? old('store_company') : $store_company->company;
        $image = old('image') !== null ? old('image') : $store_company->company_logo_path;
        
        if ($action == 'create') {
            $route = route('store_company.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar nova';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('store_company.update', $store_company->id);
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
                <div class="col-md-12">
                    <label class="form-label" for="company">Empresa</label>
                    <input id="company" name="company" type="text"
                        class="form-control @error('company') is-invalid @enderror"placeholder="Nome da empresa"
                        value="{{ $company }}" {{ $disabled }} required />
                    @error('company')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="image">Logo (opcional)</label>
                    @if ($action != 'show')
                        <input id="image" name="image" type="file"
                            class="form-control @error('image') is-invalid @enderror" $disabled />
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    @endif
                    @if (!is_null($image) && $image != '')
                        <div class="mt-4">
                            <img src="{{ URL::asset('/images/companies/' . $image) }}" width="200">
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
