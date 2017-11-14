<?php


session_start();
session_unset($_SESSION['admin_email']);
echo "<script>window.open('login.php?logged_out=logged out','_self')</script>";
	



?>