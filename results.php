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
				<span style="float: left; font-size: 16px; padding: 5px; line-height:40px;">Welcome Guest:&nbsp;<b style="color: yellow;">Shopping Cart:&nbsp;</b>Total Items:<b class="blink_text2" style="color: red;"><?php totalCartItems();?></b>&nbsp;Total Price:<b class="blink_text2" style="color: red;"><?php PriceCartItems();?></b>
				<a href="cart.php" style="color: orange; font-family: comic;font-weight: bolder; text-decoration: none;">Go To Cart</a>
				<a href="cart.php" style="color: yellow; font-family: comic;font-weight: bolder; text-decoration: none;">Login</a>
				</span>
			</div><!--ShoppingCart ends-->
			
			<div id="products_box">
					<?php getSearchQuery();?>
					<?php getCategoryProds();?>
					<?php getBrandProds();?>

				</div>
		</div><!--content area ends-->
		
	</div>
	<!--content wrapper ends-->




		<div id="footer"><!--Footer starts --><h2 style="text-align: center; padding-top: 30px;">&copy; 2017 by www.paddypopeye.com/php</h2></div><!--Footer Ends-->


</div><!--main_wrapper ends-->

</body>
</html>