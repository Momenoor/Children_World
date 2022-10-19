<?php
session_start();
 include 'includes/connection.php';
if (isset($_SESSION['teacher'])) {
	
}
else {
    echo "<script>alert('سجل دخولك أولاً');
    window.location.href='loginteacher.php';</script>";	
}


   if(isset($_FILES['file'])){
      $errors= array();
      $temp = explode(".", $_FILES["file"]["name"]);
      $newfilename = round(microtime(true)) . '.' . end($temp);
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      
      $extensions= array("jpeg","jpg","png","pdf","word");
      if (isset($_REQUEST['title'])){
        $title= $_REQUEST['title'];
        $teacher= $_REQUEST['teacher'];
        $grade= $_REQUEST['grade'];
        $date= date("yyyy-mm-dd");
    
            $query = "INSERT into `homework` ( `title`,`file`,`teacher`,`grade`)
                                    VALUES  ('$title', '$newfilename','$teacher','$grade')";
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
      if(empty($errors)==true){
         $temp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $newfilename);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
        
         <input type="text" name="title" placeholder="العنوان" >
         <input type="hidden" name="teacher" value="<?php echo $_SESSION['teacher'];?>" >
         <select name='grade'><?php
$query = "SELECT * FROM grade ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
  $grade =$row['grade'];
  ?>
    <option value='<?php echo $row['grade'];?>'><?php echo $row['grade'];}}?>   </option>

</select><br><br>
 <input type="file" name="file" />
         <input type="submit"/>
      </form>
      
   </body>
</html>