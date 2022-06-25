<?php 
require_once "Authentication.php";
require_once "Authentication.php";
ob_start();
?>

<?php

require 'simplexml.class.php';

//TO DELETE AN ITEM
if (isset($_GET['action'])){
    $products= simplexml_load_file('ProductList.xml');
    $fn= $_GET['action'];
    $index= 0;
    $i=0;
    
    foreach($products->product as $product){
      $productName = $product->name;
        if($productName==$fn){
            $index=$i;
            break;
        }
        $i++;
    }

    unset($products->product[$index]);
    file_put_contents('ProductList.xml', $products->asXML());
    header('location:P7.php');
}
$products= simplexml_load_file('ProductList.xml');

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
</head>
<body>



<!--header-->
<nav class="navbar nav_bar justify-content-between">

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

<!--Content -->
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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" onclick="window.location.href='P8Add.php';"class="btn btn-sm btn-primary">
            Add Product
          </button>
        </div>
      </div>


      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col"></th>   
              <th scope="col">Product </th>
              <th scope="col">Inventory </th>
              <th scope="col">Price</th>
              <th scope="col"> </th>

            </tr>
          </thead>
          <tbody id="products">

          <?php foreach($products->product as $product){?>

            <tr class="productClass">
            <td> <img src="<?php echo $product->image?>" alt="<?php echo $product->name?>" style="width:150px; height:150px;" ></td>
            <td> <?php echo $product->name ?> </td>
            <td> <?php echo $product->quantity ?> </td>
            <td> <?php echo $product->price ?>$</td>
            <td>
              <div class="btn-group me-2">
                <a href="P8Edit.php?productName=<?php echo $product->name; ?>" 
                  <button type="button" onclick="window.location.href='P8Edit.php';"class="btn btn-sm btn-outline-secondary"> Edit</button>
                </a>
                <a href="P7.php?action=<?php echo $product->name ?>"
                  <button type="button" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-secondary">Delete</button> 
                </a>
              </div>
            </td>
            </tr>

            <?php } ?>

            <!-- <tr class="productClass">
              <td><img src="Images/tomato.png" alt="tomato" style="width:150px; height:150px;" ></td>
              <td>Tomato</td>
              <td>2</td>
              <td>2.5$</td>
              <td><div class="btn-group me-2">
            <button type="button" onclick="window.location.href='P8.html';"class="btn btn-sm btn-outline-secondary"> Edit</button>
            <a href="P9.php?action=delete&firstName=<?php echo $user['firstName']; ?>"
                <button type="button" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-secondary">Delete</button> 
            </a>
          </div></td>
            </tr>

            
            <tr class="productClass">
              <td><img src="Images/chickenpic.jpg" style="width:150px; height:150px;" alt="tomato">              </td>
              <td>Chicken</td>
              <td>50</td>
              <td>7$</td>
              <td><div class="btn-group me-2">
            <button type="button" onclick="window.location.href='P8.html';"class="btn btn-sm btn-outline-secondary"> Edit</button>
            <button type="button" class="btn btn-sm btn-outline-secondary dlt">Delete</button>
          </div></td>
            </tr>

            
            <tr class="productClass">
              <td><img src="Images/milk.png"  style="width:150px; height:150px;" alt="tomato"></td>
              <td>Milk</td>
              <td>45</td>
              <td>3.75$</td>
              <td><div class="btn-group me-2">
              <button type="button" onclick="window.location.href='P8.html';"class="btn btn-sm btn-outline-secondary"> Edit</button>
              <button type="button" class="btn btn-sm btn-outline-secondary dlt">Delete</button>
          </div></td>
            </tr>

            
            <tr class="productClass">
              <td><img src="Images/ricepic.jpg"  style="width:150px; height:150px;" alt="tomato"></td>
              <td>Rice</td>
              <td>100</td>
              <td>2$</td>
              <td><div class="btn-group me-2">
            <button type="button" onclick="window.location.href='P8.html';"class="btn btn-sm btn-outline-secondary"> Edit</button>
            <button type="button" class="btn btn-sm btn-outline-secondary dlt">Delete</button>
          </div></td>
            </tr> -->
           
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<div class="dltModal">

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

