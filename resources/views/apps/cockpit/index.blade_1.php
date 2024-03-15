@extends('layouts.master')

@section('title') @lang('translation.Dashboard') @endsection

@section('css')

<link href="{{ URL::asset('build/libs/jquery-vectormap/jquery-vectormap.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') Dashboard @endslot
@endcomponent

@php
$tituloPlural = 'Cockpit';
@endphp

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="bi bi-graph-up-arrow"></i></div>
                        {{ $tituloPlural ?? '' }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- bloco 1-->
<div class="container-fluid px-4">
    <div class="row" v-for="obj, chave in dados_conta" :key="chave">
        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 1-->
            <div class="card border-start-lg border-start-teal h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">Conta</div>
                            <div class="h5">{{ $dadosAccount }}</div>
                            {{ var_dump($dadosAccount) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 2-->
            <div class="card border-start-lg border-start-teal h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">Saldo</div>
                            @foreach($dadosAccount as $conta)
                            
                            @if($conta->saldo > 0)
                            <div class="h5 text-blue">R$ {{ number_format($conta->saldo, 2, ',', '.') }}</div>
                            @elseif($conta->saldo < 0)
                            <div class="h5 text-red">R$ {{ number_format($conta->saldo, 2, ',', '.') }}</div>
                            @else
                            <div class="h5">R$ {{ number_format($conta->saldo, 2, ',', '.') }}</div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 3-->
            <div class="card border-start-lg border-start-teal h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">Capital Líquido</div>
                            @foreach($dadosAccount as $conta)
                            @if($conta->saldo_liquido > 0)
                            <div class="h5 text-blue">R$ {{ number_format($conta->saldo_liquido, 2, ',', '.') }}</div>
                            @elseif($conta->saldo_liquido < 0)
                            <div class="h5 text-red">R$ {{ number_format($conta->saldo_liquido, 2, ',', '.') }}</div>
                            @else
                            <div class="h5">R$ {{ number_format($conta->saldo_liquido, 2, ',', '.') }}</div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 3-->
            <div class="card border-start-lg border-start-teal h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-secondary mb-1">Última atualização</div>
                            <div class="h5">
                                @if(!empty($dadosAccount) && isset($dadosAccount[0]->updated_at))
                                {{ formatDateTimeSec($dadosAccount[0]->updated_at) }}
                                @else
                                Não disponível
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">Negociações</div>
        <div class="card-body">
            <table id="tabelaDados" class="table table-striped" style="width:100%">
            </table>
        </div>
    </div>
</div>
@endsection
