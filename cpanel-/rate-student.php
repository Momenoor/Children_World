<?php
 include 'nav.php';
$student=$_SESSION['student'];?>
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Panels and Wells</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <?php
$query = "SELECT * FROM rate where student='$student' ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {  
    $id=$row['Id'];
?>
    <div class="col-lg-4 pull-right">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                  <?php echo $row['student']; ?>
                                  <span class="pull-left">
                <i class="fa fa-fw" style="color:#ffd700" aria-hidden="true" title="Copy to use star">&#xf005</i>
                <i class="fa fa-fw" style="color:#ffd700" aria-hidden="true" title="Copy to use star">&#xf005</i>
                <i class="fa fa-fw" style="color:#ffd700" aria-hidden="true" title="Copy to use star">&#xf005</i>
                <i class="fa fa-fw" style="color:#ffd700" aria-hidden="true" title="Copy to use star">&#xf005</i>
                <i class="fa fa-fw" style="color:#ffd700" aria-hidden="true" title="Copy to use star">&#xf005</i>
</span>
                                 

                                </div>
                                <div class="panel-body">
                                    <p>
                                    <?php echo $row['rate'];?>
                                    </p>
                                </div>
                                <div class="panel-footer">تقييم 
                                <?php echo $row['month'];?>
                                </div>
                            </div>
                        </div>
  
   <?php }}?>

<?php
 
    if (isset($_GET['del'])) {
        $note_del = mysqli_real_escape_string($conn, $_GET['del']);
        $del_query = "DELETE FROM rate WHERE Id='$note_del' ";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('تم حذف  الطالب من سجل الطلاب');
            window.location.href='rate-view.php';</script>";
        }
        else {
         echo "<script>alert('هناك خطأ ما ، حاول مرة أخرى');</script>";   
        }
        }
   ?>    

