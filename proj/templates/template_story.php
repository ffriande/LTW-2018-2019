<section id="main" class="story-page">

  <div id="story-content">

    <article id="story-holder-<?php echo $story['id'] ?>" class='story-header'>

      <div id = 'vote'>

        <a href="javascript:void(0)" onclick="upvoteStory('<?php echo $story["id"] ?>')" class="vote upvote <?php echo ( isset($currentUser) && hasUserAlreadyUpvotedStory($currentUser['id'], $story['id']) ? 'voted' : '' ) ?>">
          <div class="arrow-up"></div>
        </a>
        
        <div class="karma">
          <?php echo( is_null($story['karma']) ? '0' : $story['karma'] ); ?>
        </div>
        
        <a href="javascript:void(0)" onclick="downvoteStory('<?php echo $story["id"] ?>')" class="vote downvote <?php echo ( isset($currentUser) && hasUserAlreadyDownvotedStory($currentUser['id'], $story['id']) ? 'voted' : '' ) ?>">
          <div class="arrow-down"></div>
        </a>
      </div>

      <div id = 'listStory'>
				<div class = 'story-title'>
          <?php echo $story['title']; ?>
				</div>

				<div class = 'listStory-footer'>
          <a class="author" href="../pages/profile.php?profile=<?php echo $story['usrname']; ?>"><?php echo $story['usrname']; ?></a>
					
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

  <style type="text/css">
    .reply-form {
      display: none;
    }
  </style>


  <div id="comments" >
    <?php foreach ($comments as $key => $comment) { ?>
      <article>
        <div id="comment-holder-<?php echo $comment['id'] ?>" class="story">
  
          <div id = 'vote'>
            <a href="javascript:void(0)" onclick="upvoteComment('<?php echo $comment["id"] ?>')" class="vote upvote <?php echo ( isset($currentUser) && hasUserAlreadyUpvotedComment($currentUser['id'], $comment['id']) ? 'voted' : '' ) ?>">
              <div class="arrow-up"></div>
            </a>
            
            <div class="karma">
              <?php echo( is_null($comment['karma']) ? '0' : $comment['karma'] ); ?>
            </div>
            
            <a href="javascript:void(0)" onclick="downvoteComment('<?php echo $comment["id"] ?>')" class="vote downvote <?php echo ( isset($currentUser) && hasUserAlreadyDownvotedComment($currentUser['id'], $comment['id']) ? 'voted' : '' ) ?>">
              <div class="arrow-down"></div>
            </a>
          </div>

          <div id = 'listStory'>
            <div class="description listStory-description">
              <?php echo $comment['description']; ?>
            </div>

            <div class="listStory-footer">
            
              <a class="author" href="../pages/profile.php?profile=<?php echo $comment['usrname']; ?>"><?php echo $comment['usrname']; ?></a>

              <span class="tags">
                <a href="../pages/channel.php?id=<?php echo $story['channel_id']; ?>">
                  <?php echo $story['channel_id']; ?>
                </a>
              </span>
              
              <span class="date">
                <?php echo $comment['date']; ?>
              </span>

              <span class="reply">
                <a href="javascript:void(0)" onclick="showReplyForm('reply-form-<?php echo $comment['id']; ?>')">Reply</a>  
              </span>
            </div>
          </div>
          
        </div>
        <div class="replies-holder">
                <form id="reply-form-<?php echo $comment['id']; ?>" action="../actions/action_add_reply.php" method="post" class="reply-form" style="margin-top:50px;margin-left: 100px">
                  <textarea name="comment" required rows="5" placeholder = "Insert your reply here..."></textarea>
                  <input type="hidden" name="story" value="<?php echo $story['id'] ?>">
                  <input type="hidden" name="father" value="<?php echo $comment['id'] ?>">
                  <input type="submit" value="Submit">
                </form>
          <?php $replies = findReplies($comment['id']);?>
          <?php foreach ($replies as $key => $reply) { ?>
            <article id="comment-holder-<?php echo $reply['id'] ?>" class="reply" style="margin-left: 100px;">
              <div class="story">
                
                <div id = 'vote'>
                  <a href="javascript:void(0)" onclick="upvoteComment('<?php echo $reply["id"] ?>')" class="vote upvote <?php echo ( isset($currentUser) && hasUserAlreadyUpvotedComment($currentUser['id'], $reply['id']) ? 'voted' : '' ) ?>">
                    <div class="arrow-up"></div>
                  </a>
                
                  <div class="karma">
                    <?php echo( is_null($reply['karma']) ? '0' : $reply['karma'] ); ?>
                  </div>
                  
                  <a href="javascript:void(0)" onclick="downvoteComment('<?php echo $reply["id"] ?>')" class="vote downvote <?php echo ( isset($currentUser) && hasUserAlreadyDownvotedComment($currentUser['id'], $reply['id']) ? 'voted' : '' ) ?>">
                    <div class="arrow-down"></div>
                  </a>
                </div>

              <div id = 'listStory'>
                <div class="description listStory-description">
                  <?php echo $reply['description']; ?>
                </div>

                <div class="listStory-footer">
                  <a class="author" href="../pages/profile.php?profile=<?php echo $reply['usrname']; ?>"><?php echo $reply['usrname']; ?></a>

                  
                  <span class="tags">
                    <a href="../pages/channel.php?id=<?php echo $story['channel_id']; ?>">
                      <?php echo $story['channel_id']; ?>
                    </a>
                  </span>
                  
                  <span class="date">
                    <?php echo $reply['date']; ?>
                  </span>

                  </div>
                </div>
              </div>
            </article>
          <?php } ?>
        </div>
      </article>

    <?php } ?>
  </div>
</section>