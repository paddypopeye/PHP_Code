<!DOCTYPE html>
<?php
session_start();
include_once("functions/functions.php")

?>
<?php getIp(); 
	cart();?>

<html>
	<head>
		<title>Payment Sucessful</title>
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
		</div>
<!--Sidebar ends-->


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

<!--products box starts-->	
	<div id="products_box">
<?php

	global $con;
	// retreiving the product details
	$final = 0;
	$total_qty = 0;
	$ip = getIp();
	$index  = 0;
	$get_cart_items = "SELECT * FROM cart WHERE ip_addr = '$ip'";
	$run_get_items = mysqli_query($con, $get_cart_items);

	while($item_qty = mysqli_fetch_array($run_get_items)){
		$items_qtys = array($item_qty['qty']);
		$total_qty_add = array_sum($items_qtys);
		
		$prod_id = $item_qty['p_id'];
		$get_price = "SELECT * FROM products WHERE product_id='$prod_id'";
		$run_price = mysqli_query($con,$get_price);
		$return_price = mysqli_fetch_array($run_price);
		$price_arr = array($return_price['product_price']);
		$price_sum = array_sum($price_arr);
		$prods_id = $return_price['product_id'];
		$prod_title = $return_price['product_title'];
		$final += $price_sum*$total_qty_add;}
		$index ++;
		
		// retrieving the product quanity

		$get_qty = "SELECT * FROM cart WHERE p_id='$prod_id'";
		$run_qty = mysqli_query($con, $get_qty);

		$row_qty = mysqli_fetch_array($run_qty);

		$qty = $row_qty['qty'];



		// retreiving the customer details
		global $con;
		$user = $_SESSION['customer_email'];
		$get_cu = "SELECT * FROM customers WHERE customer_email='$user'";
		$run_get_cu = mysqli_query($con, $get_cu);		
		$row_cu = mysqli_fetch_array($run_get_cu);
		$cu_id = $row_cu['customer_id'];
		$cust_name = $row_cu['customer_name'];

		//Returned transaction details from PayPal
		$currency = $_POST["mc_currency"];
		$trx = $_POST['txn_id'];
		$amount = $_POST['mc_gross'];

		$invoice = mt_rand();

		//empting the cart 
		$delete_cart = "DELETE FROM cart WHERE ip_addr='$ip'";
		$run_delete = mysqli_query($con, $delete_cart);

		//Inserting payment details into the DB

		$insert_payments = "INSERT INTO payments (amount, cust_id, prod_id, trx_id, currency, payment_date) VALUES ('$amount', '$cu_id', '$prods_id', '$trx', '$currency', NOW())";
		$run_payments = mysqli_query($con, $insert_payments);

		//Inserting the Order details into the DB
		$insert_orders = "INSERT INTO orders (prod_id, cust_id, qty, invoice_no, order_date, order_status, ip_addr) VALUES ('$prods_id','$cu_id','$qty', '$invoice', NOW(), 'in Progress', '$ip')";
		$run_orders = mysqli_query($con, $insert_orders);

	if ($amount == $final) {
		echo "<h2 style='color: red;'><br><br> Welcome Back:<h2 style='color: black;'>".$_SESSION['customer_email']."</h2></h2>
	<h2 style='color: red;'>Your Payment was successful, please return to your account</h2>
			<h3><br><br><a class='blink_text2' href='customer/customerMyAccount.php' style='color: red; text-decoration: none;'> Return to your Account </a></h3>";
			}

			echo "this is the user".$user;

			require 'PHPMailer.php';

			$mail = new PHPMailer(true);

			// Send mail using Gmail
			if($send_using_gmail){
			    $mail->IsSMTP(); // telling the class to use SMTP
			    $mail->SMTPAuth = true; // enable SMTP authentication
			    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
			    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
			    $mail->Port = 465; // set the SMTP port for the GMAIL server
			    $mail->Username = "****************"; // GMAIL username
			    $mail->Password = "***************"; // GMAIL password
			}

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <sales@MyShop.com>' . "\r\n";
			
			$subject = "Order Details";
			
			$message = "<html> 
			<p>
			
			Hello dear <b style='color:blue;'>$cust_name</b> you have ordered some products on our website Myshop.com, please find your order details, your order will be processed shortly. Thank you!</p>
			
				<table width='600' align='center' bgcolor='#FFCC99' border='2'>
			
					<tr align='center'><td colspan='6'><h2>Your Order Details from onlinetuting.com</h2></td></tr>
					
					<tr align='center'>
						<th><b>S.N</b></th>
						<th><b>Product Name</b></th>
						<th><b>Quantity</b></th>
						<th><b>Paid Amount</th></th>
						<th>Invoice No</th>
					</tr>
					
					<tr align='center'>
						<td>$index</td>
						<td>$prod_title</td>
						<td>$qty</td>
						<td>$amount</td>
						<td>$invoice</td>
					</tr>
			
				</table>
				
				<h3>Please go to your account and see your order details!</h3>
				
				<h2> <a href='http://Localhopst/Ecommerce'>Click here</a> to login to your account</h2>
				
				<h3> Thank you for your order @ - www.MyShop.com</h3>
				
			</html>
			
			";
			
			mail($user,$subject,$message,$headers);

?>

		</div>
<!--products box ends-->	
	</div>
<!--content area ends-->
		
</div>
<!--content wrapper ends-->

<!--Footer starts -->
<div id="footer">
<h2 style="text-align: center; padding-top: 30px;">&copy; 2017 by www.paddypopeye.com/php</h2>
</div>
<!--Footer Ends-->
		</div><!--main_wrapper ends-->
	</body>
</html>
