@extends('layouts.master')
@section('title')
Clientes Ativos
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
            <a href="{{ route('customer.index') }}">Clientes Ativos</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';
        $pass_required = '';
        
        // fields
        $user_id = old('user_id') !== null ? old('user_id') : $customer->user_id;
        $customer_status_id = old('customer_status_id') !== null ? old('customer_status_id') : $customer->customer_status_id;
        
        if ($action == 'create') {
            $route = route('customer.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar novo';
            $button = 'Cadastrar';
            $pass_required = 'required';
        } elseif ($action == 'edit') {
            $route = route('customer.update', $customer->id);
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
                <div class="col-md-7">
                    <label class="form-label" for="user_id">Cliente</label>
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
                <div class="col-md-5">
                    <label class="form-label" for="customer_status_id">Status</label>
                    <select id="customer_status_id" name="customer_status_id" required
                        class="form-control @error('customer_status_id') is-invalid @enderror" {{ $disabled }}>
                        <option value="">Selecione...</option>
                        @foreach ($customer_statuses as $customer_status)
                            @if ($customer_status_id == $customer_status->id)
                                <option value="{{ $customer_status->id }}" selected>{{ $customer_status->customer_status }}
                                </option>
                            @else
                                <option value="{{ $customer_status->id }}">{{ $customer_status->customer_status }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('customer_status_id')
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
