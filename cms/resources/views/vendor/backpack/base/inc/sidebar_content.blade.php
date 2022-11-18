{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('activity') }}"><i class="fa-regular fa-chart-network nav-icon"></i> Activities</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('answer') }}"><i class="nav-icon la la-question"></i> Answers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('grade') }}"><i class="nav-icon la la-question"></i> Grades</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('homework') }}"><i class="nav-icon la la-question"></i> Homework</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('rate') }}"><i class="nav-icon la la-question"></i> Rates</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('schedual') }}"><i class="nav-icon la la-question"></i> Scheduals</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('student') }}"><i class="nav-icon la la-question"></i> Students</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('teacher') }}"><i class="nav-icon la la-question"></i> Teachers</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> Logs</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li> --}}


<!--begin:Menu item-->
<div class="menu-item pt-5">
    <!--begin:Menu content-->
    <div class="menu-content">
        <span class="menu-heading fw-bold text-uppercase fs-7"> {{ trans('backpack::base.main_menu') }}</span>
    </div>
    <!--end:Menu content-->
</div>
<!--end:Menu item-->
<!--begin:Menu item-->
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link" href="{{ backpack_url('dashboard') }}">
        <span class="menu-icon">
            <i class="bi bi-calendar3-event fs-3"></i>
        </span>
        <span class="menu-title">{{ trans('backpack::base.dashboard') }}</span>
    </a>
    <!--end:Menu link-->
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link" href="{{ backpack_url('activity') }}">
        <span class="menu-icon">
            <i class="bi bi-calendar3-event fs-3"></i>
        </span>
        <span class="menu-title">{{ trans('backpack::base.activities') }}</span>
    </a>
    <!--end:Menu link-->
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link" href="{{ backpack_url('teacher') }}">
        <span class="menu-icon">
            <i class="bi bi-calendar3-event fs-3"></i>
        </span>
        <span class="menu-title">{{ trans('backpack::base.teachers') }}</span>
    </a>
    <!--end:Menu link-->
</div>
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link" href="{{ backpack_url('student') }}">
        <span class="menu-icon">
            <i class="bi bi-calendar3-event fs-3"></i>
        </span>
        <span class="menu-title">{{ trans('backpack::base.students') }}</span>
    </a>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
<!--begin:Menu item-->
{{--             <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="bi-chat-left fs-3"></i>
                    </span>
                    <span class="menu-title">Chat</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="../../demo13/dist/apps/chat/private.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Private Chat</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="../../demo13/dist/apps/chat/group.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Group Chat</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="../../demo13/dist/apps/chat/drawer.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Drawer Chat</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div> --}}

