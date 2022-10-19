<?php include 'nav.php';
$teacher=$_SESSION['teacher-id'];
$query = "SELECT * FROM teacher where Id='$teacher'";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $grade=$row['grade'];
}}
?>    


<body dir="rtl" >
<!-- For demo purpose -->





        <!-- Team item -->
        <?php include 'includes/connection.php';
?>
 <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="page-header">
                            مجموع الطلاب في صف <?php echo $grade;?> هو : 
                               <?php 

                              $sql="select count(*) as total from student where '$grade' = grade";
                              $result=mysqli_query($conn,$sql);
                              $data=mysqli_fetch_assoc($result);
                              echo $data['total'];
                                ?> طالب

                            </h4>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <?php
$query = "SELECT * FROM student where  '$grade' = grade";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $id=$row['Id'];

   
?>
                <div class="col-sm-3 pull-right">
                            <div class="hero-widget well well-sm">
                                <div class="icon">
                                    <img src='1.png' width="70%">                                </div>
                                <div class="text">
                                    <span class="value"><?php echo $row['name'];?></span>
                                    <label class="text-muted">  <?php echo $row['date_of_birth'];?></label>
                                </div>
                                <div class="options">
                                    <a href="javascript:;" class="btn btn-default btn-lg">
                                    <i class="fa fa-fw" aria-hidden="true" title="Copy to use plus" style="color:green">&#xf067</i>
                                        
                                         تقييم شهر <?php echo date('m');?></a>
                                </div>
                                <div class="options">
                                <a href="javascript:;" class="btn btn-default btn-lg">

                                <i class='fa fa-fw' aria-hidden='true' title='Copy to use edit' style='color:#FFCA03'>&#xf044</i>
                                         تعديل البيانات</a>
                                </div><div class="options">
                                    <?php echo "<a class='btn btn-default btn-lg' onClick=\"javascript: return confirm('هل تريد حذف الطالب من السجل ؟')\" href='?del=$id'>
                                    <i class='fa fa-fw' aria-hidden='true' title='Copy to use remove' style='color:red'>&#xf00d</i>
                                     حذف
                                    </a>";?>
                                      
                                        
                                </div>
                            </div>
                        </div>
                 <?php }}?>   </div>

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


