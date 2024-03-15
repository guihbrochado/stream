@extends('layouts.master')
@section('title')
Lista de Usuários
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
Lista de Usuários
@endslot
@endcomponent

<div class="row">
    @foreach ($data as $user)
    <div class="col-xl-3 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a class="text-body dropdown-toggle font-size-16" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="uil uil-ellipsis-h"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Remove</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="mb-4">
                    @if ($user->trader_image_path)
                                <img src="{{ asset('images/users/' . $user->trader_image_path) }}" alt="Profile Picture" class="avatar-lg rounded-circle img-thumbnail">
                            @else
                            <h4 class="m-auto text-center avatar-lg rounded-circle bg-label-secondary">{{ strtoupper(substr($user->name, 0, 2)) }}</h4>
                            @endif
                </div>
                <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">{{ $user->name }}</a></h5>
                <p class="text-muted mb-2">{{ $user->email }}</p>

            </div>

            <div class="btn-group" role="group">
                <a href="{{ route('customer.profile', ['id' => $user->id]) }}" type="button" class="btn btn-outline-light text-truncate"><i class="uil uil-user me-1"></i>
                    Perfil</a>
                <button type="button" class="btn btn-outline-light text-truncate"><i
                        class="uil uil-envelope-alt me-1"></i> E-mail</button>

            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection