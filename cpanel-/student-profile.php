
<?php
session_start();
include 'includes/connection.php';
if (isset($_SESSION['student'])) {
	
}
else {
    echo "<script>alert('سجل دخولك أولاً');
    window.location.href='loginst.php';</script>";	
}


