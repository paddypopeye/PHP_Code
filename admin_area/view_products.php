<?php
if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{
?>
<table width="795" align="center" bgcolor="pink">

	<tr align="center"> 
		<td colspan="6" style="border:3px groove orange;"><h2>View all products</h2></td>
	</tr>

	<tr>
		<th style="border:3px groove orange;">S,N</th>
		<th style="border:3px groove orange;">Title</th>
		<th style="border:3px groove orange;">Image</th>
		<th style="border:3px groove orange;">Price</th>
		<th style="border:3px groove orange;">Edit</th>
		<th style="border:3px groove orange;">Delete</th>
	</tr>

	<?php
		global $con;
		$index = 0;
		include('../functions/functions.php');
		$get_pro = "SELECT * FROM products";
		$run_pro = mysqli_query($con, $get_pro);

		while ($row_pro= mysqli_fetch_array($run_pro)){
			$pro_id = $row_pro['product_id'];
			$pro_title = $row_pro['product_title'];
			$pro_image = $row_pro['product_image'];
			$pro_price = $row_pro['product_price'];
			$index ++;
		
	?>

	<tr align="center">
		<td><?php echo $index; ?></td>
		<td><?php echo $pro_title; ?></td>
		<td><img src="product_images/<?php echo $pro_image;?>" width="100" height="100"/></td>
		<td><?php echo $pro_price; ?></td>
		<td><a href="index.php?edit_pro=<?php echo $pro_id?>">Edit</a></td>
		<td><a href="index.php?delete_pro=<?php echo $pro_id?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>