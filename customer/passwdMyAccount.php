<?php

include_once("../functions/functions.php");
?>
<?php getIp(); ?>
<?php cart(); ?>
<?php
	
	$user = $_SESSION['customer_email'];
	$get_user_logged = "SELECT * FROM customers WHERE customer_email='$user'";
	$run_get_user_logged = mysqli_query($con, $get_user_logged);
	$user_rows_logged = mysqli_fetch_array($run_get_user_logged);
	$user_id = $user_rows_logged['customer_id'];
	$user_email = $user_rows_logged['customer_email'];
	$user_pass = $user_rows_logged['customer_pass'];
?>

<!--products box starts-->	
<div id="products_box">
	<form method="post" action="" enctype="multipart/form-data">
			<table align="center" width="750">
				<tr style="text-align: center;">

				<td colspan="6"><h2><br>Change Password<br></h2>
				</td>
			</tr>

			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;"><br>Current Password:</b></td>
				<td align="left"><br><input placeholder="Enter your Password" type="password" name="cust_pass" required/></td>
			</tr>
			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;"><br>New Password:</b></td>
				<td align="left"><br><input type="password" name="new_pass" required/></td>
			</tr>
			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;"><br>Confirm New Password:</b></td>
				<td align="left"><br><input type="password" name="confirm_pass" required/></td>
			</tr>			

		<tr align="center">
			<td height="110px;" colspan="6" align="center"><br><br><input type="submit" name="pass" value="Change Password"/></td>
		</tr>
	</table>
</form>
</div>
<!--products box ends-->
<?php

if (isset($_POST['pass'])) {
		global $con;
		$ip = getIP();
		$cust_email = $_SESSION['customer_email'];
		$cust_id = $user_id;
		$cust_pass = $_POST['cust_pass'];
		$new_pass = $_POST['new_pass'];
		$confirm_pass = $_POST['confirm_pass'];
		
		$sel_pass = "SELECT * FROM customers WHERE customer_pass='$cust_pass' AND customer_email='$cust_email'";
		$run_sel_pass = mysqli_query($con, $sel_pass);
		$check_pass = mysqli_num_rows($run_sel_pass);
		if ($check_pass==0) {
			echo "<script>alert('Your current Password is wrong!!')</script>
			<script>window.open('customerMyAccount.php?passwd','_self')</script>
			";
			exit();
		}
		if ($new_pass!=$confirm_pass) {
			echo "
				<script>alert('Passwords Entered do not match!!')</script>
				<script>window.open('customerMyAccount.php?passwd','_self')</script>
				";
			exit();
		}
	else{
	$update_cust = "UPDATE customers SET customer_pass='$new_pass' WHERE customer_id='$cust_id' AND customer_email='$cust_email'";

	$run_update = mysqli_query($con, $update_cust);
	if($run_update){
	echo "<script>alert('Your your Password was changed..!!')</script>";
	echo "<script>window.open('customerMyAccount.php','_self')</script>";}
	}
}
?>