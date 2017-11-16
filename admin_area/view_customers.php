<?php
	if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{
?>

<table width="795" align="center" bgcolor="#187eae">

	<tr align="center"> 
		<td colspan="6" style="border:3px groove orange;"><h2>View all Customers</h2></td>
	</tr>

	<tr>
		<th style="border:3px groove orange;">S.N</th>
		<th style="border:3px groove orange;">Name</th>
		<th style="border:3px groove orange;">Image</th>
		<th style="border:3px groove orange;">Email</th>
		<th style="border:3px groove orange;">Edit</th>
		<th style="border:3px groove orange;">Delete</th>
	</tr>

	<?php
		global $con;
		$index = 0;
		include('../functions/functions.php');
		$get_cust = "SELECT * FROM customers";
		$run_cust = mysqli_query($con, $get_cust);

		while ($row_cust= mysqli_fetch_array($run_cust)){
			$cust_id = $row_cust['customer_id'];
			$cust_name = $row_cust['customer_name'];
			$cust_image = $row_cust['customer_image'];
			$cust_email = $row_cust['customer_email'];
			$index ++;
		
	?>

	<tr align="center">
		<td><?php echo $index; ?></td>
		<td><?php echo $cust_name; ?></td>
		<td><img src="../customer/customer_images/<?php echo $cust_image;?>" width="100" height="100"/></td>
		<td><?php echo $cust_email; ?></td>
		<td><a href="index.php?edit_cust=<?php echo $cust_id?>">Edit Customer</a></td>
		<td><a href="index.php?delete_cust=<?php echo $cust_id?>">Delete Customer</a></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>