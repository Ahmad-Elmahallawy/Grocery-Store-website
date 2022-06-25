<?php 
require_once "Authentication.php";
ob_start();
?>


<?php

require 'simplexml.class.php';
$products=simplexml_load_file('ProductList.xml');

if(isset($_POST['submitProduct']))
{   
    foreach ($products->product as $product){
    $productName = $product->name;
      if($productName == $_POST['productName']){
        $product->name= $_POST['productName'];
        $product->price= $_POST['productPrice'];
        $product->image= $product->image;
        if($_POST['productQuantity'] <= 0)
        {
            $product->quantity = 1;
        }
        else
        {
            $product->quantity= $_POST['productQuantity'];
        }
        $product->description= $_POST['productDescription'];
        break;
      }
    }
    file_put_contents('ProductList.xml', $products->asXML());
    header('location: P7.php');

}
foreach ($products->product as $product){
  if($product->name ==$_GET['productName']){
    $productName= $product->name;
    $productPrice= $product->price;
    $productQuantity= $product->quantity;
    $productDescription= $product->description;
    break;
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="Main-Stylesheet.css">

    <script>

      var quantityInputs = document.getElementsByClassName('form-control pPrice')
        for (var i = 0; i < quantityInputs.length; i++) {
          var input = quantityInputs[i];
          input.addEventListener('change', quantityChanged)  
      }

      function quantityChanged(event) {
        var input = event.target;
        if (isNaN(input.value) || input.value <= 0) {
          input.value = 1;
        }
      }


    </script>

</head>
<body>

<!--header-->
<nav class="navbar nav_bar justify-content-between">

  <a class="nav_logo" href="index.html">
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

<!--Content-->
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-12 col-md-3 col-lg-2 bg-light sidebar">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="P7.php">
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="P11.php">
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="P9.php">
              User List 
            </a>
          </li>
         
        </ul>
      </div>
    </nav>

    <form method="POST" action="P8Edit.php" enctype='multipart/form-data'>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Edit Products</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <input type="submit" name="submitProduct" class="btn btn-sm btn-primary">
            </input>
          </div>
        </div>


        <div class="mb-3">
          <label for="productNameID" class="form-label">Product Name:</label>
          <input type="text" name="productName" class="form-control" id="productNameID" value="<?php echo $product->name ?>"></input>
        </div>

        <div class="mb-3">
          <label class="form-label">Product Price:</label>
          <div class="input-group mb3">
            <span class="input-group-text">$</span>
            <input type="number" name="productPrice" class="form-control pPrice" id="productPriceID" value="<?php echo $product->price ?>"  aria-label="Amount (to the nearest dollar)"></input>
            <span class="input-group-text">.00</span>
          </div>
        </div>

        <div class="mb-3">
          <label for="productImageID" class="form-label">Product Quantity:</label>
          <input type="number" name="productQuantity" id="productQuantityID" value="<?php echo $product->quantity ?>"></input>
        </div>

        <div class="mb-3">
          <label for="productDescriptionID" class="form-label">Description:</label>
          <input type="text" name="productDescription" class="form-control" id="productDescriptionID" value="<?php echo $product->description ?>" rows="3"></input>
        </div>

      </main>
    </form>
  </div>
</div>



<!-- footer section -->
<div class="col-12 row h-100 nopadding footer">

    <div class="col-4 row footer-heading nopadding about">
        <h2>About Us</h2>
        <a href="#">Our Story</a>
        <a href="#">Blog</a>
        <a href="P7.php">Customers</a>
    
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

