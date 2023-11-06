<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar="init">
    <div class="simplebar-wrapper" style="margin: 0px;">
        <div class="simplebar-height-auto-observer-wrapper">
            <div class="simplebar-height-auto-observer"></div>
        </div>
        <div class="simplebar-mask">
            <div class="simplebar-offset" style="left: 0px; bottom: 0px;">
                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                    <div class="simplebar-content" style="padding: 0px;">
                        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
                            data-toggle="toggle">
                            <i class="fe fe-x"><span class="sr-only"></span></i>
                        </a>
                        <nav class="vertnav navbar navbar-light">
                            <!-- nav bar -->
                            <div class="w-100 mb-4 d-flex">
                                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                                    <svg version="1.1" id="logo" class="navbar-brand-img brand-sm"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                                        <g>
                                            <polygon class="st0" points="78,105 15,105 24,87 87,87 	"></polygon>
                                            <polygon class="st0" points="96,69 33,69 42,51 105,51 	"></polygon>
                                            <polygon class="st0" points="78,33 15,33 24,15 87,15 	"></polygon>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <ul class="navbar-nav flex-fill w-100 mb-2">
                                <p class="text-muted nav-heading mt-4 mb-1">
                                    <span></span>
                                </p>
                                <ul class="navbar-nav flex-fill w-100 mb-2">
                                    <li class="nav-item w-100">
                                        <a class="nav-link @if (route('home') == Request::url()) liactive @endif"
                                            href="{{ route('home') }}">
                                            <i class="fe fe-calendar fe-16" style="font-size: 16px"></i>
                                            <span class="ml-3 item-text" style="font-size: 16px">التقويم</span>
                                        </a>
                                        <hr>
                                    </li>

                                    <li class="nav-item w-100">
                                        <a class="nav-link @if (route('appointemt') == Request::url()) liactive @endif"
                                            href="{{ route('appointemt') }}">
                                            <i class="fe fe-calendar fe-16" style="font-size: 16px"></i>
                                            <span class="ml-3 item-text" style="font-size: 16px">ادارة المحاضارات</span>
                                        </a>
                                        <hr>
                                    </li>
                                    <li class="nav-item w-100">
                                        <a class="nav-link @if (route('appointemt-type','conference') == Request::url()) liactive @endif"
                                            href="{{ route('appointemt-type','conference') }}">
                                            <i class="fe fe-calendar fe-16" style="font-size: 16px"></i>
                                            <span class="ml-3 item-text" style="font-size: 16px">ادارة المؤتمرات</span>
                                        </a>
                                        <hr>
                                    </li>
                                    <li class="nav-item w-100">
                                        <a class="nav-link @if (route('appointemt-type','discussion') == Request::url()) liactive @endif"
                                            href="{{ route('appointemt-type','discussion') }}">
                                            <i class="fe fe-calendar fe-16" style="font-size: 16px"></i>
                                            <span class="ml-3 item-text" style="font-size: 16px">ادارة المناقشات</span>
                                        </a>
                                        <hr>
                                    </li>
                                    <li class="nav-item w-100">
                                        <a class="nav-link @if (route('appointemt-type','meeting') == Request::url()) liactive @endif"
                                            href="{{ route('appointemt-type','meeting') }}">
                                            <i class="fe fe-calendar fe-16" style="font-size: 16px"></i>
                                            <span class="ml-3 item-text" style="font-size: 16px">ادارة الاجتماعات</span>
                                        </a>
                                        <hr>
                                    </li>
                                    <li class="nav-item w-100">
                                        <a class="nav-link @if (route('appointemt-type','activety') == Request::url()) liactive @endif"
                                            href="{{ route('appointemt-type','activety') }}">
                                            <i class="fe fe-calendar fe-16" style="font-size: 16px"></i>
                                            <span class="ml-3 item-text" style="font-size: 16px">ادارة النشاطات</span>
                                        </a>
                                        <hr>
                                    </li>
                                    <li class="nav-item w-100">
                                        <a class="nav-link @if (route('profile') == Request::url()) liactive @endif"
                                            href="{{ route('profile') }}">
                                            <i class="fe fe-user fe-16" style="font-size: 16px"></i>
                                            <span class="ml-3 item-text" style="font-size: 16px">الملف الشخصي</span>
                                        </a>
                                        <hr>
                                    </li>
                                    {{-- @if (Auth::user()->type == 0)
                                        <li class="nav-item dropdown">
                                            <a href="#fileman" data-toggle="collapse" aria-expanded="false"
                                                class="dropdown-toggle nav-link">
                                                <i class="fe fe-folder fe-16"></i>
                                                <span class="ml-3 item-text">الادارة</span>
                                            </a>
                                            <ul class="collapse list-unstyled pl-4 w-100" id="fileman">
                                                <a class="nav-link pl-3" href="{{ route('user') }}"><span
                                                        class="ml-1">المستخدمين</span></a>
                                                <a class="nav-link pl-3" href="./files-grid.html"><span
                                                        class="ml-1">المسؤول</span></a>
                                            </ul>
                                        </li>
                                    @endif --}}
                                    {{-- appointemt-type --}}
                                    <li class="nav-item w-100">
                                        <a class="btn btn-danger w-100" style="margin: auto"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                            Logout
                                        </a>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="simplebar-placeholder" style="width: 152px; height: 1122px;"></div>
    </div>
    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
    </div>
    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
        <div class="simplebar-scrollbar" style="height: 290px; transform: translate3d(0px, 0px, 0px); display: block;">
        </div>
    </div>
</aside>
