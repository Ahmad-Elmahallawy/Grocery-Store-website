<?php

if (isset($_POST['insert']))
{
    $xml = new DomDocument("1.0", "UTF-8");
    $xml->load('products.xml');

    $pimage = 'Images/minced-beef.jpg';
    $pname = 'Minced Beef';
    $pquantity = $_POST['p-quantity'];
    $pprice = 7.00;

    $rootTag = $xml->getElementsByTagName("root")->item(0);

    $infoTag = $xml->createElement("info");
        $imgTag = $xml->createElement("img", $pimage);
        $nameTag = $xml->createElement("name", $pname);
        $priceTag = $xml->createElement("price", $pprice);
        $quantityTag = $xml->createElement("quantity", $pquantity);

        $infoTag->appendChild($imgTag);
        $infoTag->appendChild($nameTag);
        $infoTag->appendChild($priceTag);
        $infoTag->appendChild($quantityTag);

    $rootTag->appendChild($infoTag);
    $xml->save('products.xml');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../Main-Stylesheet.css">
    <link rel="stylesheet" type="text/css" href="../AislesDesign.css">
    <link rel="stylesheet" type="text/css" href="ProductPages.css">
  <!-- Font Awesome --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    #more {display: none;}
    </style>
    <script src="../productPages.js" async></script>


</head>

<body>
<!-- header section -->
    <nav class="nav_bar">
        <a class="nav_logo" href="../index.php">
            <img src="../Images/Logo.png">
        </a>
  
        <form class="search">
          <input class="search_bar" type="search" placeholder="'Product'">
          <button class="search_button" type="submit">Search</button>
        </form>

        <a class="cart_button" href="../ShoppingCart.php">
            <div class="cart_circle">
                <img src="../Images/cart-logo.png" />
            </div>
        </a>

    </nav>

<div class="row menu h-100 col-12 nopadding sticky-top">
       
    <div class="col-4 row text-center">
        <div class="dropdown menuText">
            <button class="dropbtn"><img class="dropdown-hamburger"src="../Images/hamburger-icon2.jpg" /><p class="nav-aisles">Aisles</p></button>
            <div class="col-3 row dropdown-content">
                <a href="../chickenAisle.html">Chicken</a>
                <a href="../meatAisle.html">Meat</a>
                <a href="../pastaAisle.html">Pasta</a>
                <a href="../fruitsAisle.html">Fruits</a>
                <a href="../vegetablesAisle.html">Vegetables</a>
            </div>
        </div>
    </div>

    <div class="col-4 row menuText h-100">
        <a href="../index.php" style="text-decoration:none; color:white;">Home</a>
    </div>

    <div class="col-4 row menuText h-100">
        <a>Locations</a>
    </div>
      
</div>

<!--   <ul class="aisleList">
            <h3 class="list-gap">Categories</h3>
            <a href="../meatAisle.html" class="href-aisles"><li class="aisleElements">Meat</li></a>
            <a href="../chickenAisle.html" class="href-aisles"><li class="aisleElements">Chicken</li></a>
            <a href="../fruitsAisle.html" class="href-aisles"><li class="aisleElements">Fruits</li></a>
            <a href="../vegetablesAisle.html" class="href-aisles"><li class="aisleElements">Vegetables</li></a>
            <a href="../pastaAisle.html" class="href-aisles"><li class="aisleElements">Pasta</li></a>
        </ul> -->
    
      <form method = "POST" action = "mincedbeefProduct.php">
        <div class="product-border">
            <img class="images" name = "p-img" src="../Images/minced-beef.jpg"
            alt="Image of minced beef">
            <div class="display">
                <h3 class="product-name-minced" name = "p-name">Minced Beef</h3>
                <div class="moredescription_contain">
                <p class="product-description">1 pack (approx. 450g)<span id="dots">...</span><span id="more">. Mince is made by finely chopping meat trimmings with an electric mincer. Easy to make meat balls from them and many other dishes! They can be stored in the freezer for long time.</span></p>
                </div>
                <span class="product-price" name = "p-price"> $7.00</span>
                <p class="product-quantity"> Quantity: 
					<input class="product-quantity-input" type="number" value="1" step="1" name = "p-quantity"></input>
				</p>
               
                <input type = "submit" name = "insert" value = "Add to Cart" class="button"></input>
            </form>
                <button type="button" onclick="clickDesc()" id="myBtn" class="button">More Description</button>
            </div>
        </div>

<script>
function clickDesc() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "More Description"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>

  
<div class="col-12 row h-100 nopadding footer">

    <div class="col-4 row footer-heading nopadding about">
        <h2>About Us</h2>
        <a href="#">Our Story</a>
        <a href="#">Blog</a>
        <a href="../P7.html">Customers</a>
    
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