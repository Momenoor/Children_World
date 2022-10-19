<?php include 'nav.php';
$student=$_SESSION['student-id'];
$id_homewoke=$_REQUEST['id'];

?>

<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                        <?php
$query = "SELECT * FROM `homework` where Id ='$id_homewoke' ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
  
   $title = $row['title'];
   $teacher = $row['teacher'];



?>

                            <h1 class="page-header"> اضافة حل <?php echo $title; ?> </h1><?php }}?>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="panel panel-default">
                                <div class="panel-heading ">
                                   اضافة حل
                                </div>
                                <div class="panel-body ">
                            
       
                                    <div class="row ">
                                        <div class="col-lg-6 pull-right" >                 
                                        <form action="" method="POST" enctype="multipart/form-data">
                                       <input type="hidden" name="id" readonly="readonly" value ='<?php echo $id_homewoke;?>' readonly="readonly" />
                                       <input type="hidden" name="student" readonly="readonly" value ='<?php echo $student;?>' readonly="readonly" />
                                       <input type="hidden" name="teacher" readonly="readonly" value ='<?php echo $teacher;?>' readonly="readonly" />
                                       <input type="hidden" name="title" readonly="readonly" value ='<?php echo $title;?>' readonly="readonly" />

                                       <div class="form-group">
                                                    <label> <img src='3.png' width='15%'>                                                     <input type="file" name="file" />
</label>  
                                                    
                                                    
                                                </div>
                                      
                                                <input type="submit" name="submit" value="إضافة" class="btn btn-default"/></br></br>

                                            </form>
                                            
<body dir='rtl'>
<?php
    if(isset($_FILES['file'])){
        $errors= array();
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $file_tmp =$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];
        
        $extensions= array("jpeg","jpg","png","pdf","word");
        if (isset($_REQUEST['id'])){
            $id= $_REQUEST['id'];
            $student= $_REQUEST['student'];
            $title= $_REQUEST['title'];

        $date= date("Y-m-d");
        $teacher=$_REQUEST['teacher'];
      
    $query = "INSERT INTO `reply-homework`(`student_id`, `homework_id`,`img`,`date`,`title`,`teacher`)
                                 VALUES ('$student','$id','$newfilename','$date','$title','$teacher')";
    $result = mysqli_query($conn,$query);
    if($result){
        echo
        "<div class='form'>
<h6 class='text-success text-center  alert alert-success '> 
تم اضافة الحل بنجاح! 
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
move_uploaded_file($_FILES["file"]["tmp_name"], "replay-hw/" . $newfilename);
}else{
print_r($errors);
}
}
?>
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

