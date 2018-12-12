
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
        <h2>Log In</h2>
        <form action="../actions/action_login.php" method="POST">
            <!-- <label for="username"></label> -->
            <input type="text" name="username" placeholder="username" id="username" required="required"><span class="pass-check usercheck" aria-hidden="true"></span><i class="pass-times usernotcheck" aria-hidden="true"></i><br>
            <ul class="checkuser">
                <li></li>
            </ul>
            <!-- <label for="password"></label> -->
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
            <input type="submit" value="Log In">
        </form>
        <p class="<?php if(isset($_GET['error_msg'])){echo 'error-show';}else{echo 'error-hide';}?>">The <?echo $_GET[error_msg]; ?> entered already exists!<p>
    </section>
</section>