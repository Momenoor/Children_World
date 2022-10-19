<?php include 'nav.php';   ?>                 


            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">اضافة مدير اضافي</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="panel panel-default">
                                <div class="panel-heading ">
                                    مدير اضافي بنفس صلاحيات المدير الحالي

                                </div>
                                <?php
if (isset($_REQUEST['name'])){
	$name= $_REQUEST['name'];
    $user_name= $_REQUEST['user'];
	$pass= $_REQUEST['pass'];


    $query1 = "SELECT * FROM `admin` where username='$user_name' ";
    $run_query1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    if (mysqli_num_rows($run_query1) > 0) {
        echo "<div class=' text-danger  alert alert-danger '>
        اسم المستخدم موجود سابقاً، اختر اسم مستخدم آخر!
        <br/> </div>";
    }
    else {
    

        $query = "INSERT into `admin` ( `name`,`username`,`password`)
                                VALUES  ('$name','$user_name','".md5($pass)."')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo
            "<div class='form'>
<h6 class='text-success   alert alert-success '> 
تم اضافة المدير بنجاح ! 
</h6>
</div>";

        }
        else{
            var_dump(mysqli_error_list($conn));
          }
    }}
?>
                                <div class="panel-body ">
                                    
                                    
                                    <div class="row ">
                                        <div class="col-lg-6 pull-right" >
                    <form name="add-admin" action="add-admin.php" method="post">

                                                <div class="form-group">
                                                    <label>اسم المدير</label>
                                                    <input name="name" class="form-control" placeholder="اكتب هنا .." value="<?php if (isset($_REQUEST['name'])) { echo $name;}?>" required>
                                                </div>
                                    
                                                 <div class="form-group">
                                                    <label>اسم المستخدم</label>
                                                    <input name="user" class="form-control"
                                                     value="<?php if (isset($_REQUEST['name'])) { echo $user_name;}?>" required>
                                                    </div>
                                            
                                                <div class="form-group">
                                                    <label>كلمة المرور  </label>
                                                    <input name="pass" type="password" class="form-control" placeholder="اكتب هنا .." required>
                                                </div>
                                                

                                        
                                                <input type="submit" name="submit" value="إضافة" class="btn btn-default"/></br></br>

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
