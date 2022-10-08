<?php
session_start();
 include 'includes/connection.php';
 if ((isset($_SESSION['teacher'])) ||(isset($_SESSION['teacher-id'])) ||(isset($_SESSION['admin-id'])) ||(isset($_SESSION['admin']))||(isset($_SESSION['student-id']))||(isset($_SESSION['student']))){}
 
else {
    echo "<script>alert('سجل دخولك أولاً');
    window.location.href='login-teacher.php';</script>";	
}

?>?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="logo.jpg" rel="icon">

        <title>لوحة التحكم</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body dir="rtl">

        <div id="wrapper">

            <!-- Navigation -->
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
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> 
                          <?php  if ((isset($_SESSION['admin'])) ||(isset($_SESSION['admin-id']))) {
                             echo $_SESSION['admin'];
                            
                            }
                            elseif ((isset($_SESSION['teacher'])) ||(isset($_SESSION['teacher-id']))) {
                                echo $_SESSION['teacher'];
                               
                               }
                               elseif ((isset($_SESSION['student'])) ||(isset($_SESSION['student-id']))) {
                                echo $_SESSION['student'];
                               
                               }
                            
                            
                            ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="profile-teacher.php"><i class="fa fa-user fa-fw"></i> الملف الشخصي</a>
                            </li>
                           
                            <li class="divider"></li>
                            <li><a href="logout.php">
                                <i class="fa fa-sign-out fa-fw"></i>
                             خروج</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <span class="input-group-btn">
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> لوحة التحكم</a>
                            </li>
                            <?php if ((isset($_SESSION['admin-id'])) ||(isset($_SESSION['admin']))) {

echo  '
                            <li>
                                <a href="#"><i class="fa fa-graduation-cap"></i> الطلاب<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="student.php">جميع الطلاب</a>
                                    </li>
                                    <li>
                                        <a href="add-student.php">اضافة طالب جديد</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> الصفوف<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="grade.php">جميع الصفوف</a>
                                    </li>
                                    <li>
                                        <a href="add-grade.php">اضافة صف جديد</a>
                                    </li>
                                </ul>';}?>
                                <!-- /.nav-second-level -->
                            </li>      
                        <?php if ((isset($_SESSION['admin-id'])) ||(isset($_SESSION['admin']))) {

                           echo  '  <li>                                   
                                <a href="#"><i class="fa fa-users"></i> المعلمات<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                     <a href="teacher.php">جميع المعلمات</a>
                                    </li>
                                    <li>
                                        <a href="add-teacher.php">اضافة معلم جديد</a>
                                    </li>
                                </ul>';}?>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pencil fa-fw"></i></i> الواجبات<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="homework.php">جميع الواجبات</a>
                                    </li>
                                    <?php if ((isset($_SESSION['teacher-id'])) ||(isset($_SESSION['teacher']))) 
                                    {

                                echo  '<li>
                                        <a href="add-homework.php">اضافة واجب جديد</a>
                                    </li>';}?>
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                            <?php  if ((isset($_SESSION['teacher'])) ||(isset($_SESSION['teacher-id'])) ||(isset($_SESSION['admin-id'])) ||(isset($_SESSION['admin']))) {
                             echo'<a href="add-plan.php"><i class="fa fa-table fa-fw"></i> الخطة الاسبوعية</a>';
                            
                            }?>
                                
                            </li>
                            <li>
                                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> نشاطات</a>
                            </li>
                            <li>
                           <?php if ((isset($_SESSION['admin'])) ||(isset($_SESSION['admin-id']))){
                           echo '<a href="add-admin.php"><i class="fa fa-table fa-fw"></i> مدير اضافي </a>';
                           }?>
                            </li>
                           
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

