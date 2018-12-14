<?php
    include_once('../config/init.php');
    include_once('../config/session.php');
    
    $sorting = $_GET["id"];
  
    die(header('Location: ../pages/stories.php?sort='.$sorting));
?>
