<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">روضة عالم الأطفال</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-right navbar-top-links">
        <li><a href="../" target="_blank"><i class="fa fa-home fa-fw"></i> زيارة الموقع</a></li>
    </ul>

    <ul class="nav navbar-left navbar-top-links">
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-left text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-left text-muted small">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-left text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-left text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-left text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
            </ul>
        </li>
        @auth
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>
                    {{ Auth::user()->name }}
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu bg-dark dropdown-user">
                    <li>
                        <a>
                            <form action="{{ route('logout') }}" method="POST">
                                @CSRF
                                <button class="btn btn-block btn-link" type="submit">
                                    <i class="fa fa-sign-out fa-fw"></i>
                                    خروج</button>
                            </form>
                        </a>
                    </li>
                </ul>
            </li>
        @endauth
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse ">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ route('home') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> لوحة التحكم</a>
                </li>

                @if (Auth::user()->isAdmin())
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> الصفوف<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('grade.index') }}">جميع الصفوف</a>
                            </li>
                            <li>
                                <a href="{{ route('grade.create') }}">اضافة صف جديد</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                @endif

                @if (Auth::user()->isAdmin())
                    <li>
                        <a href="#"><i class="fa fa-graduation-cap"></i> الطلاب<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('student.index') }}">جميع الطلاب</a>
                            </li>
                            <li>
                                <a href="{{ route('student.create') }}">اضافة طالب جديد</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->

                    </li>
                @endif

                @if (Auth::user()->isAdmin())
                    <li>
                        <a href="#"><i class="fa fa-users"></i> المعلمات<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('teacher.index') }}">جميع المعلمات</a>
                            </li>
                            <li>
                                <a href="{{ route('teacher.create') }}">اضافة معلمة جديدة</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                @endif

                @if (Auth::user()->isTeacher() or Auth::user()->isAdmin())
                    <li>
                        <a href="#"><i class="fa fa-pencil fa-fw"></i></i> الواجبات<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('homework.index') }}">جميع الواجبات</a>
                            </li>
                            <li>
                                <a href="{{ route('homework.create') }}">اضافة واجب جديد</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->isTeacher() or Auth::user()->isAdmin())
                    <li>
                        <a href="{{route('schedual.create')}}"><i class="fa fa-table fa-fw"></i> الخطة الاسبوعية</a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('activity.index') }}"><i class="fa fa-edit fa-fw"></i> نشاطات</a>
                </li>

                @if (Auth::user()->isAdmin())
                    <li>
                        <a href="{{ route('admin.index') }}"><i class="fa fa-user fa-fw"></i> قائمة المستخدمين </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.create') }}"><i class="fa fa-user-plus fa-fw"></i> مدير اضافي </a>
                    </li>
                @endif
                <!-- /.nav-second-level -->
            </ul>
        </div>
    </div>
</nav>
