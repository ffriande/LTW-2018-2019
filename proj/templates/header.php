<?php include_once('../config/session.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SIGARRit</title>
        <meta name="application-name" content="SIGARRit">
        <meta name="description" content="">
        <meta name="author" content="Francisco Friande, David Sarmento, José Azevedo">
        <meta name="keywords" content="Forum, Discution, Sharing info, reddit-like">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
		    <link rel="stylesheet" href="../css/allpages.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/header.css">
    </head>
<body>

    <nav id="navbar">
        <ul>
            <?php if(!isset($_SESSION['username'])) { ?>
              <li>
                <a class='register' href="../pages/register.php">Sign up</a>
              </li>
              <li>
                <a class='log-in' href="../pages/login.php">Log in</a>
              </li>
            <?php } else { ?>
              <li >
                <a class='profile-in' href="../pages/profile.php">Profile</a>
              </li>
              <li style="float:right">
                <a class='log-out' href="../actions/action_logout.php">Log out</a>
              </li>
              <li style="float:right">
              <a class='username'>
              <?php
                echo $_SESSION['username'];
              ?>
              </a>
              </li>
            <?php } ?>
            <li>
                <a class='stories' href="../pages/stories.php">Stories</a>
            </li>
        </ul>
    </nav>




