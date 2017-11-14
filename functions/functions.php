
<?php
//Connection String

$con = mysqli_connect("localhost","root","","Ecommerce");
	if (mysqli_connect_errno()) {
		echo"
			Failed to connect to the MySQL DB:".mysqli_connect_error();
		}



//getting the categories from the DB for the sidebar
function getCats(){
	global $con;
	$get_cats = "SELECT * FROM categories";
	$run_cats = mysqli_query($con, $get_cats);

	while ($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}


//displaying categories in the selection field
function getCatsSelect(){
	global $con;
	$get_cats = "SELECT * FROM categories";
	$run_cats = mysqli_query($con, $get_cats);

	while ($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		echo "<option value='$cat_id'>$cat_title</option>";
	}
}

//displaying brands in the sidebar
function getBrands(){
	global $con;
	$get_brands = "SELECT * FROM brands";
	$run_brands = mysqli_query($con, $get_brands);
	
	while ($row_brands = mysqli_fetch_array($run_brands)){
		$brand_id = $row_brands['brand_id'];
		$brand_title = $row_brands['brand_title'];

		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}

//displaying brands for the selection field
function getBrandsSelect(){
	global $con;
	$get_brands = "SELECT * FROM brands";
	$run_brands = mysqli_query($con, $get_brands);

	while ($row_brands = mysqli_fetch_array($run_brands)){
		$brand_id = $row_brands['brand_id'];
		$brand_title = $row_brands['brand_title'];

		echo "<option value='$brand_id'>$brand_title</option>";
	}
}


//getting products in the DB and displaying six randomly
function getProds(){
	global $con;
	if (!isset($_GET['cat'])) {
		if (!isset($_GET['brand'])) {


	$get_prods = "SELECT * FROM products ORDER BY RAND() LIMIT 0,6";
	$run_prods = mysqli_query($con, $get_prods);

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
				<img src='admin_area/product_images/$prod_image' width='180' height='180'/>
					
						<p><b>Price: $prod_price euro</b></p>

				<a href='details.php?pro_id=$prod_id' style='float: left;'><button>Details</button></a>
					<a href='index.php?add_cart=$prod_id' style='float: right;'><button>Add to Cart</button></a>
		</div>";
			}
		}
	}
}


//getting and display all products in the DB
function getAllProds(){
	global $con;
	if (!isset($_GET['cat'])) {
		if (!isset($_GET['brand'])) {


	$get_prods = "SELECT * FROM products";
	$run_prods = mysqli_query($con, $get_prods);

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
				<img src='admin_area/product_images/$prod_image' width='180' height='180'/>
					
						<p><b>Price: $prod_price euro</b></p>

				<a href='details.php?pro_id=$prod_id' style='float: left;'><button>Details</button></a>
					<a href='index.php?add_cart=$prod_id' style='float: right;'><button>Add to Cart</button></a>
		</div>	";

			}
		}
	}
}	

// getting and displaying a single selected product and description
function getSingleProd(){

	if (isset($_GET['pro_id'])) {
	
	global $con;
	$pro_id = $_GET['pro_id'];
	$get_prods = "SELECT * FROM products WHERE product_id='$pro_id'";
	$run_prods = mysqli_query($con, $get_prods);

	while($prod_rows = mysqli_fetch_array($run_prods)){
		$prod_title = $prod_rows['product_title'];
		$prod_price = $prod_rows['product_price'];
		$prod_desc = $prod_rows['product_desc'];
		$prod_image = $prod_rows['product_image'];
		$prod_id = $prod_rows['product_id'];
		$prod_keyw = $prod_rows['product_keywords'];

	echo "
		<div id='single_product'>

				<h3>$prod_title</h3>
				<img src='admin_area/product_images/$prod_image' width='280' height='280'/>
						<p>$prod_desc</p>
						<p><b>Price: $prod_price euro</b></p>

				<a href='index.php' style='float:left;'><button>Go Back</button></a>
					<a href='index.php?add_cart=$prod_id' style='float: right; margin-right: 10px;'><button>Add to Cart</button></a>
		</div>";

		}
	}
}



// getting and displaying products in the selected category
function getCategoryProds(){
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
				<h1><a href='index.php' style='float:center;'><button class='blink_text2'><b>Return to the Shop<b></button></a></h1>
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
				<img src='admin_area/product_images/$prod_image' width='180' height='180'/>
					
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
}

// getting and displaying products in the selected brand
function getBrandProds(){
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
				<img src='admin_area/product_images/$prod_image' width='180' height='180'/>
					
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
}

//returning the products that match search query
function getSearchQuery(){
	global $con;
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
				<img src='Ecommerce/admin_area/product_images/$prod_image' width='180' height='180'/>
					
						<p><b>Price: $prod_price euro</b></p>

				<a href='details.php?pro_id=$prod_id' style='float: left;'><button>Details</button></a>
					<a href='index.php?add_cart=$prod_id' style='float: right;'><button>Add to Cart</button></a>
		</div>	";}
			}
		}
	}
}

//function which adds products to the cart
function cart(){

	if (isset($_GET['add_cart'])) {
		global $con;
		$ip = getIp();
		$pro_id = $_GET['add_cart'];
		$check_pro = "SELECT * FROM cart WHERE ip_addr='$ip' AND p_id='$pro_id'";
		$run_query = mysqli_query($con, $check_pro);
		if (mysqli_num_rows($run_query) > 0) {
			$insert_qty = "UPDATE cart SET qty = qty+1 WHERE ip_addr ='$ip' AND p_id = '$pro_id'";
			$run_qty = mysqli_query($con, $insert_qty);

			echo"
				<script>alert('The quantity of this product has been increased by 1 item')</script>
				<script>window.open('index.php','_self')</script>
			";}

		else{
			$insert_cart = "INSERT INTO cart (p_id, ip_addr, qty) VALUES ('$pro_id','$ip', 1)";
			$run_insert = mysqli_query($con, $insert_cart);

			echo
			"
			<script>alert('Product added to your cart')</script>
			<script>window.open('index.php','_self')</script>
			";}
	}
}

function totalCartItems(){
	global $con;
	$total_qty = 0;
	$ip = getIp();
	$get_cart_items = "SELECT * FROM cart WHERE ip_addr = '$ip'";
	$run_get_items = mysqli_query($con, $get_cart_items);

	while($item_qty = mysqli_fetch_array($run_get_items)){
		$items_qtys = array($item_qty['qty']);
		$total_qty_add = array_sum($items_qtys);
		$total_qty += $total_qty_add;
		
	}
	echo"
			$total_qty
		";
}

function PriceCartItems(){
	global $con;
	$final = 0;
	$total_qty = 0;
	$ip = getIp();
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
		$final += $price_sum*$total_qty_add;
		}

	echo"$final";
}
			
	



//getting the ip address of the customer
function getIp() {

	$ip = $_SERVER['REMOTE_ADDR'];
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
	
	return $ip;
}

function getCartProds(){
	global $con;
	if (!isset($_GET['cat'])) {
		if (!isset($_GET['brand'])) {


	$get_prods = "SELECT * FROM cart";
	$run_prods = mysqli_query($con, $get_prods);
	while($prod_rows = mysqli_fetch_array($run_prods)){
		$prod_id = $prod_rows['p_id'];
		$prod_qty = $prod_rows['qty'];
		$get_cart ="SELECT * FROM products WHERE product_id='$prod_id'";
		$run_cart = mysqli_query($con,$get_cart);
		$cart_prods = mysqli_fetch_array($run_cart);
		$prod_image = $cart_prods['product_image'];
		$prod_title = $cart_prods['product_title'];
		$prod_price = $cart_prods['product_price'];

}

				
			}

		}
	}


?> 