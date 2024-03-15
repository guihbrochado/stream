@extends('layouts.master')
@section('title')
    Contas MT5
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
            <a href="{{ route('account.index') }}">Contas MT5</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';
        
        // fields
        $id = old('id') !== null ? old('id') : $account->id;
        $account_number = old('account') !== null ? old('account') : $account->account;
        $password = old('password') !== null ? old('password') : $account->password;
        $server_name = old('server_name') !== null ? old('server_name') : $account->server;
        $user_id = old('user_id') !== null ? old('user_id') : $account->user_id;
        $account_type_id = old('account_type_id') !== null ? old('account_type_id') : $account->account_type_id;
        $broker_id = old('broker_id') !== null ? old('broker_id') : $account->broker_id;
        $volume = old('volume') !== null ? old('volume') : $account->volume;
        $symbols = old('symbols') !== null ? old('symbols') : $account->symbols;
        $image = old('image') !== null ? old('image') : $account->image;
        
        if ($action == 'create') {
            $route = route('account.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar nova';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('account.update', $account->id);
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
                    <label class="form-label" for="user_id">Usuário</label>
                    <select id="user_id" name="user_id" required
                        class="form-control @error('user_id') is-invalid @enderror"
                        @if ($account->id) disabled @else {{ $disabled }} @endif>
                        <option value="">Selecione o usuário</option>
                        @foreach ($users as $user)
                            @if ($user_id == $user->id)
                                <option value="{{ $user->id }}" selected>{{ $user->name }} ({{ $user->email }})
                                </option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endif
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="account_type_id">Tipo de Conta</label>
                    <select id="account_type_id" name="account_type_id" required
                        class="form-control @error('account_type_id') is-invalid @enderror" {{ $disabled }}>
                        <option value="">Tipo de Conta</option>
                        @foreach ($account_types as $account_type)
                            @if ($account_type_id == $account_type->id)
                                <option value="{{ $account_type->id }}" selected>{{ $account_type->account_type }}
                                </option>
                            @else
                                <option value="{{ $account_type->id }}">{{ $account_type->account_type }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('account_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="broker_id">Corretora</label>
                    <select id="broker_id" name="broker_id" class="form-control @error('broker_id') is-invalid @enderror"
                        {{ $disabled }}>
                        <option value="">Corretora (Opcional)</option>
                        @foreach ($brokers as $broker)
                            @if ($broker_id == $broker->id)
                                <option value="{{ $broker->id }}" selected>{{ $broker->broker }}
                                </option>
                            @else
                                <option value="{{ $broker->id }}">{{ $broker->broker }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('broker_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="account">Número da conta MT5</label>
                    <input id="account" name="account" type="number"
                        class="form-control @error('account') is-invalid @enderror" placeholder="Número da conta MT5"
                        value="{{ $account_number }}" {{ $disabled }} required />
                    @error('account')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="password">Senha do Mt5</label>
                    <input id="password" name="password" type="text"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Senha do Mt5 (opcional)"
                        value="{{ $password }}" {{ $disabled }} />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="server_name">Servidor</label>
                    <input id="server_name" name="server_name" type="text"
                        class="form-control @error('server_name') is-invalid @enderror" placeholder="Servidor (opcional)"
                        value="{{ $server_name }}" {{ $disabled }} />
                    @error('server_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="volume">Número de Contratos</label>
                    <input id="volume" name="volume" type="number"
                        class="form-control @error('volume') is-invalid @enderror" placeholder="Número de contratos"
                        value="{{ $volume }}" {{ $disabled }} />
                    @error('volume')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="symbols">Ativo operado</label>
                    <input id="symbols" name="symbols" type="text"
                        class="form-control @error('symbols') is-invalid @enderror" placeholder="Ativo operado"
                        value="{{ $symbols }}" {{ $disabled }} />
                    @error('symbols')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="image">Imagem com dados da conta (opcional)</label>
                    @if (!is_null($image))
                        <div>
                            <img src="{{ URL::asset('/images/accounts/' . $image) }}">
                        </div>
                    @elseif ($action == 'create')
                        <input id="image" name="image" type="file"
                            class="form-control @error('image') is-invalid @enderror" $disabled />
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
