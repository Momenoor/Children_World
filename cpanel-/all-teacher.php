<?php include 'includes/connection.php';

$query = 'SELECT * FROM teacher ';
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $id=$row['Id'];
   echo $row['name'];
   echo $row['phone'];
   echo $row['grade'];
   echo $row['specialization'];
   echo "<td><a onClick=\"javascript: return confirm('هل تريد حذف الطالب من السجل ؟')\" href='?del=$id'><i class='fa fa-times' style='color: red;'></i>حذف</a></td>";

   }}?>



