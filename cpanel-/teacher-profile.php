<?php
session_start();
 include 'includes/connection.php';
if (isset($_SESSION['teacher'])) {
	
}
else {
    echo "<script>alert('سجل دخولك أولاً');
    window.location.href='loginteacher.php';</script>";	
}

?>