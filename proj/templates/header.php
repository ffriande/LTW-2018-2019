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
        <script src="../js/script.js" defer></script>
    </head>
<body>

  <nav id="navbar">
      <ul>
          <li>
              <a class='stories' href="../pages/stories.php">Stories</a>
          </li>
          <?php if(!isset($_SESSION['username'])) { ?>
            <li style="float:right">
              <a class='register' href="../pages/register.php">Sign up</a>
            </li>
            <li style="float:right">
              <a class='log-in' href="../pages/login.php">Log in</a>
            </li>
          <?php } else { ?>
            
            <li >
              <a class='profile-in' href="../pages/add_story.php">Add Story</a>
            </li>
            <li style="float:right">
              <a class='log-out' href="../actions/action_logout.php">Log out</a>
            </li>
            <li style="float:right">
              <a class='profile-in' href="../pages/profile.php?profile=<?php echo $_SESSION['username']; ?>">Profile</a>
            </li>
            <li style="float:right">
              <a class='username'>
                <?php
                  echo $_SESSION['username'];
                ?>
              </a>
            </li>
          <?php } ?>
      </ul>
  </nav>

<?php if (isset($_SESSION['messages'])) {?>
  <section id="messages">
    <?php foreach($_SESSION['messages'] as $message) { ?>
        <div class="<?=$message['type']?>"><?=$message['content']?><br></div>
    <?php } ?>
  </section>
<?php unset($_SESSION['messages']); } ?>





