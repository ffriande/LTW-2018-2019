
<?php if (isset($_SESSION['messages'])) {?>
        <section id="messages">
        <?php foreach($_SESSION['messages'] as $message) { ?>

            <div class="<?=$message['type']?>">-><?=$message['content']?><br></div>
        <?php } ?>
        </section>
    <?php unset($_SESSION['messages']); } ?>


<section id="main" >

  <div id="story-content">

    <article>
      <header>
        <h1>
          <?php echo $story['karma']; ?> - <?php echo $story['title']; ?>
          <a style="float: right;" href="../actions/action_story_upvote.php?id=<?php echo $story['id']; ?>" class="upvote">&uparrow;</a>
          <a style="float: right;" href="../actions/action_story_downvote.php?id=<?php echo $story['id']; ?>" class="downvote">&downarrow;</a>
        </h1>
      </header>

      <div class="description">
        <?php echo $story['description']; ?>
      </div>

      <footer>
        <span class="author"><?php echo $story['user_id']; ?></span>
        
        <span class="tags">
          <a href="../pages/channel.php?id=<?php echo $story['channel_id']; ?>">
            <?php echo $story['channel_id']; ?>
          </a>
        </span>
        
        <span class="date">
          <?php echo $story['date']; ?>
        </span>

      </footer>
    </article>

  </div>

  <div id="add-comment">
    
    <form action="../actions/action_add_comment.php" method="POST">

      <input type="hidden" name="story" value="<?php echo $story['id']; ?>">

      <div class="form-group">

        <label for="comment">Comment: </label>
        <textarea id="comment" name="comment" required rows="5"></textarea>

      </div>

      <div class="form-group">

        <input type="submit" value="Submit">

      </div>

    </form>

  </div>


  <div id="comments" >
    <?php foreach ($comments as $key => $comment) { ?>
      <article>
        <header>
          <h3>
            <span>
              <?php echo $comment['karma']; ?>
            </span>
            <a style="float: right;" href="../actions/action_comment_upvote.php?id=<?php echo $comment['id']; ?>&story_id=<?php echo $story['id']; ?>" class="upvote">&uparrow;</a>
            <a style="float: right;" href="../actions/action_comment_downvote.php?id=<?php echo $comment['id']; ?>&story_id=<?php echo $story['id']; ?>" class="downvote">&downarrow;</a>
          </h3>
        </header>

        <div class="description">
          <?php echo $comment['description']; ?>
        </div>

        <footer>
          <span class="author"><?php echo $comment['user_id']; ?></span>
          
          <span class="tags">
            <a href="../pages/channel.php?id=<?php echo $story['channel_id']; ?>">
              <?php echo $story['channel_id']; ?>
            </a>
          </span>
          
          <span class="date">
            <?php echo $comment['date']; ?>
          </span>
        </footer>
      </article>
    <?php } ?>
  </div>
</section>