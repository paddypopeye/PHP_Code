<!DOCTYPE html>

<?php
session_start();
include_once("../functions/functions.php")
?>

<html>
	<head>
		<title>MyOnlineShop</title>
		<link rel="stylesheet" type="text/css" href="../styles/styles.css" media="all">
	</head>

<body>
<!---Main_wrapper starts-->
<div class="main_wrapper" style="color: transparent;">
<!--Header Starts-->
	<div class="header_wrapper">
				<a href="index.php"><img id="logo" src="../images/banner2.jpeg" /></a>
				<a href="index.php"><img id="banner" src="../images/banner.jpeg" /></a>
	</div>
<!--Header Ends-->


	<!--menubar starts-->
			<div class="menubar">
			<ul id="menu">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../all_products.php">All Products</a></li>
<?php
					if(isset($_SESSION['customer_email'])){
						echo"<a href='customerMyAccount.php'>My Account</a>";
					}
					else{
						echo"<a href='checkout.php'>My Account</a>";	
					}
							
					if(!isset($_SESSION['customer_email'])){
						echo"<a href='../customerReg.php'>Sign Up</a>";
					}
					else{
						echo"<a href='customerMyAccount.php'>Sign Up</a>";	
					}
?>
				<li><a href="../cart.php">Shopping Cart</a></li>
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
		<div id="cust_sidebar">
			<!--sidebar title starts-->
			<div id="sidebar_title">Customer Details
			</div><!--sidebar title ends-->	
				<ul id="cats">
				<?php
					global $con;
					$user = $_SESSION['customer_email'];
					$get_user = "SELECT * FROM customers WHERE customer_email='$user'";
					$run_get_user = mysqli_query($con, $get_user);		
					$user_rows = mysqli_fetch_array($run_get_user);
					$user_img = $user_rows['customer_image'];
					$user_name = $user_rows['customer_name'];
					echo "
					<div style='padding-top:15px;'>
					<img src='customer_images/$user_img' width='150' height='150' style='border:5px solid white;' />
					</div>
					";
				?>
					<li><a href="customerMyAccount.php?orders">My Orders</a></li>
					<li><a href="customerMyAccount.php?edit">Edit Account</a></li>
					<li><a href="customerMyAccount.php?passwd">Change Password</a></li>
					<li><a href="customerMyAccount.php?delete">Delete Account</a></li>
					<li><a href="../logout.php">Logout</a></li>
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

				<a href="../cart.php" style="color: orange; font-family: comic;font-weight: bolder; text-decoration: none;">
				Go To Cart</a>&nbsp

				<?php
					if(!isset($_SESSION['customer_email'])){
						echo"<a href='../checkout.php' style='color:red; text-decoration: none;'><b>Login</b></a>";
					}
					else{
						echo"<a href='../logout.php' style='color:red; text-decoration: none;'><b>Logout</b></a>";	
					}
				?>
		</span>
</div>
<!--ShoppingCart ends-->
			
<!--products box starts-->	
	<div id="products_box">
			<?php
			if (!isset($_GET['orders'])) {
				if (!isset($_GET['edit'])) {
					if (!isset($_GET['passwd'])) {
						if (!isset($_GET['delete'])) {
							echo "
		<h1 class='blink_text2' style='color: brown;'>Welcome:</h1><br>
			<h2 style='color: red;'>$user_name</h2><br>
				<b style='color: yellow;'>You can see your order(s) progress by clicking this <a href='customerMyAccount.php?orders'><b>Link</b></a></b>
								";
						}
					}
				}
			}

			if (isset($_GET['edit'])){
				include('editMyAccount.php');
			}

			if (isset($_GET['passwd'])){
				include('passwdMyAccount.php');
			}
			if (isset($_GET['delete'])){
				include('deleteMyAccount.php');
			}
			if (isset($_GET['orders'])){
				include('../admin_area/customerOrders.php');
			}
			?>
		</div>
<!--products box ends-->

				<?php getIp(); ?>
				<?php cart(); ?>
</div>
<!--content area ends-->
		
</div>
<!--content wrapper ends-->

<!--Footer starts -->
<div id="footer">
<h2 style="text-align: center; padding-top: 30px;">&copy; 2017 by www.paddypopeye.com/php</h2>
</div>
<!--Footer Ends-->


</div>
<!--main_wrapper ends-->

	</body>
</html>