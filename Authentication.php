<?php
  session_start();
  if(!isset($_SESSION['username']) || (isset($_SESSION['username']) &&           $_SESSION['username'] != "Admin"))
  {
     header('Location: error.html');
}
?>