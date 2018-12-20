
<?php if (isset($_SESSION['messages'])) {?>
        <section id="messages">
        <?php foreach($_SESSION['messages'] as $message) { ?>

            <div class="<?=$message['type']?>">-><?=$message['content']?><br></div>
        <?php } ?>
        </section>
    <?php unset($_SESSION['messages']); } ?>


<section id="main" class="story-page">

  <div id="story-content">

    <article id="story-holder-<?php echo $story['id'] ?>" class='story-header'>

      <div id = 'vote'>

        <a href="#story-holder-<?php echo $story['id'] ?>" onclick="upvoteStory('<?php echo $story["id"] ?>')" class="vote upvote <?php echo ( isset($currentUser) && hasUserAlreadyUpvotedStory($currentUser['id'], $story['id']) ? 'voted' : '' ) ?>">
          <div class="arrow-up"></div>
        </a>
        
        <div id = 'karma'>
          <?php echo $story['karma']; ?>
        </div>
        
        <a href="#story-holder-<?php echo $story['id'] ?>" onclick="downvoteStory('<?php echo $story["id"] ?>')" class="vote downvote <?php echo ( isset($currentUser) && hasUserAlreadyDownvotedStory($currentUser['id'], $story['id']) ? 'voted' : '' ) ?>">
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
      <article id="comment-holder-<?php echo $comment['id'] ?>" class="story">
        <div id = 'vote'>
          <a href="#comment-holder-<?php echo $comment['id'] ?>" onclick="upvoteComment('<?php echo $comment["id"] ?>')" class="vote upvote <?php echo ( isset($currentUser) && hasUserAlreadyUpvotedComment($currentUser['id'], $comment['id']) ? 'voted' : '' ) ?>">
            <div class="arrow-up"></div>
          </a>
          
          <div id = 'karma'>
            <?php echo $comment['karma']; ?>
          </div>
          
          <a href="#comment-holder-<?php echo $comment['id'] ?>" onclick="downvoteComment('<?php echo $comment["id"] ?>')" class="vote downvote <?php echo ( isset($currentUser) && hasUserAlreadyDownvotedComment($currentUser['id'], $comment['id']) ? 'voted' : '' ) ?>">
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

            <span class="reply">
            <form action="../actions/action_add_reply.php" method="post">
              <label>Comment:
                <input type="text" name="comment" >
              </label>
              <input type="hidden" name="story" value="<?php echo $story['id'] ?>">
              <input type="hidden" name="father" value="<?php echo $comment['id'] ?>">
              <input type="submit">
            </form>
          </span>
          <?php $replies = findReplies($comment['id']);?>
          <?php foreach ($replies as $key => $reply) { ?>
            <article id="comment-holder-<?php echo $comment['id'] ?>" class="story">
        <div id = 'vote'>
          <a href="#comment-holder-<?php echo $comment['id'] ?>" onclick="upvoteComment('<?php echo $comment["id"] ?>')" class="vote upvote <?php echo ( isset($currentUser) && hasUserAlreadyUpvotedComment($currentUser['id'], $comment['id']) ? 'voted' : '' ) ?>">
            <div class="arrow-up"></div>
          </a>
          
          <div id = 'karma'>
            <?php echo $comment['karma']; ?>
          </div>
          
          <a href="#comment-holder-<?php echo $comment['id'] ?>" onclick="downvoteComment('<?php echo $comment["id"] ?>')" class="vote downvote <?php echo ( isset($currentUser) && hasUserAlreadyDownvotedComment($currentUser['id'], $comment['id']) ? 'voted' : '' ) ?>">
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
        </div>
      </article>

    <?php } ?>
  </div>
</section>