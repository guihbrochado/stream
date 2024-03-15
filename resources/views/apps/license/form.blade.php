@extends('layouts.master')
@section('title')
    Licenças
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .has-license {
            color: #a5a5a5;
        }
    </style>
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Administração
        @endslot
        @slot('title')
            <a href="{{ route('license.index') }}">Licenças</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';

        // fields
        $expert_advisor_id = old('expert_advisor_id') !== null ? old('expert_advisor_id') : $license->expert_advisor_id;
        $account_id = old('account_id') !== null ? old('account_id') : $license->account_id;
        $lifetime = old('lifetime') !== null ? old('lifetime') : $license->lifetime;
        $validity = old('validity') !== null ? old('validity') : $license->validity;
        $volume = old('volume') !== null ? old('volume') : $license->volume;
        $paused = old('paused') !== null ? old('paused') : $license->paused;
        $operation_type_id = old('operation_type_id') !== null ? old('operation_type_id') : $license->operation_type_id;
        $leverage = old('leverage') !== null ? old('leverage') : $license->leverage;
        $max_volume = old('max_volume') !== null ? old('max_volume') : $license->max_volume;
        $max_daily_loss = old('max_daily_loss') !== null ? old('max_daily_loss') : $license->max_daily_loss;
        $allowed_symbols = old('allowed_symbols') !== null ? old('allowed_symbols') : $license->allowed_symbols;

        $id = old('id') !== null ? old('id') : $license->id;

        if ($action == 'create') {
            $route = route('license.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar nova';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('license.update', $license->id);
            $title = 'Editar';
            $card_title = 'Editar';
            $button = 'Atualizar';
        } else {
            $route = '';
            $title = 'Visualização';
            $card_title = 'Visualização';
            $disabled = 'disabled';
        }

        $existingAccountIds = [];
        foreach ($licenseCreated as $license) {
            $existingAccountIds[] = $license->account_id;
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
        <div class="row">
            <div class="col-sm-12">
                <h5 class="card-header">{{ $card_title }}</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="col-sm-6">
                <label for="search-account">Filtrar Cliente/Conta:</label>
                <input type="text" id="search-account" class="form-control" placeholder="Digite para pesquisar...">
            </div>
        </div>

        <form action="{{ $route }}" method="post" class="card-body">
            @csrf
            @if ($action == 'edit')
                @method('PATCH')
            @endif
            <div class="row g-3">
                <div class="col-md-6">
                    <input id="id" name="id" type="hidden" value="{{ $id }} ">
                    <label class="form-label" for="expert_advisor_id">Expert Advisor</label>
                    <select id="expert_advisor_id" name="expert_advisor_id" required
                        class="form-control @error('expert_advisor_id') is-invalid @enderror" {{ $disabled }}>
                        <option value="">Select the Expert Advisor</option>
                        @foreach ($eas as $ea)
                            @if ($expert_advisor_id == $ea->id)
                                <option value="{{ $ea->id }}" selected>{{ $ea->name }} ({{ $ea->code }})
                                </option>
                            @else
                                <option value="{{ $ea->id }}">{{ $ea->name }} ({{ $ea->code }})</option>
                            @endif
                        @endforeach
                    </select>
                    @error('expert_advisor_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="account_id">Cliente/Conta</label>
                    <select multiple id="account_id" name="account_ids[]" required
                        class="form-control select2-multi-checkbox @error('account_id') is-invalid @enderror"
                        {{ $disabled }} data-placeholder="Selecione a Cliente/Conta">
                        <option value="">Selecione a Cliente/Conta</option>
                        @foreach ($accounts as $account)
                            @php
                                $selected = '';
                                if ($account_id == $account->id) {
                                    $selected = 'selected';
                                }
                            @endphp
                            @if (in_array($account->id, $existingAccountIds))
                                <option value="{{ $account->id }}" class="has-license" {{ $selected }}>
                                    {{ $account->name }} ({{ $account->account }}) - Já possui licença
                                </option>
                            @else
                                <option value="{{ $account->id }}" {{ $selected }}>
                                    {{ $account->name }} ({{ $account->account }})
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('account_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="operation_type_id">Tipo de Setup</label>
                    <select id="operation_type_id" name="operation_type_id" required
                        class="form-control @error('operation_type_id') is-invalid @enderror" {{ $disabled }}>
                        <option value="">Selecione...</option>
                        @foreach ($operation_types as $operation_type)
                            @if ($operation_type_id == $operation_type->id)
                                <option value="{{ $operation_type->id }}" selected>{{ $operation_type->name }}
                                </option>
                            @else
                                <option value="{{ $operation_type->id }}">{{ $operation_type->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('operation_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="volume">Volume fixo/inicial</label>
                    <input id="volume" name="volume" type="number" step="any"
                        class="form-control @error('volume') is-invalid @enderror" placeholder="0,00"
                        value="{{ !empty($volume) ? number_format($volume, 2, '.', '') : '' }}" {{ $disabled }} />
                    @error('volume')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="leverage">Multiplicador da Alavancagem</label>
                    <input id="leverage" name="leverage" type="number" step="any"
                        class="form-control @error('leverage') is-invalid @enderror" placeholder="0,00"
                        value="{{ !empty($leverage) ? number_format($leverage, 2, '.', '') : '' }}" {{ $disabled }} />
                    @error('leverage')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="max_volume">Volume máximo autorizado</label>
                    <input id="max_volume" name="max_volume" type="number" step="any"
                        class="form-control @error('max_volume') is-invalid @enderror" placeholder="0,00"
                        value="{{ !empty($max_volume) ? number_format($max_volume, 2, '.', '') : '' }}"
                        {{ $disabled }} />
                    @error('max_volume')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="max_daily_loss">Limite de perda diário (0 = desligado)</label>
                    <input id="max_daily_loss" name="max_daily_loss" type="number" step="any"
                        class="form-control @error('max_daily_loss') is-invalid @enderror" placeholder="0,00"
                        value="{{ !empty($max_daily_loss) ? number_format($max_daily_loss, 2, '.', '') : '' }}"
                        {{ $disabled }} />
                    @error('max_daily_loss')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="allowed_symbols">Símbolos de ativos autorizados a operar</label>
                    <input id="allowed_symbols" name="allowed_symbols" type="text" required
                        class="form-control @error('allowed_symbols') is-invalid @enderror" placeholder="WIN;WDO"
                        value="{{ $allowed_symbols }}" {{ $disabled }} />
                    @error('allowed_symbols')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="validity">Validade</label>
                    <div class="input-group" id="datepicker2">
                        <input id="validity" name="validity" type="text" class="form-control"
                            placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2'
                            data-provide="datepicker" data-date-autoclose="true" @error('validity') is-invalid @enderror"
                            value="{{ $validity }}" {{ $disabled }}>
                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                    </div><!-- input-group -->
                    @error('validity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mt-3">
                    <div class="col-4">
                        <div class="form-check">
                            <input id="lifetime" name="lifetime" type="checkbox" class="form-check-input"
                                value="1" @if ($lifetime) checked @endif {{ $disabled }}>
                            <label class="form-check-label" for="lifetime">
                                Vitalício
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input id="paused" name="paused" type="checkbox" class="form-check-input"
                                value="1" @if ($paused) checked @endif {{ $disabled }}>
                            <label class="form-check-label" for="paused">
                                Pausar negociações
                            </label>
                        </div>
                    </div>
                </div>
                @if ($action != 'show')
                    <div class="pt-4">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ $button }}</button>
                    </div>
                @endif
            </div>

        </form>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
    <script>
        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + "").replace(",", "").replace(" ", "");
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
                dec = typeof dec_point === "undefined" ? "." : dec_point,
                s = "",
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return "" + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || "").length < prec) {
                s[1] = s[1] || "";
                s[1] += new Array(prec - s[1].length + 1).join("0");
            }
            return s.join(dec);
        }

        $(document).ready(function() {

            // Função para formatar a saída do select2
            function formatState(state) {
                if (!state.id) {
                    return state.text;
                }

                // Verifica se o elemento tem a classe has-license
                var hasLicense = $(state.element).hasClass('has-license');
                if (hasLicense) {
                    var $state = $('<span style="opacity: 0.5; color: #a5a5a5;">' + state.text + '</span>');
                } else {
                    var $state = $('<span><input type="checkbox" class="select2-checkbox" /> ' + state.text +
                        '</span>');
                }

                return $state;
            };

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
            var allOptions = $('#account_id option').clone();

            // Filtro
            $("#search-account").on("event", function() {
                var value = $(this).val().toLowerCase();

                // Remover todas as opções atuais
                $('#account_id').empty();

                // Adicionar apenas as opções que correspondem ao filtro
                allOptions.each(function() {
                    if ($(this).text().toLowerCase().indexOf(value) > -1) {
                        $('#account_id').append($(this).clone());
                    }
                });

                // Destrua e reinicialize o select2
                initSelect2();
            });

            $("#expert_advisor_id").on("change", function() {
                let eas = {!! $eas !!}
                for (ea of eas) {
                    if (ea['id'] == $("#expert_advisor_id").val()) {
                        $("#operation_type_id").val(ea['operation_type_id'])
                        $("#volume").val(number_format(ea['default_volume'], 2, '.', ''))
                        $("#leverage").val(number_format(ea['default_leverage'], 2, '.', ''))
                        $("#max_volume").val(number_format(ea['default_max_volume'], 2, '.', ''))
                        $("#max_daily_loss").val(number_format(ea['default_max_daily_loss'], 2, '.', ''))
                        $("#allowed_symbols").val(ea['allowed_symbols'])
                    }
                }
            })
        });
    </script>
@endsection
