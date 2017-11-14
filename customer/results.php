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
<div class="main_wrapper">



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
						echo"<a href='../checkout.php'>My Account</a>";	
					}
?>
<?php
					if(!isset($_SESSION['customer_email'])){
						
						echo"<a href='customerReg.php'>Sign Up</a>";
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
			</div><!--ShoppingCart ends-->
			
			<div id="products_box">
	<?php global $con;
	if (!isset($_GET['cat'])) {
		if (!isset($_GET['brand'])) {
			if (isset($_GET['search'])) {
			$keywords = $_GET['user_query'];
			$get_prods = "SELECT * FROM products WHERE product_keywords LIKE '%$keywords%'";

			$run_prods = mysqli_query($con, $get_prods);
			$count_results = mysqli_num_rows($run_prods);

		if ($count_results==0) {
			echo"
				<h1 class='blink_text'>
			</br>	
				<p>There were no products found with the keywords: </p>
					<p>\"  $keywords  \"<p></br>
						<p>Please Try Searching again...</p>
							<p>Or Click the Button Below to Return..</p></br>
			</h1></br>
				
				<h1><a href='index.php' style='float:center;'><button class='blink_text2'><b>Return to the Shop</b></button></a></h1>
		";
	}

	while($prod_rows = mysqli_fetch_array($run_prods)){
		$prod_title = $prod_rows['product_title'];
		$prod_catergory = $prod_rows['product_cat'];
		$prod_brand = $prod_rows['product_brand'];
		$prod_price = $prod_rows['product_price'];
		$prod_desc = $prod_rows['product_desc'];
		$prod_image = $prod_rows['product_image'];
		$prod_id = $prod_rows['product_id'];

	echo "
		<div id='single_product'>

				<h3>$prod_title</h3>
				<img src='../admin_area/product_images/$prod_image' width='180' height='180'/>
					
						<p><b>Price: $prod_price euro</b></p>

				<a href='details.php?pro_id=$prod_id' style='float: left;'><button>Details</button></a>
					<a href='../index.php?add_cart=$prod_id' style='float: right;'><button>Add to Cart</button></a>
		</div>	";}
			}
		}
	}

global $con;
	if (isset($_GET['cat'])) {

	$cat_id = $_GET['cat'];
	$get_prods = "SELECT * FROM products WHERE product_cat='$cat_id'";
	$run_prods = mysqli_query($con, $get_prods);
	$count_prods = mysqli_num_rows($run_prods);

	if ($count_prods==0) {
		echo"
			
			<h1 class='blink_text'>
				<p>There are no products for this </p></b>
						<p>category!!<p></h1>
				<h1><a href='../index.php' style='float:center;'><button class='blink_text2'><b>Return to the Shop<b></button></a></h1>
		";
	}

	while($prod_rows = mysqli_fetch_array($run_prods)){
		$prod_title = $prod_rows['product_title'];
		$prod_catergory = $prod_rows['product_cat'];
		$prod_brand = $prod_rows['product_brand'];
		$prod_price = $prod_rows['product_price'];
		$prod_desc = $prod_rows['product_desc'];
		$prod_image = $prod_rows['product_image'];
		$prod_id = $prod_rows['product_id'];

	echo "
		<div id='single_product'>


				<h3>$prod_title</h3>
				<img src='../admin_area/product_images/$prod_image' width='180' height='180'/>
					
						<p><b>Price: $prod_price euro</b></p>

				<a href='details.php?pro_id=$prod_id' style='float: left;'><button>Details</button></a>
					<a href='index.php?add_cart=$prod_id' style='float: right;'><button>Add to Cart</button></a>
		</div>";
			}
		if ($count_prods > 0) {
			# code...
		
		echo"<h1 style='padding-top:100px; float:center;'><a href='index.php' style='float:center; padding-bottom: 510px;'><button class='blink_text2'><b>Return to the Shop</b></button></a></h1>";
		}
	}

		global $con;
	
		if (isset($_GET['brand'])) {

	$brand_id = $_GET['brand'];
	$get_prods = "SELECT * FROM products WHERE  product_brand='$brand_id'";
	$run_prods = mysqli_query($con, $get_prods);
	$count_prods = mysqli_num_rows($run_prods);

	if ($count_prods==0) {
		echo"
			
			<h1 class='blink_text'>
				<p>..There are no products for this </p></b>
						<p>brand..!!<p></h1>
				<h1><a href='../index.php' style='float:center;'><button class='blink_text2'><b>Return to the Shop</b></button></a></h1>
		";
	}

	while($prod_rows = mysqli_fetch_array($run_prods)){
		$prod_title = $prod_rows['product_title'];
		$prod_catergory = $prod_rows['product_cat'];
		$prod_brand = $prod_rows['product_brand'];
		$prod_price = $prod_rows['product_price'];
		$prod_desc = $prod_rows['product_desc'];
		$prod_image = $prod_rows['product_image'];
		$prod_id = $prod_rows['product_id'];

	echo "
				<div id='single_product'>

				<h3>$prod_title</h3>
				<img src='../admin_area/product_images/$prod_image' width='180' height='180'/>
					
						<p><b>Price: $prod_price euro</b></p>

				<a href='.../details.php?pro_id=$prod_id' style='float: left;'><button>Details</button></a>
					<a href='../index.php?add_cart=$prod_id' style='float: right;'><button>Add to Cart</button></a>
		</div>	";
		}
			if ($count_prods > 0) {
			# code...
			echo"<h1 style='padding-top:100px; float:center;'><a href='../index.php' style='float:center; padding-bottom: 510px;'><button class='blink_text2'><b>Return to the Shop</b></button></a></h1>";
		}
	}
?>

				</div>
		</div><!--content area ends-->
		
	</div>
	<!--content wrapper ends-->




		<div id="footer"><!--Footer starts --><h2 style="text-align: center; padding-top: 30px;">&copy; 2017 by www.paddypopeye.com/php</h2></div><!--Footer Ends-->


</div><!--main_wrapper ends-->

</body>
</html>