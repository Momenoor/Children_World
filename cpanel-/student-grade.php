





<?php include 'nav.php';   ?>                 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>الطلاب</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">

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


            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">الطلاب</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                 مجموع الطلاب في هذا الصف هو : 
                               <?php 
                               $grade =$_REQUEST['grade'];

                              $sql="select count(*) as total from student where '$grade' = grade";
                              $result=mysqli_query($conn,$sql);
                              $data=mysqli_fetch_assoc($result);
                              echo $data['total'];
                                ?> طالب
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>اسم الطالب</th>
                                                    <th>الصف</th>
                                                    <th>تاريخ الميلاد</th>
                                                    <th> رقم الهاتف</th>
                                                    <th> التقييم</th>

                                                    <th> حذف</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php include 'includes/connection.php';
$grade =$_REQUEST['grade'];

$query = "SELECT * FROM student where '$grade' = grade";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $id=$row['Id'];

   
?>
                                                <tr class="odd gradeX">
                                                    
                                                    <td>  <?php echo $row['name'];?></td>
                                                    <td>  <?php echo $row['grade'];?></td>
                                                    <td>  <?php echo $row['date_of_birth'];?></td>
                                                    <td>  <?php echo $row['phone'];?></td>
                                                    <td>  عرض</td>

                                                    <td><?php echo "<a onClick=\"javascript: return confirm('هل تريد حذف الطالب من السجل ؟')\" href='?del=$id'><i class='fa fa-times' style='color: red;'></i>حذف</a></td>";?>

                                                </tr>
                                               
   <?php
   }}?>
                                            </tbody>
                                        </table>
                                    </div>
                                    

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="js/dataTables/jquery.dataTables.min.js"></script>
        <script src="js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>
<?php
 
    if (isset($_GET['del'])) {
        $note_del = mysqli_real_escape_string($conn, $_GET['del']);
        $del_query = "DELETE FROM student WHERE Id='$note_del' ";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<div class='form'>
            <h6 class='text-success text-center  alert alert-danger'> 
            تم حذف الطالب بنجاح! 
            </h6>
            </div>";

        }
        else {
         echo 
         "<div class='form'>
<h6 class='text-success text-center  alert alert-danger'> 
حدث خطأ ما ! 
</h6>
</div>";
         ;   
        }
        }
   ?>    