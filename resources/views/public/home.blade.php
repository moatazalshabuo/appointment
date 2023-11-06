@extends('layouts/master')
@section('links')
    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/select2.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/quill.snow.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center my-3">
                    <div class="col">
                        <h2 class="page-title">Calendar</h2>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn" data-toggle="modal" data-target=".modal-calendar"><span
                                class="fe fe-filter fe-16 text-muted"></span></button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal"><span
                                class="fe fe-plus fe-16 mr-3"></span>New Event</button>
                    </div>
                </div>
                <div id='calendar'></div>
                <!-- new event modal -->
                {{-- <div class="modal fade" id="eventModal2" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="varyModalLabel">اضافة موعد</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body p-4">
                                <div class="text-danger error-todo"></div>
                                <form id="form-todo">
                                    @csrf
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">العنوان</label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="Add event title">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">ملاحظة</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder="Add some note for your event"></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">بداية الوقت</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-date"><span
                                                            class="fe fe-calendar fe-16"></span></div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    id="drgpicker-start">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">نهاية الوقت</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-time"><span
                                                            class="fe fe-clock fe-16"></span></div>
                                                </div>
                                                <input type="datetime-local" class="form-control time-input" name="end"
                                                    id="start-time">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>نوع التكرار</label>
                                                <select class="form-control" name="type_repet">
                                                    <option value="once">لمرة واحدة</option>
                                                    <option value="wekly">كل اسبوع </option>
                                                    <option value="mounthly">كل شهر </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>عدد مرات التكرار</label>
                                                <input type="number" name="num_repet" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">

                                <button type="button" class="btn mb-2 btn-primary" id="save-time">Save Event</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- new event modal --> --}}

                <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title" id="varyModalLabel">اضافة موعد</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               
                            </div>
                            <div class="modal-body p-4">
                                <div class="block">
                                    <ul class="nav nav-pills nav-fill">
                                        <li class="nav-item">
                                          <a class="nav-link active" aria-current="page" href="#" data-form='form-todo'>محاضرة </a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" href="#" data-form='form-conference'>مؤتمر</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" data-form="form-discussion">مناقشة بحث</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link " data-form="form-meeting">اجتماع</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-form="form-activety">نشاط</a>
                                          </li>
                                      </ul>
                                </div>
                                <div class="text-danger error-todo"></div>
                                <form id="form-todo" class="lutcuer">
                                    @csrf
                                    <input type="hidden" name="type" value="lutcer">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">المادة</label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="Add event title">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder="Add some note for your event"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select2" name="days[]">
                                            <option value="Saturday">السبت</option>
                                            <option value="Sunday">الاحد</option>
                                            <option value="Monday">الاثنين</option>
                                            <option value="Tuesday">الثلاثاء</option>
                                            <option value="Wednesday">الاربعاء</option>
                                            <option value="Thursday">الخميس</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">بداية الدراسة</label>
                                        <input type="date" class="form-control" name="start_study">
                                    </div>
                                    <label for="date-input1">موعد المحاضرة </label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">من </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-date"><span
                                                            class="fe fe-calendar fe-16"></span></div>
                                                </div>
                                                <input type="time" class="form-control drgpicker" name="start"
                                                    id="drgpicker-start">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="time" class="form-control time-input" name="end" id="start-time">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                           
                                            <div class="form-group col">
                                                <label>اجمالي عدد المحاضارات</label>
                                                <input type="number" name="num_repet" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="form-conference">
                                    @csrf
                                    <input type="hidden" name="type" value="conference">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">عنوان المؤتمر</label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="Add event title">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder="Add some note for your event"></textarea>
                                    </div>
                                
                                    <label for="date-input1">موعد المؤتمر </label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">من </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-date"><span
                                                            class="fe fe-calendar fe-16"></span></div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    id="drgpicker-start">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control time-input" name="end" id="start-time">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                <form id="form-discussion">
                                    @csrf
                                    <input type="hidden" name="type" value="discussion">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">عنوان البحث</label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="Add event title">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder="Add some note for your event"></textarea>
                                    </div>
                                
                                    <label for="date-input1">موعد البحث </label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">من </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-date"><span
                                                            class="fe fe-calendar fe-16"></span></div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    id="drgpicker-start">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control time-input" name="end" id="start-time">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                <form id="form-meeting">
                                    @csrf
                                    <input type="hidden" name="type" value="meeting">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">عنوان الاجتماع</label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="Add event title">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder="Add some note for your event"></textarea>
                                    </div>
                                
                                    <label for="date-input1">موعد الاجتماع </label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">من </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-date"><span
                                                            class="fe fe-calendar fe-16"></span></div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    id="drgpicker-start">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control time-input" name="end" id="start-time">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                <form id="form-activety">
                                    @csrf
                                    <input type="hidden" name="type" value="activety">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">عنوان </label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="Add event title">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder="Add some note for your event"></textarea>
                                    </div>
                                
                                    <label for="date-input1">موعد النشاط </label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">من </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-date"><span
                                                            class="fe fe-calendar fe-16"></span></div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    id="drgpicker-start">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control time-input" name="end" id="start-time">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn mb-2 btn-primary" id="save-time">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- new event modal -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    <div class="modal fade modal-right modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>العنوان</label>
                    <input type="text" class="form-control" name="title" id="title-show">
                    <br>
                    <label>ملاحظات</label>
                    <textarea id="note-show" class="form-control" row="6" name="note"></textarea>
                    <input type="hidden" name="id" id="id-show">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="button" class="btn mb-2 btn-primary">حفظ</button>
                    <button type="button" class="btn mb-2 btn-danger">حذف</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="{{ URL::asset('js/fullcalendar.js') }}"></script>
    <script src="{{ URL::asset('js/fullcalendar.custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
        integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

            function getDescription(id) {
                axios.get('/api/todo/' + id).then((res) => {
                    data = res.data
                    Swal.fire(
                        `${data.title}`,
                        `${data.note} <br> ${data.start} - ${data.end}`,
                        'info'
                        )
                })
            }

        /** full calendar */
        var event = @json($todo);
        var calendarEl = document.getElementById('calendar');
        if (calendarEl) {
            document.addEventListener('DOMContentLoaded', function() {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap'],
                    timeZone: 'UTC',
                    themeSystem: 'bootstrap',
                    header: {
                        left: 'today, prev, next',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                    },
                    buttonIcons: {
                        prev: 'fe-arrow-left',
                        next: 'fe-arrow-right',
                        prevYear: 'left-double-arrow',
                        nextYear: 'right-double-arrow'
                    },
                    weekNumbers: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: event,
                    eventClick: function(info) {
                        getDescription(info.event.id);

                    },
                });
                calendar.render();
            });
        }

    </script>
    <script>
        $(function() {
            $("#save-time").click(() => {
                $(".error-todo").html("")
                var form = $('.nav-link.active').data('form')
                console.log(form)
                axios.post("/api/save", $(`#${form}`).serialize()).then((res) => {
                   console.log(res)
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'تم حفظ الموعد بنجاح',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(()=>{
                        location.reload()
                    })
                    $("#form-todo").trigger("reset")
                }).catch((res) => {
                    var error = res.response.data.errors
                    for (let x in error) {
                        for (let y of error[x]) {
                            $(".error-todo").append(y + "<br>")
                        }
                    }
                })
            })

            $(".nav-link").click(function(){
                name = $(this).data('form')
                $('form').hide()
                $(`#${name}`).show()
                $(this).parent().siblings().children().removeClass('active');
                $(this).addClass('active')
            })
        })
    </script>
@endsection
