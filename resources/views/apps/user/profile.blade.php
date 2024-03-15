@extends('layouts.master')
@section('title')
    Perfil
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">@lang('translation.View_Profile')</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    @php
        $disabled = '';
        $pass_required = '';
        
        // fields
        $email = old('email') !== null ? old('email') : $user->email;
        $name = old('name') !== null ? old('name') : $user->name;
        $password = old('password') !== null ? old('password') : $user->password;
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

    <div class="row mb-4">
        <div class="col-xl-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text-center">
                        <div class="dropdown float-end">
                            <a class="text-body dropdown-toggle font-size-18" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true">
                                <i class="uil uil-ellipsis-v"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('profile.edit')}}">Editar</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div>
                            <img src="{{ $user->trader_image_path ? URL::asset('/images/users/'. $user->trader_image_path) : URL::asset('/images/users/profile-user.jpg') }}" 
                                 alt="" class="avatar-lg rounded-circle img-thumbnail">
                        </div>
                        <h5 class="mt-3 mb-1">{{ $user->name }}</h5>
                        <p class="text-muted">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
