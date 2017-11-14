<!DOCTYPE html>
<?php
include("../functions/functions.php");
if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{
?>
<html>
<head>
	<title>Delete Brand</title>
</head>

<body bgcolor="skyblue">
	
<div id="products_box">
	<form method="post" action="" enctype="multipart/form-data">
			<table align="center" width="750">
				<tr style="text-align: center;">
					<td colspan="6"><h2 class="blink_text">WARNING!! CUSTOMER ACCOUNT DELETION !!</h2>
				</td>
			</tr>		
			<tr>
				<td align="center"><b style="color: red; font-weight: bolder; font-size: 19px;"><br><br><br>Yes Delete This Customer</b></td></tr>
				<tr>

				<td align="center"><input type="submit" name="yes" value="Delete Customer" /></td>
			</tr>
			<tr>
				<td align="center"><b style="color: red; font-weight: bolder; font-size: 19px;"><br><br>Do Not Delete This Customer</b></td></tr><br><br>
				<tr>
				<td align="center"><input type="submit" name="no" value="Do Not Delete Customer" /></td>
			</tr>
			<tr >
				<td height="55px;">
					
				</td>
			</tr>

 <?php
	
	if (isset($_GET['delete_cust'])) {
		
	$get_id = $_GET['delete_cust'];

	if (isset($_POST['yes'])) {
		$delete_cat = "DELETE FROM customers WHERE customer_id='$get_id'";
		$run_delete_cat = mysqli_query($con, $delete_cat);
		
		echo "<script>alert('Customer Account has been Deleted by Admin!!')</script>
		<script>window.open('index.php?view_customers','_self')</script>";
	}
	if (isset($_POST['no'])) {
		
		echo "<script>alert('Customer Account has NOT been Deleted!!')</script>
		<script>window.open('index.php?view_customers','_self')</script>";
	}
}
	

?>

			</table>
		</form>
	</body>
</html>
<?php } ?>