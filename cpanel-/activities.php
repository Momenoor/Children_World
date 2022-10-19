<?php include 'nav.php';   ?>                 


            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">اضافة فعالية جديدة</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="panel panel-default">
                                <div class="panel-heading ">
                                    معلومات الصف
                                </div>
                                <div class="panel-body ">
                                <?php
if (isset($_REQUEST['name'])){
	$name= $_REQUEST['name'];
    $goal= $_REQUEST['goal'];
	$details= $_REQUEST['details'];

    $query1 = "SELECT * FROM `activities` where `name`='$name' ";
    $run_query1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    if (mysqli_num_rows($run_query1) > 0) {
        echo "<div class=' text-danger  alert alert-danger '>
    هذه الفعالية مضافة سابقاً !
        <br/> </div>";
    }
    else {

        $query = "INSERT into `activities` ( `name`,`goal`,`details`) VALUES  ( '$name','$goal','$details')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo
            "<div class='form'>
<h6 class='text-success text-center  alert alert-success '> 
تم اضافة الفعالية بنجاح! 
</h6>
</div>";

        }
        else{
            var_dump(mysqli_error_list($conn));
          }
      }  }
?>
                                    <div class="row ">
                                        <div class="col-lg-6 pull-right" >             
                                             <form name="activities" action="activities.php" method="post">

                                                <div class="form-group">
                                                    <label> عنوان الفعالية</label>
                                                    <input name="name" class="form-control" value="<?php if (isset($_REQUEST['name'])) { echo $name;}?>" required placeholder="اكتب هنا ..">
                                                </div>
                                              
                                                <div class="form-group">
                                                    <label>أهداف الفعالية</label>
                                                    <textarea  name="goal" class="form-control" rows="4" cols="50">
    </textarea>                                                </div> <div class="form-group">
                                                    <label> تفاصيل</label>
                                                    <textarea  name="details" class="form-control" rows="4" cols="50">
    </textarea>
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
