<?php 
	if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{

?>
<table width="795" align="center" bgcolor="#187eae">

	<tr align="center"> 
		<td colspan="8" style="border:3px groove orange;"><h2>View all Orders</h2></td>
	</tr>

	<tr>
		<th style="border:3px groove orange;">Serial Nbr.</th>
		<th style="border:3px groove orange;">Email</th>
		<th style="border:3px groove orange;">Product(s)</th>
		<th style="border:3px groove orange;">Quantity</th>
		<th style="border:3px groove orange;">Invoice Nbr.</th>
		<th style="border:3px groove orange;">Order Status</th>
		<th style="border:3px groove orange;">Order Date</th>
		<th style="border:3px groove orange;">Action</th>
	</tr>


	<?php

		global $con;
		$index = 0;
		include_once('../functions/functions.php');
		$ip = getIp();

		$get_order = "SELECT * FROM orders";
	
		$run_order = mysqli_query($con, $get_order);

		$get_order = "SELECT * FROM orders";
		$run_order = mysqli_query($con, $get_order);
		while ($row_order= mysqli_fetch_array($run_order)){
			$order_status = $row_order['order_status'];
			$order_id = $row_order['order_id'];
			$prod_id = $row_order['prod_id'];
			$cust_id = $row_order['cust_id'];
			$qty = $row_order['qty'];
			$invoice_no = $row_order['invoice_no'];
			$order_date = $row_order['order_date'];
			$order_status = $row_order['order_status'];
			$ip_addr = $row_order['ip_addr'];
			$index ++;

		$get_pro = "SELECT * FROM products WHERE product_id='$prod_id'";
		$run_pro = mysqli_query($con, $get_pro);
		$row_pro = mysqli_fetch_array($run_pro);

		$prod_image = $row_pro['product_image'];
		$pro_title = $row_pro['product_title'];
		$get_cust = "SELECT * FROM customers WHERE customer_id='$cust_id'";

		$run_cust = mysqli_query($con, $get_cust);
		$row_cust = mysqli_fetch_array($run_cust);

		$cust_email = $row_cust['customer_email'];


		
		
	?>

	<tr align="center">
		<td><?php echo $index; ?></td>
		<td><?php echo $cust_email; ?></td>
		<td><?php echo $pro_title; ?><br>
		<img src='/Ecommerce/admin_area/product_images/<?php echo $prod_image;?>' width='50' height='50'></td>
		
		<td><?php echo $qty; ?></td>
		 <td><?php echo $invoice_no; ?></td>
		 <td><?php echo $order_status; ?></td>
		 <td><?php echo $order_date; ?></td>
		 <td><a style="text-decoration: none; font-weight: bold; color: brown;" href=" index.php?confirm_order=<?php echo $order_id;?>">Complete Order</a></td>
	</tr>
	<?php } ?>
</table>
<?php } ?>


