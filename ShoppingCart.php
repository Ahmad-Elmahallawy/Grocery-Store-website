<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ShoppingCart.css">
	<!-- <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap.css"> --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Main-Stylesheet.css">
  
    <script src="ShoppingCart.js"></script>

    <!-- Font Awesome --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </style>

</head>  

<body>
   <!-- header section -->
    <nav class="nav_bar">
        <a class="nav_logo" href="index.php">
            <img src="Images/Logo.png">
        </a>
  
        <form class="search">
          <input class="search_bar" type="search" placeholder="'Product'">
          <button class="search_button" type="submit">Search</button>
        </form>

        <a class="cart_button" href="ShoppingCart.php">
            <div class="cart_circle">
                <img src="Images/cart-logo.png" />
            </div>
        </a>

    </nav>


<div class="row menu h-100 col-12 nopadding sticky-top">
       
    <div class="col-4 row text-center">
        <div class="dropdown menuText">
            <button class="dropbtn"><img class="dropdown-hamburger"src="Images/hamburger-icon2.jpg" /><p class="nav-aisles">Aisles</p></button>
            <div class="col-3 row dropdown-content">
                <a href="chickenAisle.html">Chicken</a>
                <a href="meatAisle.html">Meat</a>
                <a href="pastaAisle.html">Pasta</a>
                <a href="fruitsAisle.html">Fruits</a>
                <a href="vegetablesAisle.html">Vegetables</a>
            </div>
        </div>
    </div>

    <div class="col-4 row menuText h-100">
        <a href="index.php" style="text-decoration:none; color:white;">Home</a>
    </div>

    <div class="col-4 row menuText h-100">
        <a>Locations</a>
    </div>
      
</div>
<!-- header section -->
  

	<!-- shopping cart section -->
	<div class="cart-page">
		<h1 class="page-title">Your Shopping Cart</h1>
		<a href="linkingAisles.html" id="continue" style="padding-left: 40px">Continue shopping</a>
			<div class="cart">
				<!-- section for the products list  -->
				<div class="cart-products" id="cart-productsID"></div>

				<!-- section for the total price of the products-->
				<div class="cart-price cart-sticky">
					<h2>Cart Summary</h2>
					<p>
						<span>SubTotal</span>
						<span class="subtotal-price">$0</span>
					</p>
					<p>
						<span>Number of Items</span>
						<span class="total-items">0</span>
					</p>
					<p>
						<span>GST</span>
						<span class="gst-price">$0</span>
					</p>
					<p>
						<span>QST</span>
						<span class="qst-price">$0</span>
					</p>
					<p>
						<span>Total Price</span>
						<span class="total-price">$0</span>
					</p>
					<a href="#" id="checkout">Proceed to Checkout</a>
				</div>
			</div>
	</div>

<!-- footer section -->
<div class="col-12 row h-100 nopadding footer">

    <div class="col-4 row footer-heading nopadding about">
        <h2>About Us</h2>
        <a href="#">Our Story</a>
        <a href="#">Blog</a>
        <a href="P7.html">Customers</a>
    
    </div>
    
    <div class="col-4 row footer-heading nopadding contact-form">
        <h2>Customer Service</h2>
        <a href="#">Contact Us</a>
        <a href="#">Terms and Conditions</a>
        <a href="#">Find a Store</a>
        <a href="#">FAQ</a>
    </div>
    <div class="col-4 row footer-heading nopadding social-media">
        <h2>Social Media</h2>
        <a href="#">Instagram</a>
        <a href="#">Facebook</a>
        <a href="#">YouTube</a>
        <a href="#">Twitter</a>
    </div>
    
    
    
    <div class="col-12 row nopadding">
      
        
        <div class="col-2 footer-bottom footer">
            &copy; 2022 poeatry.com 
    
        </div>
        <div class="col-5">
    
        </div>

    </div>
</div>
<!-- footer section -->

</body>
</html>