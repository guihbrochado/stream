@extends('layouts.master')
@section('title')
    Expert Advisors
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
            Expert Advisors
        @endslot
    @endcomponent

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
                                <th>Nome</th>
                                <th>Pausado</th>
                                <th>Ações</th>
                                <th>Zerar</th>
                                <th>Ações</th>
                                <th>Editado</th>
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
    <script>
        let resdata = {!! $data !!}
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
                            data: 'trades_paused'
                        },
                        {
                            data: 'close_positions'
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
                            // pausado
                            targets: 2,
                            className: 'dt-center',
                            render: function(data, type, full, meta) {
                                var $active = (full['trades_paused']) ? "Sim" : "Não";
                                return $active;
                            }
                        },
                        {
                            // Actions
                            targets: 3,
                            searchable: false,
                            orderable: false,
                            className: 'dt-center',
                            render: function(data, type, full, meta) {
                                var bt_html = '<div class="d-flex align-items-center">'
                                if (full['trades_paused']) {
                                    bt_html +=
                                        '<a href="' + baseUrl + controler + '/pause_cancel/' + full['id'] +
                                    '"><button type="button" class="btn btn-success waves-effect waves-light mx-1 btn-sm">Cancelar pausa</button></a>'
                                } else {
                                    bt_html += '<a href="' + baseUrl + controler + '/pause/' + full['id'] +
                                    '"><button type="button" class="btn btn-danger waves-effect waves-light mx-1 btn-sm">Pausar</button></a>'
                                }
                                bt_html += '</div>'
                                return bt_html
                            }
                        },
                        {
                            // pausado
                            targets: 4,
                            render: function(data, type, full, meta) {
                                var $active = (full['close_positions']) ? "Sim" : "Não";
                                return $active;
                            }
                        },
                        {
                            // Actions
                            targets: 5,
                            searchable: false,
                            orderable: false,
                            render: function(data, type, full, meta) {
                                var bt_html = '<div class="d-flex align-items-center">'
                                if (full['close_positions']) {
                                    bt_html +=
                                        '<a href="' + baseUrl + controler + '/close_cancel/' + full['id'] +
                                    '"><button type="button" class="btn btn-success waves-effect waves-light mx-1 btn-sm">Cancelar zeragem</button></a>'
                                } else {
                                    bt_html +=
                                        '<a href="' + baseUrl + controler + '/close/' + full['id'] +
                                    '"><button type="button" class="btn btn-danger waves-effect waves-light mx-1 btn-sm">Zerar</button></a>'
                                }
                                bt_html += '</div>'
                                return bt_html
                            }
                        },
                        {
                            // Updated at
                            targets: 6,
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
            }

            // Filter form control to default size
            // ? setTimeout used for multilingual table initialization
            setTimeout(() => {
                $('.dataTables_filter .form-control').removeClass('form-control-sm');
                $('.dataTables_length .form-select').removeClass('form-select-sm');
            }, 300);
        });
    </script>
    <!-- END: Page JS-->
@endsection
