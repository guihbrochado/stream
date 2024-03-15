@extends('layouts.master-without-nav')
@section('title')
@lang('translation.Login')
@endsection
@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <a href="{{ url('index') }}" class="mb-5 d-block auth-logo">
                        <img src="{{ URL::asset('/assets/images/OFLOGOpng.png') }}" alt="" height="22"
                             class="logo logo-dark">
                        <img src="{{ URL::asset('/assets/images/OFLOGOpng.png') }}" alt="" height="22"
                             class="logo logo-light">
                    </a>
                    <h1 style="font-size: 45px;" class="fw-bold text-white">Login</h1>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 col-lg-6 col-xl-6">
                <div class="card">

                    <div class="card-body p-4">
                        <div class="p-2 mt-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label text-white fw-bolder" for="email">Email*</label>
                                    <input style="border-radius: 12px; border:none; line-height: 22px; color: rgba(255, 255, 255, 0.53); font-family: 'Azeret Mono'; font-weight: 400" 
                                           type="text" class="font-size-14 form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email', '') }}" id="email"
                                           placeholder="Endereço de e-mail" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">

                                    <label class="form-label text-white fw-bolder" for="userpassword">Senha*</label>
                                    <input style="border-radius: 12px; border:none; line-height: 22px; color: rgba(255, 255, 255, 0.53); font-family: 'Azeret Mono'; font-weight: 400;" 
                                           type="password" class="mb-3 font-size-14 form-control @error('password') is-invalid @enderror" 
                                           name="password" id="userpassword" placeholder="Informe a senha">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="float-end">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-muted">Esqueceu a senha?</a>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-check">
                                    
                                </div>

                                <div class="mt-3 text-center">
                                    <button class="btn btn-primary waves-effect waves-light w-login" type="submit">Login</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <div class="">
                                        <h5 class="font-size-14 mb-3 title" style="font-family: 'Azeret Mono'; color:rgba(255, 255, 255, 0.53);">Login com</h5>
                                    </div>


                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="javascript:void()"
                                               class="social-list-item bg-primary text-white border-primary">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void()"
                                               class="social-list-item bg-info text-white border-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void()"
                                               class="social-list-item bg-danger text-white border-danger">
                                                <i class="mdi mdi-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="mb-0" style="color: rgba(255, 255, 255, 0.53);">Não possui uma conta? <a href="{{ url('register') }}"
                                                                             class="fw-medium text-primary"> Cadastre-se </a> </p>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="mt-5 text-center">
                    <p>© <script>
                        document.write(new Date().getFullYear())
                        </script> Tridar
                </div>

            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
@endsection
