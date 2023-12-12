<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Appointment</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/feather.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/select2.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/dataTables.bootstrap4.css') }}">
    <!-- App CSS -->
    @yield('links')
    <link rel="stylesheet" href="{{ URL::asset('css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ URL::asset('css/app-dark.css') }}" id="darkTheme" disabled>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://twemoji.maxcdn.com/v/13.0.1/twemoji-awesome.css">

    <style>
     @import url('https://fonts.googleapis.com/css?family=Changa:400,700&subset=arabic');
     

/* font-family: 'Lateef', serif; */
        body * {
            font-family: 'Changa';

        }

        .seacren-sm {
            position: fixed;
            bottom: 25px;
            right: 10px;
            border-radius: 40%;
            z-index: 999;
        }

        @media only screen and (min-width: 600px) {
            .seacren-sm {
                display: none;
            }

            .seacren-xl {
                display: block;
            }
        }

        @media only screen and (max-width: 600px) {
            .seacren-sm {
                display: block;
            }

            .seacren-xl {
                display: none;
            }
        }

        .liactive {
            color: #0045ce !important;
            text-decoration: underline !important;
        }
        .btn-primary{
            color: #fff;
            background-color: #17629b !important;
        }
        .text-primary{
            color:#17629b !important
        }
        .lod {
            background-color: #fff;
            position: fixed;
            top: 0;
            bottom: 0px;
            left: 0px;
            right: 0px;
            z-index: 99;
            justify-content: center;
        }
        .custom-loader {
            width:50px;
            height:50px;
            border-radius:50%;
            border:8px solid;
            border-color:#766DF4 #0000;
            animation:s1 1s infinite;
            }
            @keyframes s1 {to{transform: rotate(.5turn)}}

            .none{
                display: none !important;
                animation: ease-in-out 1s;
            }
    </style>
    @yield('style')
</head>

<body class="vertical  light rtl ">
    <div class="lod d-flex align-items-center">
        <div class="custom-loader"></div>
    </div>
    <div class="wrapper">
        @include('layouts/navbar')
        @include('layouts/sidebar')
        <main role="main" class="main-content">
            @yield('content')
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="noty-list" class="list-group list-group-flush my-n3">

                       
                    </div> <!-- / .list-group -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-block" id="seen" data-dismiss="modal">تمت
                        المشاهدة</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-5" style="overflow-y: scroll;">
                    <div class="row align-items-center">
                        <a class="col-6 text-center" href="{{ route('home') }}">
                            <div class="squircle bg-success justify-content-center">
                                <i class="fe fe-home fe-32 align-self-center text-white"></i>
                            </div>
                            <p>الرئيسية</p>
                        </a>
                        <a class="col-6 text-center" onclick="$('.modal-shortcut').modal('hide')" data-toggle="modal"
                        data-target=".modal-notif">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-bell fe-32 align-self-center text-white"></i>
                            </div>
                            <p>الاشعارات</p>
                        </a>
                    </div>
                    <div class="row align-items-center">
                        <a class="col-6 text-center" href="{{ route('appointemt') }}">
                            <div class="squircle bg-primary justify-content-center">
                                {{-- <i class="fe fe-calendar fe-32 align-self-center text-white"></i> --}}
                                {{-- <i class="material-icons">class</i> --}}
                                <i class="fas fa-chalkboard-teacher fe-32 align-self-center"></i>
                            </div>
                            <p>ادارة المحاضرات</p>
                        </a>
                        <a class="col-6 text-center" href="{{ route('appointemt-type','conference') }}">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-users fe-32 align-self-center text-white"></i>
                            </div>
                            <p>ادارة المؤتمرات</p>
                        </a>
                    </div>
                    <div class="row align-items-center">
                        <a class="col-6 text-center"  href="{{ route('appointemt-type','discussion') }}">
                            <div class="squircle bg-primary justify-content-center">
                                {{-- <i class="fe fe-calendar fe-32 align-self-center text-white"></i> --}}
                                <i class="material-icons fe-32 align-self-center" style="font-size: 32px">class</i>
                            </div>
                            <p>ادارة المناقشات</p>
                        </a>
                        <a class="col-6 text-center" href="{{ route('appointemt-type','meeting') }}">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fa-solid fa-users fe-32 align-self-center"></i>
                            </div>
                            <p>ادارة الاجتماعات</p>
                        </a>
                    </div>
                    <div class="row align-items-center">
                        <a class="col-6 text-center"  href="{{ route('appointemt-type','A-seminar') }}">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fa-solid fa-chalkboard fe-32 align-self-center"></i>
                            </div>
                            <p>ادارة الندوات</p>
                        </a>
                        <a class="col-6 text-center" href="{{ route('appointemt-type','scientific-paper') }}">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fa-solid fa-file-circle-check fe-32 align-self-center"></i>
                            </div>
                            <p>ادارة الاوراق العلمية</p>
                        </a>
                    </div>
                    <div class="row align-items-center">
                        <a class="col-6 text-center" href="{{ route('appointemt-type','activety') }}">
                            <div class="squircle bg-primary justify-content-center">
                                {{-- <i class="fe fe-calendar fe-32 align-self-center text-white"></i> --}}
                                <i class="fa-regular fa-note-sticky fe-32 align-self-center"></i>
                            </div>
                            <p>ادارة الامتحانات</p>
                        </a>
                        
                        {{-- <a class="col-6 text-center" href="{{ route('about') }}">
                            <div class="squircle bg-info justify-content-center">
                                <i class="fe fe-info fe-32 align-self-center text-white"></i>
                            </div>
                            <p>حول التطبيق</p>
                        </a> --}}
                        <div class="col-6 text-center">
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            <button  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="squircle bg-danger border-0 justify-content-center">
                                <i class="fe fe-log-out fe-32 align-self-center text-white"></i>
                            </button>
                            <p>الخروج</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('js/daterangepicker.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ URL::asset('js/tinycolor-min.js') }}"></script>
    <script src="{{ URL::asset('js/config.js') }}"></script>
    <script src="{{ URL::asset('js/apps.js') }}"></script>
    <script src="{{ URL::asset('js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('js/dataTables.bootstrap4.min.min.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
        integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('script')

    <script>
        $(function() {
            $('#table').DataTable();
            function noty() {
                axios.get("{{ route('notifications') }}").then((res) => {
                    var notydata = res.data.noty
                    var count = res.data.count
                    var html = ``
                    for (let x of notydata) {
                        html += `<div class="list-group-item bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="fe fe-clock fe-24"></span>
                                </div>
                                <div class="col">
                                    <small><strong>${x.data.title}</strong></small>
                                    <div class="my-0 text-muted small">${x.data.start}</div>
                                    <small class="badge badge-pill badge-light text-muted">${x.data.user} - `
                        if (x.data.status == 0)
                            html += `  سيتم ارسال تذكير اخر غدا`
                        html += `</small>
                                </div>
                            </div>
                        </div>`
                    }
                    $("#noty-list").html(html)

                    if (count != 0) {
                        $("#count_noty").show()
                        $("#count_noty").text(count)
                    } else {
                        $("#count_noty").hide()
                        $("#count_noty").text(0)
                    }
                })
            }
            noty()
            $("#seen").click(function() {
                axios.get("{{ route('seen.notifications') }}").then(() => {
                    noty()
                })
            })
        $(".select2").select2()

        $('.lod').addClass('none')
        })

    </script>
</body>

</html>
