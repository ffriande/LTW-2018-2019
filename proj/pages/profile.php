<?php

include_once('../config/init.php');

include_once('../templates/header.php');    

include_once('../database/profile_db.php');

$usern=$_GET['profile'];

$user_points=getUserPoints($usern);

$user_info=getUserInfo($usern);

$stories=getUserStories($usern); 

$comments=getUserComments($usern); 

include_once('../templates/profile_template.php');

include_once('../templates/footer.php');
?>
