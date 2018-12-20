
<?php if (isset($_SESSION['messages'])) {?>
        <section id="messages">
        <?php foreach($_SESSION['messages'] as $message) { ?>

            <div class="<?=$message['type']?>">-><?=$message['content']?><br></div>
        <?php } ?>
        </section>
    <?php unset($_SESSION['messages']); } ?>


<section id="main" class="story-page">

  <div id="story-content">

    <article id='story-header'>

      <div id = 'vote'>
        <a  href="../actions/action_story_upvote.php?id=<?php echo $story['id']; ?>" class="upvote">
          <div class="arrow-up"></div>
        </a>
        <div id='karma'>
          <?php echo $story['karma']; ?>
        </div>
        <a  href="../actions/action_story_downvote.php?id=<?php echo $story['id']; ?>" class="downvote">
          <div class="arrow-down"></div>
        </a>
      </div>
      <div id = 'listStory'>
				<div class = 'story-title'>
          <?php echo $story['title']; ?>
				</div>

				<div class = 'listStory-footer'>
          <span class="author"><?php echo $story['user_id']; ?></span>
					
					<span class="tags">
						<a href="../pages/channel.php?id=<?php echo $story['channel_id']; ?>">
							<?php echo $story['channel_id']; ?>
						</a>
					</span>
					
					<span class="date">
						<?php echo $story['date']; ?>
					</span>
        </div>

        <div class="listStory-description">
          <?php echo $story['description']; ?>
        </div>

        <div id="add-comment">
    
          <form action="../actions/action_add_comment.php" method="POST">

            <input type="hidden" name="story" value="<?php echo $story['id']; ?>">

            <div class="form-group">

              <label for="comment">Leave your commment here: </label>
              <textarea id="comment" name="comment" required rows="5"></textarea>

            </div>

            <div class="form-group">
              <input type="submit" value="Submit">
            </div>
          </form>
      </div>
      
  </div>
    </article>

    

    
  </div>

  


  <div id="comments" >
    <?php foreach ($comments as $key => $comment) { ?>
      <article id="story">
        <div id = 'vote'>
          <a href="../actions/action_comment_upvote.php?id=<?php echo $comment['id']; ?>&story_id=<?php echo $story['id']; ?>" class="upvote">
            <div class="arrow-up"></div>
          </a>
          <div id='karma'>
            <?php echo $comment['karma']; ?>
          </div>
          <a href="../actions/action_comment_downvote.php?id=<?php echo $comment['id']; ?>&story_id=<?php echo $story['id']; ?>" class="downvote">
            <div class="arrow-down"></div>
          </a>
        </div>

        <div id = 'listStory'>
          <div class="description listStory-description">
            <?php echo $comment['description']; ?>
          </div>

          <div class="listStory-footer">
            <span class="author"><?php echo $comment['user_id']; ?></span>
            
            <span class="tags">
              <a href="../pages/channel.php?id=<?php echo $story['channel_id']; ?>">
                <?php echo $story['channel_id']; ?>
              </a>
            </span>
            
            <span class="date">
              <?php echo $comment['date']; ?>
            </span>
          </div>
        </div>
      </article>

    <?php } ?>
  </div>
</section>