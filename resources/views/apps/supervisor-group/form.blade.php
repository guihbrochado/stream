@extends('layouts.master')
@section('title')
    Grupos
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Grupos de Suepervisão
        @endslot
        @slot('title')
            <a href="{{ route('supervisor_group.index') }}">Grupos</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';
        // fields
        $group = old('supervisor_group') !== null ? old('supervisor_group') : $supervisor_group->group;
        
        if ($action == 'create') {
            $route = route('supervisor_group.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar novo';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('supervisor_group.update', $supervisor_group->id);
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
                    <label class="form-label" for="group">Grupo</label>
                    <input id="group" name="group" type="text"
                        class="form-control @error('group') is-invalid @enderror"placeholder="Grupo"
                        value="{{ $group }}" {{ $disabled }} required />
                    @error('group')
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
