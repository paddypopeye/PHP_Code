<!DOCTYPE html>
<?php
session_start();

?>
<html >
<head>
  <meta charset="UTF-8">
  <title>Administrator Login</title>
  
  

  <link rel="stylesheet" href="styles/loginStyle.css" media="all">
  
  <script type="text/javascript" src="styles/index.js"></script>

</head>

<body>
  <div class="login">
<h2 style="color:white; text-align: center;"><?php echo @$_GET['logged_out'];?>
<h2 style="color:white; text-align: center;"><?php echo @$_GET['not_admin'];?>

</h2>
	<h1>Administrator Login</h1>
    <form method="post" action="">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Password" required="required"/>
        <button name="login" type="submit" class="btn btn-primary btn-block btn-large">Login.</button>
    </form>
</div>
  
    <script  type="text/javascript" src="styles/index.js"></script>

</body>
</html>
<?php

include('../functions/functions.php');

if (isset($_POST['login'])) {
    global $con;
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $passwd = mysqli_real_escape_string($con,$_POST['password']);
    $sel_admin = "SELECT * FROM admins WHERE admin_email='$email' AND admin_passwd='$passwd'";
    $run_admin = mysqli_query($con, $sel_admin);
    $check_admin = mysqli_num_rows($run_admin);
    if ($check_admin==0) {
      echo "<script>alert('Password or Email is Wrong Try Again')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      $_SESSION['admin_email'] = $email;
      echo "<script>window.open('index.php?logged_in=logged in','_self')</script>";
    }
  }
?>
