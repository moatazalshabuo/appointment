<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
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
    <!-- App CSS -->
    @yield('links')
    <link rel="stylesheet" href="{{ URL::asset('css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ URL::asset('css/app-dark.css') }}" id="darkTheme" disabled>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
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
    </style>
    @yield('style')
</head>

<body class="vertical  light rtl ">
    <div class="wrapper">
        <main role="main" class="main-content">
            <div class="card bg-primary text-center" >
                <div class="card-header">
                    تنبيه
                </div>
                <div class="card-body">
                    
                    <p class="card-text text-white">
                        الحساب غير مفعل.
                    </p>
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
        integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('script')

    <script>
        $(function() {
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
        })
    </script>
</body>

</html>
