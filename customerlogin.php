<?php
include_once('functions/functions.php');
?>

<div>
	<form method="post" action="">
		<table width="500" align="center">
			<tr align="center">
				<td colspan="4" style="padding-left: 150px;">
					<h2>
						Login or Register to Buy!
					</h2>
				</td>
			</tr>

			<tr>
				<td align="right">
					<b>Email</b>
				</td>
				<td>
					<input type="text" name="email" placeholder="Enter Email"/>
				</td>
			</tr>
			<tr>
				<td align="right">
					<b>Password</b>
				</td>
				<td align="center">
					<input type="password" name="pass" placeholder="Enter Password">
				</td>
			</tr>
			<tr align="center">
				<td class="blink_text2" colspan="4" style="padding-left: 130px;"><a style="color: red;" href="checkout.php?forgot_pass">Forgot Password?</a>
				</td>
			</tr>
			<tr align="center">
				<td colspan="4" style="padding-left:130px;">
					<input type="submit" name="login" value="Login">
				</td>
			</tr>
		</table>

			<h3 style="float:right; padding-top: 50px; padding-right: 20px;">
			<a class="blink_text" href="customerReg.php" style="color: black; text-decoration: none;"><b>New Customer??</b>&nbsp&nbsp<b>Register Here</b></a></h3>

	</form>
	<?php
		if (isset($_POST['login'])) {
			$loginEmail = $_POST['email'];
			$password =  $_POST['pass'];

			$sel_cust = "SELECT * FROM customers WHERE customer_pass='$password' AND customer_email='$loginEmail'";
			$run_sel_cust = mysqli_query($con,$sel_cust);

			$check_cust = mysqli_num_rows($run_sel_cust);
		
		if ($check_cust==0) {
			echo "<script>alert('Email or Password incorrect Please try again..!!')</script>";
			exit(); 

		}

		$ip = getIp();
		$get_cart = "SELECT * FROM cart WHERE ip_addr='$ip'";
		$run_cart = mysqli_query($con,$get_cart);
		$check_cart = mysqli_num_rows($run_cart);
		if ($check_cust>0 AND $check_cart==0){
			$_SESSION['customer_email']=$loginEmail;
		echo"<script>alert('Login Successful..!!')</script>";
		echo"<script>window.open('customer/customerMyAccount.php','_self')</script>";
		}
		else{
			$_SESSION['customer_email']=$loginEmail;
		echo"<script>alert('Login Successful..!!')</script>";
		echo"<script>window.open('checkout.php','_self')</script>";
		}
	}
	?>
</div>

