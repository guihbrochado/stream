@extends('layouts.master')
@section('title')
    Histórico de Posições
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Core
        @endslot
        @slot('title')
            Log Erros de Ordens
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Main page content-->

                    <div class="card mb-0">
                        <h5 class="card-header">Filtro</h5>
                        <form action="{{ route('deals.index') }}" method="post" class="card-body">
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

                                <div class="col-md-6">
                                    <div v-if="exibirUsuarios">
                                        <label for="client" class="form-label">Cliente</label>
                                        <select id="client" name="client" class="form-select">
                                            <option selected value="">Nenhum</option>
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
                                </div>

                                <div class="col-md-4">
                                    <label for="account" class="form-label">Conta</label>
                                    <select id="account" name="account" class="form-select">
                                        <option selected value="">Todas</option>
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

                                <div class="col-md-8">
                                    <label for="ea" class="form-label">Expert Advisor</label>
                                    <select id="ea" name="ea" class="form-select">
                                        <option selected value="">Todos</option>
                                        @foreach ($experts as $expert)
                                            @if ($ea == $expert->magic_number)
                                                <option value="{{ $expert->magic_number }}" selected>
                                                    {{ $expert->description }}
                                                </option>
                                            @else
                                                <option value="{{ $expert->magic_number }}">
                                                    {{ $expert->description }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @isset($message)
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endisset

                    <table class="invoice-list-table table border-top">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Cliente</th>
                                <th>Símbolo</th>
                                <th>EA</th>
                                <th>Número Mágico</th>                                
                                <th>Erro</th>                            
                                <th>Descrição do Código de Erro</th>
                                <th>Retorno</th>
                                <th>Descrição do Código de Retorno</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @php
        /*
        echo URL::to('/');
        echo route('root');
        */
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

    <script>
        $("#client").on('change', function() {
            $.ajax({
                type: "POST",
                url: '/order_error/filtros',
                data: {
                    client: document.getElementById('client').value,
                    account: document.getElementById('account').value,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    // atualiza as contas do cliente
                    $('#account').empty();
                    var $select = $('#account');
                    var o = $('<option/>', {
                            value: ""
                        })
                        .text("Todas")
                        .prop('selected', 1)
                    o.appendTo($select);
                    for (var i = 0; i < data.accounts.length; i++) {
                        var o = $('<option/>', {
                                value: data.accounts[i]["account"]
                            })
                            .text(data.accounts[i]["account"]);
                        //.prop('selected', i == 0);
                        o.appendTo($select);
                    }

                    // atualiza os eas para o cliente
                    $('#ea').empty();
                    var $select = $('#ea');
                    var o = $('<option/>', {
                            value: ""
                        })
                        .text("Todos")
                        .prop('selected', 1)
                    o.appendTo($select);
                    for (var i = 0; i < data.eas.length; i++) {
                        var o = $('<option/>', {
                                value: data.eas[i]["magic_number"]
                            })
                            .text(data.eas[i]["description"]);
                        //.prop('selected', i == 0);
                        o.appendTo($select);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    //console.log(data);
                },
            });
        });

        $("#account").on('change', function() {
            $.ajax({
                type: "POST",
                url: '/order_error/filtros',
                data: {
                    client: document.getElementById('client').value,
                    account: document.getElementById('account').value,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    // atualiza os eas para o cliente
                    $('#ea').empty();
                    var $select = $('#ea');
                    var o = $('<option/>', {
                            value: ""
                        })
                        .text("Todos")
                        .prop('selected', 1)
                    o.appendTo($select);
                    for (var i = 0; i < data.eas.length; i++) {
                        var o = $('<option/>', {
                                value: data.eas[i]["magic_number"]
                            })
                            .text(data.eas[i]["description"]);
                        //.prop('selected', i == 0);
                        o.appendTo($select);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    //console.log(data);
                },
            });
        });

        let resdata = {!! $data["order_errors"] !!}
        let baseUrl = "{!! route('root') !!}" + "/"

        //console.log(moment().format());
        //console.log(window);
        //console.log(baseUrl)

        'use strict';

        // Datatable (jquery)
        $(function() {
            let borderColor, bodyBg, headingColor;

            /*
            if (isDarkStyle) {
                borderColor = config.colors_dark.borderColor;
                bodyBg = config.colors_dark.bodyBg;
                headingColor = config.colors_dark.headingColor;
            } else {
                borderColor = config.colors.borderColor;
                bodyBg = config.colors.bodyBg;
                headingColor = config.colors.headingColor;
            }
            */

            // Variable declaration for table
            var dt_table = $('.invoice-list-table');
            var controler = 'expert_advisor'

            // Users datatable
            if (dt_table.length) {
                var dt_user = dt_table.DataTable({
                    data: resdata,
                    columns: [
                        // columns according to JSON
                        {
                            data: ''
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'symbol'
                        },
                        {
                            data: 'ea_code'
                        },
                        {
                            data: 'magic_number'
                        },
                        {
                            data: 'runtime_error_code'
                        },
                        {
                            data: 'runtime_error_code_description'
                        },
                        {
                            data: 'trade_server_return_code'
                        },
                        {
                            data: 'trade_server_return_code_description'
                        },
                        {
                            data: 'created_at'
                        }
                    ],
                    columnDefs: [{
                            // For Responsive
                            className: 'control',
                            responsivePriority: 2,
                            searchable: false,
                            orderable: false,
                            targets: 0,
                            render: function(data, type, full, meta) {
                                return '';
                            }
                        }
                    ],
                    order: [
                        [1, 'desc']
                    ],
                    dom: '<"row mx-2"' +
                        '<"col-md-2"<"me-3"l>>' +
                        '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
                        '>t' +
                        '<"row mx-2"' +
                        '<"col-sm-12 col-md-6"i>' +
                        '<"col-sm-12 col-md-6"p>' +
                        '>',
                    language: {
                        search: '',
                        searchPlaceholder: 'Pesquisar..',
                        decimal: "",
                        emptyTable: "Sem dados para exibir",
                        info: "Exibindo de _START_ até _END_ de _TOTAL_ registros",
                        infoEmpty: "Exibindo 0 até 0 de 0 registros",
                        infoFiltered: "(filtrado do total de _MAX_ registros)",
                        infoPostFix: "",
                        thousands: ",",
                        lengthMenu: "Exibir _MENU_ registros",
                        loadingRecords: "Carregando...",
                        processing: "",
                        zeroRecords: "Sem registros compatíveis com a pesquisa",
                        paginate: {
                            first: '«',
                            previous: '‹',
                            next: '›',
                            last: '»'
                        }
                    },
                    // Buttons with Dropdown
                    buttons: [{
                            extend: 'collection',
                            className: 'btn btn-label-secondary dropdown-toggle mx-3',
                            text: '<i class="bx bx-upload me-2"></i>Exportar',
                            buttons: [{
                                    extend: 'print',
                                    text: '<i class="bx bx-printer me-2" ></i>Print',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5, 6, 7],
                                        // prevent avatar to be print
                                        format: {
                                            body: function(inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function(index, item) {
                                                    if (item.classList !== undefined &&
                                                        item.classList.contains(
                                                            'user-name')) {
                                                        result = result + item.lastChild
                                                            .firstChild.textContent;
                                                    } else if (item.innerText ===
                                                        undefined) {
                                                        result = result + item
                                                            .textContent;
                                                    } else result = result + item
                                                        .innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    },
                                    /*
                                    customize: function (win) {
                                        //customize print view for dark
                                        $(win.document.body)
                                            .css('color', headingColor)
                                            .css('border-color', borderColor)
                                            .css('background-color', bodyBg);
                                        $(win.document.body)
                                            .find('table')
                                            .addClass('compact')
                                            .css('color', 'inherit')
                                            .css('border-color', 'inherit')
                                            .css('background-color', 'inherit');
                                    }
                                    */
                                },
                                {
                                    extend: 'csv',
                                    text: '<i class="bx bx-file me-2" ></i>Csv',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5, 6, 7],
                                        // prevent avatar to be display
                                        format: {
                                            body: function(inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function(index, item) {
                                                    if (item.classList !== undefined &&
                                                        item.classList.contains(
                                                            'user-name')) {
                                                        result = result + item.lastChild
                                                            .firstChild.textContent;
                                                    } else if (item.innerText ===
                                                        undefined) {
                                                        result = result + item
                                                            .textContent;
                                                    } else result = result + item
                                                        .innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: 'excel',
                                    text: '<i class="bx bxs-file me-2"></i>Excel',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5, 6, 7],
                                        // prevent avatar to be display
                                        format: {
                                            body: function(inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function(index, item) {
                                                    if (item.classList !== undefined &&
                                                        item.classList.contains(
                                                            'user-name')) {
                                                        result = result + item.lastChild
                                                            .firstChild.textContent;
                                                    } else if (item.innerText ===
                                                        undefined) {
                                                        result = result + item
                                                            .textContent;
                                                    } else result = result + item
                                                        .innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5, 6, 7],
                                        // prevent avatar to be display
                                        format: {
                                            body: function(inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function(index, item) {
                                                    if (item.classList !== undefined &&
                                                        item.classList.contains(
                                                            'user-name')) {
                                                        result = result + item.lastChild
                                                            .firstChild.textContent;
                                                    } else if (item.innerText ===
                                                        undefined) {
                                                        result = result + item
                                                            .textContent;
                                                    } else result = result + item
                                                        .innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: 'copy',
                                    text: '<i class="bx bx-copy me-2" ></i>Copy',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [1, 2, 3, 4, 5, 6, 7],
                                        // prevent avatar to be display
                                        format: {
                                            body: function(inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function(index, item) {
                                                    if (item.classList !== undefined &&
                                                        item.classList.contains(
                                                            'user-name')) {
                                                        result = result + item.lastChild
                                                            .firstChild.textContent;
                                                    } else if (item.innerText ===
                                                        undefined) {
                                                        result = result + item
                                                            .textContent;
                                                    } else result = result + item
                                                        .innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    }
                                }
                            ]
                        }
                    ]
                });
            }

            // Filter form control to default size
            // ? setTimeout used for multilingual table initialization
            setTimeout(() => {
                $('.dataTables_filter .form-control').removeClass('form-control-sm');
                $('.dataTables_length .form-select').removeClass('form-select-sm');
            }, 300);
        });
    </script>
@endsection
