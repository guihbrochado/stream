@extends('layouts.master')
@section('title')
    Membros
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Grupos de Suepervisão
        @endslot
        @slot('title')
            <a href="{{ route('supervisor_group_member.index') }}">Membros</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';

        // fields
        $id = old('id') !== null ? old('id') : $supervisor_group_member->id;
        $supervisor_group_id = old('supervisor_group_id') !== null ? old('supervisor_group_id') : $supervisor_group_member->supervisor_group_id;
        $user_id = old('user_id') !== null ? old('user_id') : $supervisor_group_member->user_id;

        if ($action == 'create') {
            $route = route('supervisor_group_member.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar novo';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('supervisor_group_member.update', $supervisor_group_member->id);
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
        <div class="row mt-2">
            <div class="col-sm-6">
                <h5 class="card-header">{{ $card_title }}</h5>
            </div>
            <div class="col-sm-6 mt-2">
                <label for="search-account">Filtrar membro:</label>
                <input type="text" id="search-account" class="form-control" placeholder="Digite para pesquisar...">
            </div>
        </div>
        <form action="{{ $route }}" method="post" class="card-body">
            @csrf
            @if ($action == 'edit')
                @method('PATCH')
            @endif
            <div class="row g-3">
                <div class="col-md-12">
                    <input id="id" name="id" type="hidden" value="{{ $id }} ">
                    <label class="form-label" for="supervisor_group_id">Grupo</label>
                    <select id="supervisor_group_id" name="supervisor_group_id" required
                        class="form-control @error('supervisor_group_id') is-invalid @enderror"
                        @if ($supervisor_group_member->id) disabled @else {{ $disabled }} @endif>
                        <option value="">Selecione...</option>
                        @foreach ($supervisor_groups as $supervisor_group)
                            @if ($supervisor_group_id == $supervisor_group->id)
                                <option value="{{ $supervisor_group->id }}" selected>{{ $supervisor_group->group }}</option>
                            @else
                                <option value="{{ $supervisor_group->id }}">{{ $supervisor_group->group }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('supervisor_group_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="user_id">Membro</label>
                    <select multiple id="user_id" name="user_ids[]" required
                        class="form-control select2-multi-checkbox @error('user_id') is-invalid @enderror"
                        {{ $disabled }} data-placeholder="Selecione o membro">
                        <option value="">Selecione o membro</option>
                        @foreach ($users as $user)
                            @if (in_array($user->id, $supervisorsWithGroups))
                                <option value="{{ $user->id }}" class="has-group"
                                    @if ($user_id == $user->id) selected @endif>{{ $user->name }} - Possuí Grupo
                                </option>
                            @else
                                <option value="{{ $user->id }}" @if ($user_id == $user->id) selected @endif>
                                    {{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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

@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            // Função para formatar a saída do select2
            function formatState(state) {
                if (!state.id) {
                    return state.text;
                }

                // Verifica se o elemento tem a classe has-license
                var hasGroup = $(state.element).hasClass('has-group');
                if (hasGroup) {
                    var $state = $('<span style="opacity: 0.5; color: #a5a5a5;">' + state.text + '</span>');
                } else {
                    var $state = $('<span><input type="checkbox" class="select2-checkbox" /> ' + state.text +
                        '</span>');
                }

                return $state;
            }

            function initSelect2() {
                $('.select2-multi-checkbox').select2({
                    templateResult: formatState,
                    placeholder: "Selecione a Cliente/Conta",
                    closeOnSelect: false
                });
            }

            // Inicialização do select2
            initSelect2();

            // Capturar todas as opções originais
            var allOptions = $('#user_id option').clone();

            // Filtro
            $("#search-account").on("keyup", function() {
                var value = $(this).val().toLowerCase();

                // Remover todas as opções atuais
                $('#user_id').empty();

                // Adicionar apenas as opções que correspondem ao filtro
                allOptions.each(function() {
                    if ($(this).text().toLowerCase().indexOf(value) > -1) {
                        $('#user_id').append($(this).clone());
                    }
                });

                // Destrua e reinicialize o select2
                initSelect2();
            });
        });
    </script>
@endsection
