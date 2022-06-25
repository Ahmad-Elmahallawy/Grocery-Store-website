<?php 
require_once "Authentication.php";
ob_start();
?>

<?php
require 'simplexml.class.php';
$users=simplexml_load_file('UserList.xml');

if (isset($_POST['savebutton']))
{   
    foreach ($users->info as $user){
      if($user->FirstName ==$_POST['FirstName']){
        $user->FirstName= $_POST['FirstName'];
        $user->LastName= $_POST['LastName'];
        $user->Email= $_POST['Email'];
        $user->Password= $_POST['Password'];
        $user->Address= $_POST['Address'];
        $user->Number= $_POST['Number'];
        break;
      }
    }
    file_put_contents('UserList.xml', $users->asXML());
    header('location: P9.php');

}
foreach ($users->info as $user){
  if($user->FirstName ==$_GET['FirstName']){
    $firstName= $user->FirstName;
    $lastName= $user->LastName;
    $email= $user->Email;
    $password= $user->Password;
    $address= $user->Address;
    $number= $user->Number;
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

    <form method="POST" action="P10Edit.php">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
    
          <button type="submit" class="btn btn-sm btn-primary" name="savebutton">
            Save
          </button>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="FirstName" value="<?php echo $firstName; ?>" readonly>
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="LastName" value="<?php echo $lastName; ?>">
        </div>
      </div>
      <br>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="Email" value="<?php echo $email; ?>">
      </div>
      <div class="mb-3">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" name="password" value="<?php echo $password; ?>" readonly>
    </div>
  </div>
      <br>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" name="Address" placeholder="1234 Main St" value="<?php echo $address; ?>">
      </div>
      <br>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="inputAddress" name="Number" placeholder="i.e. 123456" value="<?php echo $number; ?>">
      </div>
    </form>
    </main>

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

