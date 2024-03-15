@extends('layouts.master')
@section('title')
Usários
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
<a href="{{ route('user.index') }}">Usários</a>
@endslot
@endcomponent

@php
$disabled = '';
$pass_required = '';

// fields
$email = old('email') !== null ? old('email') : $user->email;
$name = old('name') !== null ? old('name') : $user->name;
$password = old('password') !== null ? old('password') : $user->password;
$cpf = old('cpf') !== null ? old('cpf') : $user->cpf;
$phone = old('phone') !== null ? old('phone') : $user->phone;
$expire = old('expiry_date') !== null ? old('expiry_date') : $expiry_date;
$is_client = old('client') !== null ? old('client') : $user->client;
$is_user = old('user') !== null ? old('user') : $user->user;
$is_admin = old('admin') !== null ? old('admin') : $user->admin;

if ($action == 'create') {
$route = route('user.store');
$title = 'Cadastrar';
$card_title = 'Adicionar novo';
$button = 'Cadastrar';
$pass_required = 'required';
} elseif ($action == 'edit') {
$route = route('user.update', $user->id);
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
    <form action="{{ $route }}" method="post" class="card-body" enctype="multipart/form-data">
        @csrf
        @if ($action == 'edit')
        @method('PATCH')
        @endif
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="user">Name</label>
                <input id="name" name="name" type="text"
                       class="form-control @error('name') is-invalid @enderror" 
                       value="{{ $name }}" {{ $disabled }} required />
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="cpf">CPF</label>
                <input id="cpf" name="cpf" type="text"
                       class="form-control @error('cpf') is-invalid @enderror"
                       value="{{ $cpf }}" {{ $disabled }} />
                @error('cpf')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="user">E-mail</label>
                <input id="email" name="email" type="text"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ $email }}" {{ $disabled }} required />
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="user">Telefone</label>
                <input id="phone" name="phone" type="text"
                       class="form-control @error('phone') is-invalid @enderror"
                       value="{{ $phone }}" {{ $disabled }} />
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="user">Descrição</label>
                <input id="description" name="description" type="text"
                       class="form-control @error('description') is-invalid @enderror" 
                       value="{{ $description }}" {{ $disabled }}  />
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="user">Experiencia</label>
                <input id="experience" name="experience" type="text"
                       class="form-control @error('experience') is-invalid @enderror" 
                       value="{{ $experience }}" {{ $disabled }}  />
                @error('experience')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="col-md-6">
                <label class="form-label" for="user">Password</label>
                <input id="password" name="password" type="password"
                       class="form-control @error('password') is-invalid @enderror" 
                       value="{{ $password }}" {{ $disabled }} {{ $pass_required }} />
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="trader_image_path">Imagem do Trader</label>
                <input id="trader_image_path" name="trader_image_path" type="file" 
                       class="form-control @error('trader_image_path') is-invalid @enderror" />
                @error('trader_image_path')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="user">Rua</label>
                <input id="street" name="street" type="text"
                       class="form-control @error('street') is-invalid @enderror" value="{{ $street }}"
                       {{ $disabled }} />
                @error('street')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="user">Bairro</label>
                <input id="district" name="district" type="text"
                       class="form-control @error('district') is-invalid @enderror" value="{{ $district }}"
                       {{ $disabled }} />
                @error('district')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="user">Cidade</label>
                <input id="city" name="city" type="text"
                       class="form-control @error('city') is-invalid @enderror" value="{{ $city }}"
                       {{ $disabled }} />
                @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="user">Estado</label>
                <input id="state" name="state" type="text"
                       class="form-control @error('state') is-invalid @enderror" value="{{ $state }}"
                       {{ $disabled }} />
                @error('state')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="expiry_date">Data de Vencimento</label>
                <input id="expiry_date" name="expiry_date" type="date"
                       class="form-control @error('expiry_date') is-invalid @enderror" 
                       value="{{ $expire }}" {{ $disabled }} />
                @error('expiry_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6"></div>
            <div class="col-3">
                <div class="form-check">
                    <input id="client" name="client" type="checkbox" class="form-check-input" value="1"
                           @if ($is_client) checked @endif {{ $disabled }}>
                    <label class="form-check-label" for="client">
                        Cliente
                    </label>
                </div>
            </div>
            <div class="col-3">
                <div class="form-check">
                    <input id="user" name="user" type="checkbox" class="form-check-input" value="1"
                           @if ($is_user) checked @endif {{ $disabled }}>
                    <label class="form-check-label" for="user">
                        Usuário
                    </label>
                </div>
            </div>
            <div class="col-3">
                <div class="form-check">
                    <input id="admin" name="admin" type="checkbox" class="form-check-input" value="1"
                           @if ($is_admin) checked @endif {{ $disabled }}>
                    <label class="form-check-label" for="admin">
                        Admin
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
