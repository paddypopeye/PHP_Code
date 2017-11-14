<?php
include_once("../functions/functions.php");
?>

<?php getIp(); ?>
<?php cart(); ?>

<?php
	
	$user = $_SESSION['customer_email'];
	if (isset($_POST['yes'])) {
		$delete_user = "DELETE FROM customers WHERE customer_email='$user'";
		$run_delete_user = mysqli_query($con, $delete_user);
		session_destroy();
		echo "<script>alert('Your Account has been Deleted!!')</script>
		<script>window.open('../index.php','_self')</script>";
	}
	if (isset($_POST['no'])) {
		
		echo "<script>alert('Your Account has not been Deleted!!')</script>
		<script>window.open('customerMyAccount.php','_self')</script>";
	}
	
?>

<!--products box starts-->	
<div id="products_box">
	<form method="post" action="" enctype="multipart/form-data">
			<table align="center" width="750">
				<tr style="text-align: center;">
					<td colspan="6"><h2 class="blink_text">WARNING!! ACCOUNT DELETION !!</h2>
				</td>
			</tr>		
			<tr>
				<td align="center"><b style="color: black; font-weight: bolder; font-size: 19px;"><br><br>Yes Delete This Account</b></td></tr>
				<tr>

				<td align="center"><input type="submit" name="yes" value="Delete Account" /></td>
			</tr>
			<tr>
				<td align="center"><b style="color: black; font-weight: bolder; font-size: 19px;"><br><br>Do Not Delete This Account</b></td></tr><br><br>
				<tr>
				<td align="center"><input type="submit" name="no" value="Return Do Not Delete" /></td>
			</tr>
			<tr >
				<td height="55px;">
					
				</td>
			</tr>
	</table>
</form>
</div>
<!--products box ends-->