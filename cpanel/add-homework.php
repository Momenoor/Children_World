<?php
session_start();
 include 'includes/connection.php';
if (isset($_SESSION['teacher'])) {
	
}
else {
    echo "<script>alert('سجل دخولك أولاً');
    window.location.href='login-teacher.php';</script>";	
}

?>
<?php include 'nav.php';   ?>                 

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">اضافة واجب </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                 
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="panel panel-default">
                                <div class="panel-heading ">
                                    Basic Form Elements
                                </div>
                                <div class="panel-body ">
                                    <div class="row ">
                                        <div class="col-lg-6 pull-right" >
                                        <form action="" method="POST" enctype="multipart/form-data">


                                                <div class="form-group">
                                                    <label>العنوان </label>
                                                    <input name="title" class="form-control" placeholder="اكتب هنا ..">
                                                </div>
                                                <input type="hidden" name="teacher" value="<?php echo $_SESSION['teacher'];?>" >

                                                <div class="form-group">
                                                    <label> ارفق ملف!</label>
                                                    <input type="file" name="file" />

                                                </div>
                                            
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
                                                <input type="submit" name="submit" value="إضافة" class="btn btn-default"/></br></br>

                                            </form>
                                        </div>
                                        </div>
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
<?php

   if(isset($_FILES['file'])){
      $errors= array();
      $temp = explode(".", $_FILES["file"]["name"]);
      $newfilename = round(microtime(true)) . '.' . end($temp);
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      
      $extensions= array("jpeg","jpg","png","pdf","word");
      if (isset($_REQUEST['title'])){
        $title= $_REQUEST['title'];
        $teacher= $_REQUEST['teacher'];
        $grade= $_REQUEST['grade'];
        $date= date("yyyy-mm-dd");
    
            $query = "INSERT into `homework` ( `title`,`file`,`teacher`,`grade`)
                                    VALUES  ('$title', '$newfilename','$teacher','$grade')";
            $result = mysqli_query($conn,$query);
            if($result){
                echo
                "<div class='form'>
    <h6 class='text-success text-center  alert alert-success'> 
    تم الواجب بنجاح ! 
    </h6>
    </div>";
    
            }
            else{
                var_dump(mysqli_error_list($conn));
              }
        }
      if(empty($errors)==true){
         $temp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $newfilename);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>