@extends('layouts/master')

@section('title')
@if ($type == 'discussion')
    مناقشات
@elseif($type == 'conference')
    مؤتمرات
@elseif($type == 'meeting')
    الاجتماع
@elseif($type == 'activety')
    النشاطات
@endif
@endsection
@section('links')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">


                <div class="row my-4">
                    @isset($todo[0]->id)
                    @foreach ($todo as $item)
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
                                                    <h3 class="h5 mt-4 mb-1">العنوان : {{ $item->title }}</h3>
                                                </a>
                                                <p class="text-muted">مكان : {{ $item->note }}</p>

                                            </div> <!-- .col -->
                                            <div class="col-12 m-2">
                                                اليوم 
                                                <span>{{ date('l',strtotime($item->start))  }} - {{ date('Y-m-d',strtotime($item->start)) }}</span>
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
                                          <!-- .row -->
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
                    @endforeach
                    @else
                    <div class="col-12 text-center">
                        لا يوجد مواعيد
                    </div>
                    @endisset
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
                        <input type="hidden" name="type" value="44">
                        <div class="form-group">
                            <label for="eventTitle" class="col-form-label">العنوان</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Add event title">
                                <input type="hidden" name="code" id="code">
                        </div>
                        <div class="form-group">
                            <label for="eventNote" class="col-form-label">المكان</label>
                            <textarea class="form-control" id="note" name="note" placeholder="Add some note for your event"></textarea>
                        </div>
                       
                       
                        <label for="date-input1">الموعد  </label>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="date-input1">من </label>
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
                                <label for="startDate">الى</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="button-addon-time">
                                            <span class="fe fe-clock fe-16"></span>
                                        </div>
                                    </div>
                                    <input type="datetime-local" class="form-control time-input" name="end" id="end">
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
                axios.get("{{ route('getAppointment1', '') }}/" + $(this).data('id')).then((res) => {
                    const data = res.data.data
                    console.log(data)
                    $("#title").val(data.title)
                    $("#code").val(data.code)
                    $("#note").val(data.note)
                    $("#start").val(data.start)
                    $("#end").val(data.end)
                    

                    $("#eventModal").modal("show")
                }).catch((res) => {
                    console.log(res)
                })
            })

            function save(){
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
            }

            $('#save-event').click(()=>{
                $(".error-todo").html("")
               
                axios.post("{{ route('check_date') }}",
                $("#form-todo").serialize()).then((res)=>{
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
                }).catch((error)=>{
                    var error = error.response.data.errors
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
