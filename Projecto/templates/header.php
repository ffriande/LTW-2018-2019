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

    <?php if(!isset($_SESSION['username'])) { ?>
        <header>
            <p>New user?</p>
            <a class='register' href="../pages/register.php">Sign up</a>
        </header>
    <?php } ?>

    <header>
        <p>Already a user?</p>
        <a class='log-in' href="../pages/login.php">Log in</a>
    </header>

    <nav id="navbar">
        <ul></ul>
    </nav>
