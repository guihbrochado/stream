@extends('layouts.master')
@section('title')
    Contas Conta Investimento
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            {{ config('app.name') }}
        @endslot
        @slot('title')
            <a href="{{ route('conta_investimento.index') }}">Contas Conta Investimento</a>
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
            $route = route('conta_investimento.store');
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
        <form action="{{ $route }}" method="post" enctype="multipart/form-data" class="card-body">
            @csrf
            @if ($action == 'edit')
                @method('PATCH')
            @endif
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="account">Número da conta da Plataforma Metatrader 5</label>
                    <input id="account" name="account" type="number"
                        class="form-control @error('account') is-invalid @enderror" placeholder="Número da conta"
                        value="{{ $account_number }}" {{ $disabled }} required />
                    @error('account')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="password">Senha da Plataforma Metatrader 5</label>
                    <input id="password" name="password" type="text"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Senha"
                        value="{{ $password }}" {{ $disabled }} required />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="broker_id">Corretora</label>
                    <select id="broker_id" name="broker_id" class="form-control @error('broker_id') is-invalid @enderror"
                        {{ $disabled }} required>
                        <option value="">-- selecione --</option>
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
