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
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div> <!-- end col -->
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
                                                        value="" disabled />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="event-start" class="col-md-2 col-form-label">Início</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="datetime-local" value=""
                                                            id="event-start" name="event-start" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="event-end" class="col-md-2 col-form-label">Final</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="datetime-local" id="event-end"
                                                            name="event-end" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Categoria</label>
                                                    <select class="form-control form-select" name="category"
                                                        id="event-category" disabled>
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
                                                        class="form-check-input" value="1" disabled>
                                                    <label class="form-check-label" for="lifetime">
                                                        Dia inteiro
                                                    </label>
                                                </div>
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

                        var calendarEl = document.getElementById('calendar');

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

                                $("#event-id").val(selectedEvent.id);
                                $("#event-title").val(selectedEvent.title);
                                var m = moment(selectedEvent.start);
                                $("#event-start").val(m.format('YYYY-MM-DDTHH:mm'));
                                m = moment(selectedEvent.end);
                                $("#event-end").val(m.format('YYYY-MM-DDTHH:mm'));
                                $('#event-category').val(selectedEvent.classNames[0]);
                                $('#all_day').prop("checked", (selectedEvent.allDay == 1) ? true : false);

                                modalTitle.text('Evento');
                                newEventData = null;
                            },
                            events: defaultEvents
                        });
                        calendar.render();
                        /*Add new event*/
                        // Form to add new event
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
