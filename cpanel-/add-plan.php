<?php include 'nav.php';   ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">اضافة الخطة الاسبوعية </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <?php echo date('d/m/Y'); ?>
                        <div class="pull-left ">

                            <?php echo date('D'); ?>
                        </div>
                    </div>
                    <div class="panel-body ">
                        <div class="row ">
                            <?php
                            if (isset($_REQUEST['grade'])) {
                                $grade = $_REQUEST['grade'];
                                $day = $_REQUEST['day'];
                                $date = $_REQUEST['date'];
                                $Arabic = $_REQUEST['Arabic'];
                                $Maths = $_REQUEST['Maths'];
                                $Islami = $_REQUEST['Islami'];
                                $Quran = $_REQUEST['Quran'];
                                $Sciences = $_REQUEST['Sciences'];
                                $Einglish = $_REQUEST['Einglish'];

                                $query = "INSERT into `weekly-plan` ( `grade`,`day`, `date`,`subject1`,`subject2`,`subject3`,`subject4`,`subject5`,`subject6`)
                                VALUES  ('$grade','$day','$date','$Arabic','$Maths','$Islami','$Quran','$Sciences','$Einglish')";
                                $result = mysqli_query($conn, $query);
                                if ($result) {
                                    echo
                                    "<div class='form'>
<h6 class='text-success text-center  alert alert-success '> تم اضافة خطة يوم";
                                    echo $day;
                                    echo "بنجاح  ! 
</h6>
</div>";
                                } else {
                                    var_dump(mysqli_error_list($conn));
                                }
                            }
                            ?>

                            <div class="col-lg-6 pull-right">
                                <form name="add-plan" action="add-plan.php" method="post">
                                    <div class="form-group">
                                        <label> الصف</label>
                                        <select class="form-control" name='grade'>
                                            <?php
                                            $query = "SELECT * FROM grade ";
                                            $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                            if (mysqli_num_rows($run_query) > 0) {
                                                while ($row = mysqli_fetch_array($run_query)) {
                                                    $grade = $row['grade'];
                                            ?>
                                                    <option><?php echo $row['grade'];
                                                        }
                                                    } ?></option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> اليوم</label>
                                        <select class="form-control" name='day'>
                                            <option value="الاحد">الاحد</option>
                                            <option value="الاثنين">الاثنين</option>
                                            <option value="الثلاثاء">الثلاثاء</option>
                                            <option value="الاربعاء">الاربعاء</option>
                                            <option value="الخميس">الخميس</option>
                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <input type="date" value="2022-06-01" name="date" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>مفاهيم لغوية</label>
                                        <textarea class="form-control" rows="3" name="Arabic" value="<?php if (isset($_REQUEST['grade'])) {
                                                                                                            echo $Arabic;
                                                                                                        } ?>" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>مفاهيم حسابية</label>
                                        <textarea class="form-control" rows="3" name="Maths" value="<?php if (isset($_REQUEST['grade'])) {
                                                                                                        echo $Maths;
                                                                                                    } ?>" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>التربية الاسلامية </label>
                                        <textarea class="form-control" rows="3" name="Islami" value="<?php if (isset($_REQUEST['grade'])) {
                                                                                                            echo $Islami;
                                                                                                        } ?>" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>القرآن الكريم</label>
                                        <textarea class="form-control" rows="3" name="Quran" value="<?php if (isset($_REQUEST['grade'])) {
                                                                                                        echo $Quran;
                                                                                                    } ?>" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label> العلوم</label>
                                        <textarea class="form-control" rows="3" name="Sciences" value="<?php if (isset($_REQUEST['grade'])) {
                                                                                                            echo $Sciences;
                                                                                                        } ?>" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label> اللغة الانجليزية</label>
                                        <textarea class="form-control" rows="3" name="Einglish" value="<?php if (isset($_REQUEST['Einglish'])) {
                                                                                                            echo $Sciences;
                                                                                                        } ?>" required></textarea>
                                    </div>
                                    <input type="submit" name="submit" value="إضافة" class="btn btn-default" /></br></br>

                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->

                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
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

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>

</html>