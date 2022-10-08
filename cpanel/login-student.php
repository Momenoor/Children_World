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
			echo "<script>alert('من فضلك تأكد من اسم المستخدم أو كلمة المرور!'); window.location='login-student.php'</script>";
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
                        $_SESSION['student'] = $row1['name'];

						header("location:index.php");
					}}}

?>

<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>تسجيل الدخول</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body dir='rtl'>

        <div class="container" >
            <div class="row">
                <div class="col-sm-4 col-md-offset-2">
                    
                    <div class="login-panel panel panel-default text-center">
                    <img src="logo.jpg" width='220px'>

                        <div class="panel-heading">
                            <h3 class="panel-title">تسجيل الدخول كـمعلم</h3>
                        </div>
                        <div class="panel-body">
                            <form  action="" method="post" name="login">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="اسم المستخدم" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="كلمةالمرور" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        تذكرني  <input name="remember" type="checkbox" value="Remember Me">
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input name="login" type="submit" value="دخول"  class="btn btn-lg btn-success btn-block">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-offset-2">
                    
                    <div class="login-panel panel panel-default text-center">
                    <img src="logo.jpg" width='220px'>

                        <div class="panel-heading">
                            <h3 class="panel-title">تسجيل الدخول كـطالب</h3>
                        </div>
                        <div class="panel-body">
                            <form  action="" method="post" name="login">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="اسم المستخدم" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="كلمةالمرور" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        تذكرني  <input name="remember" type="checkbox" value="Remember Me">
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input name="login" type="submit" value="دخول"  class="btn btn-lg btn-success btn-block">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>


