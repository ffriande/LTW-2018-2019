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
    </head>
<body>

    <nav id="navbar">
        <ul>
            <li>
                <a href="../pages/login.php">Login</a>
            </li>
            <li>
                <a href="../pages/profile.php">Profile</a>
            </li>
            <li>
                <a href="../pages/register.php">Register</a>
            </li>
            <li>
                <a href="../pages/stories.php">Stories</a>
            </li>
            <?php if(!isset($_SESSION['username'])) { ?>
              <li>
                <a class='register' href="../pages/register.php">Sign up</a>
              </li>
              <li>
                <a class='log-in' href="../pages/login.php">Log in</a>
              </li>
            <?php } else { ?>
              <li>
                <a class='profile-in' href="../pages/login.php">Profile</a>
              </li>
            <?php } ?>
        </ul>
    </nav>




    <style type="text/css">
        
        ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #333333;
        }

        li {
          float: left;
        }

        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 16px;
          text-decoration: none;
        }

        li a:hover {
          background-color: #111111;
        }

    </style>
