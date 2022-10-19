<?php
session_start();
 include 'includes/connection.php';
if (isset($_SESSION['teacher-id'])) {
	
}
else {
    echo "<script>alert('سجل دخولك أولاً');
    window.location.href='loginteacher.php';</script>";	
}
  $teacher_id=$_SESSION['teacher-id'];


$result = mysqli_query($conn,"SELECT * FROM teacher WHERE ID  = '$teacher_id' ");
$test = mysqli_fetch_array($result);
$name=$test['name'];
$phone=$test['phone'];
$username=$test['username'];
$pass=$test['pass'];
$grade=$test['grade'];
$specialization=$test['specialization'];
?>
<form method="post" action="update-teacherInfo.php">	
<br><br>
<input type="text" name="name" value="<?php echo $name; ?>"  class="form-1"  required /><br><br>
<input type="text" name="phone"  value="<?php echo $phone; ?>"required  /><br><br>
<input type="text" name="username" value="<?php echo $username; ?>"  class="form-1"  required /><br><br>
<input type="password" name="pass"  value="<?php $pass ?>" required  /><br><br>
<input type="text" name="specialization"  value="<?php echo $specialization; ?>"required  /><br><br>
<select name='grade'><?php
$query = "SELECT * FROM grade ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
  $grade =$row['grade'];
  ?>
<option value='<?php echo $row['grade'];?>'><?php echo $row['grade'];}}?>   </option>

</select><br><br>
<button type="submit"   name="save">تعديل</button>
</form>
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
