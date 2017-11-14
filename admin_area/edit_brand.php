<?php

include("../functions/functions.php");
if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{
?>


<?php
	if (isset($_GET['edit_brand'])) {
		
	
		global $con;
		$index = 0;
		$get_id = $_GET['edit_brand'];
		$get_brand = "SELECT * FROM brands WHERE brand_id='$get_id'";
		$run_brand = mysqli_query($con, $get_brand);

			$row_brand= mysqli_fetch_array($run_brand);
			$brand_id = $row_brand['brand_id'];
			$brand_title = $row_brand['brand_title'];
			
}
	?>
<body bgcolor="skyblue">
<div id="products_box">
<form action="" method="post">
	<b>
		<h2>Edit a Brand..!!</h2><br>
	</b>
		<br><input type="text" name="edit_brand" placeholder="<?php echo $brand_title; ?>"/> 
		<br><br><input type="submit" name="update_brand" value="Edit a Brand"  /><br><br><br>
</form> 

<?php

if(isset($_POST['update_brand'])){
	// getting text content
	$get_id = $_GET['edit_brand'];
	$brand_title = $_POST['edit_brand'];
	
	
	
	$update_brand = "UPDATE brands SET brand_title='$brand_title' WHERE brand_id='$get_id'";

	$run_insert = mysqli_query($con, $update_brand);

	if ($run_insert) {
		# code...
		echo "
			<script>alert('Brand has been updated!!')</script>
			<script>window.open('index.php?view_brands', '_self')</script>
		";
	}


}

?>

			</table>
		</form>
	</div>
</body>
</html>
<?php } ?>