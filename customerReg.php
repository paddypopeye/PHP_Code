<!DOCTYPE html>

<?php
session_start();
include_once("functions/functions.php")

?>



<html>
	<head>
		<title>MyOnlineShop</title>
		<link rel="stylesheet" type="text/css" href="styles/styles.css" media="all">
		<link rel='stylesheet' href='styles/text_editor/css/widgEditor.css'/>
			<script src='styles/text_editor/scripts/widgEditor.js'></script>
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
						
						echo"<a href='customerMyAccount.php'>My Account</a>";
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
						echo"<a href='index.php'>Sign Up</a>";	
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
 
			
			
		</div><!--Sidebar ends-->


	<!--content_wrapper starts-->	
	<div class="content_wrapper">
		<!--Content Area Starts-->
		<div id="content_area_reg">
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
			
			
<form method="post" action="customerReg.php" enctype="multipart/form-data">
	<table align="center" width="750">
			<tr style="text-align: center;">

				<td colspan="6"><h2>Create an Account</h2>
				</td>
			</tr>

			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Name:</b></td>
				<td><input type="text" name="cust_name" required /></td>
			</tr>
			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Email:</b></td>
				<td><input type="text" name="cust_email" required/></td>
			</tr>
			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Password:</b></td>
				<td><input type="password" name="cust_pass" required/></td>
			</tr>

			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Image:</b></td>
				<td><input type="file" name="cust_img" required/></td>
			</tr>			
			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Country:</b></td>
				<td><select style="width: 250px;" name="cust_ctry" required="required">
						<option selected="true" disabled="selected">Choose a Country</option>
						<option value="ISO 3166-2:AF">Afghanistan</option>
						<option value="ISO 3166-2:AX">Åland Islands</option>
						<option value="ISO 3166-2:AL">Albania</option>
						<option value="ISO 3166-2:DZ">Algeria</option>
						<option value="ISO 3166-2:AS">American Samoa</option>
						<option value="ISO 3166-2:AD">Andorra</option>
						<option value="ISO 3166-2:AO">Angola</option>
						<option value="ISO 3166-2:AI">Anguilla</option>
						<option value="ISO 3166-2:AQ">Antarctica</option>
						<option value="ISO 3166-2:AG">Antigua and Barbuda</option>
						<option value="ISO 3166-2:AR">Argentina</option>
						<option value="ISO 3166-2:AM">Armenia</option>
						<option value="ISO 3166-2:AW">Aruba</option>
						<option value="ISO 3166-2:AU">Australia</option>
						<option value="ISO 3166-2:AT">Austria</option>
						<option value="ISO 3166-2:AZ">Azerbaijan</option>
						<option value="ISO 3166-2:BS">Bahamas</option>
						<option value="ISO 3166-2:BH">Bahrain</option>
						<option value="ISO 3166-2:BD">Bangladesh</option>
						<option value="ISO 3166-2:BB">Barbados</option>
						<option value="ISO 3166-2:BY">Belarus</option>
						<option value="ISO 3166-2:BE">Belgium</option>
						<option value="ISO 3166-2:BZ">Belize</option>
						<option value="ISO 3166-2:BJ">Benin</option>
						<option value="ISO 3166-2:BM">Bermuda</option>
						<option value="ISO 3166-2:BT">Bhutan</option>
						<option value="ISO 3166-2:BO">Bolivia, Plurinational State of</option>
						<option value="ISO 3166-2:BQ">Bonaire, Sint Eustatius and Saba</option>
						<option value="ISO 3166-2:BA">Bosnia and Herzegovina</option>
						<option value="ISO 3166-2:BW">Botswana</option>
						<option value="ISO 3166-2:BV">Bouvet Island</option>
						<option value="ISO 3166-2:BR">Brazil</option>
						<option value="ISO 3166-2:IO">British Indian Ocean Territory</option>
						<option value="ISO 3166-2:BN">Brunei Darussalam</option>
						<option value="ISO 3166-2:BG">Bulgaria</option>
						<option value="ISO 3166-2:BF">Burkina Faso</option>
						<option value="ISO 3166-2:BI">Burundi</option>
						<option value="ISO 3166-2:KH">Cambodia</option>
						<option value="ISO 3166-2:CM">Cameroon</option>
						<option value="ISO 3166-2:CA">Canada</option>
						<option value="ISO 3166-2:CV">Cape Verde</option>
						<option value="ISO 3166-2:KY">Cayman Islands</option>
						<option value="ISO 3166-2:CF">Central African Republic</option>
						<option value="ISO 3166-2:TD">Chad</option>
						<option value="ISO 3166-2:CL">Chile</option>
						<option value="ISO 3166-2:CN">China</option>
						<option value="ISO 3166-2:CX">Christmas Island</option>
						<option value="ISO 3166-2:CC">Cocos (Keeling) Islands</option>
						<option value="ISO 3166-2:CO">Colombia</option>
						<option value="ISO 3166-2:KM">Comoros</option>
						<option value="ISO 3166-2:CG">Congo</option>
						<option value="ISO 3166-2:CD">Congo, the Democratic Republic of the</option>
						<option value="ISO 3166-2:CK">Cook Islands</option>
						<option value="ISO 3166-2:CR">Costa Rica</option>
						<option value="ISO 3166-2:CI">Côte d'Ivoire</option>
						<option value="ISO 3166-2:HR">Croatia</option>
						<option value="ISO 3166-2:CU">Cuba</option>
						<option value="ISO 3166-2:CW">Curaçao</option>
						<option value="ISO 3166-2:CY">Cyprus</option>
						<option value="ISO 3166-2:CZ">Czech Republic</option>
						<option value="ISO 3166-2:DK">Denmark</option>
						<option value="ISO 3166-2:DJ">Djibouti</option>
						<option value="ISO 3166-2:DM">Dominica</option>
						<option value="ISO 3166-2:DO">Dominican Republic</option>
						<option value="ISO 3166-2:EC">Ecuador</option>
						<option value="ISO 3166-2:EG">Egypt</option>
						<option value="ISO 3166-2:SV">El Salvador</option>
						<option value="ISO 3166-2:GQ">Equatorial Guinea</option>
						<option value="ISO 3166-2:ER">Eritrea</option>
						<option value="ISO 3166-2:EE">Estonia</option>
						<option value="ISO 3166-2:ET">Ethiopia</option>
						<option value="ISO 3166-2:FK">Falkland Islands (Malvinas)</option>
						<option value="ISO 3166-2:FO">Faroe Islands</option>
						<option value="ISO 3166-2:FJ">Fiji</option>
						<option value="ISO 3166-2:FI">Finland</option>
						<option value="ISO 3166-2:FR">France</option>
						<option value="ISO 3166-2:GF">French Guiana</option>
						<option value="ISO 3166-2:PF">French Polynesia</option>
						<option value="ISO 3166-2:TF">French Southern Territories</option>
						<option value="ISO 3166-2:GA">Gabon</option>
						<option value="ISO 3166-2:GM">Gambia</option>
						<option value="ISO 3166-2:GE">Georgia</option>
						<option value="ISO 3166-2:DE">Germany</option>
						<option value="ISO 3166-2:GH">Ghana</option>
						<option value="ISO 3166-2:GI">Gibraltar</option>
						<option value="ISO 3166-2:GR">Greece</option>
						<option value="ISO 3166-2:GL">Greenland</option>
						<option value="ISO 3166-2:GD">Grenada</option>
						<option value="ISO 3166-2:GP">Guadeloupe</option>
						<option value="ISO 3166-2:GU">Guam</option>
						<option value="ISO 3166-2:GT">Guatemala</option>
						<option value="ISO 3166-2:GG">Guernsey</option>
						<option value="ISO 3166-2:GN">Guinea</option>
						<option value="ISO 3166-2:GW">Guinea-Bissau</option>
						<option value="ISO 3166-2:GY">Guyana</option>
						<option value="ISO 3166-2:HT">Haiti</option>
						<option value="ISO 3166-2:HM">Heard Island and McDonald Islands</option>
						<option value="ISO 3166-2:VA">Holy See (Vatican City State)</option>
						<option value="ISO 3166-2:HN">Honduras</option>
						<option value="ISO 3166-2:HK">Hong Kong</option>
						<option value="ISO 3166-2:HU">Hungary</option>
						<option value="ISO 3166-2:IS">Iceland</option>
						<option value="ISO 3166-2:IN">India</option>
						<option value="ISO 3166-2:ID">Indonesia</option>
						<option value="ISO 3166-2:IR">Iran, Islamic Republic of</option>
						<option value="ISO 3166-2:IQ">Iraq</option>
						<option value="ISO 3166-2:IE">Ireland</option>
						<option value="ISO 3166-2:IM">Isle of Man</option>
						<option value="ISO 3166-2:IL">Israel</option>
						<option value="ISO 3166-2:IT">Italy</option>
						<option value="ISO 3166-2:JM">Jamaica</option>
						<option value="ISO 3166-2:JP">Japan</option>
						<option value="ISO 3166-2:JE">Jersey</option>
						<option value="ISO 3166-2:JO">Jordan</option>
						<option value="ISO 3166-2:KZ">Kazakhstan</option>
						<option value="ISO 3166-2:KE">Kenya</option>
						<option value="ISO 3166-2:KI">Kiribati</option>
						<option value="ISO 3166-2:KP">Korea, Democratic People's Republic of</option>
						<option value="ISO 3166-2:KR">Korea, Republic of</option>
						<option value="ISO 3166-2:KW">Kuwait</option>
						<option value="ISO 3166-2:KG">Kyrgyzstan</option>
						<option value="ISO 3166-2:LA">Lao People's Democratic Republic</option>
						<option value="ISO 3166-2:LV">Latvia</option>
						<option value="ISO 3166-2:LB">Lebanon</option>
						<option value="ISO 3166-2:LS">Lesotho</option>
						<option value="ISO 3166-2:LR">Liberia</option>
						<option value="ISO 3166-2:LY">Libya</option>
						<option value="ISO 3166-2:LI">Liechtenstein</option>
						<option value="ISO 3166-2:LT">Lithuania</option>
						<option value="ISO 3166-2:LU">Luxembourg</option>
						<option value="ISO 3166-2:MO">Macao</option>
						<option value="ISO 3166-2:MK">Macedonia, the former Yugoslav Republic of</option>
						<option value="ISO 3166-2:MG">Madagascar</option>
						<option value="ISO 3166-2:MW">Malawi</option>
						<option value="ISO 3166-2:MY">Malaysia</option>
						<option value="ISO 3166-2:MV">Maldives</option>
						<option value="ISO 3166-2:ML">Mali</option>
						<option value="ISO 3166-2:MT">Malta</option>
						<option value="ISO 3166-2:MH">Marshall Islands</option>
						<option value="ISO 3166-2:MQ">Martinique</option>
						<option value="ISO 3166-2:MR">Mauritania</option>
						<option value="ISO 3166-2:MU">Mauritius</option>
						<option value="ISO 3166-2:YT">Mayotte</option>
						<option value="ISO 3166-2:MX">Mexico</option>
						<option value="ISO 3166-2:FM">Micronesia, Federated States of</option>
						<option value="ISO 3166-2:MD">Moldova, Republic of</option>
						<option value="ISO 3166-2:MC">Monaco</option>
						<option value="ISO 3166-2:MN">Mongolia</option>
						<option value="ISO 3166-2:ME">Montenegro</option>
						<option value="ISO 3166-2:MS">Montserrat</option>
						<option value="ISO 3166-2:MA">Morocco</option>
						<option value="ISO 3166-2:MZ">Mozambique</option>
						<option value="ISO 3166-2:MM">Myanmar</option>
						<option value="ISO 3166-2:NA">Namibia</option>
						<option value="ISO 3166-2:NR">Nauru</option>
						<option value="ISO 3166-2:NP">Nepal</option>
						<option value="ISO 3166-2:NL">Netherlands</option>
						<option value="ISO 3166-2:NC">New Caledonia</option>
						<option value="ISO 3166-2:NZ">New Zealand</option>
						<option value="ISO 3166-2:NI">Nicaragua</option>
						<option value="ISO 3166-2:NE">Niger</option>
						<option value="ISO 3166-2:NG">Nigeria</option>
						<option value="ISO 3166-2:NU">Niue</option>
						<option value="ISO 3166-2:NF">Norfolk Island</option>
						<option value="ISO 3166-2:MP">Northern Mariana Islands</option>
						<option value="ISO 3166-2:NO">Norway</option>
						<option value="ISO 3166-2:OM">Oman</option>
						<option value="ISO 3166-2:PK">Pakistan</option>
						<option value="ISO 3166-2:PW">Palau</option>
						<option value="ISO 3166-2:PS">Palestinian Territory, Occupied</option>
						<option value="ISO 3166-2:PA">Panama</option>
						<option value="ISO 3166-2:PG">Papua New Guinea</option>
						<option value="ISO 3166-2:PY">Paraguay</option>
						<option value="ISO 3166-2:PE">Peru</option>
						<option value="ISO 3166-2:PH">Philippines</option>
						<option value="ISO 3166-2:PN">Pitcairn</option>
						<option value="ISO 3166-2:PL">Poland</option>
						<option value="ISO 3166-2:PT">Portugal</option>
						<option value="ISO 3166-2:PR">Puerto Rico</option>
						<option value="ISO 3166-2:QA">Qatar</option>
						<option value="ISO 3166-2:RE">Réunion</option>
						<option value="ISO 3166-2:RO">Romania</option>
						<option value="ISO 3166-2:RU">Russian Federation</option>
						<option value="ISO 3166-2:RW">Rwanda</option>
						<option value="ISO 3166-2:BL">Saint Barthélemy</option>
						<option value="ISO 3166-2:SH">Saint Helena, Ascension and Tristan da Cunha</option>
						<option value="ISO 3166-2:KN">Saint Kitts and Nevis</option>
						<option value="ISO 3166-2:LC">Saint Lucia</option>
						<option value="ISO 3166-2:MF">Saint Martin (French part)</option>
						<option value="ISO 3166-2:PM">Saint Pierre and Miquelon</option>
						<option value="ISO 3166-2:VC">Saint Vincent and the Grenadines</option>
						<option value="ISO 3166-2:WS">Samoa</option>
						<option value="ISO 3166-2:SM">San Marino</option>
						<option value="ISO 3166-2:ST">Sao Tome and Principe</option>
						<option value="ISO 3166-2:SA">Saudi Arabia</option>
						<option value="ISO 3166-2:SN">Senegal</option>
						<option value="ISO 3166-2:RS">Serbia</option>
						<option value="ISO 3166-2:SC">Seychelles</option>
						<option value="ISO 3166-2:SL">Sierra Leone</option>
						<option value="ISO 3166-2:SG">Singapore</option>
						<option value="ISO 3166-2:SX">Sint Maarten (Dutch part)</option>
						<option value="ISO 3166-2:SK">Slovakia</option>
						<option value="ISO 3166-2:SI">Slovenia</option>
						<option value="ISO 3166-2:SB">Solomon Islands</option>
						<option value="ISO 3166-2:SO">Somalia</option>
						<option value="ISO 3166-2:ZA">South Africa</option>
						<option value="ISO 3166-2:GS">South Georgia and the South Sandwich Islands</option>
						<option value="ISO 3166-2:SS">South Sudan</option>
						<option value="ISO 3166-2:ES">Spain</option>
						<option value="ISO 3166-2:LK">Sri Lanka</option>
						<option value="ISO 3166-2:SD">Sudan</option>
						<option value="ISO 3166-2:SR">Suriname</option>
						<option value="ISO 3166-2:SJ">Svalbard and Jan Mayen</option>
						<option value="ISO 3166-2:SZ">Swaziland</option>
						<option value="ISO 3166-2:SE">Sweden</option>
						<option value="ISO 3166-2:CH">Switzerland</option>
						<option value="ISO 3166-2:SY">Syrian Arab Republic</option>
						<option value="ISO 3166-2:TW">Taiwan, Province of China</option>
						<option value="ISO 3166-2:TJ">Tajikistan</option>
						<option value="ISO 3166-2:TZ">Tanzania, United Republic of</option>
						<option value="ISO 3166-2:TH">Thailand</option>
						<option value="ISO 3166-2:TL">Timor-Leste</option>
						<option value="ISO 3166-2:TG">Togo</option>
						<option value="ISO 3166-2:TK">Tokelau</option>
						<option value="ISO 3166-2:TO">Tonga</option>
						<option value="ISO 3166-2:TT">Trinidad and Tobago</option>
						<option value="ISO 3166-2:TN">Tunisia</option>
						<option value="ISO 3166-2:TR">Turkey</option>
						<option value="ISO 3166-2:TM">Turkmenistan</option>
						<option value="ISO 3166-2:TC">Turks and Caicos Islands</option>
						<option value="ISO 3166-2:TV">Tuvalu</option>
						<option value="ISO 3166-2:UG">Uganda</option>
						<option value="ISO 3166-2:UA">Ukraine</option>
						<option value="ISO 3166-2:AE">United Arab Emirates</option>
						<option value="ISO 3166-2:GB">United Kingdom</option>
						<option value="ISO 3166-2:US">United States</option>
						<option value="ISO 3166-2:UM">United States Minor Outlying Islands</option>
						<option value="ISO 3166-2:UY">Uruguay</option>
						<option value="ISO 3166-2:UZ">Uzbekistan</option>
						<option value="ISO 3166-2:VU">Vanuatu</option>
						<option value="ISO 3166-2:VE">Venezuela, Bolivarian Republic of</option>
						<option value="ISO 3166-2:VN">Viet Nam</option>
						<option value="ISO 3166-2:VG">Virgin Islands, British</option>
						<option value="ISO 3166-2:VI">Virgin Islands, U.S.</option>
						<option value="ISO 3166-2:WF">Wallis and Futuna</option>
						<option value="ISO 3166-2:EH">Western Sahara</option>
						<option value="ISO 3166-2:YE">Yemen</option>
						<option value="ISO 3166-2:ZM">Zambia</option>
						<option value="ISO 3166-2:ZW">Zimbabwe</option></select></td>
					</tr>
		<tr>
			<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer City:</b></td>
			<td><input type="text" name="cust_city" required/></td>
		</tr>

			<tr>
				<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Contact:</b></td>
				<td><input type="text" name="cust_cont" required/></td>
			</tr>
			
		<tr>
			<td align="right"><b style="color: black; font-weight: bolder; font-size: 19px;">Customer Address:</b></td>
			<td><textarea required="required" name="cust_addr" cols="35" rows="10"></textarea>
			</td>
		</tr>

		<tr align="center">
			<td colspan="6" align="center"><input type="submit" name="cust_acc" value="Create Account"/></td>
		</tr>
	</table>
</form>
				
<?php getIp(); ?>
<?php cart(); ?>

</div><!--content area ends-->
		
</div>
<!--content wrapper ends-->



<!--Footer starts -->
<div id="footer">
	<h2 style="text-align: center; padding-top: 30px;">&copy; 2017 by www.paddypopeye/php.com</h2>
</div>
<!--Footer Ends-->


		</div><!--main_wrapper ends-->
	</body>
</html>


<?php
		$con = mysqli_connect("localhost","root","","Ecommerce");
	if (mysqli_connect_errno()) {
		echo"
			Failed to connect to the MySQL DB:".mysqli_connect_error();
		}

	if (isset($_POST['cust_acc'])) {
		global $con;
		$ip = getIP();
		$cust_name = $_POST['cust_name'];
		$cust_email = $_POST['cust_email'];
		$cust_pass = $_POST['cust_pass'];
		$cust_image = $_FILES['cust_img']['name'];
		$cust_image_tmp = $_FILES['cust_img']['tmp_name'];
		$cust_ctry = $_POST['cust_ctry'];
		$cust_city = $_POST['cust_city'];
		$cust_contact = $_POST['cust_cont'];
		$cust_addr = $_POST['cust_addr'];

		
		$check_email = "SELECT * FROM customers WHERE customer_email='$cust_email'";
		$run_check_email = mysqli_query($con, $check_email);
		$check_rows = mysqli_fetch_array($run_check_email);
		$checked_email = $check_rows['customer_email'];
		
		if ($checked_email==$cust_email){
			echo "
				<script>alert('User Already Exists with submitted Email')</script>";
			echo "<script>window.open('checkout.php','_self')</script>
			";
			
		}
		else{
		move_uploaded_file($cust_image_tmp,"customer/customer_images/$cust_image");
		$insert_cust = "INSERT INTO customers(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address) 
VALUES('$ip','$cust_name','$cust_email','$cust_pass','$cust_ctry','$cust_city','$cust_contact','$cust_image','$cust_addr')";

		$run_insert = mysqli_query($con, $insert_cust);

	

		$get_cart = "SELECT * FROM cart WHERE ip_addr='$ip'";
		$run_cart = mysqli_query($con,$get_cart);
		$check = mysqli_num_rows($run_cart);
		if ($check==0) {

		$_SESSION['customer_email']=$cust_email;
		echo"<script>alert('Registration Successful..!!')</script>";
		echo"<script>window.open('customer/customerMyAccount.php','_self')</script>";}
		else{

		$_SESSION['customer_email']=$cust_email;
		echo"<script>alert('Registration Successful..!!')</script>";
		echo"<script>window.open('checkout.php','_self')</script>";}
	}
}
?>