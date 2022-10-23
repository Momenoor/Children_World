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
                    <a href="{{ route('student.home') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> لوحة التحكم</a>
                </li>

                <li>
                    <a href="{{ route('student.homework.index') }}"><i class="fa fa-pencil fa-fw"></i></i> الواجبات<span
                            class="fa arrow"></span></a>
                </li>

                <li>
                    <a href="{{ route('student.schedual.create') }}"><i class="fa fa-table fa-fw"></i> الخطة الاسبوعية</a>
                </li>

                <li>
                    <a href="{{ route('student.activity.index') }}"><i class="fa fa-edit fa-fw"></i> نشاطات</a>
                </li>
                <!-- /.nav-second-level -->
            </ul>
        </div>
    </div>
</nav>
