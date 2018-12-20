<?php if (isset($_SESSION['messages'])) {?>
	<section id="messages">
		<?php foreach($_SESSION['messages'] as $message) { ?>

			<div class="<?=$message['type']?>">-><?=$message['content']?><br></div>

		<?php } ?>
	</section>
	
	<?php unset($_SESSION['messages']); ?>
<?php } ?>

<section id="core" >
	<!--<section id="app-promo">
		<img src="../images/sigarrit_full_logo.png" alt="Logo" width="700" height="380">
		<div class="promo-slogans">
			<h1>Your daily feed</h1>
		</div>
		<p>slogan</p>
	</section>

	<div class="wrapper-divider">
		<div class="divider"></div>
	</div>-->
	
	<section id="create-story" >
		<h2>Create Story</h2>
			
		<form action="../actions/action_add_story.php" method="POST">

			<div class="form-group">

				<label>Title: 
					<input type="text" name="title" value="" placeholder="Title" autocomplete="off" required>
				</label>

			</div>

			<div class="form-group">

				<label for="description">Description: </label>
				<textarea id="description" name="description" placeholder="What's in your mind?" required rows="5"></textarea>

			</div>

			<div class="form-group">

				<input type="submit" value="Create">

			</div>

		</form>
	</section>
</section>