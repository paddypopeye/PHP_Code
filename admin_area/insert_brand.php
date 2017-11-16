<div id="products_box">
<form action="" method="post">
	<b>
		<h2>Insert a new Brand..!!</h2><br>
	</b>
		<br><input type="text" name="new_brand" /> 
		<br><br><input type="submit" name="add_brand" value="Add a new Brand" />
		<input type="submit" name="cancel" value="Cancel"/></td><br><br><br>
</form>

<?php
	include_once('../functions/functions.php');
	if (isset($_POST['cancel'])) {
					echo "<script>window.open('index.php?view_brands','_self')</script>";
				}	
	if (isset($_POST['add_brand'])) {

	global $con;
	$new_brand = $_POST['new_brand'];
	$insert_brand = "INSERT INTO brands (brand_title) VALUES ('$new_brand')";
	$run_insert_brand = mysqli_query($con, $insert_brand);

	if($run_insert_brand){
		echo "
		<script>alert('New Brand has been added')</script>
		<script>window.open('index.php?view_brands','_self')</script>";
	}
}
?>
</div>
