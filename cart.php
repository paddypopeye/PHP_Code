<!DOCTYPE html>

<?php
session_start();
include("functions/functions.php")
?>



<html>
	<head>
		<title>MyOnlineShop</title>
		<link rel="stylesheet" type="text/css" href="styles/styles.css" media="all">
	</head>

<body>
<!---Main_wrapper starts-->
<div class="main_wrapper">



	<!--Header Starts-->
	<div class="header_wrapper">
				<a href="index.php"><img id="logo" src="images/A13.gif" /></a>
				<a href="index.php"><img id="banner" src="images/boxing_computer.gif" /></a>
			
	</div>
	<!--Header Ends-->

	<!--menubar starts-->
			<div class="menubar">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
<?php
					if(isset($_SESSION['customer_email'])){
						
						echo"<a href='customer/customerMyAccount.php'>My Account</a>";
					}
					else{
						echo"<a href='checkout.php'>My Account</a>";	
					}
?>
				<?php
					if(!isset($_SESSION['customer_email'])){
						
						echo"<a href='customerReg.php'>Sign Up</a>";
					}
					else{
						echo"<a href='customer/customerMyAccount.php'>Sign Up</a>";	
					}
?>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
				
			</ul>
			<!--form starts-->
			<div id="form">
			<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="Search a Product" style="width:175px;" />
				<input type="submit" name="search" value="Search" >
			</form>
			</div>	
			<!-- form ends-->

			</div>
			<!--Menu Bar ends-->
		<!--Sidebar starts-->

		<div id="sidebar_grow">
			<!--sidebar title starts-->
			<div id="sidebar_title">Categories
			</div><!--sidebar title ends-->	
				<ul id="cats">
					<?php getCats(); ?>
				</ul>

				<div id="sidebar_title">Brands
			</div><!--sidebar title ends-->	
				<ul id="cats">
					<?php getBrands(); ?>
				</ul>

			
			
		</div><!--Sidebar ends-->


	<!--content_wrapper starts-->	
	<div class="content_wrapper">
		<!--Content Area Starts-->
		<div id="content_area">
			<!--ShoppingCart starts-->
			<div id="shopping_cart">
				<span style="float:left; font-size:14px; margin:1px; line-height:40px;">

				<?php
					if(isset($_SESSION['customer_email'])){
						echo"<b style='color:yellow;'>Welcome:</b>" .$_SESSION['customer_email']."<b style='color:yellow;'>Your ";}
					else{
						echo"<b style='color:yellow;'>Welcome Guest:</b>"."<b style='color:yellow;'>Your ";
					}
				?>
				Shopping Cart:</b>
				Total Items:<b class="blink_text2" style="color: red;">
				<?php totalCartItems();?></b>
				Total Price: <b class="blink_text2" style="color: red;">
				<?php PriceCartItems();?></b>

				<a href="index.php" style="color: orange; font-family: comic;font-weight: bolder; text-decoration: none;">
				Back To Shop</a>&nbsp

				<?php
					if(!isset($_SESSION['customer_email'])){
						echo"<a href='checkout.php' style='color:red; text-decoration: none;'><b>Login</b></a>";
					}
					else{
						echo"<a href='logout.php' style='color:red; text-decoration: none;'><b>Logout</b></a>";	
					}
				?>
				
				</span>
			</div><!--ShoppingCart ends-->
			<!--products box starts-->	
			<div align="center">
				<form style="padding-top: 1px;" action="" method="post" enctype="multipart/form-data">

				<table style="padding-bottom: 30px; border:2px solid black; align-content: center; width: 700px; height:100px; background-color: skyblue;">

				<tr style="border: 1px solid black; text-align: center;">
					<td style="border: 1px solid black; text-align: center;" colspan="7"><h3>Updatye your Cart</h3></td>
				</tr>

				<tr colspan="2" style="border: 1px solid black; text-align: center;">
					<th style="border: 1px solid black; text-align: center;" colspan="2">Remove</th>
					<th style="border: 1px solid black; text-align: center;" colspan="2">Product(s)</th>
					<th style="border: 1px solid black; text-align: center;">Quantity</th>
					<th colspan="2"style="border: 1px solid black; text-align: center;">Total Price:</th>
				</tr>

<?php 


		$total = 0;
		
		global $con; 
		
		$ip = getIp(); 
		
		$sel_price = "SELECT * FROM cart WHERE ip_addr='$ip'";
		
		$run_price = mysqli_query($con, $sel_price); 
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$pro_id = $p_price['p_id']; 

			$pro_qty = $p_price['qty'];
			
			$pro_price = "SELECT * FROM products WHERE product_id='$pro_id'";
			
			$run_pro_price = mysqli_query($con,$pro_price); 
			
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($pp_price['product_price']);
			
			$product_title = $pp_price['product_title'];
			
			$product_image = $pp_price['product_image']; 
			
			$single_price = $pp_price['product_price'];
			
			$values = array_sum($product_price);


						if(isset($_POST['update_cart'])){
						
							$qty = $_POST['qty'];
							
							$update_qty = "UPDATE cart SET qty='$qty'";
							
							$run_qty = mysqli_query($con, $update_qty); 
							
							$_SESSION['qty'] =	$qty;
							
							
						 
						if(!isset($_POST['update_cart'])){
						
							$qty = $_POST['qty'];
							
							$update_qty = "UPDATE cart SET qty='$qty'";
							
							$run_qty = mysqli_query($con, $update_qty); 
							
							$_SESSION['qty'] =	$qty;
							
							
						} }
			
			

					
?>

	
<tr colspan="2" style='border: 1px solid black; text-align: center;'>
	<td colspan="2" style='border: 1px solid black; text-align: center; padding-top: 50px;'><input type="hidden" name="remove[]" value="0"/><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>


	<td colspan="2" style='border: 1px solid black; text-align: center;'><p><?php echo $product_title; ?></p><br>
		<img style="border:1px solid black; padding-bottom: 1px;"
		src='admin_area/product_images/<?php echo $product_image; ?>' width='80' height='80'></td>



	<td style='border: 1px solid black; text-align: center;'><input type='text' size='3' name='qty' value="<?php echo $pro_qty;?>"/></td>
		
	<td style='border: 1px solid black; text-align: center;'><?php echo $single_price*$pro_qty.":Euro" ?></td>
</tr> 



<?php }}?>

<tr align="right">
	<td colspan="5" style="padding-right: 0px;"><b>Sub Total</b></td>
	<td style="padding-right: 45px; padding-bottom: 10px;">
		<b><?php PriceCartItems(); ?> :Euro</b>
	</td>
</tr>
				
	<tr style="border: 1px solid black; text-align: center;">
		
		<td colspan="2"><input type="submit" name="remove_cart" value="Remove Item(s)"/></td>

		<td><input type="submit" name="continue" value="Continue Shopping"/></td>

		<td colspan="2"><input type="submit" name="update_cart" value="Update Quantity"/></td>

		<td><input type="submit" name="checkout" value="Check Out"/>
		</td>
	</tr>
			
		
<?php

		global $con;
		$ip = getIp();
			if (isset($_POST['remove_cart'])) {
				try {
					foreach ($_POST['remove'] as $remove_id) {
						if ($remove_id==0){
							echo "<script>window.open('cart.php','_self')";
							}
						$delete_product = "DELETE FROM cart WHERE p_id='$remove_id' AND ip_addr='$ip'";
						$run_delete = mysqli_query($con, $delete_product);
						if ($run_delete) {
						echo "<script>window.open('cart.php','_self')</script>";}
					}
				}
			 
			catch (Exception $e){
				echo"Message:".$e->getMessage();	
				}
			}

			if (isset($_POST['continue'])) {
				echo"<script>window.open('index.php','_self')</script>";
			}
			if (isset($_POST['checkout'])) {
				global $con;
				$ip = getIp();
				$select_product = "SELECT * FROM cart WHERE ip_addr='$ip'";
				$run_select = mysqli_query($con,$select_product);
				$check_run = mysqli_num_rows($run_select);
				if (!$_SESSION['customer_email']) {
					echo"<script>window.open('checkout.php','_self')</script>";
				}
				if ($check_run==0) {
					echo"<script>window.open('customer/customerMyAccount.php','_self')</script>";
				}
				else{
					echo"<script>window.open('checkout.php','_self')</script>";
				}
			}
		
			
?>
				</div><!--products box ends-->
				<?php getCartProds(); ?>	
				<?php getIp(); ?>
</table>

			</form>
				
		</div><!--content area ends-->
		
	</div>
	<!--content wrapper ends-->




		<div id="footer"><!--Footer starts --><h2 style="text-align: center; padding-top: 30px;">&copy; 2017 by www.paddypopeye/php.com</h2></div><!--Footer Ends-->


</div><!--main_wrapper ends-->

</body>
</html>