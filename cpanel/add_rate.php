<?php
session_start();
 include 'includes/connection.php';
if (isset($_SESSION['teacher'])) {
	
}
else {
    echo "<script>alert('سجل دخولك أولاً');
    window.location.href='loginteacher.php';</script>";	
}
  $teacher=$_SESSION['teacher'];

$query = "SELECT * FROM teacher where teacher.name='$teacher' ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
  $teacherName =$row['name'];
  $teacherGrade =$row['grade'];
}}
if (isset($_REQUEST['student'])){
    $student= $_REQUEST['student'];
	$grade= $_REQUEST['grade'];
    $rate= $_REQUEST['rate'];
    $month= $_REQUEST['month'];

	

        $query = "INSERT into `rate` ( `student`,`teacher`,`grade`,`rate`,`month`)
                                VALUES  ('$student', '$teacher', '$grade','$rate','$month')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo
            "<div class='form'>
<h6 class='text-success text-center  alert alert-danger'> 
تم اضافةالطالب بنجاح ! 
</h6>
</div>";

        }
        else{
            var_dump(mysqli_error_list($conn));
          }
    }
  
?>

<h1>التقييم الشهري للطالبا</h1>
<form name="add_rate" action="add_rate.php" method="post">
<select name='student'><?php
$query = "SELECT name FROM student where student.grade='$teacherGrade'";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
  $student =$row['name'];
  ?>
<option value='<?php echo $row['name'];?>'><?php echo $row['name'];}}?>   </option>

</select><br><br>
<select name='month'>
<option value='1'>شهر 1</option>
    <option value='2'>شهر 2</option>
    <option value='3'>شهر 3</option>
    <option value='4'>شهر 4</option>
    <option value='5'>شهر 5</option>
    <option value='6'>شهر 6</option>
    <option value='7'>شهر 7</option>
    <option value='8'>شهر 8</option>
    <option value='9'>شهر 9</option>
    <option value='10'>شهر 10</option>
    <option value='11'>شهر 11</option>
    <option value='12'>شهر 12</option>
</select>
<input type="grade" name="grade" readonly="readonly" value ='<?php echo $teacherGrade;?>' /></br></br>
<textarea  name="rate" rows="4" cols="50">
</textarea>
<br><br>
<input type="submit" name="submit" value="إضافة" /></br></br>
</form>
</div>
</body>
</html>