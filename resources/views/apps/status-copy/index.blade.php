@extends('layouts.master')
@section('title')
    Status do Copy
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Administração
        @endslot
        @slot('title')
            Status do Copy
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Dados de traders</h4>

                    <table class="senders-table table border-top">
                        <thead>
                            <tr>
                                <th></th>
                                <th>EA</th>
                                <th>Conta</th>
                                <th>Ativo</th>
                                <th>Ticket</th>
                                <th>Tipo</th>
                                <th>Volume</th>
                                <th>Preço</th>
                                <th>Lucro</th>
                                <th>Última Atualização</th>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Dados de Clientes</h4>

                    <table class="clients-table table border-top">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Ativo</th>
                                <th>Conta</th>
                                <th>Cliente</th>
                                <th>Saldo/Livre</th>
                                <th>Tipo</th>
                                <th>Volume</th>
                                <th>Preço</th>
                                <th>Lucro</th>
                                <th>Última Atualização</th>
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

    <script src="{{ URL::asset('/assets/libs/moment/moment.min.js') }}"></script>

    <!-- BEGIN: Page JS-->
    @php
        //dd($senders);
    @endphp
    <script>
        let baseUrl = "{!! route('root') !!}" + "/"

        //console.log(moment().format());
        //console.log(window);
        //console.log(baseUrl)

        'use strict';

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

        // Datatable (jquery)
        // dados de traders
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
            var dt_table = $('.senders-table');

            // Users datatable
            if (dt_table.length) {
                var dt_senders = dt_table.DataTable({
                    searching: false,
                    paging: false,
                    "ajax": {
                        "url": "/api/copy_sender",
                        "type": "GET",
                        "dataType": "json",
                        data: {

                        },
                        "dataSrc": 'data',
                        /*
                        // o método success não permite a rendereização dos dados na tabela...
                        success: function (data) {
                            //document.getElementById('p1').innerHTML = result.data;
                            console.log(data);
                            //res_data = result.data;
                        },
                        */

                    },
                    columns: [
                        // columns according to JSON
                        {
                            data: ''
                        },
                        {
                            data: 'ea_name'
                        },
                        {
                            data: 'account'
                        },
                        {
                            data: 'position_symbol'
                        },
                        {
                            data: 'position_ticket'
                        },
                        {
                            data: 'position_type'
                        },
                        {
                            data: 'position_volume'
                        },
                        {
                            data: 'position_price_open'
                        },
                        {
                            data: 'position_profit'
                        },
                        {
                            data: 'updated_at'
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
                        },
                        {
                            // type
                            targets: 5,
                            render: function(data, type, full, meta) {
                                if (data == 1) {
                                    return "Venda";
                                } else if (data == 0) {
                                    return "Compra";
                                } else {
                                    return "-"
                                }
                            }
                        },
                        {
                            // Volume
                            targets: 6,
                            render: function(data, type, full, meta) {
                                return (number_format(data, 2, ',', '.'));
                            }
                        },
                        {
                            // Preço
                            targets: 7,
                            render: function(data, type, full, meta) {
                                return (number_format(data, 2, ',', '.'));
                            }
                        },
                        {
                            // Lucro
                            targets: 8,
                            render: function(data, type, full, meta) {
                                $retorno = "";
                                if (data > 0) {
                                    $retorno =
                                        '<span class="badge rounded-pill bg-soft-success font-size-12"> ' +
                                        number_format(data, 2, ',', '.') + '</span>'
                                } else
                                if (data < 0) {
                                    $retorno =
                                        '<span class="badge rounded-pill bg-soft-danger font-size-12"> ' +
                                        number_format(data, 2, ',', '.') + '</span>'
                                } else {
                                    $retorno = number_format(data, 2, ',', '.')
                                }

                                return $retorno;
                            }
                        },
                        {
                            // Updated at
                            targets: 9,
                            render: function(data, type, full, meta) {
                                var $due_date = new Date(full['updated_at']);
                                // Creates full output for row
                                var $row_output =
                                    '<span class="d-none">' +
                                    moment($due_date).format('YYYYMMDD, HH:mm:ss a') +
                                    '</span>' +
                                    moment($due_date).format('DD/MM/YYYY, HH:mm:ss');
                                $due_date;
                                return $row_output;
                            }
                        }
                    ],
                    order: [
                        [1, 'desc']
                    ],
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
                    }
                });

                setInterval(function() {
                    dt_senders.ajax.reload();
                }, 1000);
            }

            // Filter form control to default size
            // ? setTimeout used for multilingual table initialization
            setTimeout(() => {
                $('.dataTables_filter .form-control').removeClass('form-control-sm');
                $('.dataTables_length .form-select').removeClass('form-select-sm');
            }, 300);
        });

        // dados de clientes        
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
            var dt_table = $('.clients-table');

            // Users datatable
            var groupColumn = 10;
            if (dt_table.length) {
                var dt_clients = dt_table.DataTable({
                    searching: false,
                    paging: false,
                    "ajax": {
                        "url": "/api/copy_client",
                        "type": "GET",
                        "dataType": "json",
                        data: {

                        },
                        "dataSrc": 'data',
                        /*
                        // o método success não permite a rendereização dos dados na tabela...
                        success: function (data) {
                            //document.getElementById('p1').innerHTML = result.data;
                            console.log(data);
                            //res_data = result.data;
                        },
                        */
                    },
                    columns: [
                        // columns according to JSON
                        {
                            data: ''
                        },
                        {
                            data: 'position_symbol'
                        },
                        {
                            data: 'account'
                        },
                        {
                            data: 'username'
                        },
                        {
                            data: 'account_balance'
                        },
                        {
                            data: 'position_type'
                        },
                        {
                            data: 'position_volume'
                        },
                        {
                            data: 'position_price_open'
                        },
                        {
                            data: 'position_profit'
                        },
                        {
                            data: 'updated_at'
                        },
                        {
                            data: 'ea_name'
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
                        },
                        {
                            visible: false,
                            targets: groupColumn
                        },
                        {
                            targets: 1,
                            render: function(data, type, full, meta) {
                                return full['position_symbol'];
                            }
                        },
                        {
                            targets: 2,
                            render: function(data, type, full, meta) {
                                return full['account'];
                            }
                        },
                        {
                            targets: 3,
                            render: function(data, type, full, meta) {
                                return full['username'];
                            }
                        },
                        {
                            targets: 4,
                            render: function(data, type, full, meta) {
                                $retorno = number_format(full['account_balance'], 2, ',', '.') + " / "
                                if (full['account_margin_free'] > 0) {
                                    $retorno = $retorno + number_format(full['account_margin_free'], 2, ',', '.')
                                } else {
                                    $retorno = $retorno +
                                        '<span class="badge rounded-pill bg-soft-danger font-size-12"> ' +
                                        number_format(full['account_margin_free'], 2, ',', '.') +
                                        '</span>'
                                }

                                return $retorno;
                            }
                        },
                        {
                            // type
                            targets: 5,
                            render: function(data, type, full, meta) {
                                if (full['position_type'] == 1) {
                                    return "Venda";
                                } else if (full['position_type'] == 0) {
                                    return "Compra";
                                } else {
                                    return "-"
                                }
                            }
                        },
                        {
                            // Volume
                            targets: 6,
                            render: function(data, type, full, meta) {
                                return (number_format(full['position_volume'], 2, ',', '.'));
                            }
                        },
                        {
                            // Preço
                            targets: 7,
                            render: function(data, type, full, meta) {
                                return (number_format(full['position_price_open'], 2, ',', '.'));
                            }
                        },
                        {
                            // Lucro
                            targets: 8,
                            render: function(data, type, full, meta) {
                                $retorno = "";
                                if (full['position_profit'] > 0) {
                                    $retorno =
                                        '<span class="badge rounded-pill bg-soft-success font-size-12"> ' +
                                        number_format(full['position_profit'], 2, ',', '.') + '</span>'
                                } else
                                if (full['position_profit'] < 0) {
                                    $retorno =
                                        '<span class="badge rounded-pill bg-soft-danger font-size-12"> ' +
                                        number_format(full['position_profit'], 2, ',', '.') + '</span>'
                                } else {
                                    $retorno = number_format(full['position_profit'], 2, ',', '.')
                                }

                                return $retorno;
                            }
                        },
                        {
                            // Updated at
                            targets: 9,
                            render: function(data, type, full, meta) {
                                var $due_date = new Date(full['updated_at']);
                                // Creates full output for row
                                var $row_output =
                                    '<span class="d-none">' +
                                    moment($due_date).format('YYYYMMDD, HH:mm:ss a') +
                                    '</span>' +
                                    moment($due_date).format('DD/MM/YYYY, HH:mm:ss');
                                $due_date;
                                return $row_output;
                            }
                        }
                    ],
                    order: [
                        [groupColumn, 'asc'],[1, 'asc'],[3, 'asc']
                    ],
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
                    drawCallback: function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;

                        api
                            .column(groupColumn, {
                                page: 'current'
                            })
                            .data()
                            .each(function(group, i) {
                                if (last !== group) {
                                    $(rows)
                                        .eq(i)
                                        .before('<tr class="group"><td colspan="8">' + group +
                                            '</td></tr>');

                                    last = group;
                                }
                            });
                    },
                });

                setInterval(function() {
                    dt_clients.ajax.reload();
                }, 1000);
            }

            // Filter form control to default size
            // ? setTimeout used for multilingual table initialization
            setTimeout(() => {
                $('.dataTables_filter .form-control').removeClass('form-control-sm');
                $('.dataTables_length .form-select').removeClass('form-select-sm');
            }, 300);
        });

        // Order by the grouping
        $('.dt-row-grouping tbody').on('click', 'tr.group', function() {
            var currentOrder = groupingTable.order()[0];
            if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                groupingTable.order([groupColumn, 'desc']).draw();
            } else {
                groupingTable.order([groupColumn, 'asc']).draw();
            }
        });
    </script>
    <!-- END: Page JS-->
@endsection
