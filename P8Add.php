<?php 
require_once "Authentication.php";
ob_start();
?>

<?php

if(isset($_POST['submitProduct']))
{

    $xml = new DomDocument("1.0","UTF-8");
    $xml->load('ProductList.xml');

    $pName = $_POST['productName'];
    if($_POST['productPrice'] <= 0)
    {
      $pPrice = 1;
    }
    else
    {
      $pPrice = $_POST['productPrice'];
    }

    $pDescription = $_POST['productDescription'];
    if($_POST['productQuantity'] <= 0)
    {
      $pQuantity = 1;
    }
    else
    {
      $pQuantity = $_POST['productQuantity'];
    }

    $pDescription = $_POST['productDescription'];

    $pImageFile = $_FILES['productImage']['name'];
    $location = "Images/".$pName;
    $location .= substr($pImageFile, strlen($pImageFile)-4, 4);

    if(move_uploaded_file($_FILES['productImage']['tmp_name'], $location))
    {
      echo 'File uploaded successfully';
    } 
    else 
    {
      echo 'Error uploading file';
    }

    $itemsTag = $xml->getElementsByTagName("items")->item(0);

    $productTag = $xml->createElement("product");
        $nameTag = $xml->createElement("name", $pName);
        $priceTag = $xml->createElement("price", $pPrice);
        $imageTag = $xml->createElement("image", $location);
        $quantityTag = $xml->createElement("quantity", $pQuantity);
        $descriptionTag = $xml->createElement("description", $pDescription);

        $productTag->appendChild($nameTag);
        $productTag->appendChild($priceTag);
        $productTag->appendChild($imageTag);
        $productTag->appendChild($quantityTag);
        $productTag->appendChild($descriptionTag);
    
    $itemsTag->appendChild($productTag);
    $xml->save('ProductList.xml');
    header('location:P7.php');
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

    <form method="POST" action="P8Add.php" enctype='multipart/form-data'>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Add Products</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <input type="submit" name="submitProduct" class="btn btn-sm btn-primary">
            </input>
          </div>
        </div>


        <div class="mb-3">
          <label for="productNameID" class="form-label">Product Name:</label>
          <input type="text" name="productName" class="form-control" id="productNameID" placeholder="i.e. 
          Milk"></input>
        </div>

        <div class="mb-3">
          <label class="form-label">Product Price:</label>
          <div class="input-group mb3">
            <span class="input-group-text">$</span>
            <input type="number" name="productPrice" class="form-control pPrice" id="productPriceID"  aria-label="Amount (to the nearest dollar)"></input>
            <span class="input-group-text">.00</span>
          </div>
        </div>

        <div class="mb-3">
          <label for="productImageID" class="form-label">Product Image:</label>
          <input type="file" name="productImage" id="productImageID" accept="image/png, image/jpg"></input>
        </div>
        
        <div class="mb-3">
          <label for="productImageID" class="form-label">Product Quantity:</label>
          <input type="number" name="productQuantity" id="productQuantityID"></input>
        </div>

        <div class="mb-3">
          <label for="productDescriptionID" class="form-label">Description:</label>
          <input type="text" name="productDescription" class="form-control" id="productDescriptionID" rows="3"></input>
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

