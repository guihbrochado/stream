<!-- apps.payment.index.blade.php -->
@extends('layouts.master')

@section('content')

<!-- Formulário de Filtro -->
<form method="GET" action="{{ route('pagamento.index') }}" class="form-label">
    <div class="row">
        <div class="col-md-3">
            <label for="inicio">De:</label>
            <input class="form-control" type="date" name="inicio" id="inicio" value="{{ request()->get('inicio', \Carbon\Carbon::now()->subDays(30)->toDateString()) }}">
        </div>
        <div class="col-md-3">
            <label for="fim">Até:</label>
            <input class="form-control" type="date" name="fim" id="fim" value="{{ request()->get('fim', now()->toDateString()) }}">
        </div>
        <div class="col-md-3">
            <label for="cpf">CPF:</label>
            <input class="form-control" type="text" name="cpf" id="cpf" value="{{ request()->get('cpf', '') }}">
        </div>
        <div class="col-md-3">
            <label for="nome">Nome:</label>
            <input class="form-control" type="text" name="nome" id="nome" value="{{ request()->get('nome', '') }}">
        </div>
        <div class="col-md-12 mt-3">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </div>
</form>

<!-- Exibe mensagem de erro se $error estiver definido -->
@if(isset($error))
<div class="alert alert-danger">{{ $error }}</div>
<!-- Exibe os dados da tabela se $error não estiver definido -->
@else
<table class="table">
    <thead>
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>Status</th>
            <th>Vencimento</th>
            <th>TXID</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        @foreach($charges as $charge)
        <tr>
            <td>{{ $charge['devedor']['cpf'] }}</td>
            <td>{{ $charge['devedor']['nome'] }}</td>
            <td>{{ $charge['status'] }}</td>
            <td>{{ $charge['calendario']['criacao'] }}</td>
            <td>{{ $charge['txid'] }}</td>
            <td>{{ $charge['valor']['original'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection