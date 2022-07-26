@section('title', "Mis inversiones")
<x-app-layout>
@section('head')
<meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection
@component('components.breadcrumb')
@slot('li_1')
    Home
@endslot
@slot('title')
    Mis inversiones
@endslot
@endcomponent
<div class="row">
<div class="col-12">
    <div class="row">
        <div class="col-xl-3">
            <div class="card card-h-100">
                @if (\Session::has('msg'))
                <div class="alert  {!! \Session::get('clase') !!} m-2">
                    <ul style="" class="p-0 m-0">
                        <li style="list-style: none;">{!! \Session::get('msg') !!}</li>
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    @php $disable="disabled" @endphp
                    @if ($balance->toArray()) @if (@$balance[0]->saldo>0) @php $disable="";  $max='max="'.$balance[0]->saldo.'"' @endphp @endif   @endif
                    
                    <button class="btn btn-primary w-100" id="btn-new-event" {{$disable}}><i class="mdi mdi-plus"></i>Crear nueva inversión</button>
                    @if ($disable=="disabled") <div class="external-event fc-event bg-soft-danger text-danger">No tienes saldo</div> @endif
                    <div id="external-events">
                        <br>
                        
                        <div class="external-event fc-event bg-soft-info text-info" data-class="bg-soft-info">
                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Inversión
                        </div>
                        <div class="external-event fc-event bg-soft-warning text-warning"
                            data-class="bg-soft-warning">
                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Recuperación
                            Capital
                        </div>
                        <div class="external-event fc-event bg-soft-success text-success"
                            data-class="bg-soft-success">
                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Acreditación Interés
                        </div>
                         
                    </div>

                </div>
            </div>
            <div>
                <h5 class="mb-1">Lista de inversiones</h5>
                <p class="text-muted">No hay inversiones</p>
                <div class="pe-2 me-n1 mb-3" data-simplebar style="height: 400px">
                    <div id="upcoming-event-list"></div>
                </div>
            </div>

           <!-- <div class="card">
                <div class="card-body bg-soft-info">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <i data-feather="calendar" class="text-info icon-dual-info"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="fs-16">Welcome to your Calendar!</h6>
                            <p class="text-muted mb-0">Event that applications book will appear here. Click on an
                                event to see the details and manage applicants event.</p>
                        </div>
                    </div>
                </div>
            </div>-->
            <!--end card-->
        </div> <!-- end col-->

        <div class="col-xl-9">
            <div class="card card-h-100">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!--end row-->

    <div style='clear:both'></div>

    <!-- Add New Event MODAL -->
    <div class="modal fade" id="event-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="modal-title">Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-hidden="true"></button>
                </div>
                <div class="modal-body p-4">
                    <form class="needs-validation" name="event-form" id="form-event" novalidate>
                        <div class="text-end">
                            <a href="#" class="btn btn-sm btn-soft-primary" id="edit-event-btn" data-id="edit-event"
                                onclick="editEvent(this)" role="button">Edit</a>
                        </div>
                        <div class="event-details">
                            <div class="d-flex mb-2">
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ri-calendar-event-line text-muted fs-16"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="d-block fw-semibold mb-0" id="event-start-date-tag"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="flex-shrink-0 me-3">
                                    <i class="ri-time-line text-muted fs-16"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="d-block fw-semibold mb-0"><span id="event-timepicker1-tag"></span> -
                                        <span id="event-timepicker2-tag"></span></h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="flex-shrink-0 me-3">
                                    <i class="ri-map-pin-line text-muted fs-16"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="d-block fw-semibold mb-0"> <span id="event-location-tag"></span></h6>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0 me-3">
                                    <i class="ri-discuss-line text-muted fs-16"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="d-block text-muted mb-0" id="event-description-tag"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row event-form">
                             
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Valor</label>
                                    <input class="form-control   col-6"  min="100" <?=@$max ?> step="1" placeholder="$ 0.00" type="number"
                                        name="valor" id="valor" required value="" onkeyup="javascript:validarValor(this);" />
                                    <div class="invalid-feedback">Por favor ingrese el monto de la inversión</div>
                                    @if ($balance->toArray()) @if (@$balance[0]->saldo>0) <div class="external-event fc-event bg-soft-info text-info">inversión Mínima $100.00, Saldo de su cuenta ${{number_format($balance[0]->saldo,2)}}</div>  @endif   @endif
                                    
                                </div>
                            </div>
                            <!--end col-->
                            <!--<div class="col-12">
                                <div class="mb-3">
                                    <label>Event Date</label>
                                    <div class="input-group d-none">
                                        <input type="text" id="event-start-date"
                                            class="form-control flatpickr flatpickr-input" placeholder="Select date"
                                            readonly required>
                                        <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                                    </div>
                                </div>
                            </div>-->
                            <!--end col-->
                             
                           
                           
                        </div>
                        <!--end row-->
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-soft-danger" id="btn-delete-event"><i
                                    class="ri-close-line align-bottom"></i> Eliminar</button>
                            <button type="submit" class="btn btn-success" id="btn-save-event">Generar</button>
                        </div>
                    </form>
                </div>
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->
    <!-- end modal-->
</div>
</div> <!-- end row-->
 
@section('script')
<script src="{{ URL::asset('assets/libs/fullcalendar/fullcalendar.min.js') }}"></script>
 <script>
    /*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Calendar init js
*/
function validarValor(obj)
{
    //console.log(document.getElementById("valor").value);
    //console.log('<?=$balance[0]->saldo ?>');
    
    var saldomax='<?=@$balance[0]->saldo ?>';
    var val=document.getElementById("valor").value;
    val=parseFloat(val)
    saldomax=parseFloat(saldomax)
    console.log(val+" mayor "+ saldomax);
    if (val>saldomax)
    {
        document.getElementById("valor").value=saldomax ;
    }
}
$( document ).on( 'ajaxSend', addLaravelCSRF );

function addLaravelCSRF( event, jqxhr, settings ) {
    jqxhr.setRequestHeader( 'X-XSRF-TOKEN', getCookie( 'XSRF-TOKEN' ) );
}

function getCookie(name) {
    function escape(s) { return s.replace(/([.*+?\^${}()|\[\]\/\\])/g, '\\$1'); };
    var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
    return match ? match[1] : null;
}

var start_date = document.getElementById("event-start-date");
var timepicker1 = document.getElementById("timepicker1");
var timepicker2 = document.getElementById("timepicker2");
var date_range = null;
var T_check = null;
document.addEventListener("DOMContentLoaded", function () {
    //flatPickrInit();
    var addEvent = new bootstrap.Modal(document.getElementById('event-modal'), {
        keyboard: false
    });
    document.getElementById('event-modal');
    var modalTitle = document.getElementById('modal-title');
    var formEvent = document.getElementById('form-event');
    var selectedEvent = null;
    var forms = document.getElementsByClassName('needs-validation');
    /* initialize the calendar */

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var Draggable = FullCalendar.Draggable;
    var externalEventContainerEl = document.getElementById('external-events');
    var defaultEvents = [{
            id: 1,
            title: "World Braille Day",
            start: "2022-07-05",
            className: "bg-soft-info",
            allDay: true

        },
        /*
        {
            id: 456,
            title: 'Velzon Project Discussion with Team',
            start: new Date(y, m, d + 23, 20, 0),
            end: new Date(y, m, d + 24, 16, 0),
            allDay: true,
            className: 'bg-soft-info',
            location: 'Head Office, US',
            extendedProps: {
                department: 'Discussion'
            },
            description: 'Tell how to boost website traffic'
        },*/
    ];

    data='<?=$polizaslista ?>';
    defaultEvents=JSON.parse(data);
    //console.log(JSON.parse(data));

    // init draggable
    new Draggable(externalEventContainerEl, {
        itemSelector: '.external-event',
        eventData: function (eventEl) {
            return {
                title: eventEl.innerText,
                start: new Date(),
                className: eventEl.getAttribute('data-class')
            };
        }
    });

    var calendarEl = document.getElementById('calendar');

    function addNewEvent(info) {
        document.getElementById('form-event').reset();
        document.getElementById('btn-delete-event').setAttribute('hidden', true);
        addEvent.show();
        formEvent.classList.remove("was-validated");
        formEvent.reset();
        selectedEvent = null;
        modalTitle.innerText = 'Add Event';
        newEventData = info;
        document.getElementById("edit-event-btn").setAttribute("data-id", "new-event");
        document.getElementById('edit-event-btn').click();
        document.getElementById("edit-event-btn").setAttribute("hidden", true);
    }

    function getInitialView() {
        if (window.innerWidth >= 768 && window.innerWidth < 1200) {
            return 'timeGridWeek';
        } else if (window.innerWidth <= 768) {
            return 'listMonth';
        } else {
            return 'dayGridMonth';
        }
    }

    /*var eventCategoryChoice = new Choices("#event-category", {
        searchEnabled: false
    });*/

    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'local',
        editable: false,
        droppable: false,
        selectable: false,
        navLinks: false,
        initialView: getInitialView(),
        themeSystem: 'bootstrap',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listMonth'
            //right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        windowResize: function (view) {
            var newView = getInitialView();
            calendar.changeView(newView);
        },
        events: defaultEvents,
        eventReceive: function (info) {
            var newEvent = {
                id: Math.floor(Math.random() * 11000),
                title: info.event.title,
                start: info.event.start,
                allDay: info.event.allDay,
                className: info.event.classNames[0]
            };
            //console.log(newEvent);
            defaultEvents.push(newEvent);
            upcomingEvent(defaultEvents);
        },
        /*eventClick: function (info) {
            document.getElementById("edit-event-btn").removeAttribute("hidden");
            document.getElementById('btn-save-event').setAttribute("hidden", true);
            document.getElementById("edit-event-btn").setAttribute("data-id", "edit-event");
            document.getElementById("edit-event-btn").innerHTML = "Edit";
            eventClicked();
            flatPickrInit();
            flatpicekrValueClear();
            addEvent.show();
            formEvent.reset();
            selectedEvent = info.event;

            // First Modal
            document.getElementById("modal-title").innerHTML = "";
            document.getElementById("event-location-tag").innerHTML = selectedEvent.extendedProps.location === undefined ? "No Location" : selectedEvent.extendedProps.location;
            document.getElementById("event-description-tag").innerHTML = selectedEvent.extendedProps.description === undefined ? "No Description" : selectedEvent.extendedProps.description;

            // Edit Modal
            document.getElementById("event-title").value = selectedEvent.title;
            document.getElementById("event-location").value = selectedEvent.extendedProps.location === undefined ? "No Location" : selectedEvent.extendedProps.location;
            document.getElementById("event-description").value = selectedEvent.extendedProps.description === undefined ? "No Description" : selectedEvent.extendedProps.description;
            document.getElementById("eventid").value = selectedEvent.id;

            if (selectedEvent.classNames[0]) {
                eventCategoryChoice.destroy();
                eventCategoryChoice = new Choices("#event-category", {
                    searchEnabled: false
                });
                eventCategoryChoice.setChoiceByValue(selectedEvent.classNames[0]);
            }
            var st_date = selectedEvent.start;
            var ed_date = selectedEvent.end;

            var date_r = function formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;
                return [year, month, day].join('-');
            };
            var r_date = ed_date == null ? (str_dt(st_date)) : (str_dt(st_date)) + ' to ' + (str_dt(ed_date));
            var er_date = ed_date == null ? (date_r(st_date)) : (date_r(st_date)) + ' to ' + (date_r(ed_date));

            flatpickr(start_date, {
                defaultDate: er_date,
                altInput: true,
                altFormat: "j F Y",
                dateFormat: "Y-m-d",
                mode: ed_date !== null ? "range" : "range",
                onChange: function (selectedDates, dateStr, instance) {
                    var date_range = dateStr;
                    var dates = date_range.split("to");
                    if (dates.length > 1) {
                        document.getElementById('event-time').setAttribute("hidden", true);
                    } else {
                        document.getElementById("timepicker1").parentNode.classList.remove("d-none");
                        document.getElementById("timepicker1").classList.replace("d-none", "d-block");
                        document.getElementById("timepicker2").parentNode.classList.remove("d-none");
                        document.getElementById("timepicker2").classList.replace("d-none", "d-block");
                        document.getElementById('event-time').removeAttribute("hidden");
                    }
                },
            });
            document.getElementById("event-start-date-tag").innerHTML = r_date;

            var gt_time = getTime(selectedEvent.start);
            var ed_time = getTime(selectedEvent.end);

            if (gt_time == ed_time) {
                document.getElementById('event-time').setAttribute("hidden", true);
                flatpickr(document.getElementById("timepicker1"), {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                });
                flatpickr(document.getElementById("timepicker2"), {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                });
            } else {
                document.getElementById('event-time').removeAttribute("hidden");
                flatpickr(document.getElementById("timepicker1"), {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    defaultDate: gt_time
                });

                flatpickr(document.getElementById("timepicker2"), {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    defaultDate: ed_time
                });
                document.getElementById("event-timepicker1-tag").innerHTML = tConvert(gt_time);
                document.getElementById("event-timepicker2-tag").innerHTML = tConvert(ed_time);
            }
            newEventData = null;
            modalTitle.innerText = selectedEvent.title;

            // formEvent.classList.add("view-event");
            document.getElementById('btn-delete-event').removeAttribute('hidden');
        },*/
        /*dateClick: function (info) {
            addNewEvent(info);
        },*/
        
        /*eventDrop: function (info) {
            var indexOfSelectedEvent = defaultEvents.findIndex(function (x) {
                return x.id == info.event.id
            });
            if (defaultEvents[indexOfSelectedEvent]) {
                defaultEvents[indexOfSelectedEvent].title = info.event.title;
                defaultEvents[indexOfSelectedEvent].start = info.event.start;
                defaultEvents[indexOfSelectedEvent].end = (info.event.end) ? info.event.end : null;
                defaultEvents[indexOfSelectedEvent].allDay = info.event.allDay;
                defaultEvents[indexOfSelectedEvent].className = info.event.classNames[0];
                defaultEvents[indexOfSelectedEvent].description = (info.event._def.extendedProps.description) ? info.event._def.extendedProps.description : '';
                defaultEvents[indexOfSelectedEvent].location = (info.event._def.extendedProps.location) ? info.event._def.extendedProps.location : '';
            }
            upcomingEvent(defaultEvents);
        }*/
    });

    calendar.render();
//console.log(defaultEvents)
 
    //prueba=[{id: 1, title: "World Braille Day",start: "2022-07-08",  className: "bg-soft-info", allDay: true}];
    
    upcomingEvent(defaultEvents);
    /*Add new event*/
    // Form to add new event
    formEvent.addEventListener('submit', function (ev) {
        ev.preventDefault();
        /*var updatedTitle = document.getElementById("event-title").value;
        var updatedCategory = document.getElementById('event-category').value;
        var start_date = (document.getElementById("event-start-date").value).split("to");
        var updateStartDate = new Date(start_date[0].trim());
        var updateEndDate = (start_date[1]) ? new Date(start_date[1].trim()) : '';*/

        var valor= document.getElementById("valor").value;
        //var eventid = document.getElementById("eventid").value;
        var eventid=5;
        /*var end_date = null;
        var event_location = document.getElementById("event-location").value;
        var eventDescription = document.getElementById("event-description").value;
        var eventid = document.getElementById("eventid").value;
        var all_day = false;*/
        var start_date="<?= date('Y/m/d') ?>";
        console.log(start_date);
        if (start_date.length > 1) {
            var end_date = new Date(start_date);
            var inversion_date = new Date(start_date);
            var ganancia_date = new Date(start_date);
            //console.log(start_date[1])
            //console.log(end_date)
            end_date.setDate(end_date.getDate() + 15);
            inversion_date.setDate(inversion_date.getDate() + 15);
            ganancia_date.setDate(ganancia_date.getDate() + 30);
            console.log(inversion_date);
            console.log(ganancia_date);
            start_date = new Date(start_date);
            all_day = true;
        } else {
            var e_date = start_date;
            var start_time = (document.getElementById("timepicker1").value).trim();
            var end_time = (document.getElementById("timepicker2").value).trim();
            start_date = new Date(start_date + "T" + start_time);
            end_date = new Date(e_date + "T" + end_time);
        }
        var e_id = defaultEvents.length + 1;

        // validation
        if (forms[0].checkValidity() === false) {
            forms[0].classList.add('was-validated');
        } else {
           console.log('{{ csrf_token() }}')
            $.ajax({
            url: "{{url('inversiones/create')}}",
            dataType: 'json', // what to expect back from the server
         
            data: {valor:valor,'_method':'PUT','_token': "{{ csrf_token() }}" },
            type: 'POST',

            success: function(response) {
                if (response.status) {
               

                }
                // display success response from the server
            },
            error: function(response) { // handle the error
               
            },

            });
     
            





            if (selectedEvent) {
                selectedEvent.setProp("id", eventid);
                selectedEvent.setProp("title", updatedTitle);
                selectedEvent.setProp("classNames", [updatedCategory]);
                selectedEvent.setStart(updateStartDate);
                selectedEvent.setEnd(updateEndDate);
                selectedEvent.setAllDay(all_day);
                selectedEvent.setExtendedProp("description", eventDescription);
                selectedEvent.setExtendedProp("location", event_location);
                var indexOfSelectedEvent = defaultEvents.findIndex(function (x) {
                    return x.id == selectedEvent.id
                });
                if (defaultEvents[indexOfSelectedEvent]) {
                    defaultEvents[indexOfSelectedEvent].title = updatedTitle;
                    defaultEvents[indexOfSelectedEvent].start = updateStartDate;
                    defaultEvents[indexOfSelectedEvent].end = updateEndDate;
                    defaultEvents[indexOfSelectedEvent].allDay = all_day;
                    defaultEvents[indexOfSelectedEvent].className = updatedCategory;
                    defaultEvents[indexOfSelectedEvent].description = eventDescription;
                    defaultEvents[indexOfSelectedEvent].location = event_location;
                }
                calendar.render();
                // default
            } else {
                var newEvent = {
                    id: e_id,
                    title: 'Inversión #'+eventid+" ($"+valor+")",
                    start: start_date,
                     
                    allDay: true,
                    className: 'bg-soft-info',
                    description: '',
                    location: 'Ecuador'
                };
                calendar.addEvent(newEvent);
                defaultEvents.push(newEvent);

                newEvent = {
                    id: e_id+1,
                    title: 'Inversión #'+eventid+" | Inversion ($"+valor+")",
                    start: inversion_date,
                     
                    allDay: true,
                    className: 'bg-soft-warning',
                    description: '',
                    location: 'Ecuador'
                };
                calendar.addEvent(newEvent);
                defaultEvents.push(newEvent);

                newEvent = {
                    id: e_id+1,
                    title: 'Inversión #'+eventid+" | Ganancia ($"+valor+")",
                    start: ganancia_date,
                     
                    allDay: true,
                    className: 'bg-soft-success',
                    description: '',
                    location: 'Ecuador'
                };
                calendar.addEvent(newEvent);
                
                defaultEvents.push(newEvent);
            }
            addEvent.hide();
            upcomingEvent(defaultEvents);
        }
    });

    document.getElementById("btn-delete-event").addEventListener("click", function (e) {
        if (selectedEvent) {
            for (var i = 0; i < defaultEvents.length; i++) {
                if (defaultEvents[i].id == selectedEvent.id) {
                    defaultEvents.splice(i, 1);
                    i--;
                }
            }
            upcomingEvent(defaultEvents);
            selectedEvent.remove();
            selectedEvent = null;
            addEvent.hide();
        }
    });
    document.getElementById("btn-new-event").addEventListener("click", function (e) {
        //flatpicekrValueClear();
        //flatPickrInit();
        addNewEvent();
        document.getElementById("edit-event-btn").setAttribute("data-id", "new-event");
        document.getElementById('edit-event-btn').click();
        document.getElementById("edit-event-btn").setAttribute("hidden", true);
    });
});


function flatPickrInit() {
    var config = {
        enableTime: false,
        noCalendar: true,
    };
    var date_range = flatpickr(
        start_date, {
            enableTime: false,
            mode: "range",
            minDate: "today",
            onChange: function (selectedDates, dateStr, instance) {
                var date_range = dateStr;
                var dates = date_range.split("to");
                if (dates.length > 1) {
                    document.getElementById('event-time').setAttribute("hidden", true);
                } else {
                    document.getElementById("timepicker1").parentNode.classList.remove("d-none");
                    document.getElementById("timepicker1").classList.replace("d-none", "d-block");
                    document.getElementById("timepicker2").parentNode.classList.remove("d-none");
                    document.getElementById("timepicker2").classList.replace("d-none", "d-block");
                    document.getElementById('event-time').removeAttribute("hidden");
                }
            },
        });
    flatpickr(timepicker1, config);
    flatpickr(timepicker2, config);

}

function flatpicekrValueClear() {
    start_date.flatpickr().clear();
    timepicker1.flatpickr().clear();
    timepicker2.flatpickr().clear();
}


function eventClicked() {
    document.getElementById('form-event').classList.add("view-event");
    document.getElementById("event-title").classList.replace("d-block", "d-none");
    document.getElementById("event-category").classList.replace("d-block", "d-none");
    document.getElementById("event-start-date").parentNode.classList.add("d-none");
    document.getElementById("event-start-date").classList.replace("d-block", "d-none");
    document.getElementById('event-time').setAttribute("hidden", true);
    document.getElementById("timepicker1").parentNode.classList.add("d-none");
    document.getElementById("timepicker1").classList.replace("d-block", "d-none");
    document.getElementById("timepicker2").parentNode.classList.add("d-none");
    document.getElementById("timepicker2").classList.replace("d-block", "d-none");
    document.getElementById("event-location").classList.replace("d-block", "d-none");
    document.getElementById("event-description").classList.replace("d-block", "d-none");
    document.getElementById("event-start-date-tag").classList.replace("d-none", "d-block");
    document.getElementById("event-timepicker1-tag").classList.replace("d-none", "d-block");
    document.getElementById("event-timepicker2-tag").classList.replace("d-none", "d-block");
    document.getElementById("event-location-tag").classList.replace("d-none", "d-block");
    document.getElementById("event-description-tag").classList.replace("d-none", "d-block");
    document.getElementById('btn-save-event').setAttribute("hidden", true);
}

function editEvent(data) {
    var data_id = data.getAttribute("data-id");
    if (data_id == 'new-event') {
        document.getElementById('modal-title').innerHTML = "";
        document.getElementById('modal-title').innerHTML = "Agregar inversión";
        document.getElementById("btn-save-event").innerHTML = "Generar";
        eventTyped();
    } else if (data_id == 'edit-event') {
        data.innerHTML = "Cancel";
        data.setAttribute("data-id", 'cancel-event');
        document.getElementById("btn-save-event").innerHTML = "Update Event";
        data.removeAttribute("hidden");
        eventTyped();
    } else {
        data.innerHTML = "Edit";
        data.setAttribute("data-id", 'edit-event');
        eventClicked();
    }
}

function eventTyped() {
    document.getElementById('form-event').classList.remove("view-event");
    document.getElementById("event-title").classList.replace("d-none", "d-block");
    document.getElementById("event-category").classList.replace("d-none", "d-block");
    document.getElementById("event-start-date").parentNode.classList.remove("d-none");
    document.getElementById("event-start-date").classList.replace("d-none", "d-block");
    document.getElementById("timepicker1").parentNode.classList.remove("d-none");
    document.getElementById("timepicker1").classList.replace("d-none", "d-block");
    document.getElementById("timepicker2").parentNode.classList.remove("d-none");
    document.getElementById("timepicker2").classList.replace("d-none", "d-block");
    document.getElementById("event-location").classList.replace("d-none", "d-block");
    document.getElementById("event-description").classList.replace("d-none", "d-block");
    document.getElementById("event-start-date-tag").classList.replace("d-block", "d-none");
    document.getElementById("event-timepicker1-tag").classList.replace("d-block", "d-none");
    document.getElementById("event-timepicker2-tag").classList.replace("d-block", "d-none");
    document.getElementById("event-location-tag").classList.replace("d-block", "d-none");
    document.getElementById("event-description-tag").classList.replace("d-block", "d-none");
    document.getElementById('btn-save-event').removeAttribute("hidden");
}

// upcoming Event
function upcomingEvent(a) {
    a.sort(function (o1, o2) {
        return (new Date(o1.start)) - (new Date(o2.start));
    });
    document.getElementById("upcoming-event-list").innerHTML = null;
    Array.from(a).forEach(function (element) {
        var title = element.title;
        var e_dt = element.end ? element.end : null;
        if (e_dt == "Invalid Date" || e_dt == undefined) {
            e_dt = null;
        } else {
            e_dt = new Date(e_dt).toLocaleDateString('en', {
                year: 'numeric',
                month: 'numeric',
                day: 'numeric'
            });
        }
        var st_date = str_dt(element.start);
        var ed_date = str_dt(element.end);
        if (st_date === ed_date) {
            e_dt = null;
        }
        var startDate = element.start;
        if (startDate === "Invalid Date" || startDate === undefined) {
            startDate = null;
        } else {
            startDate = new Date(startDate).toLocaleDateString('en', {
                year: 'numeric',
                month: 'numeric',
                day: 'numeric'
            });
        }

        var end_dt = (e_dt) ? " to " + e_dt : '';
        var category = (element.className).split("-");
        var description = (element.description) ? element.description : "";
        var e_time_s = tConvert(getTime(element.start));
        var e_time_e = tConvert(getTime(element.end));
        if (e_time_s == e_time_e) {
            var e_time_s = "Full day event";
            var e_time_e = null;
        }
        var e_time_e = (e_time_e) ? " to " + e_time_e : "";
var nuevaFecha=startDate;
console.log(element);
console.log(element.tipo);
console.log(element.cobrada);
boton="";
if(element.tipo==2 || element.tipo==3){ if (element.accion==1){ boton="<hr class=''></hr><div class='text-center'><a href='/inversiones/"+element.idpoliza+"/"+element.tipo+"/cobrar' class='btn btn-success p-1 pl-2 pr-2'>Cobrar</a></div>";  }else{
    boton="<hr class=''></hr><div class='text-center'><button class='btn btn-secondary p-1 pl-2 pr-2' disabled>No disponible</button></div>";
}

if(element.cobrada){ boton="<hr class=''></hr><div class='text-center'><button class='btn btn-outline-success p-1 pl-2 pr-2' disabled>Cobrada</button></div>"; }

}
        u_event = "<div class='card mb-3'>\
                        <div class='card-body'>\
                            <div class='d-flex mb-3'>\
                                <div class='flex-grow-1'><i class='mdi mdi-checkbox-blank-circle me-2 text-" + category[2] + "'></i><span class='fw-medium'>" + nuevaFecha + end_dt + " </span></div>\
                                \
                            </div>\
                            <h6 class='card-title fs-16'> " + title + "</h6>\
                            <p class='text-muted text-truncate-two-lines mb-0'> " + description + "</p>"+boton+"\
                        </div>\
                    </div>";
        document.getElementById("upcoming-event-list").innerHTML += u_event;
    });
};

function getTime(params) {
    params = new Date(params);
    if (params.getHours() != null) {
        var hour = params.getHours();
        var minute = (params.getMinutes()) ? params.getMinutes() : 00;
        return hour + ":" + minute;
    }
}

function tConvert(time) {
    var t = time.split(":");
    var hours = t[0];
    var minutes = t[1];
    var newformat = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    return (hours + ':' + minutes + ' ' + newformat);
}

var str_dt = function formatDate(date) {
    var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var d = new Date(date),
        month = '' + monthNames[(d.getMonth())],
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;
    return [day + " " + month, year].join(',');
};
    </script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
<style>
 
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.querySelector(".hamburger-icon").classList.remove("open");

    </script>
</x-app-layout>