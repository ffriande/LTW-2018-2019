<section id="core" >
    <section id="app-promo">
    	<img src="../images/sigarrit_full_logo.png" alt="Logo" width="700" height="380">
        <div class="promo-slogans">
            <h1>Your daily feed</h1>
        </div>
        <p>slogan</p>
    </section>
    <section id="login" >
        <h2>Register</h2>
        <form action="../actions/action_register.php" method="POST">
           
            <input type="text" name="username" placeholder="username" id="username" required="required">
            
            <br>
            <ul class="checkuser">
                <li></li>
            </ul>
            <input type="password" name="password" placeholder="password" id="password" required="required"><br>
            <input type="password" name="passwordConfirm" placeholder="confirm password" id="passwordConfirm">
            <div class="checkpassword">
            </div>
            <input type="submit" value="Sign Up">
            <br>
            <div class="checkpassword">
                <h4>Your password must have:</h4>
                <ul>
                    <li class="1-rule">At least 8 characters <span class="pass-check" ></span></li>
                    <li class="2-rule">At least 1 number <span class="pass-check" ></span></li>
                    <li class="3-rule">At least 1 capital and 1 small letter <span class="pass-check" ></span></li>
                    <li class="4-rule">At least 1 special character <span class="pass-check" ></span></li>
                </ul>
            </div>

        </form>
        </section>
</section>