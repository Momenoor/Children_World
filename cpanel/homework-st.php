<?php

session_start();
include 'includes/connection.php';
if (isset($_SESSION['student'])) {
	
}
else {
    echo "<script>alert('سجل دخولك أولاً');
    window.location.href='loginst.php';</script>";	
}

$student=$_SESSION['student'];
$query = "SELECT * FROM `student` where `student`.`Id` ='$student' ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $grade=$row['grade'];
   }}
$query = "SELECT * FROM `homework` where `homework`.`grade` ='$grade' ORDER BY `homework`.`date` DESC
";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $id=$row['Id'];
   echo $row['title'].'';
   echo $row['teacher'].'';
   echo $row['date'].'';
   echo $row['grade'].'';
   $file = $row['file'];
   echo "<a href='files/$file' target='_blank'>عرض الواجب</a>";

   echo "<td><a onClick=\"javascript: return confirm('هل تريد حذف هذاالواجب ؟')\" href='?del=$id'><i class='fa fa-times' style='color: red;'></i>حذف</a></td>";
   echo '<br><br>';

   }}?>

<?php
 
    if (isset($_GET['del'])) {
        $note_del = mysqli_real_escape_string($conn, $_GET['del']);
        $del_query = "DELETE FROM homework WHERE Id='$note_del' ";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert(' تم حذف الصف بنجاح');
            window.location.href='homework.php';</script>";
        }
        else {
         echo "<script>alert('هناك خطأ ما ، حاول مرة أخرى');</script>";   
        }
        }
   ?>    


