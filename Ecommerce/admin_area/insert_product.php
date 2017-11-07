<!DOCTYPE html>


<?php

include("../functions/functions.php");
?>

<html>
<head>
		<link rel='stylesheet' href='../styles/text_editor/css/widgEditor.css'/>
			<script src='../styles/text_editor/scripts/widgEditor.js'></script>

	<title>Insert Product/s</title>

</head>
<body bgcolor="skyblue">
	<form action="insert_product.php" method="post" enctype="multipart/form-data">
			<table align="center" width="750" border="2" bgcolor="orange">

				<tr align="center">
					<td colspan="7"><h2>Insert New Product</h2></td>
				</tr>

				<tr>
					<td align="right"><b>Product Title: </b></td>
					<td><input type="text" name="product_title" required/></td>
				</tr>

				<tr>
					<td align="right"><b>Product Category: </b></td>
					<td><select required name="product_cat">
							<option  disabled selected value>Select Category</option>
						
							<?php getCatsSelect(); ?>

						</select>
					</td>
				</tr>
				<tr>
					<td align="right"><b>Product Brand: </b></td>
					<td><select required name="product_brand">
							<option  disabled selected value>Select Brand</option>
						
							<?php getBrandsSelect(); ?>

						</select>
					</td>
				</tr>
				<tr>
					<td align="right"><b>Product Image: </b></td>
					<td><input type='file' name='product_image' required/></td>
				</tr>
				<tr>
					<td  align="right"><b>Product Price: </b></td>
					<td><input type="text" name="product_price" required/></td>
				</tr>
				<tr>
					
					<td align="right"><b>Product Description: </b></td>
					<td><textarea required class="widgEditor" name="product_desc"></textarea></td>
				</tr>
				<tr>
					<td align="right"><b>Product Keywords: </b></td>
					<td><input type="text" name="product_keywords" required/></td>
				</tr>
				<tr align="center">
					
					<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now" /></td>
				</tr>
 
			</table>
			
		</form>
</body>
</html>

<?php

if(isset($_POST['insert_post'])){
	// getting text content

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

	$insert_product = "INSERT INTO products (product_cat, product_brand,product_title, product_price, product_desc,product_image, product_keywords) VALUES('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

	$insert_rows = mysqli_query($con, $insert_product);

	if ($insert_rows) {
		# code...
		echo "
			<script>alert('Product has been inserted!!')</script>
			<script>window.open('insert_product.php', '_self')</script>
		";
	}


}

?>