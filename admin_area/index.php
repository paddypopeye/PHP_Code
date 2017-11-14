<?php

session_start();

if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}


else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Area</title>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css" media="all">
	<link rel="stylesheet" type="text/css" href="styles/styles.css" media="all">
	<h2 style="color: red; text-align: center;"><?php echo "You are logged in as ".$_SESSION['admin_email']?></h2>
</head>
<body>
<!--Main Wrapper starts-->
	<div class="main_wrapper_admin">

		<!--header starts-->
		<div id="header_admin"></div>
		<!--header ends-->

		<!--right starts-->
		<div id="right">

			<h3 style="text-align: center;"><br>Manage Content</h3>
				<a href="index.php?insert_product"><br>Insert New Product</a>
				<a href="index.php?view_products">View all Products</a>
				<a href="index.php?insert_cat">Insert New Category</a>
				<a href="index.php?view_cats">View all Categories</a>
				<a href="index.php?insert_brand">Insert New Brand</a>
				<a href="index.php?view_brands">View all  Brands</a>
				<a href="index.php?view_customers">View Customers</a>
				<a href="index.php?view_orders">View Orders</a>
				<a href="index.php?view_payments">View Payments</a>
				<a href="logout.php"><br>Admin Logout</a>


		</div>
		<!--right ends-->

		<!--left starts-->
		<div id="left">
			
			<?php 
				if (isset($_GET['insert_product'])) {
					include_once('insert_product.php');
				}
				if (isset($_GET['view_products'])) {
					include_once('view_products.php');
				}
				if (isset($_GET['edit_pro'])) {
					include_once('edit_pro.php');
				}
				if (isset($_GET['delete_pro'])) {
					include_once('delete_pro.php');
				}
				if (isset($_GET['insert_cat'])) {
					include_once('insert_category.php');
				}
				if (isset($_GET['view_cats'])) {
					include_once('view_categories.php');
				}
				if (isset($_GET['edit_pro'])) {
					include_once('edit_pro.php');
				}
				if (isset($_GET['delete_cat'])) {
					include_once('delete_cat.php');
				}
				if (isset($_GET['edit_cat'])) {
					include_once('edit_cat.php');
				}
				if (isset($_GET['view_brands'])) {
					include_once('view_brands.php');
				}
				if (isset($_GET['insert_brand'])) {
					include_once('insert_brand.php');
				}
				if (isset($_GET['edit_brand'])) {
					include_once('edit_brand.php');
				}
				if (isset($_GET['delete_brand'])) {
					include_once('delete_brand.php');
				}
				if (isset($_GET['view_customers'])) {
					include_once('view_customers.php');
				}
				if (isset($_GET['edit_cust'])) {
					include_once('editCustomer.php');
				}
				if (isset($_GET['delete_cust'])) {
					include_once('deleteCust.php');
				}
			?>

		</div>
		<!--left ends-->
<div id="footer"><h2 style="text-align: center; padding-top: 30px;">&copy;2017 by www.paddypopeye.com/php</h2></div>
<!--Footer Ends-->
</div>
<!--Main Wrapper ends-->

</body>

</html>
<?php } ?>