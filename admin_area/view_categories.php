<?php if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{
?>
<table width="795" align="center" bgcolor="#187eae">

	<tr align="center"> 
		<td colspan="6" style="border:3px groove orange;"><h2>View all Categories</h2></td>
	</tr>

	<tr>
		<th style="border:3px groove orange;">Category ID</th>
		<th style="border:3px groove orange;">Category Title</th>
		<th style="border:3px groove orange;">Edit</th>
		<th style="border:3px groove orange;">Delete</th>
	</tr>

	<?php
		global $con;
		$index = 0;
		include('../functions/functions.php');
		$get_cat = "SELECT * FROM categories";
		$run_cat = mysqli_query($con, $get_cat);

		while ($row_cat= mysqli_fetch_array($run_cat)){
			$cat_id = $row_cat['cat_id'];
			$cat_title = $row_cat['cat_title'];
			$index ++;
?>

	<tr align="center">
		<td><?php echo $index; ?></td>
		<td><?php echo $cat_title; ?></td>
		 <td><a href="index.php?edit_cat=<?php echo $cat_id?>">Edit</a></td>
		<td><a href="index.php?delete_cat=<?php echo $cat_id?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>