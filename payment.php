<div>
	<h2 style="float: center; padding-right: 10px;">Pay with PayPal</h2><br><br><br>	
	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="testbusinessnew@myshop.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="Hot Sauce-12oz. Bottle">
  <input type="hidden" name="amount" value="5.95">
  <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="return" value="http://localhost.myshop.com/Ecommerce/paypal_success.php">
  <input type="hidden" name="return_cancel" value="http://localhost.myshop.com/Ecommerce/paypal_cancel.php">

  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0" width="600" height="" 
  src="images/PayPal.jpeg"
  alt="Buy Now" >
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>

</body>





</div>