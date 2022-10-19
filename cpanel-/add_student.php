<?php include 'includes/connection.php';
?>
<body dir='rtl'>
<?php
if (isset($_REQUEST['name'])){
	$name= $_REQUEST['name'];
    $date= $_REQUEST['date'];
	$grade= $_REQUEST['grade'];
    $user_name= $_REQUEST['user'];
	$pass= $_REQUEST['pass'];
    $phone= $_REQUEST['phone'];



    

        $query = "INSERT into `student` ( `name`,`date_of_birth`,`grade`,`username`,`pass`,`phone`)
                                VALUES  ('$name', '$date', '$grade','$user_name','".md5($pass)."','$phone')";
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
<div class="form text-center border mt-5 ">
<div class="text-center   alert alert-info">
<h1 class="mt-5 mb-5 ">
<h1>اضافة طالب جديد</h1></div>
<form name="add-student" action="add_student.php" method="post">
<input type="text" name="name" placeholder="الاسم" required /></br></br>
<input type="text" name="user" placeholder="اسم المستخدم" required /></br></br>
<input type="passworld" name="pass" placeholder="كلمة المرور" required /></br></br>
<input type="number" name="phone" placeholder="رقم الهاتف" required /></br></br>
<input type="date" name="date" placeholder="تاريخ الميلاد" required /></br></br>

<select name='grade'><?php
$query = "SELECT * FROM grade ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
  $grade =$row['grade'];
  ?>
    <option value='<?php echo $row['grade'];?>'><?php echo $row['grade'];}}?>   </option>

</select><br><br>
<input type="submit" name="submit" value="إضافة" /></br></br>
</form>
</div>
</body>
</html>