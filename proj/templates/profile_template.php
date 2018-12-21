<section id="core" class="profile-core">
    <section class="profile-info">
        
            <h2><?php echo $user_info['username']; ?> Profile</h2>
            <div class="register-date">User points:  <?php echo $karma; ?>  </div>
            <div class="register-date"> Registration Date: <?php echo $user_info['register_date']; ?>  </div>
        
    </section>
    <section id="login" >
        <?php if(isset($_SESSION['username']))?>
        <?php if($_SESSION['username']== $usern) {?>
            <h2>Edit Password:</h2>
        <form action="../actions/action_edit_profile.php" method="POST">
           
            <input style="display:none" type="text" name="username" placeholder="username"  id="username" value="<?php echo $_SESSION['username']; ?>" required="required" readonly>
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
                 
            <input type="password" name="passwordConfirm" placeholder="confirm new password" id="passwordConfirm">
            <span class="pass-check confirm passcheck" aria-hidden="true"></span><i class="pass-times confirm passnotcheck" aria-hidden="true"></i><br>
            <div class="checkpassword">
            </div>
            <input type="submit" value="Save">
        </form>
        
        <p class="<?php if(isset($_GET['error_msg'])){echo 'error-show';}else{echo 'error-hide';}?>">The <?echo $_GET['error_msg']; ?> entered already exists!<p>

        <?php } ?>
        </section>
</section>
<section id="profile-stories" >
    <h2>User Stories</h2>
        <?php foreach ($stories as $key => $story) { ?>
            <div id = 'listStory' class="story">
				<div class = 'listStory-title'>
					<a href="../pages/story.php?id=<?php echo $story['id']; ?>">
						<?php echo $story['title']; ?>
					</a>
				</div>

				<div class="listStory-description">
					<?php echo $story['description']; ?>
                </div>

                <div class = 'listStory-footer'>
                    <span class="date">
                        <?php echo $story['date']; ?>
                    </span>

				</div>
			</div>
            <?php } ?>
    </section>

 <section id="profile-comments" >
    <h2>User Comments</h2>
    <?php foreach ($comments as $key => $comment) { ?>
        <div id = 'listStory' class="story">
            <div class="listStory-description">
                <?php echo $comment['description']; ?>
            </div>

            <div class = 'listStory-footer'>
                <span class="date">
                    <?php echo $comment['date']; ?>
                </span>

            </div>
        </div>
    <?php } ?>
</section>

