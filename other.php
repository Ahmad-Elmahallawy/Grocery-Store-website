<?php
require_once "Authentication.php";
if (isset($_POST['insert']))
{
    $xml = new DomDocument("1.0", "UTF-8");
    $xml->load('UserList.xml');

    $firstName = $_POST('firstName');
    $lastName = $_POST('lastName');
    $email= $_POST('email');
    $password= $_POST('password');
    $address= $_POST('password');
    $phoneNumber= $_POST('number');

    $UserListTag= $xml->getElementByTagName("UserList")->item(0);

    $infoTag= $xml->createElement("info");
      $firstNameTag= $xml->createElement("FirstName", $firstName);
      $lastNameTag= $xml->createElement("LastName", $lastName);
      $emailTag= $xml->createElement("Email", $email);
      $passwordTag= $xml->createElement("Password", $password);
      $addressTag= $xml->createElement("Address", $address);
      $phoneNumberTag= $xml->createElement("Number", $phoneNumber);

      $infoTag->appendChild($firstNameTag);
      $infoTag->appendChild($lastNameTag);
      $infoTag->appendChild($emailTag);
      $infoTag->appendChild($passwordTag);
      $infoTag->appendChild($addressTag);
      $infoTag->appendChild($phoneNumberTag);

    $UserListTag->appendChild($infoTag);
    $xml->save('UserList.xml');
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
            <a class="nav-link active" aria-current="page" href="P7.html">
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="P11.html">
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="P9.html">
              User List 
            </a>
          </li>
         
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add/Edit User</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          
          <form method="POST" action="other.php">
          <button type="button" class="btn btn-sm btn-primary">
            Save
          </button>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstName">
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastName">
        </div>
      </div>
      <br>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
      </div>
      <div class="mb-3">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" name="password">
    </div>
  </div>
      <br>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St">
      </div>
      <br>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="inputAddress" name="number" placeholder="i.e. 123456">
      </div>
    </form>
    </main>

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

