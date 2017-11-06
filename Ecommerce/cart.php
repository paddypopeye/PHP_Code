<!DOCTYPE html>

<?php
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
				<a href="index.php"><img id="logo" src="images/banner2.jpeg" /></a>
				<a href="index.php"><img id="banner" src="images/banner.jpeg" /></a>
			
	</div>
	<!--Header Ends-->

	<!--menubar starts-->
			<div class="menubar">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="#">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
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

		<div id="sidebar">
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
				<span style="float: left; font-size: 16px; padding: 5px; line-height:40px;">Welcome Guest:&nbsp;<b style="color: yellow;">Shopping Cart:&nbsp;</b>Total Items:<b class="blink_text2" style="color: red;"><?php totalCartItems();?></b>&nbsp;Total Price: <b class="blink_text2" style="color: red;"><?php PriceCartItems();?></b>
				<a href="cart.php" style="color: orange; font-family: comic;font-weight: bolder; text-decoration: none;">Go To Cart</a>
				<a href="cart.php" style="color: yellow; font-family: comic;font-weight: bolder; text-decoration: none;">Login</a>
				</span>
			</div><!--ShoppingCart ends-->
			<!--products box starts-->	
			<div align="center">
				<form style="padding-top: 1px;" action="" method="post" enctype="multipart/form-data">

				<table style="padding-bottom: 30px; border:2px solid black; align-content: center; width: 700px; height:100px; background-color: skyblue;">

				<tr style="border: 5px solid black; text-align: center;">
					<td style="border: 1px solid black; text-align: center;" colspan="7"><h3>Updatye your Cart</h3></td>
				</tr>

				<tr style="border: 1px solid black; text-align: center;">
					<th style="border: 1px solid black; text-align: center;">Remove</th>
					<th style="border: 1px solid black; text-align: center;">Product(s)</th>
					<th style="border: 1px solid black; text-align: center;">Quantity</th>
					<th style="border: 1px solid black; text-align: center;">Total Price:</th>
				</tr>
				<?php getCartProds(); ?>
				<tr style="border: 1px solid black; text-align: center;"align="center">
					<td></td>
					<td></td>
					<td></td>
					<td style="border: 1px solid black; text-align: center;"><b style="color: red;"><?php PriceCartItems();?></b></td>
				</tr>
				<tr style="border: 1px solid black; text-align: center;">
					<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
					<td><input type="submit" name="continue" value="Continue Shopping"></td>
					<td><button><a href="checkout.php" style="text-decoration: none; color: black;"></a>CheckOut</button></td>
				</tr>
			</table>
		</form>
				</div><!--products box ends-->
				<?php cart(); ?>	
				<?php echo @$up_cart = updatecart();?>
				<?php updatecart();?>
				<?php getIp(); ?>
				
		</div><!--content area ends-->
		
	</div>
	<!--content wrapper ends-->




		<div id="footer"><!--Footer starts --><h2 style="text-align: center; padding-top: 30px;">&copy; 2017 by www.EugeneSleator/php.com</h2></div><!--Footer Ends-->


</div><!--main_wrapper ends-->

</body>
</html>