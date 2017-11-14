<!DOCTYPE html>
<?php
include("../functions/functions.php");
if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{
?>
<html>
<head>
	<title>Delete Product</title>
</head>

<body bgcolor="skyblue">
	<form action="" method="post" enctype="multipart/form-data">
			<div id="products_box">
	<form method="post" action="" enctype="multipart/form-data">
			<table align="center" width="750">
				<tr style="text-align: center;">
					<td colspan="6"><h2 class="blink_text">WARNING!! PRODUCT DELETION !!</h2>
				</td>
			</tr>		
			<tr>
				<td align="center"><b style="color: red; font-weight: bolder; font-size: 19px;"><br><br><br>Yes Delete This Product</b></td></tr>
				<tr>

				<td align="center"><input type="submit" name="yes" value="Delete Product" /></td>
			</tr>
			<tr>
				<td align="center"><b style="color: red; font-weight: bolder; font-size: 19px;"><br><br>Do Not Delete This Product</b></td></tr><br><br>
				<tr>
				<td align="center"><input type="submit" name="no" value="Do Not Delete Product" /></td>
			</tr>
			<tr >
				<td height="55px;">
					
				</td>
			</tr>

 <?php
	
	if (isset($_GET['delete_pro'])) {
		
	$get_id = $_GET['delete_pro'];

	if (isset($_POST['yes'])) {
		$delete_user = "DELETE FROM products WHERE product_id='$get_id'";
		$run_delete_user = mysqli_query($con, $delete_user);
		
		echo "<script>alert('Product has been Deleted!!')</script>
		<script>window.open('index.php?view_products','_self')</script>";
	}
	if (isset($_POST['no'])) {
		
		echo "<script>alert('Product has NOT been Deleted!!')</script>
		<script>window.open('index.php?view_products','_self')</script>";
	}
}
	

?>

			</table>
		</form>
	</body>
</html>
<?php } ?>