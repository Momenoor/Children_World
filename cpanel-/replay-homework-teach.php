

<?php include 'nav.php';
$teacher=$_SESSION['teacher-id'];

$query = "SELECT * FROM `teacher` where `teacher`.`Id` ='$teacher' ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
$name=$row['name'];
}}

                 

?>
    <body dir='rtl'>

    
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">ردود واجب</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                       
                        <!-- /.col-lg-4 -->
<?php
$query = "SELECT * FROM `reply-homework` where teacher ='$name' ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
   $id=$row['Id'];
   $file = $row['img'];
   $title=$row['title'];
   $student_id=$row['student_id'];
   $date=$row['date'];

?>


                        <div class="col-lg-4 pull-right">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                               <?php $query = "SELECT * FROM `student` where `Id` ='$student_id' ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
$name=$row['name'];

?>
                 
                                    
                                <?php echo $row['name'].'';}}?>
                                <i class="fa fa-fw" aria-hidden="true" title="Copy to use chevron-left">&#xf053</i>

                                <?php echo $date.'';?>

                                </div>
                                <div class="panel-body ">
                              <?php  echo "<a target='_blank' href='replay-hw/$file'><img src='replay-hw/$file' width='80%'> </a>";?>

                                </div>
                                <div class="panel-footer">                           
                                <a href="replay-homework.php?<?php echo "id=$id";?>">
                                   ##                                     
                              <i class="fa fa-fw" aria-hidden="true"  title="Copy to use mail-reply">&#xf112</i>
                             </a>

                                                
                           </div>
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
                 <?php   }}?>
                    </div>
                    <!-- /.row -->
                   
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

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


