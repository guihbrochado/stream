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

@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- Mostrando os erros de validação -->
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="row">
    <div class="col-12">
        <!-- Left sidebar -->
        <div class="email-leftbar card">
            <button type="button" class="btn btn-danger waves-effect waves-light"
                    @if ($admin) onclick="location.href ='{{ route('ticket.create') }}'"
                    @else
                    onclick="location.href ='{{ route('suporte.create') }}'" @endif>
                Abrir Ticket
            </button>
            <div class="mail-list mt-4">
                @foreach ($ticket_categories as $id => $category)
                @if ($admin)
                <a href="{{ route('ticket.index', ['id' => $category->id]) }}"
                   @if ($selected_category_id == $category->id) class="active" @endif>
                    @else
                    <a href="{{ route('suporte.index', ['id' => $category->id]) }}"
                       @if ($selected_category_id == $category->id) class="active" @endif>
                        @endif
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

            <div class="card">
                @if (auth()->user()->can('admin') && false)
                <div class="btn-toolbar p-3" role="toolbar">
                    <div class="btn-group me-2 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                class="fa fa-exclamation-circle"></i></button>
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="btn-group me-2 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Updates</a>
                            <a class="dropdown-item" href="#">Social</a>
                            <a class="dropdown-item" href="#">Team Manage</a>
                        </div>
                    </div>
                    <div class="btn-group me-2 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Updates</a>
                            <a class="dropdown-item" href="#">Social</a>
                            <a class="dropdown-item" href="#">Team Manage</a>
                        </div>
                    </div>

                    <div class="btn-group me-2 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            Alterar status <i class="mdi mdi-dots-vertical ms-2"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Marcar como Novo</a>
                            <a class="dropdown-item" href="#">Marcar como Lido</a>
                            <a class="dropdown-item" href="#">Marcar como Em atendimento</a>
                            <a class="dropdown-item" href="#">Marcar como Concluído</a>
                        </div>
                    </div>
                </div>
                @endif

                <ul class="message-list">
                    <li class="unread">
                        <div class="col-mail col-mail-1-custom">
                            <span class="title">Ticket - Solicitante</span>
                        </div>
                        <div class="col-mail col-mail-2">
                            <span class="subject">Título</span>
                            <div class="date" style="width: 200px; padding-left: 30px; !important;">
                                Data Solicitação</div>
                        </div>
                    </li>
                </ul>

                <ul class="message-list">
                    @foreach ($data as $id => $ticket)
                    @if ($ticket->ticket_status_id == 1)
                    <li class="unread">
                        @else
                    <li>
                        @endif
                        <div
                            class="col-mail @if (auth()->user()->can('admin') && false) col-mail-1 @else col-mail-1-custom @endif">
                            @if (auth()->user()->can('admin') && false)
                            <div class="checkbox-wrapper-mail">
                                <input type="checkbox" id="chk[{{ $ticket->id }}]"
                                       name="chk[{{ $ticket->id }}]">
                                <label for="chk[{{ $ticket->id }}]" class="toggle"></label>
                            </div>
                            @endif
                            <a href="{{ route('ticket.edit', ['id' => $ticket->id]) }}"
                               class="title">{{ $ticket->id }} - {{ $ticket->username }}</a>
                            @if (auth()->user()->can('admin') && false)
                            <span class="star-toggle far fa-star"></span>
                            @endif
                        </div>
                        <div class="col-mail col-mail-2">

                            <a @if ($admin) href="{{ route('ticket.edit', ['id' => $ticket->id]) }}"
                                @else 
                                href="{{ route('suporte.edit', ['id' => $ticket->id]) }}" @endif
                                class="subject"><span
                                    class="bg-{{ $ticket->style }} badge me-2">{{ $ticket->s_title }}</span>
                                {{ $ticket->title }}</a>
                            <div class="date" style="width: 200px; padding-left: 30px; !important;">
                                {{ $ticket->created_at }}</div>
                        </div>
                    </li>
                    @endforeach
                </ul>

            </div> <!-- card -->
            <!--
                                    <div class="row">
                                        <div class="col-7">
                                            Showing 1 - 20 of 1,524
                                        </div>
                                        <div class="col-5">
                                            <div class="btn-group float-end">
                                                <button type="button" class="btn btn-sm btn-success waves-effect"><i
                                                        class="fa fa-chevron-left"></i></button>
                                                <button type="button" class="btn btn-sm btn-success waves-effect"><i
                                                        class="fa fa-chevron-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
            -->
        </div> <!-- end Col-9 -->
    </div>
</div><!-- End row -->
@endsection
@section('script')
<script>
    $(document).ready(function() {

    var url_categories = @if (false) '/ticket_categories_qtd' @ else '/ticket_categories_qtd_client' @endif

            function refresh_categories() {
            $.ajax({
            type: "POST",
                    url: url_categories,
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

    refresh_categories()

            setInterval(function() {
            refresh_categories()
            }, 5000); //1 second
    });
</script>
@endsection
