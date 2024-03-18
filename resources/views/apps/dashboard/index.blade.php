@extends('layouts.master-without-nav')
@section('title')
Dashboard
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-search--dropdown {
        padding: 10px;
        background-color: transparent !important;
    }
</style>

@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle')
Core
@endslot
@slot('title')
Dashboard
@endslot
@endcomponent

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.title-meta')
    @include('layouts.head')

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
@include('components.nav')
<div class="p-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Main page content-->

                    <div class="card mb-0">
                        <h5 class="card-header">Filtro</h5>
                        <form action="{{ route('dashboard.index') }}" method="post" class="card-body">
                            @csrf
                            <input id="user" name="user"type="hidden" value="{{ auth()->user()->id }}" />

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Período:</label>
                                        <div class="input-daterange input-group" id="periodo"
                                             data-date-format="dd/mm/yyyy" data-date-autoclose="true"
                                             data-provide="datepicker" data-date-container='#periodo'>
                                            <input type="text" class="form-control" name="date_from"
                                                   placeholder="Data Inical" value="{{ $date_from }}" />
                                            <input type="text" class="form-control" name="date_to"
                                                   placeholder="Data Final" value="{{ $date_to }}" />
                                        </div>
                                    </div>
                                </div>

                                @if ($show_clients)
                                <div class="col-md-6">
                                    <label for="client" class="form-label">Cliente</label>
                                    <select id="client" name="client" class="form-select">
                                        <option selected value="-1">Todos</option>
                                        @foreach ($users as $user)
                                        @if ($client == $user->id)
                                        <option value="{{ $user->id }}" selected>
                                            {{ $user->name }} ({{ $user->email }})
                                        </option>
                                        @else
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }} ({{ $user->email }})
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                <div class="col-md-4">
                                    <label for="account" class="form-label">Conta</label>
                                    <select id="account" name="account" class="form-select">
                                        <option selected value="-1">Todas</option>
                                        @foreach ($accounts as $conta)
                                        @if ($account == $conta->account)
                                        <option value="{{ $conta->account }}" selected>
                                            {{ $conta->account }}
                                        </option>
                                        @else
                                        <option value="{{ $conta->account }}">
                                            {{ $conta->account }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                @if ($show_clients)
                                <div class="col-md-8">
                                    <label for="ea" class="form-label">Expert Advisor</label>
                                    <select id="ea" name="ea" class="form-select">
                                        <option selected value="-1">Todos</option>
                                        @foreach ($experts as $expert)
                                        @if ($ea == $expert->id)
                                        <option value="{{ $expert->id }}" selected>
                                            {{ $expert->name }}
                                        </option>
                                        @else
                                        <option value="{{ $expert->id }}">
                                            {{ $expert->name }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Aplicar Filtro</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1">R$ {{ number_format($data['saldo_total'], 2, ',', '') }}</h4>
                        <p class="text-muted mb-0">Saldo das operações</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1">{{ number_format($data['fator_lucro'], 2, ',', '') }}</h4>
                        <p class="text-muted mb-0">Fator de Lucro</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1">{{ number_format($data['taxa_acerto'], 2, ',', '') }}%</h4>
                        <p class="text-muted mb-0">Taxa de acerto</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">

            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="growth-chart" data-colors='["--bs-warning"]'></div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1">R$ {{ number_format($data['drawdown_maximo'], 2, ',', '') }}</h4>
                        <p class="text-muted mb-0">Drawdown máximo</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->
    </div> <!-- end row-->

    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="mt-3" style="margin-left: 25px;">
                    <h4 class="card-title">Curva de capital</h4>
                </div>
                <div class="card-body" style="height: 405px;">
                    <canvas id="chart_curva_capital"></canvas>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-3">

            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Payoff</p>
                        <h4 class="mb-1 mt-1">{{ number_format($data['payoff'], 2, ',', '') }}</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Média das operações</p>
                        <h4 class="mb-1 mt-1">R$ {{ number_format($data['media_operacoes'], 2, ',', '') }}</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Média das operações positivas</p>
                        <h4 class="mb-1 mt-1">R$ {{ number_format($data['media_profit'], 2, ',', '') }}</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Média das operações negativas</p>
                        <h4 class="mb-1 mt-1">R$ {{ number_format($data['media_perdas'], 2, ',', '') }}</h4>
                    </div>
                </div>
            </div>

        </div> <!-- end Col -->
    </div> <!-- end row-->

    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="mt-3" style="margin-left: 25px;">
                    <h4 class="card-title">Lucro/perda diária</h4>
                </div>
                <div class="card-body" style="height: 405px;">
                    <canvas id="chart_lucro_perda"></canvas>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-3">

            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Maior operação com lucro</p>
                        <h4 class="mb-1 mt-1">R$ {{ number_format($data['maior_profit'], 2, ',', '') }}</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Maior operação com prejuízo</p>
                        <h4 class="mb-1 mt-1">R$ {{ number_format($data['maior_perda'], 2, ',', '') }}</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Dias positivos</p>
                        <h4 class="mb-1 mt-1">{{ $data['qtd_dias_positivo'] }}</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                    </div>
                    <div>
                        <p class="text-muted mb-0">Dias negativos</p>
                        <h4 class="mb-1 mt-1">{{ $data['qtd_dias_negativo'] }}</h4>
                    </div>
                </div>
            </div>
        </div> <!-- end Col -->
    </div> <!-- end row-->
</div>
@php
/*
echo URL::to('/');
echo route('root');
*/
$datas_lucro_perda = json_encode($data['datas_lucro_perda']);
$lucro = json_encode($data['lucro']);
$perda = json_encode($data['perda']);

$curva_datas = json_encode($data['curva_datas']);
$curva_valor = json_encode($data['curva_valor']);
@endphp
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>

<script src="{{ URL::asset('/assets/libs/moment/moment.min.js') }}"></script>

<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('/assets/libs/chart-js/chart-js.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
$(document).ready(function () {
$('#client').select2({
placeholder: "Selecione um cliente",
        allowClear: true,
        width: '100%'
});
});</script>

<script>
    $("#client").on('change', function () {
    $.ajax({
    type: "POST",
            url: '/api/dashboard/filtros',
            data: {
            client: document.getElementById('client').value,
                    account: document.getElementById('account').value,
                    ea: document.getElementById('ea').value,
                    _token: '{{ csrf_token() }}'
            },
            success: function (data) {
            // atualiza as contas do cliente
            var account_selected = document.getElementById('account').value
                    $('#account').empty();
            var $select = $('#account');
            var o = $('<option/>', {
            value: "-1"
            })
                    .text("Todas")
                    .prop('selected', account_selected == - 1)
                    o.appendTo($select);
            for (var i = 0; i < data.accounts.length; i++) {
            var o = $('<option/>', {
            value: data.accounts[i]["account"]
            })
                    .text(data.accounts[i]["account"])
                    .prop('selected', account_selected == data.accounts[i]["account"]);
            o.appendTo($select);
            }

            // atualiza os eas para o cliente
            var ea_selected = document.getElementById('ea').value
                    $('#ea').empty();
            var $select = $('#ea');
            var o = $('<option/>', {
            value: "-1"
            })
                    .text("Todos")
                    .prop('selected', ea_selected == - 1)
                    o.appendTo($select);
            for (var i = 0; i < data.eas.length; i++) {
            var o = $('<option/>', {
            value: data.eas[i]["id"]
            })
                    .text(data.eas[i]["name"])
                    .prop('selected', ea_selected == data.eas[i]["id"])
                    o.appendTo($select);
            }
            },
            error: function (data, textStatus, errorThrown) {
            //console.log(data);
            },
    });
    });
    $("#account").on('change', function () {
    $.ajax({
    type: "POST",
            url: '/api/dashboard/filtros',
            data: {
            client: ($('#client').length > 0) ? document.getElementById('client').value : 0,
                    account: document.getElementById('account').value,
                    ea: ($('#ea').length > 0) ? document.getElementById('ea').value : 0,
                    _token: '{{ csrf_token() }}'
            },
            success: function (data) {

            // atualiza os clientes para a conta
            if ($('#client').length > 0) {
            var client_selected = document.getElementById('client').value
                    $('#client').empty();
            var $select = $('#client');
            var o = $('<option/>', {
            value: "-1"
            })
                    .text("Todos")
                    .prop('selected', client_selected == - 1)
                    o.appendTo($select);
            for (var i = 0; i < data.users.length; i++) {
            var o = $('<option/>', {
            value: data.users[i]["id"]
            })
                    .text(data.users[i]["name"] + "(" + data.users[i]["email"] + ")")
                    .prop('selected', client_selected == data.users[i]["id"])
                    o.appendTo($select);
            }
            }

            // atualiza os eas para a conta
            if ($('#ea').length > 0) {
            var ea_selected = document.getElementById('ea').value
                    $('#ea').empty();
            var $select = $('#ea');
            var o = $('<option/>', {
            value: "-1"
            })
                    .text("Todos")
                    .prop('selected', ea_selected == - 1)
                    o.appendTo($select);
            for (var i = 0; i < data.eas.length; i++) {
            var o = $('<option/>', {
            value: data.eas[i]["id"]
            })
                    .text(data.eas[i]["name"])
                    .prop('selected', data.eas[i]["id"] == ea_selected)
                    o.appendTo($select);
            }
            }
            },
            error: function (data, textStatus, errorThrown) {
            //console.log(data);
            },
    });
    });
    $("#ea").on('change', function () {
    $.ajax({
    type: "POST",
            url: '/api/dashboard/filtros',
            data: {
            client: ($('#client').length > 0) ? document.getElementById('client').value : 0,
                    account: document.getElementById('account').value,
                    ea: document.getElementById('ea').value,
                    _token: '{{ csrf_token() }}'
            },
            success: function (data) {
            // atualiza os clientes para a conta
            if ($('#client').length > 0) {
            var client_selected = document.getElementById('client').value
                    $('#client').empty();
            var $select = $('#client');
            var o = $('<option/>', {
            value: "-1"
            })
                    .text("Todos")
                    .prop('selected', client_selected == - 1)
                    o.appendTo($select);
            for (var i = 0; i < data.users.length; i++) {
            var o = $('<option/>', {
            value: data.users[i]["id"]
            })
                    .text(data.users[i]["name"] + "(" + data.users[i]["email"] + ")")
                    .prop('selected', client_selected == data.users[i]["id"])
                    o.appendTo($select);
            }
            }

            // atualiza as contas do cliente
            var account_selected = document.getElementById('account').value
                    $('#account').empty();
            var $select = $('#account');
            var o = $('<option/>', {
            value: "-1"
            })
                    .text("Todas")
                    .prop('selected', account_selected == - 1)
                    o.appendTo($select);
            for (var i = 0; i < data.accounts.length; i++) {
            var o = $('<option/>', {
            value: data.accounts[i]["account"]
            })
                    .text(data.accounts[i]["account"])
                    .prop('selected', account_selected == data.accounts[i]["account"]);
            o.appendTo($select);
            }
            },
            error: function (data, textStatus, errorThrown) {
            //console.log(data);
            },
    });
    });
    const ctx1 = document.getElementById('chart_curva_capital');
    let curva_datas = {!! $curva_datas !!}
    ;
    let curva_valor = {!! $curva_valor !!}
    ;
    new Chart(ctx1, {
    type: 'line',
            data: {
            labels: curva_datas,
                    datasets: [{
                    label: 'Saldo acumulado',
                            data: curva_valor,
                            fill: false,
                            backgroundColor: 'rgb(75, 192, 192)',
                            borderColor: 'rgb(75, 192, 192)',
                    }]
            },
            options: {
            maintainAspectRatio: false,
                    responsive: true
            }
    });
    const ctx2 = document.getElementById('chart_lucro_perda');
    let datas = { !! $datas_lucro_perda !! }}
    let lucro = { !! $lucro !! }}
    let perda = { !! $perda !!}

    new Chart(ctx2, {
    type: 'bar',
            data: {
            labels: datas,
                    datasets: [{
                    label: 'Lucro',
                            data: lucro,
                            fill: false,
                            backgroundColor: 'rgb(51,102,255)',
                            borderColor: 'rgb(51, 102, 204)',
                    }, {
                    label: 'Perda',
                            data: perda,
                            fill: false,
                            backgroundColor: 'rgb(255,51,102)',
                            borderColor: 'rgb(255, 51, 51)',
                    }]
            },
            options: {
            maintainAspectRatio: false,
                    responsive: true,
                    scales: {
                    y: {
                    beginAtZero: true
                    }
                    }
            }
    });
</script>
@endsection
