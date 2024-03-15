@extends('layouts.master')
@section('title')
Política de Uso - Categorias
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Administração
        @endslot
        @slot('title')
            <a href="{{ route('usage_policy_category.index') }}">Política de Uso - Categorias</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';
        // fields
        $icon = old('icon') !== null ? old('icon') : $usage_policy_category->icon;
        $order = old('order') !== null ? old('order') : $usage_policy_category->order;
        $usage_policy_catecory_title = old('title') !== null ? old('title') : $usage_policy_category->title;
        $description = old('description') !== null ? old('description') : $usage_policy_category->description;
        
        if ($action == 'create') {
            $route = route('usage_policy_category.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar nova';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('usage_policy_category.update', $usage_policy_category->id);
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
        <form action="{{ $route }}" method="post" class="card-body">
            @csrf
            @if ($action == 'edit')
                @method('PATCH')
            @endif
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label" for="icon">Ícone</label>
                    <input id="icon" name="icon" type="text"
                        class="form-control @error('icon') is-invalid @enderror"placeholder="Ícone"
                        value="{{ $icon }}" {{ $disabled }} maxlength="100" />
                    @error('usage_policy_category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="order">Ordenação</label>
                    <input id="order" name="order" type="number"
                        class="form-control @error('order') is-invalid @enderror"placeholder="Número de ordenação"
                        value="{{ $order }}" {{ $disabled }} maxlength="100" />
                    @error('usage_policy_category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-7">
                    <label class="form-label" for="title">Título</label>
                    <input id="title" name="title" type="text"
                        class="form-control @error('title') is-invalid @enderror"placeholder="Título"
                        value="{{ $usage_policy_catecory_title }}" {{ $disabled }} required maxlength="100" />
                    @error('usage_policy_category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="description">Descrição</label>
                    <input id="description" name="description" type="text"
                        class="form-control @error('description') is-invalid @enderror"placeholder="Descrição"
                        value="{{ $description }}" {{ $disabled }} maxlength="255"/>
                    @error('usage_policy_category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
