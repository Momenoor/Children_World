<?php
include 'includes/connection.php';

if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
{
	$result = mysqli_query($conn,"SELECT * FROM student  WHERE username = '$username' and pass='".md5($password)."'");
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);				
		if ($count == 0) 
			{
			echo "<script>alert('من فضلك تأكد من اسم المستخدم أو كلمة المرور!'); window.location='loginst.php'</script>";
			} 
		else if ($count > 0)
			{
				session_start();
				$_SESSION['student'] = $row['Id'];
				header("location:student-profile.php");
			}
			$result1 = mysqli_query($conn,"SELECT * FROM student  WHERE username = '$username' and pass='".md5($password)."'");
	
			$row1 = mysqli_fetch_array($result1);
			$count1 = mysqli_num_rows($result1);				
				if ($count1 == 0) 
					{
					echo "<script>alert('من فضلك تأكد من اسم المستخدم أو كلمة المرور!'); </script>";
					} 
				else if ($count1 > 0)
					{
						session_start();
						$_SESSION['student-id'] = $row1['Id'];
						header("location:student-profile.php");
					}}}

?>
<div class="form text-center border mt-5 ">
<div class="text-center alert alert-info">
<h1 class="mt-5 mb-5 ">
<h1>دخول</h1></div>
<form  action="" method="post" name="login">
<input type="text" name="username" placeholder="البريد الالكتروني " required  /></br></br>
<input type="password" name="password" placeholder="كلمة المرور" required /><br></br>
<input name="login" type="submit" value="دخول" /></br></br>
</form>
</div>

</body>
</html>