<?php 
	if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{

?>
<table width="795" align="center" bgcolor="#187eae">

	<tr align="center"> 
		<td colspan="6" style="border:3px groove orange;"><h2>View all Brands</h2></td>
	</tr>

	<tr>
		<th style="border:3px groove orange;">Brand ID</th>
		<th style="border:3px groove orange;">Brand Title</th>
		<th style="border:3px groove orange;">Edit</th>
		<th style="border:3px groove orange;">Delete</th>
	</tr>

	<?php
		global $con;
		$index = 0;
		include('../functions/functions.php');
		$get_brand = "SELECT * FROM brands";
		$run_brand = mysqli_query($con, $get_brand);

		while ($row_brand= mysqli_fetch_array($run_brand)){
			$brand_id = $row_brand['brand_id'];
			$brand_title = $row_brand['brand_title'];
			$index ++;
?>

	<tr align="center">
		<td><?php echo $index; ?></td>
		<td><?php echo $brand_title; ?></td>
		 <td><a href="index.php?edit_brand=<?php echo $brand_id?>">Edit</a></td>
		<td><a href="index.php?delete_brand=<?php echo $brand_id?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>