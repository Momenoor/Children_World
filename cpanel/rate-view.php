<?php
session_start();
 include 'includes/connection.php';
if (isset($_SESSION['teacher'])) {
	
}
else {
    echo "<script>alert('سجل دخولك أولاً');
    window.location.href='loginteacher.php';</script>";	
}
  $teacher=$_SESSION['teacher'];

$query = "SELECT * FROM teacher where teacher.name='$teacher' ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
  $teacherName =$row['name'];
  $teacherGrade =$row['grade'];
}}
$query = "SELECT * FROM rate where rate.teacher='$teacherName' ";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $id=$row['Id'];
   echo $row['student'];
   echo $row['grade'];
   echo $row['month'];
   echo $row['rate'];

   echo "<td><a onClick=\"javascript: return confirm('هل تريد حذف هذا التقييم ؟')\" href='?del=$id'><i class='fa fa-times' style='color: red;'></i>حذف</a></td>";
echo '
<br><br><br><br>';
   }}?>

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

