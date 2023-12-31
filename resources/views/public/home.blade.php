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
@section('style')
    <style>
        .fc-center {
            text-align: center !important;
            margin-bottom: 0 !important;
            padding: 10px;
            background-color: #17629b
        }
        .fc-center *{
            color: white
        }
        .fc-right{
            display: none;
        }
        .fc-day-grid-container{
            height: 340px !important;
            background-color: white;
            color: #17629b;
        }
        .fc-toolbar{
            margin-bottom: 0 !important;
        }
        .ava {
            bottom: 15px;
            left:15px;
            height: 60px;
            width: 60px;
            z-index: 10;
            text-align: center
        }
        .bg-primary{
            background-color: #17629b !important;
            color: white !important;
        }
    
        .l.active {
            background-color: #17629b !important;
        }
        .c.active{
            background-color: rgb(216, 72, 72) !important;
        }
        .d.active{
            background-color: rgb(40, 94, 40) !important;
        }
        .me.active{
            background-color: rgb(199, 0, 199) !important;
        }
        .ex.active{
            background-color: rgb(255, 188, 62) !important;
        }
        .n.active{
            background-color: black !important
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center my-3">
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary position-fixed ava" style="" data-toggle="modal" data-target="#eventModal"><span
                                class="fe fe-plus fe-16"></span></button>
                        <a href="{{ route('about') }}" class="btn btn-info position-fixed ava" style=" right:10px;" ><span
                                    class="fe fe-info fe-16"></span>
                                حول
                                </a>
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
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-date"><span
                                                            class="fe fe-calendar fe-16"></span></div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">نهاية الوقت</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-time"><span
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
                            <div class="modal-header" style="background-image: url({{ asset('assets/bg.jpg') }});background-size: cover;padding-top: 15px;">

                                {{-- <h5 class="modal-title" id="varyModalLabel">اضافة موعد</h5> --}}
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               
                            </div>
                            <div class="modal-body p-4">
                                <div class="block">
                                    <ul class="nav nav-pills nav-fill">
                                        <li class="nav-item">
                                          <a class="nav-link l" aria-current="page" data-form='form-todo'>
                                            <i class="fas fa-chalkboard-teacher "></i> <br />
                                          محاضرة </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link c" data-form='form-conference'>
                                                <i class="fe fe-users"></i> <br />
                                                مؤتمر</a>
                                          </li>
                                        <li class="nav-item">
                                          <a class="nav-link d" data-form="form-discussion">
                                            <i class="material-icons">class</i> <br />
                                            مناقشة بحث</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link me" data-form="form-meeting">
                                            <i class="fa-solid fa-users"></i> <br />
                                             اجتماع</a>
                                        </li>
                                        <li class="nav-item" >
                                            <a class="nav-link ex" data-form="form-activety">
                                                <i class="fa-solid fa-chalkboard"></i> <br />
                                                 امتحان</a>
                                          </li>
                                          <li class="nav-item" >
                                            <a class="nav-link n" data-form="form-A-seminar">
                                                <i class="fa-solid fa-file-circle-check"></i> <br />                                                 ندوة</a>
                                          </li>
                                          <li class="nav-item" >
                                            <a class="nav-link t" data-form="form-scientific-paper">
                                                <i class="fa-regular fa-note-sticky"></i> <br />
                                                تسليم ورقة علمية</a>
                                          </li>
                                      </ul>
                                      {{-- <select class="form-control overflow-hidden w-75 m-auto" id="chose_form">
                                        <option value="form-todo">محاضرة</option>
                                        <option value="form-conference">مؤتمر</option>
                                        <option value="form-discussion"> مناقشة بحث</option>
                                        <option value="form-meeting">اجتماع</option>
                                        <option value="form-activety">امتحان</option>
                                        <option value="form-A-seminar">ندوة</option>
                                        <option value="form-scientific-paper">تسليم ورقة علمية</option>
                                    </select> --}}
                                </div>
                                
                                <form id="form-todo" class="lutcuer" style="display: none">
                                    @csrf
                                    <input type="hidden" name="type" value="lutcer">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">المادة</label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder=""></textarea>
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
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-date">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="time" class="form-control drgpicker" name="start"
                                                    id="startTime">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="time" class="form-control time-input" name="end" id="endTime">
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
                                <form id="form-conference" style="display: none">
                                    @csrf
                                    <input type="hidden" name="type" value="conference">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">عنوان المؤتمر</label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder=""></textarea>
                                    </div>
                                
                                    <label for="date-input1">موعد المؤتمر </label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">من </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-date">
                                                        
                                                        <span class="fe fe-clock fe-16"></span>

                                                        </div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control time-input" name="end" id="start-time">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                <form id="form-discussion" style="display: none">
                                    @csrf
                                    <input type="hidden" name="type" value="discussion">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">عنوان البحث</label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder=""></textarea>
                                    </div>
                                
                                    <label for="date-input1">موعد البحث </label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">من </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-date"><span class="fe fe-clock fe-16"></span></div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control time-input" name="end" id="start-time">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                <form id="form-meeting" style="display: none">
                                    @csrf
                                    <input type="hidden" name="type" value="meeting">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">عنوان الاجتماع</label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder=""></textarea>
                                    </div>
                                
                                    <label for="date-input1">موعد الاجتماع </label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">من </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-date"><span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control time-input" name="end" id="start-time">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                <form id="form-activety" style="display: none">
                                    @csrf
                                    <input type="hidden" name="type" value="activety">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">اسم المادة </label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder=""></textarea>
                                    </div>
                                
                                    <label for="date-input1">موعد الامتحان </label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">من </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-date"><span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control time-input" name="end" id="start-time">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                <form id="form-A-seminar" style="display: none">
                                    @csrf
                                    <input type="hidden" name="type" value="A-seminar">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">عنوان الندوة </label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder=""></textarea>
                                    </div>
                                
                                    <label for="date-input1">موعد الندوة </label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">من </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-date"><span class="fe fe-clock fe-16"></span></div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control time-input" name="end" id="start-time">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                <form id="form-scientific-paper" style="display: none">
                                    @csrf
                                    <input type="hidden" name="type" value="scientific-paper">
                                    <div class="form-group">
                                        <label for="eventTitle" class="col-form-label">عنوان الورقة </label>
                                        <input type="text" class="form-control" name="title" id="eventTitle"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="eventNote" class="col-form-label">المكان</label>
                                        <textarea class="form-control" id="eventNote" name="note" placeholder=""></textarea>
                                    </div>
                                
                                    <label for="date-input1">موعد التسليم </label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date-input1">من </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-date"><span class="fe fe-clock fe-16"></span></div>
                                                </div>
                                                <input type="datetime-local" class="form-control drgpicker" name="start"
                                                    >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="startDate">الى</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text  bg-primary" id="button-addon-time">
                                                        <span class="fe fe-clock fe-16"></span>
                                                    </div>
                                                </div>
                                                <input type="datetime-local" class="form-control time-input" name="end" id="start-time">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                <div class="text-danger error-todo"></div>
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

var type = {
    "lutcer":'محاضرة',
    "conference":'مؤتمر',
    "discussion":'مناقشة بحث',
        "meeting":'اجتماع',
        "activety":'امتحان',
        "A-seminar":'ندوة',
        "scientific-paper":'تسليم ورقة علمية'
}
            function getDescription(id) {
                axios.get('/api/todo/' + id).then((res) => {
                    data = res.data
                    console.log(data.type_repet)
                    Swal.fire(
                        `${type[`${data.type_repet}`]} ${data.title}`,
                        `${data.note} <br> ${data.start} <br> ${data.end} `,
                        'info'
                        )
                })
            }

            function checkTime() {
            // الحصول على قيم موعد البداية وموعد النهاية
            var startTime = document.getElementById("startTime").value;
            var endTime = document.getElementById("endTime").value;

            // التحقق من أن موعد النهاية بعد موعد البداية
            if (startTime < endTime) {
                return true;
            } else {
                $(".error-todo").append("خطأ: موعد نهاية المحاضرة يجب أن يكون بعد موعد البداية.");
                return false;
            }
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
            function save(form_i){
                $(".error-todo").html("")
                var form = form_i
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
            }

            $(".nav-link").click(function(){
                name = $(this).data('form')
                $('form').hide()
                $(`#${name}`).show()
                $(this).parent().siblings().children().removeClass('active');
                $(this).addClass('active')
            })
            // $('#chose_form').change(function(){
            //     name = $(this).val()
            //     $('form').hide()
            //     $(`#${name}`).show()
            //     $(this).parent().siblings().children().removeClass('active');
            //     $(this).addClass('active')
            // })

            $('#save-time').click(function(){
                $(".error-todo").html("")
                var form = $('.nav-link.active').data('form')
                console.log(form)
                if(form != "form-todo"){
                axios.post("{{ route('check_date') }}",
                $(`#${form}`).serialize()
                ).then((res)=>{
                    // console.log(res)
                    text = ''
                    for(i = 0;i<res.data.length;i++){
                        text += res.data[i].title + ' - '+res.data[i].start + "\n"
                    }
                    Swal.fire({
                    title: "هناك تعارض في المواعيد?",
                    text: text,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "حفظ!",
                    cancelButtonText:'الغاء'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        save(form);
                    }
                    });
                }).catch((res)=>{
                    var error = res.response.data.errors
                    for (let x in error) {
                        for (let y of error[x]) {
                            $(".error-todo").append(y + "<br>")
                        }
                    }
                })
                }else{
                    if(checkTime()){
                        save(form);
                    }
                }
            })
        })
    </script>
@endsection
