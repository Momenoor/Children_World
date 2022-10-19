<?php
include 'includes/connection.php';
include 'nav.php';
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">لوحة التحكم</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading ">
                        <div class="row">

                            <div class="col-xs-9 text-left">
                                <div class="huge">26</div>
                                <div>تعليقات</div>
                            </div>
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-4x"></i>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-right">التفاصيل</span>
                            <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">

                            <div class="col-xs-9 text-left">
                                <div class="huge">12</div>
                                <div>New Tasks!</div>
                            </div>
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-right">التفاصيل</span>
                            <span class="pull-left">
                                <i class="fa fa-arrow-circle-left"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">

                            <div class="col-xs-9 text-left">
                                <div class="huge">124</div>
                                <div>New Orders!</div>
                            </div>
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-right">التفاصيل</span>
                            <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">

                            <div class="col-xs-9 text-left">
                                <div class="huge">13</div>
                                <div>Support Tickets!</div>
                            </div>
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-right">التفاصيل</span>
                            <span class="pull-left"><i class="fa fa-arrow-circle-left"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php
        $table = null;
        $grade = null;
        $id = null;
        $grades = [];
        if (isset($_SESSION['teacher']) and isset($_SESSION['teacher-id'])) {
            $table = 'teacher';
            $id = $_SESSION['teacher-id'];
        } else if (isset($_SESSION['student']) and isset($_SESSION['student-id'])) {
            $table = 'student';
            $id = $_SESSION['student-id'];
        }

        if (!is_null($table) and !is_null($id)) {
            $query = "SELECT grade FROM {$table} WHERE Id = {$id}";
            $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($run_query) > 0) {
                $row = mysqli_fetch_array($run_query);
                $grade = $row['grade'];
            }
        }
        $date = new DateTime();
        $week = date('W', $date->getTimestamp());
        $year = $date->format('Y');
        $weekStartDate = $date->setISODate($year, $week, 0);
        $startDay = $weekStartDate->format('Y-m-d');
        $endDay = $weekStartDate->modify('+4 days')->format('Y-m-d');

        $where = "(date >= '{$startDay}' AND date <= '{$endDay}')";
        if (!is_null($grade)) {
            $where .= " AND grade = '{$grade}'";
        } else {
            $query = "SELECT * FROM grade";
            $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
            while ($row = mysqli_fetch_array($run_query)) {
                $grades[] = $row['grade'];
            }
        }

        $query = "SELECT * FROM `weekly-plan` where {$where}";
        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $plans = [];
        if (mysqli_num_rows($run_query) > 0) {
            while ($row = mysqli_fetch_array($run_query)) {
                /* if (!is_null($grade)) {
                    $plans[$grade][] = $row;
                }
                foreach ($grades as $grade) {
                    echo $row['grade'].'<br>';
                    if ($row['grade'] === $grade) {
                        $plans[$grade][] = $row;
                    }
                } */
                $plans[$row['grade']][] = $row;
            }
        }
        ?>

        <!-- /.row -->
        <?php foreach ($plans as $grade => $plan) : ?>
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <i class="fa fa-edit "></i>
                            الخطة الاسبوعية - صف <b><?php echo $grade; ?></b>
                            <div class="pull-left"> <?php echo date('d/m/Y'); ?> </div>
                        </div>
                        <div class="panel-body ">
                            <div class="row ">
                                <div class="col-lg-12 pull-right">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th> اليوم </th>
                                                    <th> التاريخ </th>
                                                    <th>مفاهيم لغوية </th>
                                                    <th>مفاهيم حسابية</th>
                                                    <th>القرآن الكريم</th>
                                                    <th>التربية الاسلامية</th>
                                                    <th>العلوم</th>
                                                    <th>اللغة الانجليزية</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($plan as $p) : ?>
                                                    <tr class="odd gradeX">
                                                        <td><?= $p['day']; ?></td>
                                                        <td><?= $p['date']; ?></td>
                                                        <td><?= $p['subject1']; ?></td>
                                                        <td><?= $p['subject2']; ?></td>
                                                        <td><?= $p['subject3']; ?></td>
                                                        <td><?= $p['subject4']; ?></td>
                                                        <td><?= $p['subject5']; ?></td>
                                                        <td><?= $p['subject6']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->

                    <!-- <div class="panel-body">
                        <div id="morris-area-chart" hidden></div>
                    </div> -->
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

                <!-- /.panel-heading -->
                
                <!-- /.panel-body -->
            </div>
        <?php endforeach; ?>
        <!-- /.panel -->

        <!-- /.panel-heading -->


        <!-- <div class="panel-body">
            <div id="morris-donut-chart" hidden></div>
        </div> -->
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->

    <!-- /.panel-body -->

    <!-- /.panel-footer -->
</div>
<!-- /.panel .chat-panel -->
</div>
<!-- /.col-lg-4 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/raphael.min.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>

</html>