@extends('layouts/master')

@section('title')
    ادارة المواعيد
@endsection
@section('links')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">


                <div class="row my-4">
                    @foreach ($todo as $item)
                        @if ($item->type_repet == 'lutcer')
                            <div class="col-md-4">
                                <div class="card mb-4 shadow" style="position: relative">
                                    <div class="card-body my-n3">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-lg bg-light">
                                                    <i class="fe fe-clock fe-24 text-primary"></i>
                                                    {{-- <i class="fa-solid fa-clock"></i> --}}
                                                </span>
                                            </div> <!-- .col -->
                                            <div class="col-9">
                                                @if ($item->status == 1)
                                                    <span class="badge badge-success text-white"
                                                        style="position: absolute;top:3px;left:3px">
                                                        مستمر
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary text-white"
                                                        style="position: absolute;top:3px;left:3px">
                                                        متوقف
                                                    </span>
                                                @endif
                                                <a href="#">
                                                    <h3 class="h5 mt-4 mb-1">المادة : {{ $item->title }}</h3>
                                                </a>
                                                <p class="text-muted">مكان : {{ $item->note }}</p>

                                            </div> <!-- .col -->
                                            <div class="col-12 m-2">
                                                ايام 
                                                <span>{{ date('l',strtotime($item->start))  }}</span>
                                            </div>
                                            <div class="col-12 m-2">
                                                <small>
                                                    (<span>{{ date('H:i',strtotime($item->start)) }}</span>)
                                                    -
                                                    (<span>{{ date('H:i',strtotime($item->end)) }}</span>)
                                                </small>
                                            </div>
                                            <div class="col-md-12 m-2">
                                                
                                            </div>
                                            <div class="col-md-12 m-2">
                                                <span>عدد المحاضارات</span> :
                                                <span class="badge badge-secondary">
                                                    {{ $item->num_repet }}
                                                </span>
                                            </div>
                                        </div> <!-- .row -->
                                    </div> <!-- .card-body -->
                                    <div class="card-footer">
                                        <div class="button-group">
                                            <button class="btn btn-danger delete" data-delete="{{ $item->code }}"><i
                                                    class="fe fe-trash"></i></button>
                                            <button class="btn btn-primary edit" data-id="{{ $item->code }}"><i
                                                    class="fe fe-edit"></i></button>
                                        </div>
                                    </div> <!-- .card-footer -->
                                </div> <!-- .card -->
                            </div> <!-- .col-md-->
                        @endif
                    @endforeach
                </div> <!-- .row-->


                <!-- .card-group -->


            </div> <!-- /.col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

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
                    <div class="text-danger error-todo"></div>
                    <form id="form-todo">
                        @csrf
                        <input type="hidden" name="type" value="lutcer">
                        <div class="form-group">
                            <label for="eventTitle" class="col-form-label">المادة</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="">
                                <input type="hidden" name="code" id="code">
                        </div>
                        <div class="form-group">
                            <label for="eventNote" class="col-form-label">المكان</label>
                            <textarea class="form-control" id="note" name="note" placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control " id='days' name="days[]">
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
                            <input type="date" class="form-control" name="start_study" id='start_study'>
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
                                        id="start">
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
                                    <input type="time" class="form-control time-input" name="end" id="end">
                                </div>
                            </div>
                            <div class="form-row">
                               
                                <div class="form-group col">
                                    <label>اجمالي عدد المحاضارات</label>
                                    <input type="number" name="num_repet" id='num_repet' class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- <form id="form-todo">
                        @csrf
                        <div class="form-group">
                            <label for="eventTitle" class="col-form-label">العنوان</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Add event title">
                            <input type="hidden" name="code" id="code">
                        </div>
                        <div class="form-group">
                            <label for="eventNote" class="col-form-label">ملاحظة</label>
                            <textarea class="form-control" id="note" name="note" placeholder="Add some note for your event"></textarea>
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
                                        id="start">
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
                                        id="end">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>نوع التكرار</label>
                                <select class="form-control" name="type_repet" id="type_repet">
                                    <option value="once">لمرة واحدة</option>
                                    <option value="wekly">كل اسبوع </option>
                                    <option value="mounthly">كل شهر </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>عدد مرات التكرار</label>
                                <input type="number" name="num_repet" id="num_repet" class="form-control">
                            </div>

                        </div>
                    </form> --}}
                </div>
                <div class="modal-footer d-flex justify-content-between">

                    <button type="button" class="btn mb-2 btn-primary" id="save-event">Save Event</button>
                </div>
            </div>
        </div>
    </div> <!-- new event modal -->
@endsection


@section('script')
    <script>
        $(function() {
            $(".edit").click(function() {
                axios.get("{{ route('getAppointment', '') }}/" + $(this).data('id')).then((res) => {
                    const data = res.data
                    console.log(data)
                    $("#title").val(data.title)
                    $("#code").val(data.code)
                    $("#note").val(data.note)
                    $("#start").val(data.start)
                    $("#end").val(data.end)
                    $("#num_repet").val(data.num_repet)
                    $("#start_study").val(data.start_study)
                    $('#days').val(data.days)
                    $("#eventModal").modal("show")
                }).catch((res) => {
                    console.log(res)
                })
            })
            $("#save-event").click(() => {
                $(".error-todo").html("")
                axios.post("{{ route('edit.event') }}", $("#form-todo").serialize()).then((res) => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'تم تعديل الموعد بنجاح',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload()
                    })
                    // $("#form-todo").trigger("reset")
                }).catch((res) => {
                    var error = res.response.data.errors
                    for (let x in error) {
                        for (let y of error[x]) {
                            $(".error-todo").append(y + "<br>")
                        }
                    }
                })
            })

            $(".delete").click(function(){
                var id = $(this).data('delete')

                Swal.fire({
                    title: 'هل انت متاكد من حذف الموعد',
                    text: "سيتم حذف كل الاوقات التابعة له",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "الغاء",
                    confirmButtonText: 'حذف'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.get("{{ route('delete.event', '') }}/" +id ).then(
                    (res) => {
                        // console.log(res)
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'تم حذف الموعد بنجاح',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload()
                            })
                        })
                    }
                })
            })
        })
    </script>
@endsection
