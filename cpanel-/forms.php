<?php include 'nav.php';   ?>                 


            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">اضافة صف جديد</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                    
                                                <div class="form-group">
                                                    <label>اسم الصف</label>
                                                    <input class="form-control" placeholder="اكتب هنا ..">
                                                </div>
                                                
                                               
                                               
                                               
                                                
                                                <div class="form-group">
                                                    <label>معلمة الصف</label>
                                                    <select class="form-control" name='teacher'>
                                                    <?php
$query = "SELECT * FROM teacher ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
  $teacher =$row['name'];
  ?>
                 <option><?php echo $row['name'];}}?></option>
                                                        
                                                    </select>
                                                </div>
                                                
                                                <input  type="submit" name="submit" value="إضافة" class="btn btn-default"/>
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
<?php include 'includes/connection.php' ?>

<body dir='rtl'>
<?php
if (isset($_REQUEST['name'])){
	$name= $_REQUEST['name'];
   

    


        $query = "INSERT into `grade` ( `grade`) VALUES  ( '$name')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo
            "<div class='form'>
<h6 class='text-success text-center  alert alert-danger'> 
تم اضافة الصف بنجاح! 
</h6>
</div>";

        }
        else{
            var_dump(mysqli_error_list($conn));
          }
    }
?>