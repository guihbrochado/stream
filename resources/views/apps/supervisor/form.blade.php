@extends('layouts.master')
@section('title')
    Expert Advisors
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
            <a href="{{ route('supervisor.index') }}">Expert Advisors</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';
        
        // fields
        $id = old('id') !== null ? old('id') : $supervisor->id;
        $supervisor_group_id = old('supervisor_group_id') !== null ? old('supervisor_group_id') : $supervisor->supervisor_group_id;
        $user_id = old('user_id') !== null ? old('user_id') : $supervisor->user_id;
        
        if ($action == 'create') {
            $route = route('supervisor.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar novo';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('supervisor.update', $supervisor->id);
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
                    <input id="id" name="id" type="hidden" value="{{ $id }} ">
                    <label class="form-label" for="supervisor_group_id">Grupo</label>
                    <select id="supervisor_group_id" name="supervisor_group_id" required
                        class="form-control @error('supervisor_group_id') is-invalid @enderror"
                        @if ($supervisor->id) disabled @else {{ $disabled }} @endif>
                        <option value="">Selecione...</option>
                        @foreach ($supervisor_groups as $supervisor_group)
                            @if ($supervisor_group_id == $supervisor_group->id)
                                <option value="{{ $supervisor_group->id }}" selected>{{ $supervisor_group->group }}</option>
                            @else
                                <option value="{{ $supervisor_group->id }}">{{ $supervisor_group->group }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('supervisor_group_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="user_id">Supervisor</label>
                    <select id="user_id" name="user_id" required
                        class="form-control @error('user_id') is-invalid @enderror" {{ $disabled }}>
                        <option value="">Selecione...</option>
                        @foreach ($users as $user)
                            @if ($user_id == $user->id)
                                <option value="{{ $user->id }}" selected>{{ $user->name }}
                                </option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('user_id')
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
