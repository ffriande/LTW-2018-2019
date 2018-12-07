<?php
  include_once('config/init.php');
  include_once('database/user.php');
  
  $username = trim(strip_tags($_POST['username']));
  $password = $_POST['password'];  
  $passwordconfirm = $_POST['passwordconfirm'];  

  createUser($username, $password,$passwordconfirm);
  
  header('Location: ../proj/pages/login.php');  
?>
