<?php 
	if(!isset($_SESSION['admin_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";}
	

else{

?>
<table width="795" align="center" bgcolor="#187eae">

	<tr align="center"> 
		<td colspan="8" style="border:3px groove orange;"><h2>View all Payments</h2></td>
	</tr>

	<tr>
		<th style="border:3px groove orange;">Serial Nbr.</th>
		<th style="border:3px groove orange;">Email</th>
		<th style="border:3px groove orange;">Product(s)</th>
		<th style="border:3px groove orange;">Amount</th>
		<th style="border:3px groove orange;">Transaction ID</th>
		<th style="border:3px groove orange;">Order Date</th>
		
	</tr>


	<?php

		global $con;
		$index = 0;
		include_once('../functions/functions.php');
		$ip = getIp();

		$get_payments = "SELECT * FROM payments";
	
		$run_payments = mysqli_query($con, $get_payments);

		$get_payments = "SELECT * FROM payments";
		$run_payments = mysqli_query($con, $get_payments);
		while ($row_payments= mysqli_fetch_array($run_payments)){
			$paym_id = $row_payments['paym_id'];
			$amount= $row_payments['amount'];
			$cust_id = $row_payments['cust_id'];
			$prod_id = $row_payments['prod_id'];
			$trx_id = $row_payments['trx_id'];
			$currency = $row_payments['currency'];
			$payment_date = $row_payments['payment_date'];
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
		<img src='/Ecommerce/admin_area/product_images/<?php echo $prod_image;?>' width='50' height='50'>
		</td>
		
		<td><?php echo $amount; ?>
		 <td><?php echo $trx_id; ?></td>
		 <td><?php echo $payment_date; ?></td>
		 
	</tr>
	<?php } ?>
</table>
<?php } ?>