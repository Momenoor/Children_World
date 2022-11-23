{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('activity') }}"><i class="nav-icon la la-question"></i> Activities</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('answer') }}"><i class="nav-icon la la-question"></i> Answers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('grade') }}"><i class="nav-icon la la-question"></i> Grades</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('homework') }}"><i class="nav-icon la la-question"></i> Homework</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('rate') }}"><i class="nav-icon la la-question"></i> Rates</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('student') }}"><i class="nav-icon la la-question"></i> Students</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('teacher') }}"><i class="nav-icon la la-question"></i> Teachers</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('shedual') }}"><i class="nav-icon la la-question"></i> Sheduals</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('schedual') }}"><i class="nav-icon la la-question"></i> Scheduals</a></li>