<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="Main-Stylesheet.css">
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
<?php
          echo '<span style="font-size: 20px">'.$_SESSION['username'].'</span>';
?>
        

    

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

<!-- homepage -->
<div class="slogan">
    <h2><i>"To eat or not to eat?"</i></h2>
</div>

<div class="col-12 row h-100 nopadding">
    
    <div class="col row nopadding slider" >
    </div>

</div>
<div class="col-12 row salesrow">
    
    <h3 class="sales">We Have Special Sales!</h3>
    <h3 class="sales">You Do Not Want To Miss it!</h3>

</div>


<div class="divider_Title">

    <a href="linkingAisles.html"><h3>Our Aisles</h3></a>

</div>

<div class="col-12 row h-100 nopadding data ">


    <div class="col-4 row h-100 nopadding email">
        <img src="Images/email.png" alt="email" class="email1">
        <p class="member_text">You will be able to receive emails and get the recent sales and updates about us.</p>
    </div>
    <div class="col-4 row h-100 nopadding account">
        <img src="Images/user.png" alt="user" class="userinfo">
        <h3 class="member nopadding">Are you a member?</h2>
        <a href="Log-in.php" class="login log nopadding">Log in</a>
        <h3 class="member nopadding">or</h3>
        <a href="SignUp.php" class="login signup nopadding">Sign-up</a>
      
    </div>
    <div class="col-4 row h-100 nopadding online">
        <img src="Images/onlineorder.png" alt="online" class="online1">
        <p class="member_text">Be able to make online shopping only by signing up or logging in. No need to leave your house!</p>
    </div>
   
        
    </div>


</div>
<!-- homepage -->

<!-- footer section -->
<div class="col-12 row h-100 nopadding footer">

    <div class="col-4 row footer-heading nopadding about">
        <h2>About Us</h2>
        <a href="#">Our Story</a>
        <a href="#">Blog</a>
        <a href="#">Customers</a>
    
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
        <a href="other.php">Instagram</a>
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

