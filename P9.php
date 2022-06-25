<?php 
require_once "Authentication.php";
ob_start();
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
<?php 
require 'simplexml.class.php';

//TO DELETE AN ITEM
if (isset($_GET['action'])){
    $users= simplexml_load_file('UserList.xml');
    $fn= $_GET['firstName'];
    $index= 0;
    $i=0;
    foreach($users->info as $user){
       $userName= $user->FirstName;
        if($userName==$fn){
            $index=$i;
            break;
        }
        $i++;
    }
    unset($users->info[$index]);
    file_put_contents('UserList.xml', $users->asXML());
    header('location: P9.php');
}
$users= simplexml_load_file('UserList.xml');

?>


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
        <h1 class="h2">User's</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          
          <button type="button"onclick="window.location.href='P10Add.php';" class="btn btn-sm btn-primary">
            Add User
          </button>
        </div>
      </div>


      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email </th>
              <th scope="col">Phone Number</th>
              <th scope="col">Address</th>
              <th scope="col"> </th>

            </tr>
          </thead>
          <tbody>

            <?php foreach($users->info as $user){?>

            
            <tr>
              <td> <?php echo $user->FirstName?> &nbsp; <?php echo $user->LastName?></td>
              <td> <?php echo $user->Email ?> </td>
              <td> <?php echo $user->Number ?> </td>
              <td> <?php echo $user->Address ?> </td>
              <td>
                <div class="btn-group me-2">
                
                <a href="P10Edit.php?FirstName=<?php echo $user->FirstName; ?>" <button type="button"     
                 onclick="window.location.href='P10Edit.php';"class="btn btn-sm btn-outline-secondary"> Edit</button> </a>

                <a href="P9.php?action=delete&firstName=<?php echo $user->FirstName; ?>"<button type="button" onclick="return confirm('Are you sure?')" 
                 class="btn btn-sm btn-outline-secondary">Delete</button> </a>
                </div>
            </td>
            </tr>
            
            <?php } ?>

          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- footer section -->
<div class="col-12 row h-100 nopadding footer">

    <div class="col-4 row h-100 footer-heading nopadding about">
        <h2>About Us</h2>
        <a href="#">Our Story</a>
        <a href="#">Blog</a>
        <a href="P9.php">Customers</a>
    
    </div>
    
    <div class="col-4 row h-100 footer-heading nopadding contact-form">
        <h2>Customer Service</h2>
        <a href="#">Contact Us</a>
        <a href="#">Terms and Conditions</a>
        <a href="#">Find a Store</a>
        <a href="#">FAQ</a>
    </div>
    <div class="col-4 row h-100 footer-heading nopadding social-media">
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

</body>
</html>

