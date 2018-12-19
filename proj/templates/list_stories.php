
<section id="stories">

	<form action="../actions/action_sort.php" method="POST" id='sort'>

		<div class="form-group">
		        
		        <label for="sorting">Sort stories by: </label>
		        <select id="sorting" name="sort">
		            <option value="recent" <?php echo ( isset($sort) && $sort == 'recent' ? 'selected' : ''); ?>>Most Recent</option>
		            <option value="oldest" <?php echo ( isset($sort) && $sort == 'oldest' ? 'selected' : ''); ?>>Oldest</option>
		            <option value="mostK" <?php echo ( isset($sort) && $sort == 'mostK' ? 'selected' : ''); ?>>Most Karma</option>
		            <option value="leastK" <?php echo ( isset($sort) && $sort == 'leastK' ? 'selected' : ''); ?>>Least Karma</option>
		            <option value="mostComments" <?php echo ( isset($sort) && $sort == 'mostComments' ? 'selected' : ''); ?>>Most Commented</option>
		            <option value="leastComments" <?php echo ( isset($sort) && $sort == 'leastComments' ? 'selected' : ''); ?>>Least Commented</option>
		        </select>
				</div>
		</form>
    </div>			
	<?php foreach ($stories as $key => $story) { ?>

		<article id = 'story'>

			<div id = 'vote'>
				
				<a href="../actions/action_story_upvote.php?id=<?php echo $story['id']; ?>" class="upvote">
					<div class="arrow-up"></div>
				</a>
			
				<div id = 'karma'>
					<?php echo $story['karma']; ?>
				</div>
				
				<a href="../actions/action_story_downvote.php?id=<?php echo $story['id']; ?>" class="downvote">
					<div class="arrow-down"></div>
				</a>
			
			</div>
			<div id = 'listStory'>
				<div class = 'listStory-title'>
						<a href="../pages/story.php?id=<?php echo $story['id']; ?>">
							<?php echo $story['title']; ?>
						</a>
				</div>

				<div class="listStory-description">
					<?php echo $story['description']; ?>
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
					
					<a class="comments" href="../pages/story.php?id=<?php echo $story['id']; ?>"><?php echo $story['nrComm']; ?> comments</a>
				</footer>
			</div>
		</article>
		<?php } ?>
</section>