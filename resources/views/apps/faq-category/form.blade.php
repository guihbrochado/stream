@extends('layouts.master')
@section('title')
    Categorias de FAQs
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
            <a href="{{ route('faq_category.index') }}">Categorias de FAQs</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';
        // fields
        $icon = old('icon') !== null ? old('icon') : $faq_category->icon;
        $order = old('order') !== null ? old('order') : $faq_category->order;
        $faq_catecory_title = old('title') !== null ? old('title') : $faq_category->title;
        $description = old('description') !== null ? old('description') : $faq_category->description;
        
        if ($action == 'create') {
            $route = route('faq_category.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar novo';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('faq_category.update', $faq_category->id);
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
                    @error('faq_category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="order">Ordenação</label>
                    <input id="order" name="order" type="number"
                        class="form-control @error('order') is-invalid @enderror"placeholder="Número de ordenação"
                        value="{{ $order }}" {{ $disabled }} maxlength="100" />
                    @error('faq_category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-7">
                    <label class="form-label" for="title">Título</label>
                    <input id="title" name="title" type="text"
                        class="form-control @error('title') is-invalid @enderror"placeholder="Título"
                        value="{{ $faq_catecory_title }}" {{ $disabled }} required maxlength="100" />
                    @error('faq_category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="description">Descrição</label>
                    <input id="description" name="description" type="text"
                        class="form-control @error('description') is-invalid @enderror"placeholder="Descrição"
                        value="{{ $description }}" {{ $disabled }} maxlength="255"/>
                    @error('faq_category')
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
