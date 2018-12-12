<section id="stories">
	<?php foreach ($stories as $key => $story) { ?>

		<article>
			<header>
				<h1>
					<a href="../pages/story.php?id=<?php echo $story['id']; ?>">
						<?php echo $story['karma']; ?> - <?php echo $story['title']; ?>
					</a>
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
				
				<a class="comments" href="../pages/story.php?id=<?php echo $story['id']; ?>">comment</a>
			</footer>
		</article>

	<?php } ?>
</section>