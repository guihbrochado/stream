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
            Administração
        @endslot
        @slot('title')
            <a href="{{ route('expert_advisor.index') }}">Expert Advisors</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';

        // fields
        $code = old('code') !== null ? old('code') : $expert_advisor->code;
        $name = old('name') !== null ? old('name') : $expert_advisor->name;
        $magic_number = old('magic_number') !== null ? old('magic_number') : $expert_advisor->magic_number;
        $port = old('port') !== null ? old('port') : $expert_advisor->port;
        $description = old('description') !== null ? old('description') : $expert_advisor->description;
        $active = old('active') !== null ? old('active') : $expert_advisor->active;
        $visible = old('visible') !== null ? old('visible') : $expert_advisor->visible;
        $operation_type_id = old('operation_type_id') !== null ? old('operation_type_id') : $expert_advisor->operation_type_id;
        $allowed_symbols = old('allowed_symbols') !== null ? old('allowed_symbols') : $expert_advisor->allowed_symbols;
        $default_volume = old('default_volume') !== null ? old('default_volume') : $expert_advisor->default_volume;
        $default_max_volume = old('default_max_volume') !== null ? old('default_max_volume') : $expert_advisor->default_max_volume;
        $default_max_daily_loss = old('default_max_daily_loss') !== null ? old('default_max_daily_loss') : $expert_advisor->default_max_daily_loss;
        $default_leverage = old('default_leverage') !== null ? old('default_leverage') : $expert_advisor->default_leverage;
        $copy_orders = old('copy_orders') !== null ? old('copy_orders') : $expert_advisor->copy_orders;
        $required_balance = old('required_balance') !== null ? old('required_balance') : $expert_advisor->required_balance;

        if ($action == 'create') {
            $route = route('expert_advisor.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar novo';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('expert_advisor.update', $expert_advisor->id);
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
                    <label class="form-label" for="expert_advisor">Código</label>
                    <input id="code" name="code" type="text"
                        class="form-control @error('code') is-invalid @enderror"placeholder="Código"
                        value="{{ $code }}"
                        @if ($expert_advisor->id) disabled @else {{ $disabled }} @endif required />
                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="expert_advisor">Nome do EA</label>
                    <input id="name" name="name" type="text"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Nome do EA"
                        value="{{ $name }}" {{ $disabled }} required />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="expert_advisor">Magic Number</label>
                    <input id="magic_number" name="magic_number" type="number"
                        class="form-control @error('magic_number') is-invalid @enderror" placeholder="Magic Number"
                        value="{{ $magic_number }}" {{ $disabled }} required />
                    @error('magic_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                        placeholder="Descrição" {{ $disabled }}>{{ $description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mt-3">
                    <div class="col-12">
                        <div class="form-check">
                            <input id="active" name="active" type="checkbox" class="form-check-input"
                                value="1" @if ($active) checked @endif {{ $disabled }}>
                            <label class="form-check-label" for="active">
                                Ativo
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input id="visible" name="visible" type="checkbox" class="form-check-input"
                                value="1" @if ($visible) checked @endif {{ $disabled }}>
                            <label class="form-check-label" for="visible">
                                Visível
                            </label>
                        </div>
                    </div>
                </div>
                <hr style="width:100% height:40px">
                <div class="col-md-12">
                    Definições relacionadas a EAs de Copy
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="expert_advisor">Porta</label>
                    <input id="port" name="port" type="number"
                        class="form-control @error('port') is-invalid @enderror" placeholder="Porta de conexão copy"
                        value="{{ $port }}" {{ $disabled }} />
                    @error('port')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="operation_type_id">Tipo de Setup</label>
                    <select id="operation_type_id" name="operation_type_id"
                        class="form-control @error('operation_type_id') is-invalid @enderror" {{ $disabled }}>
                        <option value="">Selecione...</option>
                        @foreach ($operation_types as $operation_type)
                            @if ($operation_type_id == $operation_type->id)
                                <option value="{{ $operation_type->id }}" selected>{{ $operation_type->name }}
                                </option>
                            @else
                                <option value="{{ $operation_type->id }}">{{ $operation_type->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('operation_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="default_volume">Volume fixo/inicial (valor padrão)</label>
                    <input id="default_volume" name="default_volume" type="number" step="any"
                        class="form-control @error('default_volume') is-invalid @enderror" placeholder="0,00"
                        value="{{ !empty($default_volume) ? number_format($default_volume, 2, '.', '') : '' }}"
                        {{ $disabled }} />
                    @error('default_volume')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="default_leverage">Multiplicador da Alavancagem (valor padrão)</label>
                    <input id="default_leverage" name="default_leverage" type="number" step="any"
                        class="form-control @error('default_leverage') is-invalid @enderror" placeholder="0,00"
                        value="{{ !empty($default_leverage) ? number_format($default_leverage, 2, '.', '') : '' }}"
                        {{ $disabled }} />
                    @error('default_leverage')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="default_max_volume">Volume máximo autorizado (valor padrão)</label>
                    <input id="default_max_volume" name="default_max_volume" type="number" step="any"
                        class="form-control @error('default_max_volume') is-invalid @enderror" placeholder="0,00"
                        value="{{ !empty($default_max_volume) ? number_format($default_max_volume, 2, '.', '') : '' }}"
                        {{ $disabled }} />
                    @error('default_max_volume')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="default_max_daily_loss">Limite de perda diário (0 = desligado) (valor
                        padrão)</label>
                    <input id="default_max_daily_loss" name="default_max_daily_loss" type="number" step="any"
                        class="form-control @error('default_max_daily_loss') is-invalid @enderror" placeholder="0,00"
                        value="{{ !empty($default_max_daily_loss) ? number_format($default_max_daily_loss, 2, '.', '') : '' }}"
                        {{ $disabled }} />
                    @error('default_max_daily_loss')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="allowed_symbols">Símbolos de ativos autorizados a operar (valor
                        padrão)</label>
                    <input id="allowed_symbols" name="allowed_symbols" type="text"
                        class="form-control @error('allowed_symbols') is-invalid @enderror" placeholder="WIN;WDO"
                        value="{{ $allowed_symbols }}" {{ $disabled }} />
                    @error('allowed_symbols')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="required_balance">Saldo mínimo por lote mínimo</label>
                    <input id="required_balance" name="required_balance" type="number" step="any"
                        class="form-control @error('required_balance') is-invalid @enderror" placeholder="0,00"
                        value="{{ !empty($required_balance) ? number_format($required_balance, 2, '.', '') : '' }}"
                        {{ $disabled }} />
                    @error('required_balance')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mt-3">
                    <div class="col-4">
                        <div class="form-check">
                            <input id="copy_orders" name="copy_orders" type="checkbox" class="form-check-input"
                                value="1" @if ($copy_orders) checked @endif {{ $disabled }}>
                            <label class="form-check-label" for="copy_orders">
                                Copiar ordens pendentes (apregoadas, apenas take profit e stop loss)
                            </label>
                        </div>
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
