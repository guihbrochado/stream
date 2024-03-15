@extends('layouts.master')
@section('title')
    Calendário
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Tridar
        @endslot
        @slot('title')
            Calendário
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">

            <div class="row">
                <div class="col-12">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2"><button class="btn font-16 btn-primary" id="btn-new-event"><i
                                                class="mdi mdi-plus-circle-outline"></i> Create New Event</button></div>

                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div> <!-- end col -->

                        @isset($message)
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endisset

                    </div>

                    <div style='clear:both'></div>

                    <!-- Add New Event MODAL -->
                    <div class="modal fade" id="event-modal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header py-3 px-4 border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">Evento</h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-hidden="true"></button>

                                </div>
                                <div class="modal-body p-4">
                                    <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <input type="hidden" id="event-id" name="event-id">
                                                    <label class="form-label">Nome do Evento</label>
                                                    <input class="form-control" placeholder="Informe o nome do evento"
                                                        type="text" name="title" id="event-title" required
                                                        value="" />
                                                    <div class="invalid-feedback">Por favor informe um nome de evento</div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="event-start" class="col-md-2 col-form-label">Início</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="datetime-local" value=""
                                                            id="event-start" name="event-start">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="event-end" class="col-md-2 col-form-label">Final</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="datetime-local" id="event-end"
                                                            name="event-end">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Categoria</label>
                                                    <select class="form-control form-select" name="category"
                                                        id="event-category">
                                                        <option selected> --Select-- </option>
                                                        <option value="bg-danger">Danger</option>
                                                        <option value="bg-success">Success</option>
                                                        <option value="bg-primary">Primary</option>
                                                        <option value="bg-info">Info</option>
                                                        <option value="bg-dark">Dark</option>
                                                        <option value="bg-warning">Warning</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a valid event category
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <input id="all_day" name="all_day" type="checkbox"
                                                        class="form-check-input" value="1">
                                                    <label class="form-check-label" for="lifetime">
                                                        Dia inteiro
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-danger"
                                                    id="btn-delete-event">Excluir</button>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="button" class="btn btn-light me-1"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-success"
                                                    id="btn-save-event">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end modal-content-->
                        </div> <!-- end modal dialog-->
                    </div>
                    <!-- end modal-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/moment/moment.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jquery-ui-dist/jquery-ui-dist.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/fullcalendar/fullcalendar.min.js') }}"></script>

    <script>
        /******/
        (() => { // webpackBootstrap
            var __webpack_exports__ = {};
            /*!*********************************************!*\
              !*** ./resources/js/pages/calendar.init.js ***!
              \*********************************************/
            /*
            Template Name: Minible - Admin & Dashboard Template
            Author: Themesbrand
            Website: https://themesbrand.com/
            Contact: themesbrand@gmail.com
            File: Calendar init js
            */
            ! function($) {
                "use strict";

                var CalendarPage = function CalendarPage() {};

                CalendarPage.prototype.init = function() {
                        var addEvent = $("#event-modal");
                        var modalTitle = $("#modal-title");
                        var formEvent = $("#form-event");
                        var selectedEvent = null;
                        var newEventData = null;
                        var forms = document.getElementsByClassName('needs-validation');
                        var selectedEvent = null;
                        var newEventData = null;
                        var eventObject = null;
                        /* initialize the calendar */

                        var date = new Date();
                        var d = date.getDate();
                        var m = date.getMonth();
                        var y = date.getFullYear();

                        var defaultEvents = {!! $data !!};
                        /*
                        var teste = ""
                        console.log(defaultEvents)

                        async function testeGet() {
                            $.ajax({
                                type: "GET",
                                url: '/api/calendar',
                                success: function(data) {
                                    //console.log('post ok...')
                                    console.log("data: ")
                                    console.log(data)
                                    return data
                                },
                                error: function(data, textStatus, errorThrown) {
                                    //console.log(data);
                                },
                            });
                        }
                        teste = testeGet(teste)
                        console.log("teste:")
                        console.log(teste)
                        */

                        var calendarEl = document.getElementById('calendar');

                        function addNewEvent(info) {
                            addEvent.modal('show');
                            formEvent.removeClass("was-validated");
                            formEvent[0].reset();
                            $("#event-title").val();
                            $('#event-category').val();
                            $("#event-start").val(info["dateStr"] + "T00:00");
                            $("#event-end").val(info["dateStr"] + "T00:00");
                            modalTitle.text('Adicionar Evento');
                            newEventData = info;
                        }

                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
                            locale: 'pt-br',
                            editable: true,
                            droppable: true,
                            selectable: true,
                            defaultView: 'dayGridMonth',
                            themeSystem: 'bootstrap',
                            buttonText: {
                                today: 'Hoje',
                                month: 'Mês',
                                week: 'Semana',
                                day: 'Dia',
                                list: 'lista'
                            },
                            header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth',
                            },
                            eventClick: function eventClick(info) {
                                addEvent.modal('show');
                                formEvent[0].reset();
                                selectedEvent = info.event;

                                //console.log("abrir para edição...")
                                //console.log(selectedEvent)

                                $("#event-id").val(selectedEvent.id);
                                $("#event-title").val(selectedEvent.title);
                                var m = moment(selectedEvent.start);
                                $("#event-start").val(m.format('YYYY-MM-DDTHH:mm'));
                                m = moment(selectedEvent.end);
                                $("#event-end").val(m.format('YYYY-MM-DDTHH:mm'));
                                $('#event-category').val(selectedEvent.classNames[0]);
                                $('#all_day').prop("checked", (selectedEvent.allDay == 1) ? true : false);

                                modalTitle.text('Editar Evento');
                                newEventData = null;
                            },
                            dateClick: function dateClick(info) {
                                //console.log("dateClick...")
                                //console.log(info)
                                //console.log(info["date"])
                                addNewEvent(info);
                            },
                            events: defaultEvents
                        });
                        calendar.render();
                        /*Add new event*/
                        // Form to add new event

                        $(formEvent).on('submit', function(ev) {
                            ev.preventDefault();
                            var inputs = $('#form-event :input');
                            var id = $("#event-id").val();
                            var updatedTitle = $("#event-title").val();
                            var eventStart = $("#event-start").val();
                            var eventEnd = "";
                            var allDay = 1;
                            if ($("#all_day")[0].checked == 0) {
                                allDay = 0;
                                eventEnd = $("#event-end").val();
                            }
                            var updatedCategory = $('#event-category').val(); // validation

                            if (forms[0].checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                                forms[0].classList.add('was-validated');
                            } else {
                                if (selectedEvent) {
                                    //console.log("edição...")
                                    //console.log(selectedEvent)

                                    $.ajax({
                                        type: "POST",
                                        url: '/api/calendar/' + selectedEvent["id"],
                                        data: {
                                            _method: 'PATCH',
                                            title: updatedTitle,
                                            start: eventStart,
                                            end: eventEnd,
                                            all_day: allDay,
                                            class_name: updatedCategory,
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(data) {
                                            //console.log('post ok...')
                                        },
                                        error: function(data, textStatus, errorThrown) {
                                            //console.log(data);
                                        },
                                    });

                                    selectedEvent.setProp("id", id);
                                    selectedEvent.setProp("title", updatedTitle);
                                    if (allDay == 1) {
                                        selectedEvent.setAllDay(true)
                                        selectedEvent.setStart(new Date(eventStart))
                                        selectedEvent.setEnd()
                                    } else {
                                        selectedEvent.setAllDay(false)
                                        selectedEvent.setStart(new Date(eventStart))
                                        selectedEvent.setEnd(new Date(eventEnd))
                                    }
                                    selectedEvent.setProp("classNames", [updatedCategory]);

                                    selectedEvent = null;
                                    calendar.render();
                                } else {
                                    $.ajax({
                                        type: "POST",
                                        url: '/api/calendar/store',
                                        data: {
                                            title: updatedTitle,
                                            start: eventStart,
                                            end: eventEnd,
                                            all_day: allDay,
                                            class_name: updatedCategory,
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(data) {
                                            //console.log('post ok...')
                                            var newEvent = {
                                                id: data,
                                                title: updatedTitle,
                                                start: eventStart, //newEventData.date,
                                                end: eventEnd,
                                                allDay: newEventData.allDay,
                                                className: updatedCategory
                                            };
                                            calendar.addEvent(newEvent);

                                            //console.log("cadastro...")
                                            //console.log(newEvent)

                                            calendar.render();
                                        },
                                        error: function(data, textStatus, errorThrown) {
                                            //console.log(data);
                                        },
                                    });

                                }
                                addEvent.modal('hide');
                            }
                        });
                        $("#btn-delete-event").on('click', function(e) {
                            if (selectedEvent) {
                                //console.log("excluir...")
                                //console.log(selectedEvent)

                                $.ajax({
                                    type: "POST",
                                    url: '/api/calendar/' + selectedEvent["id"],
                                    data: {
                                        _method: 'DELETE',
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(data) {
                                        //console.log(data)                                        
                                    },
                                    error: function(data, textStatus, errorThrown) {
                                        //console.log(data);
                                    },
                                });

                                selectedEvent.remove();
                                selectedEvent = null;
                                addEvent.modal('hide');
                            }
                        });
                        $("#btn-new-event").on('click', function(e) {
                            addNewEvent({
                                date: new Date(),
                                allDay: true
                            });
                        });
                    }, //init
                    $.CalendarPage = new CalendarPage(), $.CalendarPage.Constructor = CalendarPage;
            }(window.jQuery), //initializing 
            function($) {
                "use strict";

                $.CalendarPage.init();
            }(window.jQuery);
            /******/
        })();
    </script>
@endsection
