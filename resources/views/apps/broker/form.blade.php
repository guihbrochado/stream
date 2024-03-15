@extends('layouts.master')
@section('title')
    Corretoras
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
            <a href="{{ route('broker.index') }}">Corretoras</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';
        // fields
        $broker_name = old('broker') !== null ? old('broker') : $broker->broker;
        
        if ($action == 'create') {
            $route = route('broker.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar novo';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('broker.update', $broker->id);
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
                <div class="col-md-12">
                    <label class="form-label" for="broker">Corretora</label>
                    <input id="broker" name="broker" type="text"
                        class="form-control @error('broker') is-invalid @enderror"placeholder="Corretora"
                        value="{{ $broker_name }}" {{ $disabled }} required />
                    @error('broker')
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
