
<?php

include_once("../functions/functions.php");
?>
<?php getIp(); ?>
<?php cart(); ?>
<?php
	
	$cust_id = $_GET['edit_cust'];
	$get_user_logged = "SELECT * FROM customers WHERE customer_id='$cust_id'";
	$run_get_user_logged = mysqli_query($con, $get_user_logged);
	$user_rows_logged = mysqli_fetch_array($run_get_user_logged);
	$user_id = $user_rows_logged['customer_id'];
	$user_name = $user_rows_logged['customer_name'];
	$user_email = $user_rows_logged['customer_email'];
	$user_ctry = $user_rows_logged['customer_country'];
	$user_cont = $user_rows_logged['customer_contact'];
	$user_city = $user_rows_logged['customer_city'];
	$user_addr = $user_rows_logged['customer_address'];
	$user_pass = $user_rows_logged['customer_pass'];
	$user_img = $user_rows_logged['customer_image'];
?>
<!--products box starts-->	
<div id="products_box">
	<form method="post" action="" enctype="multipart/form-data">
			<table align="center" width="750">
				<tr style="text-align: center;">

				<td colspan="6"><h2>Edit  Account</h2>
				</td>
			</tr>

			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Name:</b></td>
				<td align="left"><input type="text" name="cust_name" value="<?php echo $user_name?>" required /></td>
			</tr>
			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Email:</b></td>
				<td align="left"><input value="<?php echo $user_email?>"type="text" name="cust_email" required/></td>
			</tr>
			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Password:</b></td>
				<td align="left"><input value="<?php echo $user_pass?>"type="password" name="cust_pass" required/></td>
			</tr>

			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Image:</b></td>
				<td align="left"><input value="<?php echo $user_img; ?>" selected="selected" type="file" name="cust_img" /><img src=" ../customer/customer_images/<?php echo $user_img;?>" width="50" height="50" /></td>
			</tr>			
			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Country:</b></td>
				<td align="left"><select style="width: 250px;" name="cust_ctry" required="required">
						<option><?php echo $user_ctry; ?></option></select></td>
					</tr>
		<tr>
			<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer City:</b></td>
			<td align="left"><input value="<?php echo $user_city?>"type="text" name="cust_city" required/></td>
		</tr>

			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Contact:</b></td>
				<td align="left"><input value="<?php echo $user_cont?>"type="text" name="cust_cont" required/></td>
			</tr>
			
		<tr>
			<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Address:</b></td>
			<td align="left"><textarea required="required" name="cust_addr" cols="35" rows="10"><?php echo $user_addr; ?></textarea>
			</td>
		</tr>

		<tr>
			<td colspan="7" align="center"><input type="submit" name="update_acc" value="Update Account"/>
			<input type="submit" name="cancel" value="Cancel"/></td>
		</tr>

	</table>
</form>
</div>
<!--products box ends-->
<?php
if (isset($_POST['cancel'])) {
	echo "<script>window.open('index.php?view_customers','_self')</script>";
}
if (isset($_POST['update_acc'])) {
		global $con;
		$ip = getIP();
		$cust_id = $user_id;
		$cust_name = $_POST['cust_name'];
		$cust_email = $_POST['cust_email'];
		$cust_pass = $_POST['cust_pass'];
		$cust_img = $_FILES['cust_img']['name'];
		$cust_img_tmp = $_FILES['cust_img']['tmp_name'];
		$cust_city = $_POST['cust_city'];
		$cust_cont = $_POST['cust_cont'];
		$cust_addr = $_POST['cust_addr'];

		move_uploaded_file($cust_img_tmp,"../customer/customer_images/$cust_img");

		 $update_cust = "UPDATE customers SET customer_name='$cust_name', customer_email='$cust_email', customer_pass='$cust_pass',customer_city='$cust_city', customer_contact='$cust_cont',customer_address='$cust_addr', customer_image='$cust_img' WHERE customer_id='$cust_id'";

		$run_update = mysqli_query($con, $update_cust);
		if($run_update){
			echo "<script>alert('~Customer account has been Updated by Administrator..!!')</script>";
			echo "<script>window.open('index.php?view_customers','_self')</script>";}
	}

?>
