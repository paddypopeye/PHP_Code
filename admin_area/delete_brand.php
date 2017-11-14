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
					<td colspan="6"><h2 class="blink_text">WARNING!! BRAND DELETION !!</h2>
				</td>
			</tr>		
			<tr>
				<td align="center"><b style="color: red; font-weight: bolder; font-size: 19px;"><br><br><br>Yes Delete This Brand</b></td></tr>
				<tr>

				<td align="center"><input type="submit" name="yes" value="Delete Brand" /></td>
			</tr>
			<tr>
				<td align="center"><b style="color: red; font-weight: bolder; font-size: 19px;"><br><br>Do Not Delete This Brand</b></td></tr><br><br>
				<tr>
				<td align="center"><input type="submit" name="no" value="Do Not Delete Brand" /></td>
			</tr>
			<tr >
				<td height="55px;">
					
				</td>
			</tr>

 <?php
	
	if (isset($_GET['delete_brand'])) {
		
	$get_id = $_GET['delete_brand'];

	if (isset($_POST['yes'])) {
		$delete_cat = "DELETE FROM brands WHERE brand_id='$get_id'";
		$run_delete_cat = mysqli_query($con, $delete_cat);
		
		echo "<script>alert('Brand has been Deleted!!')</script>
		<script>window.open('index.php?view_brands','_self')</script>";
	}
	if (isset($_POST['no'])) {
		
		echo "<script>alert('Brand has NOT been Deleted!!')</script>
		<script>window.open('index.php?view_brands','_self')</script>";
	}
}
	

?>

			</table>
		</form>
	</body>
</html>
<?php } ?>