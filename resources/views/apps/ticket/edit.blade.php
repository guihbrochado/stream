@extends('layouts.master')
@section('title')
    @if ($admin)
        Tickets
    @else
        Suporte
    @endif
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            @if ($admin)
                Administração
            @else
                {{ config('app.name') }}
            @endif
        @endslot
        @slot('title')
            @if ($admin)
                <a href="{{ route('ticket.index') }}">Tickets</a>
            @else
                <a href="{{ route('suporte.index') }}">Suporte</a>
            @endif
        @endslot
    @endcomponent

    @php
        $disabled = '';
        
        // fields
        /*
        $id = old('id') !== null ? old('id') : $ticket->id;
        $ticket_status_id = old('ticket_status_id') !== null ? old('ticket_status_id') : $ticket->ticket_status_id;
        $ticket_category_id = old('ticket_category_id') !== null ? old('ticket_category_id') : $ticket->ticket_category_id;
        $user_id = old('user_id') !== null ? old('user_id') : $ticket->user_id;
        $starred = old('starred') !== null ? old('starred') : $ticket->starred;
        $title = old('title') !== null ? old('title') : $ticket->title;
        $description = old('description') !== null ? old('description') : $ticket->description;        
        
        if ($action == 'create') {
            $route = route('ticket.store');
            $title = 'Cadastrar';
            $card_title = 'Abrir Ticket';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('ticket.edit', $ticket->id);
            $title = 'Editar';
            $card_title = 'Editar';
            $button = 'Atualizar';
        } else {
            $route = '';
            $title = 'Visualização';
            $card_title = 'Visualização';
            $disabled = 'disabled';
        }
        */
        
    @endphp

    <div class="row">
        <div class="col-12">
            <!-- Left sidebar -->
            <div class="email-leftbar card">
                <button type="button" class="btn btn-danger waves-effect waves-light"
                    @if ($admin) onclick="location.href='{{ route('ticket.create') }}'"
                    @else
                    onclick="location.href='{{ route('suporte.create') }}'" @endif>
                    Abrir Ticket
                </button>
                <div class="mail-list mt-4">
                    @foreach ($ticket_categories as $id => $category)
                        <!-- <a href="#" class="active"> -->
                        <a href="#">
                            <i class="{{ $category->icon }}"></i> {{ $category->title }} <span class="ms-1 float-end"
                                id="category_id_{{ $category->id }}">(0)</span></a>
                    @endforeach
                </div>

                <h6 class="mt-4">Status</h6>
                <div class="mail-list mt-1">
                    @foreach ($ticket_statusses as $id => $status)
                        <a href="#"><span
                                class="mdi mdi-circle-outline text-{{ $status->style }} float-end"></span>{{ $status->title }}</a>
                    @endforeach
                </div>
            </div>
            <!-- End Left sidebar -->

            <!-- Right Sidebar -->
            <div class="email-rightbar mb-3">

                @isset($message)
                    <div class="alert alert-success pd-5">
                        {{ $message }}
                    </div>
                @endisset

                <div class="card">
                    @if ($admin)
                        <div class="btn-toolbar p-3" role="toolbar">
                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ route('ticket.category', ['id' => $ticket->id, 'category' => 1]) }}">Alteração
                                        de número de contratos</a>
                                    <a class="dropdown-item"
                                        href="{{ route('ticket.category', ['id' => $ticket->id, 'category' => 2]) }}">Alteração
                                        de conta investimento</a>
                                    <a class="dropdown-item"
                                        href="{{ route('ticket.category', ['id' => $ticket->id, 'category' => 3]) }}">Alteração
                                        de Trader</a>
                                    <a class="dropdown-item"
                                        href="{{ route('ticket.category', ['id' => $ticket->id, 'category' => 4]) }}">Dúvidas
                                        gerais</a>
                                    <a class="dropdown-item"
                                        href="{{ route('ticket.category', ['id' => $ticket->id, 'category' => 5]) }}">Cancelamento
                                        e pausa</a>
                                    <a class="dropdown-item"
                                        href="{{ route('ticket.category', ['id' => $ticket->id, 'category' => 6]) }}">Analisar
                                        se minha conta está
                                        online</a>
                                </div>
                            </div>

                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Alterar status <i class="mdi mdi-dots-vertical ms-2"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ route('ticket.status', ['id' => $ticket->id, 'status' => 1]) }}">Marcar
                                        como
                                        Novo</a>
                                    <a class="dropdown-item"
                                        href="{{ route('ticket.status', ['id' => $ticket->id, 'status' => 2]) }}">Marcar
                                        como Lido</a>
                                    <a class="dropdown-item"
                                        href="{{ route('ticket.status', ['id' => $ticket->id, 'status' => 3]) }}">Marcar
                                        como
                                        Em
                                        atendimento</a>
                                    <a class="dropdown-item"
                                        href="{{ route('ticket.status', ['id' => $ticket->id, 'status' => 4]) }}">Marcar
                                        como Concluído</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="d-flex align-items-start mb-4">
                            <div style="flex-grow-1" id="ticket_category"><i class="{{ $ticket->icon }}"></i> {{ $ticket->category }} <span
                                    class="ms-1 float-end"></span></div>
                        </div>
                        <div class="d-flex align-items-start mb-4">
                            <div class="flex-grow-1">
                                <h5 class="font-size-14 my-1">Ticket nº: <span
                                        class="text-muted">{{ $ticket->id }}</span>
                                    <span id="ticket_status"><span
                                            class="bg-{{ $ticket->style }} badge me-2">{{ $ticket->s_title }}</span></span>
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-4">
                            <!--
                                                                                                    <div class="flex-shrink-0 me-3">
                                                                                                    <img class="rounded-circle avatar-sm"
                                                                                                    src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}"
                                                                                                    alt="Generic placeholder image">
                                                                                                    </div>
                                                                                                    -->
                            <div class="flex-grow-1">
                                <h5 class="font-size-14 my-1">{{ $ticket->username }}</h5>
                                <small class="text-muted">{{ $ticket->useremail }}</small>
                            </div>
                        </div>

                        <h4 class="font-size-16">{{ $ticket->title }}</h4>

                        {!! $ticket->description !!}
                        <!--
                        <hr />
                                                                                                    <div class="row">
                                                                                                    <div class="col-xl-2 col-6">
                                                                                                    <div class="card border shadow-none">
                                                                                                    <img class="card-img-top img-fluid"
                                                                                                    src="{{ URL::asset('assets/images/small/img-3.jpg') }}" alt="Card image cap">
                                                                                                    <div class="py-2 text-center">
                                                                                                    <a href="javascript:void(0);" class="fw-medium">Download</a>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    <div class="col-xl-2 col-6">
                                                                                                    <div class="card border shadow-none">
                                                                                                    <img class="card-img-top img-fluid"
                                                                                                    src="{{ URL::asset('assets/images/small/img-4.jpg') }}" alt="Card image cap">
                                                                                                    <div class="py-2 text-center">
                                                                                                    <a href="javascript:void(0);" class="fw-medium">Download</a>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    -->
                    </div>

                </div>
            </div>
            <!-- card -->

            <!-- Right Sidebar -->
            <input type="hidden" id="num_replies_local" name="num_replies_local" value="">
            <div id="replies"></div>
            <!-- card -->

            <!-- Right Sidebar -->
            @if ($ticket->ticket_status_id != 4)
                <div class="email-rightbar mb-3" id="ticket_reply">
                    <div class="card">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form
                            @if ($admin) action="{{ route('ticket.reply', $ticket->id) }}"
                    @else
                    action="{{ route('suporte.reply', $ticket->id) }}" @endif
                            method="post" class="card-body">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <input type="hidden" id="id" name="id" value="{{ $ticket->id }}">
                                    <label for="reply" class="form-label">Resposta</label>
                                    <textarea id="reply" name="reply" class="form-control @error('reply') is-invalid @enderror"
                                        placeholder="Descrição" {{ $disabled }}></textarea>
                                    @error('reply')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if ($action != 'show')
                                <div class="pt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Enviar</button>
                                </div>
                            @endif
                        </form>

                    </div> <!-- card -->
                </div> <!-- end Col-9 -->
            @endif
        </div>

    </div><!-- End row -->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-editor.init.js') }}"></script>
    <script>
        $(document).ready(function() {

            function refresh() {
                $.ajax({
                    type: "POST",
                    url: '/reply',
                    data: {
                        id: {{ $ticket->id }},
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        var num_replies_local = document.getElementById("num_replies_local").value;
                        var num_replies = data.length

                        if (num_replies_local != num_replies) {
                            //console.log(num_replies_local + " - " + num_replies)
                            //console.log(data);

                            document.getElementById("num_replies_local").value = num_replies
                            var replies = ""

                            for (let i = 0; i < num_replies; i++) {
                                replies += '<div class="email-rightbar mb-3">'
                                replies += '<div class = "card" > '
                                replies += '<div class = "card-body" > '
                                replies += '<div class = "d-flex align-items-start mb-4" > '
                                replies += '<div class = "flex-grow-1" > '
                                replies += '<h5 class = "font-size-14 my-1" >' + data[i]["username"] +
                                    ' '
                                replies += '<small class = "text-muted" >(' + data[i]["useremail"] +
                                    ')</small ></h5>'
                                replies += '</div>'
                                replies += '</div>'
                                replies += data[i]["reply"]
                                replies += '</div></div></div>'
                            }

                            $("#replies").html(replies);
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        //console.log(data);
                    },
                });
            }

            function refresh_categories() {
                $.ajax({
                    type: "POST",
                    url: '/ticket_categories_qtd',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        //console.log(data)
                        var num_replies = data.length

                        for (let i = 0; i < num_replies; i++) {

                            var field_id = "category_id_" + data[i]["ticket_category_id"]
                            var category_qtd = document.getElementById(field_id);
                            var category_new_qty = '(' + data[i]["qtd"] + ')'

                            if (category_qtd.innerHTML != category_new_qty) {
                                category_qtd.innerHTML = category_new_qty
                            }
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        //console.log(data);
                    },
                });
            }

            var last_status_id = 0

            function refresh_status() {
                $.ajax({
                    type: "POST",
                    url: '/ticket_status',
                    data: {
                        id: {{ $ticket->id }},
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        //console.log(data)
                        
                        document.getElementById("ticket_status").innerHTML = '<span class="bg-' + data[
                            "style"] + ' badge me-2">' + data["status"] + '</span>'

                        if (data["ticket_status_id"] == 4)
                            if (document.getElementById('ticket_reply'))
                                document.getElementById("ticket_reply").innerHTML = ''

                        if (last_status_id == 4 && data["ticket_status_id"] != 4)
                            location.reload()

                        if (document.getElementById('ticket_category')) {
                            if(data["ticket_category_id"] != {{ $ticket->ticket_category_id }})
                                document.getElementById("ticket_category").innerHTML = '<i class="' + data["icon"] + '"></i> ' +  data["category"]
                        }
                        
                        last_status_id = data["ticket_status_id"]
                    },
                    error: function(data, textStatus, errorThrown) {
                        //console.log(data);
                    },
                });
            }

            refresh()
            refresh_categories()
            refresh_status()

            setInterval(function() {
                refresh()
                refresh_categories()
                refresh_status()
            }, 5000); //1 second
        });

        /******/
        (() => { // webpackBootstrap
            var __webpack_exports__ = {};
            /*!************************************************!*\
              !*** ./resources/js/pages/form-editor.init.js ***!
              \************************************************/
            /*
            Template Name: Minible - Admin & Dashboard Template
            Author: Themesbrand
            Website: https://themesbrand.com/
            Contact: themesbrand@gmail.com
            File: Form editor Js File

            plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            */
            $(document).ready(function() {
                if ($("#reply").length > 0) {
                    tinymce.init({
                        // URL
                        relative_urls: false,
                        remove_script_host: true,
                        document_base_url: "/",
                        convert_urls: true,

                        selector: "textarea#reply",
                        height: 300,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                        images_upload_handler: function(blobInfo, success, failure, progress) {

                            var image_size = blobInfo.blob().size / 1000; // image size in kbytes
                            
                            var max_size = 10000 // max size in kbytes
                            if (image_size > max_size) {
                                failure('A imagem é muito grande( ' + image_size +
                                    ' kB) , tamanho máximo permitido:' + max_size + ' kB');
                                return;
                            } else {
                                // Your code
                            }

                            var xhr, formData;

                            xhr = new XMLHttpRequest();
                            xhr.withCredentials = false;

                            xhr.open('POST', '{{ route('ticket.image_upload') }}');
                            var token = '{{ csrf_token() }}';
                            xhr.setRequestHeader("X-CSRF-Token", token);

                            xhr.upload.onprogress = function(e) {
                                progress(e.loaded / e.total * 100);
                            };

                            xhr.onload = function() {
                                var json;

                                if (xhr.status === 403) {
                                    failure('HTTP Error: ' + xhr.status, {
                                        remove: true
                                    });
                                    return;
                                }

                                if (xhr.status < 200 || xhr.status >= 300) {
                                    failure('HTTP Error: ' + xhr.status);
                                    return;
                                }

                                json = JSON.parse(xhr.responseText);

                                if (!json || typeof json.location != 'string') {
                                    failure('Invalid JSON: ' + xhr.responseText);
                                    return;
                                }

                                success(json.location);
                            };

                            xhr.onerror = function() {
                                failure('Image upload failed due to a XHR Transport error. Code: ' +
                                    xhr.status);
                            };

                            formData = new FormData();
                            formData.append('file', blobInfo.blob(), blobInfo.filename());

                            xhr.send(formData);
                        },
                        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px; color:#FFFFFF }',
                        style_formats: [{
                            title: 'Bold text',
                            inline: 'b'
                        }, {
                            title: 'Red text',
                            inline: 'span',
                            styles: {
                                color: '#ff0000'
                            }
                        }, {
                            title: 'Red header',
                            block: 'h1',
                            styles: {
                                color: '#ff0000'
                            }
                        }, {
                            title: 'Example 1',
                            inline: 'span',
                            classes: 'example1'
                        }, {
                            title: 'Example 2',
                            inline: 'span',
                            classes: 'example2'
                        }, {
                            title: 'Table styles'
                        }, {
                            title: 'Table row 1',
                            selector: 'tr',
                            classes: 'tablerow1'
                        }]
                    });
                }
            });
            /******/
        })();
    </script>
@endsection
