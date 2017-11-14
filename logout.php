<?php
include_once("functions/functions.php");
session_start();

if (isset($_SESSION['customer_email'])) {
		global $con;
		$user = $_SESSION['customer_email'];
		$get_cust = "SELECT * FROM customers WHERE customer_email='$user'";
		$run_cust = mysqli_query($con,$get_cust);
		$cust_rows = mysqli_fetch_array($run_cust);
		$user_ip = $cust_rows['customer_ip'];

		$delete_cart = "DELETE FROM cart WHERE ip_addr='$user_ip'";
		$run_delete_cart = mysqli_query($con, $delete_cart);
		session_unset($_SESSION['customer_email']);
		echo "<script>window.open('index.php','_self')</script>";
		
	}


?>