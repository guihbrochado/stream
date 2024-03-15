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
                            <div class="h5">{{ $dados_conta }}</div>
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
                            @foreach($dados_conta as $conta)

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
                            @foreach($dados_conta as $conta)
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
                                @if(!empty($dados_conta) && isset($dados_conta[0]->updated_at))
                                {{ formatDateTimeSec($dados_conta[0]->updated_at) }}
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

function updateDadosContas(dados) {
if (dados && dados.length > 0) {
$('.h5').each(function(index) {
if (index === 0) {
$(this).text(dados[0].conta);
} else if (index === 1) { 
const sa ldoFormatado = `R$ ${number_format(dados[0].saldo, 2, ',', '.')}`;
$(this).text(dados[0].saldo > 0 ? saldoFormatado :  `- ${saldoFormatado}`);
} else if (index === 2) { 
const saldoLiquidoFormatado = `R$ ${number_format(dados[0].saldo_liquido, 2, ',', '.')}`;
$(this).text(dados[0].saldo_liquido > 0 ? saldoLiquidoFormatado : ` - ${saldoLiquidoFormatado}`);
} else if (index === 3) { 
$(this).text(dados[0].updated_at);
}
});
}
}

function updateDadosOperacoes(dados) {
$('#tabelaDados').empty();
dados.forEach(op => {
$('#tabelaDados').append(`
            <tr>
                            <td>${op.position_ticket}</td>   
                            <td>${op.valor}</td>             
                            </tr>
                            `);
                            });
                            }
                            
                        function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };

    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
    
    
    
function loadData() {
    $.ajax({
        url: '/sua-rota-para-carregar-dados', 
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            updateDadosContas(data.dados_conta);
            updateDadosOperacoes(data.dados_operacoes);
        },
        error: function(error) {
            console.error("Erro ao carregar os dados:", error);
        }
    });
}
</script>


@endsection
