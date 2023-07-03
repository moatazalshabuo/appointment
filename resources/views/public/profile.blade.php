@extends('layouts/master')

@section('title')
    ادارة المواعيد
@endsection
@section('links')
@endsection

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <div class="bg-secondary rounded-circle"
                                style="width: 150px;
                            margin: auto;">
                                <i class="fe fe-user text-white" style="font-size:150px;"></i>
                            </div>
                            <h5 class="my-3">{{ Auth::user()->name }}</h5>
                            {{-- <p class="text-muted mb-1">Full Stack Developer</p>
                            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> --}}
                            <div class="d-flex justify-content-center mb-2">
                                <a  href="{{route('password.request')}}" class="btn btn-primary m-1">تعيين كلمة المرور</a>
                                <button type="button" class="btn btn-outline-primary m-1" data-toggle="modal"
                                    data-target="#defaultModal">تعديل البيانات</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">الاسم</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">البريد الالكتروني</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">رقم الهاتف</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">تاريخ التسجيل</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->created_at }}</p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">تعديل البيانات السخصية</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-danger error-user"></div>
                    <form id='form-user'>
                        @csrf
                        <div class="form-group">
                            <label for="name" class=" col-form-label text-md-end">الاسم</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                                    <input type="hidden" name="id" value="{{Auth::id()}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-md-end">البريد الالكتروني</label>

                                    <div class="">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="col-form-label text-md-end">رقم الهاتف</label>

                                    <div class="">
                                        <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ Auth::user()->phone }}" required autocomplete="phone">


                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="button" class="btn mb-2 btn-primary" id="save-user">تحديث</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(function() {
            $("#save-user").click(() => {
                $(".error-user").html("")
                axios.post("{{ route('edituser') }}", $("#form-user").serialize()).then((res) => {
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
                            $(".error-user").append(y + "<br>")
                        }
                    }
                })
            })
        })
    </script>
@endsection
