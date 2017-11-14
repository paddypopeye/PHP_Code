<!DOCTYPE html>


<?php

include("../functions/functions.php");

if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{
?>

<html>
<head>
		<link rel='stylesheet' href='../styles/text_editor/css/widgEditor.css'/>
			<script src='../styles/text_editor/scripts/widgEditor.js'></script>

	<title>Insert Product/s</title>

</head>
<?php
	if (isset($_GET['edit_pro'])) {
		
	
		global $con;
		$index = 0;
		$get_id = $_GET['edit_pro'];
		$get_pro = "SELECT * FROM products WHERE product_id='$get_id'";
		$run_pro = mysqli_query($con, $get_pro);

			$row_pro= mysqli_fetch_array($run_pro);
			$pro_id = $row_pro['product_id'];
			$pro_title = $row_pro['product_title'];
			$pro_cat = $row_pro['product_cat'];
			$pro_brand = $row_pro['product_brand'];
			$pro_image = $row_pro['product_image'];
			$pro_price = $row_pro['product_price'];
			$pro_desc = $row_pro['product_desc'];
			$pro_keywords = $row_pro['product_keywords'];

			$get_cat = "SELECT * FROM categories WHERE cat_id='$pro_cat'";
			$run_cat = mysqli_query($con,$get_cat);
			$cat_row = mysqli_fetch_array($run_cat);
			$cat_title = $cat_row['cat_title'];

			$get_brand = "SELECT * FROM brands WHERE brand_id='$pro_brand'";
			$run_brand = mysqli_query($con,$get_brand);
			$brand_row = mysqli_fetch_array($run_brand);
			$brand_title = $brand_row['brand_title'];

			}
	?>
<body bgcolor="skyblue">
	<form action="" method="post" enctype="multipart/form-data">
			<table align="center" width="795" border="2" bgcolor="#187eae">

				<tr align="center">
					<td colspan="7"><h2>Update Product</h2></td>
				</tr>

				<tr>
					<td align="right"><b>Product Title: </b></td>
					<td><input type="text" name="product_title" value="<?php echo $pro_title;?>"/></td>
				</tr>

				<tr>
					<td align="right"><b>Product Category: </b></td>
					<td><select required name="product_cat">
							<option selected value="<?php echo $pro_cat;?>"><?php echo $cat_title;?></option>
						
							<?php getCatsSelect(); ?>

						</select>
					</td>
				</tr>
				<tr>
					<td align="right"><b>Product Brand: </b></td>
					<td><select required name="product_brand">
		<option  selected value="<?php echo $pro_brand;?>"><?php echo $brand_title;?></option>
						
							<?php getBrandsSelect(); ?>

						</select>
					</td>
				</tr>
				<tr>
					<td align="right"><b>Product Image: </b></td>
					<td><input value="<?php echo $pro_image;?>" type='file' name="product_image"/><img src="product_images/<?php echo $pro_image;?>" width="50" height="50" /></td>
				</tr>

				
				<tr>
					<td  align="right"><b>Product Price: </b></td>
					<td><input value="<?php echo $pro_price;?>" type="text" name="product_price" required/></td>
				</tr>
				<tr>
					
					<td align="right"><b>Product Description: </b></td>
					<td><textarea required class="widgEditor" name="product_desc"><?php echo $pro_desc;?></textarea></td>
				</tr>
				<tr>
					<td align="right"><b>Product Keywords: </b></td>
					<td><input value="<?php echo $pro_keywords;?>" type="text" name="product_keywords" required/></td>
				</tr>
				<tr align="center">
					
					<td colspan="7"><input type="submit" name="update_pro" value="Updte Product Now" />&nbsp&nbsp<a href='index.php?view_products' style='float:right; text-decoration: none; color: black;'><button style="float: center; margin-left: 100px; margin-top: 1px;">Cancel</a></td>
				</tr>
 


<?php

if(isset($_POST['update_pro'])){
	// getting text content
	$get_id = $_GET['edit_pro'];
	$product_title = $_POST['product_title'];
	$product_cat = $_POST['product_cat'];
	$product_brand =$_POST['product_brand'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$product_keywords = $_POST['product_keywords'];

	// getting image 
	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];
	move_uploaded_file($product_image_tmp, "product_images/$product_image");

	$insert_product = "UPDATE products set product_cat='$product_cat', product_brand='$product_brand', product_title='$product_title', product_price='$product_price', product_desc='$product_desc',product_image='$product_image', product_keywords='$product_keywords' WHERE product_id='$get_id'";

	$insert_rows = mysqli_query($con, $insert_product);

	if ($insert_rows) {
		# code...
		echo "
			<script>alert('Product has been updated!!')</script>
			<script>window.open('index.php?view_products', '_self')</script>
		";
	}


}

?>

		</table>
	</form>
</body>
</html>
<?php } ?>