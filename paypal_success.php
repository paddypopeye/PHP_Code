<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment Sucessful</title>
</head>
<body>
<h2> Welcome: <?php echo $_SESSION['customer_email']?></h2>
<h2>Your Payment was successful, please return to your account</h2>
><h3>><a href="customer/customerMyAccount.php">Go to Account</a></h3>
</body>
</html>