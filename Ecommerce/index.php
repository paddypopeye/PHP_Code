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
				<img id="logo" src="images/banner2.jpeg" />
				<img id="banner" src="images/banner.jpeg" />
			
	</div>
	<!--Header Ends-->

	<!--menubar starts-->
			<div class="menubar">
			<ul id="menu">
				<li><a href="#">Home</a></li>
				<li><a href="#">All Products</a></li>
				<li><a href="#">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="#">Shopping Cart</a></li>
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


	<!--content_wrapper starts-->	
	<div class="content_wrapper">
		<!--Content Area Starts-->
		<div id="content_area">Content Area</div><!--content area ends-->
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
	</div>
	<!--content wrapper ends-->




		<div id="footer"><!--Footer starts --><h2 style="text-align: center; padding-top: 30px;">&copy; 2017 by www.EugeneSleator/php.com</h2></div><!--Footer Ends-->


</div><!--main_wrapper ends-->

</body>
</html>