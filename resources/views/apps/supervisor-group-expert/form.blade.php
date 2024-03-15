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
            <a href="{{ route('supervisor_group_expert.index') }}">Expert Advisors</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';
        
        // fields
        $id = old('id') !== null ? old('id') : $supervisor_group_expert->id;
        $supervisor_group_id = old('supervisor_group_id') !== null ? old('supervisor_group_id') : $supervisor_group_expert->supervisor_group_id;
        $expert_advisor_id = old('expert_advisor_id') !== null ? old('expert_advisor_id') : $supervisor_group_expert->expert_advisor_id;
        
        if ($action == 'create') {
            $route = route('supervisor_group_expert.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar novo';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('supervisor_group_expert.update', $supervisor_group_expert->id);
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
                        @if ($supervisor_group_expert->id) disabled @else {{ $disabled }} @endif>
                        <option value="">Selecione o grupo</option>
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
                    <label class="form-label" for="expert_advisor_id">Expert Advisor</label>
                    <select id="expert_advisor_id" name="expert_advisor_id" required
                        class="form-control @error('expert_advisor_id') is-invalid @enderror" {{ $disabled }}>
                        <option value="">Selecione o Expert Advisor</option>
                        @foreach ($expert_advisors as $expert_advisor)
                            @if ($expert_advisor_id == $expert_advisor->id)
                                <option value="{{ $expert_advisor->id }}" selected>{{ $expert_advisor->name }}
                                </option>
                            @else
                                <option value="{{ $expert_advisor->id }}">{{ $expert_advisor->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('expert_advisor_id')
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
