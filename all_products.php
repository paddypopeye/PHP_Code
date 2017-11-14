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
				<a href="index.php"><img id="logo" src="images/img-developmentbox1.gif" /></a>
				<a href="index.php"><img id="banner" src="images/Point-1.gif"/></a>
			
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

				<a href="cart.php" style="color: orange; font-family: comic;font-weight: bolder; text-decoration: none;">
				Go To Cart</a>&nbsp

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
			
			<div id="products_box">
					<?php getAllProds();?>
					<?php getCategoryProds();?>
					<?php getBrandProds(); ?>
				</div>
		</div><!--content area ends-->
		
	</div>
	<!--content wrapper ends-->




		<div id="footer"><!--Footer starts --><h2 style="text-align: center; padding-top: 30px;">&copy; 2017 by www.paddypopeye.com/php</h2></div><!--Footer Ends-->


</div><!--main_wrapper ends-->

</body>
</html>