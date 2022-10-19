<?php include 'nav.php';   ?>                 
<?php
  $teacher=$_SESSION['teacher'];
  $id =$_REQUEST['id'];
  $query = "SELECT * FROM student where '$id' = Id";
  $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if (mysqli_num_rows($run_query) > 0) {
  while ($row = mysqli_fetch_array($run_query)) {
      $name=$row['name'];
      $grade =$row['grade'];
?>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header">التقييم الشهري 
                <i class="fa fa-fw" style="color:#ffd700" aria-hidden="true" title="Copy to use star">&#xf005</i>
                <i class="fa fa-fw" style="color:#ffd700" aria-hidden="true" title="Copy to use star">&#xf005</i>
                <i class="fa fa-fw" style="color:#ffd700" aria-hidden="true" title="Copy to use star">&#xf005</i>
                <i class="fa fa-fw" style="color:#ffd700" aria-hidden="true" title="Copy to use star">&#xf005</i>
                <i class="fa fa-fw" style="color:#ffd700" aria-hidden="true" title="Copy to use star">&#xf005</i>

 </h4>


               
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                    تقييم شهر <?php echo date('m/Y');?> للطالب 
                    <span class="text-danger"><?php echo $name; ?></apan>
                    <?php
if (isset($_REQUEST['name'])){
  $id= $_REQUEST['id'];
  $names= $_REQUEST['name'];
	$grade= $_REQUEST['grade'];
    $rate= $_REQUEST['rate'];
    $month= $_REQUEST['month'];

        $query = "INSERT into `rate` ( `student`,`teacher`,`grade`,`rate`,`month`)
                                VALUES  ('$names', '$teacher', '$grade','$rate','$month')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo
            "<div class='form'>
<h6 class='text-success text-center  alert alert-danger'> 
تم التقييم بنجاح ! 
</h6>
</div>";

        }
        else{
            var_dump(mysqli_error_list($conn));
          }
    }
  
?>
                    </div>
                    <div class="panel-body ">
 

</h1>
<div class="row ">
                                        <div class="col-lg-6 pull-right" >                 
<form name="add_rate" action="add_rate.php" method="post">
<input type="hidden" name="name" readonly="readonly" value ='<?php echo $name;?>' readonly="readonly" />
<input type="hidden" name="month" readonly="readonly" value ='شهر <?php echo date('m/Y');?>' readonly="readonly" />
<input type="hidden" name="id" readonly="readonly" value ='<?php echo $id;?>' readonly="readonly" />
<div class="form-group">
<input type="text" class="form-control" name="grade" readonly="readonly" value ='<?php echo $grade;?>' />
  </div>
<div class="form-group">
<textarea  name="rate" class="form-control" rows="4" cols="50">
</textarea></div>
<br><br>
<input type="submit" name="submit" value="إضافة" class="btn btn-default" /></br></br>
</form>
</div>
</body>
</html> 
<?php }}?>


