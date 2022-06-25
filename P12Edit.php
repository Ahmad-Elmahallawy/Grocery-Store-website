<?php 
require_once "Authentication.php";
ob_start();
?>

<?php
require 'simplexml.class.php';
$orders=simplexml_load_file('OrderList.xml');

if (isset($_POST['save']))
{   
    foreach ($orders->order as $order){
      if($order->id ==$_POST['id']){
        $order->id= $_POST['id'];
        $order->client= $_POST['client'];
        $order->shipadd= $_POST['shipadd'];
        $order->date= $_POST['date'];
        break;
      }
    }
    file_put_contents('OrderList.xml', $orders->asXML());
    header('location: P11.php');

}
foreach ($orders->order as $order){
  if($order->id ==$_GET['id']){
    $id= $order->id;
    $client= $order->client;
    $shipadd= $order->shipadd;
    $date= $order->date;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Main-Stylesheet.css">

</head>
<body>

<!--Header-->
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


    <form method="POST" action="P12Edit.php">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Order</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
    
          <button type="submit" class="btn btn-sm btn-primary" name=save>
            Save
          </button>
        </div>
      </div>

      <h4>Order Details</h4>
      <div class="row">
        <div class="col">
          <label for="inputAddress" class="form-label">Order ID:</label>
          <input type="text" class="form-control"  aria-label="First name" name=id value="<?php echo $id; ?>" readonly>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <label for="inputAddress" class="form-label">Client:</label>
          <input type="text" class="form-control"  aria-label="First name" name=client value="<?php echo $client; ?>">
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col">
          <label for="inputAddress" class="form-label">Shipping Address:</label>
          <input type="text" class="form-control"  aria-label="First name" name=shipadd value="<?php echo $shipadd; ?>">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <label for="inputAddress" class="form-label">Shipping date:</label>
          <input type="text" class="form-control"  aria-label="First name" name=date value="<?php echo $date; ?>">
        </div>
      </div>
      <br>
</form>
    </main>
  </div>
</div>


<!-- footer section -->
<div class="col-12 row h-100 nopadding footer">

    <div class="col-4 row footer-heading nopadding about">
        <h2>About Us</h2>
        <a href="#">Our Story</a>
        <a href="#">Blog</a>
        <a href="P9.php">Customers</a>
    
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

