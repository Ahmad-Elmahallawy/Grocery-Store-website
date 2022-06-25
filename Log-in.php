<?php
$error = false;
if(isset($_POST['login_button'])){
    $email = $_POST['username'];
    $password = $_POST['password'];
    if(file_exists('UserList.xml')){
        $xml = new SimpleXMLElement('UserList.xml',0,true);
        $length = count($xml->info);
        for($i=0; $i<$length; $i++) {

          if($password == 'Admin' && $email == 'Admin')
          {
            session_start();
            $_SESSION['username'] = $email;
              header('Location: P7.php');
              die;
          }
          if($password==$xml->info[$i]->Password && $email == $xml->info[$i]->FirstName) {
              session_start();
              $_SESSION['username'] = $email;
              header('Location: index.php');
              die;
          }
        }
    }
    $error = true;

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Login-Signup.css">
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


    <!-- Login Section start -->


    <div class="col-12 h-100 nonpadding logincontainer">

        <div class="h-100 loginmargin ">
             <h3 class="loginbar">Log in</h3>
        </div>
        <form method = "POST" action="">
            <div class="inner-container">

                <div class="nopadding login_label">
                    <label for="email" class="labellogin">Username:</label>
                </div>

                <div class="login_input">
                    <input type="text" name="username" class="login_info" placeholder="Username">
                </div>

                <div class="nopadding login_label">
                    <label for="password" class="labellogin">Password:</label>
                </div>

                <div class="login_input">
                    <input type="password" name="password" class="login_info" placeholder="password">
                </div>
              

                <div class="checkbut">
                    <label for="check">Remember me</label>
                    <input type="checkbox" id="check" name="check" value="Remember">
                </div>
                     <?php
                if($error){
                    echo '<p>Invalid email and/or password</p>';
                    }
                ?>
                

                <div class=" nopadding submit">
                    <button type="submit" name="login_button" class="login_button">Log in</button>
                </div>
                
                <div class=" forgotpass">
                    <p><a href="#">Forgot Password?</a></p>
                </div>
            
                <p>Don't have an account? <a href="SignUp.php">Sign up</a></p>
           

            </div>
        </form>
    </div>

    <!-- Login Section end -->


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