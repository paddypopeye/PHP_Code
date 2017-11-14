<?php
if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{

?>
<div id="products_box">
<form action="" method="post">
	<b>
		<h2>Insert a new Category..!!</h2><br>
	</b>
		<br><input type="text" name="new_cat" /> 
		<br><br><input type="submit" name="add_cat" value="Add a new Category" /><br><br><br>


</form>

<?php
	include_once('../functions/functions.php');	
	if (isset($_POST['add_cat'])) {

	global $con;
	$new_cat = $_POST['new_cat'];
	$insert_cat = "INSERT INTO categories (cat_title) VALUES ('$new_cat')";
	$run_insert_cat = mysqli_query($con, $insert_cat);

	if($run_insert_cat){
		echo "
		<script>alert('New Category has been added')</script>
		<script>window.open('index.php?view_cats','_self')</script>";
	}
}
?>
</div>
<?php } ?>