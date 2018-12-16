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
        <h2>Profile</h2>
        <?php if(isset($_SESSION['username']))if($usern=$_GET['profile'])?>
        <?php if($_SESSION['username']== $usern) {?>
        <form action="../actions/action_edit_profile.php" method="POST">
           
            <input type="text" name="username" placeholder="username" id="username" value="<?php echo $_SESSION['username']; ?>" required="required">
            <span class="pass-check usercheck" aria-hidden="true"></span><i class="pass-times usernotcheck" aria-hidden="true"></i>
            <br>
            <ul class="checkuser">
                <li></li>
            </ul>
            <input type="password" name="password" placeholder="new password" id="password" required="required" value=""><br>
            <span class="pass-check passcheck" aria-hidden="true"></span><i class="pass-times passnotcheck" aria-hidden="true"></i>
            <div class="checkpassword">
                <h4>Your password must have:</h4>
                <ul>
                    <li class="1-rule">At least 8 characters <span class="pass-check" ></span></li>
                    <li class="2-rule">At least 1 number <span class="pass-check" ></span></li>
                    <li class="3-rule">At least 1 capital and 1 small letter <span class="pass-check" ></span></li>
                    <li class="4-rule">At least 1 special character <span class="pass-check" ></span></li>
                </ul>
            </div>
                 
            <input type="password" name="passwordConfirm" placeholder="confirm new password" id="password">
            <span class="pass-check confirm passcheck" aria-hidden="true"></span><i class="pass-times confirm passnotcheck" aria-hidden="true"></i><br>
            <div class="checkpassword">
            </div>
            <input type="submit" value="Save">
        </form>
        
        <p class="<?php if(isset($_GET['error_msg'])){echo 'error-show';}else{echo 'error-hide';}?>">The <?echo $_GET['error_msg']; ?> entered already exists!<p>
    </section>
    <?php } ?>
        <?php echo $_SESSION['username']; ?>
        <?php $stories=getUserStories($_GET['profile']); ?>
        <?php var_dump($stories)?>
        <?php foreach ($stories as $key => $story) { ?>
            <article>
                <header>
                    <h1>
                        <a href="../pages/story.php?id=<?php echo $story['id']; ?>">
                            <?php echo $story['karma']; ?> - <?php echo $story['title']; ?>
                         </h1>
                </header>

                <footer>
                     <span class="tags">
                        <a href="../pages/channel.php?id=<?php echo $story['channel_id']; ?>">
                            <?php echo $story['channel_id']; ?>
                        </a>
                    </span>
                    
                    <span class="date">
                        <?php echo $story['date']; ?>
                    </span>
                    
                    <a class="comments" href="../pages/story.php?id=<?php echo $story['id']; ?>"><?php echo $story['nrComm']; ?> comments</a>
                </footer>
            </article>
            <?php } ?>
</section>