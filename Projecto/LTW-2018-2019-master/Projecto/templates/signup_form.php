<link rel="stylesheet" href="../css/main.css">
<header>
        <p>Already a user?</p>
        <a class='log-in' href="../pages/login.php">Log in</a>
</header>

<nav id="navbar">
        <ul>	
        </ul>
</nav>
<section id="core" >
<section id="app-promo">
	<img src="../images/sigarrit_full_logo.png" alt="Logo" width="700" height="380">
    <div class="promo-slogans">
        <h1>Your daily feed</h1>
    </div>
    <p>slogan</p>
</section>

<div class="wrapper-divider">
    <div class="divider"></div>
</div>

<section id="login" >
    <h2>Register</h2>
    <form action="../action_register.php" method="POST">
       
        <input type="text" name="username" placeholder="username or email" id="username" required="required"><span class="pass-check usercheck" aria-hidden="true"></span><i class="pass-times usernotcheck" aria-hidden="true"></i><br>
        <ul class="checkuser">
            <li></li>
        </ul>
        <input type="password" name="password" placeholder="password" id="password" required="required"><span class="pass-check passcheck" aria-hidden="true"></span><i class="pass-times passnotcheck" aria-hidden="true"></i><br>
        <div class="checkpassword">
            <h4>Your password must have:</h4>
            <ul>
                <li class="1-rule">At least 8 characters <span class="pass-check" ></span></li>
                <li class="2-rule">At least 1 number <span class="pass-check" ></span></li>
                <li class="3-rule">At least 1 capital and 1 small letter <span class="pass-check" ></span></li>
                <li class="4-rule">At least 1 special character <span class="pass-check" ></span></li>
            </ul>
        </div>
             
        <input type="password" name="passwordconfirm" placeholder="confirm password" id="password"><span class="pass-check confirm passcheck" aria-hidden="true"></span><i class="pass-times confirm passnotcheck" aria-hidden="true"></i><br>
        <div class="checkpassword">
        </div>
        <input type="submit" value="Sign Up">
    </form>
    <p class="<?if(isset($_GET[error_msg])){echo 'error-show';}else{echo 'error-hide';}?>">The <?echo $_GET[error_msg]; ?> entered already exists!<p>
</section>
</section>