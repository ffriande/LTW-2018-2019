
<section id="stories">

	<form action="../actions/action_sort.php" method="POST">

		<div class="form-group">
		        
		        <label for="sorting">Sort stories by: </label>
		        <select id="sorting" name="sort">
		            <option value="recent">Most Recent</option>
		            <option value="oldest">Oldest</option>
		            <option value="mostK">Most Karma</option>
		            <option value="leastK">Least Karma</option>
		            <option value="mostComments">Most Commented</option>
		            <option value="leastComments">Least Commented</option>
		        </select>
				</div>
			<div class="form-group">
				<input type="submit" name="submit" value="submit">
			</div>
		</form>
    </div>			
	<?php function draw_stories($stories){?>
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
				
				<a class="comments" href="../pages/story.php?id=<?php echo $story['id']; ?>"><?php echo $story['nrComm']; ?> comments</a>
			</footer>
		</article>
		<?php } ?>
	<?php } ?>
</section>