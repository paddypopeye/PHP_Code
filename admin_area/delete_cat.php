
<?php
include("../functions/functions.php");
if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{
?>


	
<div id="main_wrapper_admin">
	<form method="post" action="" enctype="multipart/form-data">
			<table align="center" width="795">
				<tr style="text-align: center;">
					<td colspan="6"><h2 class="blink_text">WARNING!! CATEGORY DELETION !!</h2>
				</td>
			</tr>		
			<tr>
				<td align="center"><b style="color: red; font-weight: bolder; font-size: 19px;"><br><br>Yes Delete This Category</b></td></tr>
				<tr>

				<td align="center"><input type="submit" name="yes" value="Delete Category" /></td>
			</tr>
			<tr>
				<td align="center"><b style="color: red; font-weight: bolder; font-size: 19px;"><br><br>Do Not Delete This Category</b></td></tr><br><br><br><br>
				<tr>
				<td align="center"><input type="submit" name="no" value="Do Not Delete Category" /></td>
			</tr>
			<tr >
				<td height="210px;">
					
				</td>
			</tr>

 <?php
	
	if (isset($_GET['delete_cat'])) {
		
	$get_id = $_GET['delete_cat'];

	if (isset($_POST['yes'])) {
		$delete_cat = "DELETE FROM categories WHERE cat_id='$get_id'";
		$run_delete_cat = mysqli_query($con, $delete_cat);
		
		echo "<script>alert('Category has been Deleted!!')</script>
		<script>window.open('index.php?view_cats','_self')</script>";
	}
	if (isset($_POST['no'])) {
		
		echo "<script>alert('Category has NOT been Deleted!!')</script>
		<script>window.open('index.php?view_cats','_self')</script>";
	}
}
	

?>

			</table>
		</form>
		</div>
<?php } ?>