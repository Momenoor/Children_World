<?php if ((isset($_SESSION['student'])) ||(isset($_SESSION['student-id']))) {}
else {
    echo "<script>alert('سجل دخولك أولاً');
    window.location.href='login-student.php';</script>";	
}?>
<?php include 'nav.php';   ?>

<?php $student_id=$_SESSION['student-id'];
$result = mysqli_query($conn,"SELECT * FROM student WHERE ID  = '$student_id' ");
$test = mysqli_fetch_array($result);
$name=$test['name'];
$phone=$test['phone'];
$username=$test['username'];
$pass=$test['pass'];
$grade=$test['grade'];
$specialization=$test['specialization'];
?>

<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">  تعديل البيانات الشخصية</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="panel panel-default">
                                <div class="panel-heading ">
                                    معلومات 
                                </div>
                                <div class="panel-body ">
                                    <div class="row ">
                                        <div class="col-lg-6 pull-right" >                  
                                              <form method="post" action="profile-teacher.php">	
                                                
                                                <div class="form-group"><input class="form-control" type="text" name="name" value="<?php echo $name; ?>"  required />  </div><br><br>
                                                <div class="form-group"><input class="form-control"type="text" name="phone"  value="<?php echo $phone; ?>"required  />  </div><br><br>
                                                <div class="form-group"><input class="form-control"  type="text" name="username" value="<?php echo $username; ?>"  required />  </div><br><br>
                                                <div class="form-group"><input  class="form-control"type="password" name="pass"  value="<?php  $pass ?>" required  />  </div><br><br>
                                                <div class="form-group"><input  class="form-control"type="text" name="specialization"  value="<?php echo $specialization; ?>"required  />  </div><br><br>
                                                <div class="form-group"><select name='grade' class="form-control"><?php
                                    $query = "SELECT * FROM grade ";
                                    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                    if (mysqli_num_rows($run_query) > 0) {
                                    while ($row = mysqli_fetch_array($run_query)) {
                                     $grade =$row['grade'];
  ?>
                                      <option value='<?php echo $row['grade'];?>'><?php echo $row['grade'];}}?>   </option>


                                        </select><br><br>  </div>
                                        <button type="submit"   name="save">تعديل</button>
                                                   
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


<?php
if(isset($_POST['save']))
{	
$name1=$_POST['name'];
$phone1=$_POST['phone'];
$username1=$_POST['username'];
$pass1=$_POST['pass'];
$grade1=$_POST['grade'];
$specialization1=$_POST['specialization'];
	if(mysqli_query($conn,"UPDATE teacher SET name ='$name1', phone ='$phone1',username ='$username1',pass ='".md5($pass1)."',grade ='$grade1',specialization ='$specialization1' WHERE  ID  = '$teacher_id'")){

	echo "تم التعديل ";
}else{
	var_dump(mysqli_error($conn));
}
	
	//header("Location: project.php");			
}

?>
