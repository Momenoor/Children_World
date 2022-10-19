<?php include 'nav.php';
$student = $_SESSION['student-id'];

$query = "SELECT * FROM `student` where `student`.`Id` ='$student' ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
    while ($row = mysqli_fetch_array($run_query)) {
        $grade = $row['grade'];
        $studet = $row['name'];
    }
}


?>

<body dir='rtl'>


    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">واجبات صف <?php echo $grade; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <!-- /.col-lg-4 -->
                <?php
                $query = "SELECT * FROM `homework` where `homework`.`grade` ='$grade' ORDER BY `homework`.`date` DESC
";
                $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
                if (mysqli_num_rows($run_query) > 0) {
                    while ($row = mysqli_fetch_array($run_query)) {
                        $id = $row['Id'];

                        $file = $row['file'];


                ?>


                        <div class="col-lg-4 pull-right">
                            <div class="panel panel-info">
                                <div class="panel-heading">

                                    <?php echo $row['title'] . ''; ?>
                                    <i class="fa fa-fw" aria-hidden="true" title="Copy to use chevron-left">&#xf053</i>

                                    <?php echo $row['date'] . ''; ?>

                                </div>
                                <div class="panel-body">
                                    <?php echo "<a href='files/$file' target='_blank'><img src='1234.png' width='80%'> </a>"; ?>

                                </div>
                                <div class="panel-footer">
                                    <a href="replay-homework.php?<?php echo "id=$id"; ?>">
                                        اضافة الحل
                                        <i class="fa fa-fw" aria-hidden="true" title="Copy to use mail-reply">&#xf112</i>
                                    </a>


                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
                <?php   }
                } ?>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/startmin.js"></script>

</body>

</html>