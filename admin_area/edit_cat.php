<?php

include("../functions/functions.php");
if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{
?>


<?php
	if (isset($_GET['edit_cat'])) {
		
	
		global $con;
		$index = 0;
		$get_id = $_GET['edit_cat'];
		$get_cat = "SELECT * FROM categories WHERE cat_id='$get_id'";
		$run_cat = mysqli_query($con, $get_cat);

			$row_cat= mysqli_fetch_array($run_cat);
			$cat_id = $row_cat['cat_id'];
			$cat_title = $row_cat['cat_title'];
			
}
	?>
<body bgcolor="skyblue">
<div id="products_box">
<form action="" method="post">
	<b>
		<h2>Edit a Category..!!</h2><br>
	</b>
		<br><input type="text" name="edit_cat" placeholder="<?php echo $cat_title; ?>"/> 
		<br><br><input type="submit" name="update_cat" value="Edit a Category"  /><br><br><br>
</form> 

<?php

if(isset($_POST['update_cat'])){
	// getting text content
	$get_id = $_GET['edit_cat'];
	$category_title = $_POST['edit_cat'];
	
	
	$update_cat = "UPDATE categories SET cat_title='$category_title' WHERE cat_id='$get_id'";

	$run_insert = mysqli_query($con, $update_cat);

	if ($run_insert) {
		# code...
		echo "
			<script>alert('Category has been updated!!')</script>
			<script>window.open('index.php?view_cats', '_self')</script>
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