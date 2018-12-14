<section id="stories">
<?php//a ideia aqui era, ao clicar na opção, a pagina dar logo reload, mas não está completo, estta a dar erro ?>
	<div class="choose-sort">
		<form action="../actions/action_sort.php">
        <label for="sort">Sort stories by: </label>
        <select id="sorting">
            <option value="recent" id="recent">Most Recent</option>
            <option value="oldest" id="oldest">Oldest</option>
            <option value="mostK" id="mostK">Most Karma</option>
            <option value="leastK" id="leastK">Least Karma</option>
            <option value="mostComments" id ="mostComments">Most Commented</option>
            <option value="leastComments" id="leastComments">Least Commented</option>
        </select>
		</form>
    </div>
	<?php if($sort= $_POST['sort']) //isto não deve estar bem, a ideia é se nao tiver sort=x no link, lista os com maior karma
			$stories = getAllStories( $sort);
		  else
		 	 $stories = getAllStories( "mostK");?>
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