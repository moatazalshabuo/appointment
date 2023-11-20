<div style="background-image: url({{ asset('assets/bg.jpg') }});background-size: cover;padding-top: 15px;">
    <h4 class="text-white m-2">مرحبا بك !</h4>
    <nav class="topnav navbar navbar-light pt-0" >
    {{-- <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button> --}}
    <span class="text-white">
        <i class="fe fe-user m-1"></i>
        {{ auth()->user()->name }}
    </span>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link my-2 text-white" href="#"  >
                <i class="fe fe-calendar"></i>
                نظام التنبيه الجامعي
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                <span class="fe fe-grid fe-16"></span>

            </a>
        </li>
        {{-- <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" style="position: relative" href="./#" data-toggle="modal"
                data-target=".modal-notif">
                <span class="fe fe-bell fe-16"></span>
                <span id="count_noty" class="badge badge-success text-white"
                    style="position: absolute;left:12px;top: -3px;">
                </span>
            </a>
        </li> --}}
        {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="bg-secondary rounded-circle p-2 text-center" style="
                            margin: auto;">
                    <i class="fe fe-user text-white" style="font-size:16px;"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
            </div>
        </li> --}}
    </ul>
</nav>
</div>