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
                                    <?php echo date('d/m/Y');?>
                                    <div class="pull-left ">

                                    <?php echo date('D');?>
</div>
                                </div>
                                <div class="panel-body ">
                                    <div class="row ">
                                        <div class="col-lg-6 pull-right" >
                    <form name="add-teacher" action="add-teacher.php" method="post">
                    <div class="form-group">
                                                    <label> الصف</label>
                                                    <select class="form-control" name='grade'>
                                                    <?php
$query = "SELECT * FROM grade ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
  $grade =$row['grade'];
  ?>
                 <option><?php echo $row['grade'];}}?></option>
                                                        
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>مفاهيم لغوية</label>
                                                    <textarea class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>مفاهيم حسابية</label>
                                                    <textarea class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>التربية الاسلامية </label>
                                                    <textarea class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>القرآن الكريم</label>
                                                    <textarea class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label> العلوم</label>
                                                    <textarea class="form-control" rows="3"></textarea>
                                                </div> 
                                                <div class="form-group">
                                                    <label> اللغة الانجليزية</label>
                                                    <textarea class="form-control" rows="3"></textarea>
                                                </div>                                                
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

<body dir='rtl'>
<?php
if (isset($_REQUEST['name'])){
	$name= $_REQUEST['name'];
    $specialization= $_REQUEST['specialization'];
	$grade= $_REQUEST['grade'];
    $user_name= $_REQUEST['user'];
	$pass= $_REQUEST['pass'];
    $phone= $_REQUEST['phone'];

        $query = "INSERT into `teacher` ( `name`,`specialization`,`grade`,`username`,`pass`,`phone`)
                                VALUES  ('$name', '$specialization', '$grade','$user_name','".md5($pass)."','$phone')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo
            "<div class='form'>
<h6 class='text-success text-center  alert alert-success '> تم اضافة معلم جديد بنجاح! 
</h6>
</div>";

        }
        else{
            var_dump(mysqli_error_list($conn));
          }
    }
?>