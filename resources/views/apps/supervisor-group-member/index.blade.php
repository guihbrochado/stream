@extends('layouts.master')
@section('title')
    Membros
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Membros
        @endslot
        @slot('title')
        Membros
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
                                <th>ID</th>
                                <th>Grupo</th>
                                <th>Membro</th>
                                <th>Editado</th>
                                <th class="cell-fit">Ações</th>
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
            var controler = 'supervisor_group_member'

            // Users datatable
            if (dt_table.length) {
                var dt_user = dt_table.DataTable({
                    data: resdata,
                    columns: [
                        // columns according to JSON
                        {
                            data: 'id'
                        },
                        {
                            data: 'group'
                        },
                        {
                            data: 'username'
                        },
                        {
                            data: 'useremail'
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
                            // ID
                            targets: 1,
                            render: function(data, type, full, meta) {
                                var $id = full['id'];
                                // Creates full output for row
                                var $row_output = '<a href="' + baseUrl + controler + '/show/' +
                                    $id + ' ">#' + $id + '</a>';
                                return $row_output;
                            }
                        },
                        {
                            // Grupo
                            targets: 2,
                            render: function(data, type, full, meta) {
                                return full['group'];
                            }
                        },
                        {
                            // User full name and email
                            targets: 3,
                            responsivePriority: 4,
                            render: function(data, type, full, meta) {
                                var $name = full['username']
                                var $email = full['useremail']
                                var $id = full['id'];

                                // For Avatar badge
                                var stateNum = Math.floor(Math.random() * 6);
                                var states = ['success', 'danger', 'warning', 'info', 'dark',
                                    'primary', 'secondary'
                                ];
                                var $state = states[stateNum],
                                    $name = full['username'],
                                    $initials = $name.match(/\b\w/g) || [];
                                $initials = (($initials.shift() || '') + ($initials.pop() || ''))
                                    .toUpperCase();
                                var $output =
                                    '<span class="avatar-initial rounded-circle bg-label-' +
                                    $state + '">' + $initials + '</span>';
                                // Creates full output for row
                                var $row_output = '<a href="' + baseUrl + 'user/show/' + $id +
                                    ' ">#' + $id + '</a>';

                                var $row_output =
                                    '<div class="d-flex justify-content-start align-items-center user-name">' +
                                    '<div class="avatar-wrapper">' +
                                    '<div class="avatar avatar-sm me-3">' +
                                    $output +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="d-flex flex-column">' +
                                    '<a href="' + baseUrl + 'user/show/' + $id +
                                    '" class="text-body text-truncate"><span class="fw-semibold">' +
                                    $name +
                                    '</span></a>' +
                                    '<small class="text-muted">' +
                                    $email +
                                    '</small>' +
                                    '</div>' +
                                    '</div>';
                                return $row_output;
                            }
                        },
                        {
                            // Updated at
                            targets: 4,
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
                        },
                        {
                            // Actions
                            targets: 5,
                            searchable: false,
                            orderable: false,
                            render: function(data, type, full, meta) {
                                return (
                                    '<div class="d-flex align-items-center">' +
                                    '<a href="' + baseUrl + controler + '/show/' + full['id'] +
                                    '" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Preview">' +
                                    '<i class="bx bx-show mx-1"></i></a>' +
                                    '<a href="' + baseUrl + controler + '/edit/' + full['id'] +
                                    '" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Edit">' +
                                    '<i class="bx bx-edit mx-1"></i></a>' +
                                    '<a href="' + baseUrl + controler + '/destroy/' + full[
                                        'id'] +
                                    '" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Delete">' +
                                    '<i class="bx bx-trash mx-1"></i></a>' +
                                    '</div>'
                                );
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
                        },
                        {
                            text: '<i class="bx bx-plus me-md-2"></i><span class="d-md-inline-block d-none">Cadastrar</span>',
                            className: 'btn btn-primary',
                            action: function(e, dt, button, config) {
                                window.location = baseUrl + controler + '/create';
                            }
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
    <!-- END: Page JS-->
@endsection
