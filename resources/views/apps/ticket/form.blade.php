@extends('layouts.master')
@section('title')
    Tickets
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Administração
        @endslot
        @slot('title')
            <a href="{{ route('ticket.index') }}">Tickets</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';
        
        // fields
        $id = old('id') !== null ? old('id') : $ticket->id;
        $ticket_category_id = old('ticket_category_id') !== null ? old('ticket_category_id') : $ticket->ticket_category_id;
        $user_id = old('user_id') !== null ? old('user_id') : $ticket->user_id;
        $starred = old('starred') !== null ? old('starred') : $ticket->starred;
        $ticket_title = old('title') !== null ? old('title') : $ticket->title;
        $description = old('description') !== null ? old('description') : $ticket->description;
        
        if ($action == 'create') {
            $route = route('ticket.store');
            $title = 'Cadastrar';
            $card_title = 'Abrir Ticket';
            $button = 'Cadastrar';
        } elseif ($action == 'create_client') {
            $route = route('suporte.store');
            $title = 'Cadastrar';
            $card_title = 'Abrir Ticket';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('ticket.update', $ticket->id);
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

    <div class="row">
        <div class="col-12">
            <!-- Left sidebar -->
            <div class="email-leftbar card">
                <button type="button" class="btn btn-danger waves-effect waves-light"
                    onclick="location.href='{{ route('ticket.create') }}'">
                    Abrir Ticket
                </button>
                <div class="mail-list mt-4">
                    @foreach ($ticket_categories as $id => $category)
                        <!-- <a href="#" class="active"> -->
                        <a href="#">
                            <i class="{{ $category->icon }}"></i> {{ $category->title }} <span
                                class="ms-1 float-end">(0)</span></a>
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

                    @isset($message)
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endisset

                    <h5 class="card-header">{{ $card_title }}</h5>
                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data" class="card-body">
                        @csrf
                        @if ($action == 'edit')
                            @method('PATCH')
                        @endif
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input id="id" name="id" type="hidden" value="{{ $id }} ">
                                <label class="form-label" for="ticket_category_id">Categoria</label>
                                <select id="ticket_category_id" name="ticket_category_id" required
                                    class="form-control @error('ticket_category_id') is-invalid @enderror"
                                    {{ $disabled }}>
                                    <option value="">Selecione a categoria</option>
                                    @foreach ($ticket_categories as $ticket_category)
                                        @if ($ticket_category_id == $ticket_category->id)
                                            <option value="{{ $ticket_category->id }}" selected>
                                                {{ $ticket_category->title }}
                                            </option>
                                        @else
                                            <option value="{{ $ticket_category->id }}">{{ $ticket_category->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('ticket_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="title">Título</label>
                                <input id="title" name="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror"placeholder="Título"
                                    value="{{ $ticket_title }}" {{ $disabled }} required maxlength="500" />
                                @error('ticket_category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Descrição</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Descrição" {{ $disabled }}>{{ $description }}</textarea>
                                @error('description')
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

                </div> <!-- card -->
            </div> <!-- end Col-9 -->
        </div>

    </div><!-- End row -->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-editor.init.js') }}"></script>
    <script>
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
                if ($("#description").length > 0) {
                    tinymce.init({
                        // URL
                        relative_urls: false,
                        remove_script_host: true,
                        document_base_url: "/",
                        convert_urls: true,

                        selector: "textarea#description",
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
