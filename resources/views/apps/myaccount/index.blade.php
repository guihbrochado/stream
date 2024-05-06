<!doctype html>
<html lang="en" data-bs-theme="dark">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.title-meta')
        @include('layouts.head')

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>

    <body class="  ">
        <span class="screen-darken"></span>
        <!-- loader Start -->
        <!-- loader Start -->
        <div class="loader simple-loader">
            <div class="loader-body">
                <img src="assets/images/loader.gif" alt="loader" class="img-fluid " width="300">
            </div>
        </div>
        <!-- loader END -->  <!-- loader END -->
        <main class="main-content">
            <!--Nav Start-->
            @include('components.nav')      <!--Nav End-->

            <!--bread-crumb-->
            <div class="iq-breadcrumb" style="background-image: url(assets/images/pages/01.webp);">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <nav aria-label="breadcrumb" class="text-center">
                                <h2 class="title">My Account</h2>
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li> 
                                    <li class="breadcrumb-item active">My Account</li>
                                </ol>
                            </nav>
                        </div>
                    </div> 
                </div>
            </div>      <!--bread-crumb-->

            <div class="section-padding service-details">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="acc-left-menu p-4 mb-5 mb-lg-0 mb-md-0">
                                <div class="product-menu">
                                    <ul class="list-inline m-0 nav nav-tabs flex-column bg-transparent border-0" role="tablist">
                                        <li class="pb-3 nav-item">
                                            <button class="nav-link active p-0 bg-transparent" data-bs-toggle="tab"
                                                    data-bs-target="#dashboard" type="button" role="tab" aria-selected="true"><i
                                                    class="fas fa-tachometer-alt"></i><span class="ms-2">Dashboard</span></button>
                                        </li>
                                        <li class="py-3 nav-item">
                                            <button class="nav-link p-0 bg-transparent" data-bs-toggle="tab"
                                                    data-bs-target="#orders" type="button" role="tab" aria-selected="true"><i
                                                    class="fas fa-list"></i><span class="ms-2">Compras</span></button>
                                        </li>
                                        <li class="py-3 nav-item">
                                            <button class="nav-link p-0 bg-transparent" data-bs-toggle="tab"
                                                    data-bs-target="#address" type="button" role="tab" aria-selected="true"><i
                                                    class="fas fa-map-marker-alt"></i><span class="ms-2">Endereços</span></button>
                                        </li>
                                        <li class="py-3 nav-item">
                                            <button class="nav-link p-0 bg-transparent" data-bs-toggle="tab"
                                                    data-bs-target="#account-details" type="button" role="tab" aria-selected="true"><i
                                                    class="fas fa-user"></i><span class="ms-2">Detalhes da conta</span></button>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="product-menu-content">
                                <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                                    <div class="myaccount-content text-body p-4">
                                        <p>Olá {{ Auth::user()->name }} (não é você? <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>)</p>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="orders-table text-body p-4">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr class="border-bottom">
                                                        <th class="fw-bolder p-3">Order</th>
                                                        <th class="fw-bolder p-3">Date</th>
                                                        <th class="fw-bolder p-3">Status</th>
                                                        <th class="fw-bolder p-3">Total</th>
                                                        <th class="fw-bolder p-3">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="border-bottom">
                                                        <td class="text-primary fs-6">#32604</td>
                                                        <td>October 28, 2022</td>
                                                        <td>Cancelled</td>
                                                        <td>$215.00 For 0 Items</td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">pay</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">view</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">cancel</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td class="text-primary fs-6">#32584</td>
                                                        <td>October 27, 2022</td>
                                                        <td>On Hold</td>
                                                        <td>$522.00 For 0 Items</td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">pay</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">view</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">cancel</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td class="text-primary fs-6">#31756</td>
                                                        <td>October 19, 2022</td>
                                                        <td>Processing</td>
                                                        <td>$243.00 For 0 Items</td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">pay</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">view</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">cancel</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td class="text-primary fs-6">#23663</td>
                                                        <td>October 7, 2022</td>
                                                        <td>Completed</td>
                                                        <td>$123.00 For 0 Items</td>
                                                        <td class="fs-6">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">view</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td class="text-primary fs-6">#23612</td>
                                                        <td>October 7, 2022</td>
                                                        <td>Completed</td>
                                                        <td>$64.00 For 0 Items</td>
                                                        <td class="fs-6">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">view</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-primary fs-6">#19243</td>
                                                        <td>April 1, 2022</td>
                                                        <td>Completed</td>
                                                        <td>$159.00 For 0 Items</td>
                                                        <td class="fs-6">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div class="iq-button">
                                                                    <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                                        <span class="button-text">view</span>
                                                                        <i class="fa-solid fa-play"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel">
                                    @foreach ($addresses as $address)
                                    <div class="text-body p-4">
                                        <p class="my-3">Os seguintes endereços serão usados na página de checkout por padrão.</p>
                                        <div class="d-flex align-items-center justify-content-between my-5 gap-2 flex-wrap">
                                            <h4 class="mb-0">Endereço de Cobrança.</h4>
                                            <div class="iq-button">
                                                <button class="btn text-uppercase position-relative" data-bs-toggle="collapse"
                                                        data-bs-target="#edit-address-{{ $address->id }}" aria-expanded="false">
                                                    <span class="button-text">Editar</span>
                                                    <i class="fa-solid fa-play"></i>
                                                </button>
                                            </div>                                
                                        </div>
                                        <div id="edit-address-{{ $address->id }}" class="collapse">
                                            <div class="text-body mb-4">
                                                <form method="post" action="{{ route('address.update', ['id' => $address->id]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group mb-5">
                                                        <label class="mb-2">CEP&nbsp; <span class="text-danger">*</span></label>
                                                        <input type="text" id="cep" name="cep" value="{{ $address->cep }}" class="form-control mb-3 rounded-0" required="required">
                                                    </div>
                                                    <div class="form-group mb-5">
                                                        <label class="mb-2">Rua&nbsp; <span class="text-danger">*</span></label>
                                                        <input type="text" id="rua" name="street" value="{{ $address->street }}" class="form-control mb-3 rounded-0" required="required">
                                                    </div>
                                                    <div class="form-group mb-5">
                                                        <label class="mb-2">Bairro&nbsp; <span class="text-danger">*</span></label>
                                                        <input type="text" id="bairro" name="district" value="{{ $address->district }}" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group mb-5">
                                                        <label class="mb-2">Cidade&nbsp; <span class="text-danger">*</span></label>
                                                        <input type="text" id="cidade" name="city" value="{{ $address->city }}" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group mb-5">
                                                        <label class="mb-2">Estado&nbsp; <span class="text-danger">*</span></label>
                                                        <input type="text" id="estado" name="state" value="{{ $address->state }}" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn text-uppercase position-relative">
                                                            <span class="button-text">Salvar Endereço</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach 
                                </div>
                                <div class="tab-pane fade" id="account-details" role="tabpanel">
                                    <div class="p-4 text-body">
                                        @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <form method="post" action="{{ route('myaccount.update') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-5">
                                                <label class="mb-2">Nome&nbsp; <span class="text-danger">*</span></label>
                                                <input type="text" name="first_name" value="{{ old('first_name', $user->name) }}" class="form-control" required="required">
                                            </div>
                                            <div class="form-group mb-5">
                                                <label class="mb-2">Email&nbsp; <span class="text-danger">*</span></label>
                                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required="required">
                                            </div>
                                            <h4 class="fw-normal mb-5">Alterar senha</h4>
                                            <div class="form-group mb-5">
                                                <label class="mb-2">Senha Atual</label>
                                                <input type="password" name="current_password" class="form-control">
                                            </div>
                                            <div class="form-group mb-5">
                                                <label class="mb-2">Nova senha</label>
                                                <input type="password" name="new_password" class="form-control">
                                            </div>
                                            <div class="form-group mb-5">
                                                <label class="mb-2">Confirme a nova senha</label>
                                                <input type="password" name="confirm_new_password" class="form-control">  
                                            </div>
                                            <div class="form-group mb-5">
                                                <label class="mb-2">Foto de Perfil</label>
                                                <input type="file" name="profile_photo" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn text-uppercase position-relative">
                                                    <span class="button-text">Salvar alterações</span>
                                                    <i class="fa-solid fa-play"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="logout" role="tabpanel">
                                    <div class="p-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="mb-5 text-primary">Login</h4>
                                                <form method="post">
                                                    <div class="mb-4">
                                                        <input type="text" name="user-name" class="form-control" placeholder="Username or email address *" required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                                                    </div>                                  
                                                    <label class="custom-form-field mb-5">
                                                        <input type="checkbox" required="required" class="mr-2">
                                                        <span class="checkmark"></span>
                                                        <span>Remember me</span>
                                                    </label>
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">Login</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                </form>
                                                <div class="mt-3">
                                                    <div class="iq-button link-button">
                                                        <a href="javascript:void(0)" class="btn text-capitalize position-relative">
                                                            <span class="button-text">Lost your password?</span>
                                                        </a>
                                                    </div>
                                                </div>                           
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="mb-5 mt-5 mt-lg-0 mt-md-0 text-primary">Register</h4>
                                                <form method="post">
                                                    <div class="mb-4">
                                                        <input type="text" name="user-name" placeholder="Username *" class="form-control" required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <input type="email" name="email-address" placeholder="Email address *" class="form-control" required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <input type="password" name="password" placeholder="Password *"
                                                               class="form-control" required>
                                                    </div>                                                                    
                                                    <p class="mb-5"> Your personal data will be used to support your experience
                                                        throughout this
                                                        website, to manage access to your account, and for other purposes described in
                                                        our <a href="privacy-policy.html"> privacy policy</a>.
                                                    </p>
                                                    <div class="iq-button">
                                                        <a href="javascript:void(0)" class="btn text-uppercase position-relative">
                                                            <span class="button-text">register</span>
                                                            <i class="fa-solid fa-play"></i>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div id="back-to-top" style="display: none;">
            <a class="p-0 btn bg-primary btn-sm position-fixed top border-0 rounded-circle" id="top" href="#top">
                <i class="fa-solid fa-chevron-up"></i>
            </a>
        </div>
        @include('layouts.vendor-scripts')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
                                            $(document).ready(function () {
                                                function limpa_formulário_cep() {
                                                    // Limpa valores do formulário de cep.
                                                    $("#rua").val("");
                                                    $("#bairro").val("");
                                                    $("#cidade").val("");
                                                    $("#estado").val("");
                                                }

                                                //Quando o campo cep perde o foco.
                                                $("#cep").blur(function () {

                                                    //Nova variável "cep" somente com dígitos.
                                                    var cep = $(this).val().replace(/\D/g, '');

                                                    //Verifica se campo cep possui valor informado.
                                                    if (cep !== "") {

                                                        //Expressão regular para validar o CEP.
                                                        var validacep = /^[0-9]{8}$/;

                                                        //Valida o formato do CEP.
                                                        if (validacep.test(cep)) {

                                                            //Preenche os campos com "..." enquanto consulta webservice.
                                                            $("#rua").val("...");
                                                            $("#bairro").val("...");
                                                            $("#cidade").val("...");
                                                            $("#estado").val("...");

                                                            //Consulta o webservice viacep.com.br/
                                                            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                                                                if (!("erro" in dados)) {
                                                                    //Atualiza os campos com os valores da consulta.
                                                                    $("#rua").val(dados.logradouro);
                                                                    $("#bairro").val(dados.bairro);
                                                                    $("#cidade").val(dados.localidade);
                                                                    $("#estado").val(dados.uf);
                                                                } //end if.
                                                                else {
                                                                    //CEP pesquisado não foi encontrado.
                                                                    limpa_formulário_cep();
                                                                    alert("CEP não encontrado.");
                                                                }
                                                            });
                                                        } else {
                                                            //cep é inválido.
                                                            limpa_formulário_cep();
                                                            alert("Formato de CEP inválido.");
                                                        }
                                                    } else {
                                                        //cep sem valor, limpa formulário.
                                                        limpa_formulário_cep();
                                                    }
                                                });
                                            });
        </script>

    </body>

</html>