 <table id="table_stories">
  <tr>
    <th>Vote</th>
    <th>Title</th>
    <th>Description</th>
    <th>Date</th>
    <th>View</th>
    <th>Comment</th>
  </tr>

  <?php foreach ($stories as $key => $story) { ?>
    <tr id="story_slug">
      <td>
      	<a href="javascript:void();" class="upvote">&uparrow;</a>
      	<a href="javascript:void();" class="downvote">&downarrow;</a>
      </td>
      <td>
      	<?php echo $story['title']; ?>
      </td>
      <td>
        <?php echo $story['description']; ?>
      </td>
      <td>
        <?php echo $story['date']; ?>
  	</td>
      <td>
      	<a href="../pages/story.php?id=<?php echo $story['id']; ?>">view</a>
  	</td>
      <td>
      	<a href="../pages/story.php?id=<?php echo $story['id']; ?>#comment">comment</a>
      </td>
    </tr>
  <?php } ?>
</table>






    <section id="news">
      <article>
        <header>
          <h1><a href="item.html">Quisque a dapibus magna, non scelerisque</a></h1>
        </header>
        <img src="http://lorempixel.com/600/300/business/" alt="">
        <p>Etiam massa magna, condimentum eu facilisis sit amet, dictum ac purus. Curabitur semper nisl vel libero pulvinar ultricies. Proin dignissim dolor nec scelerisque bibendum. Maecenas a sem euismod, iaculis erat id, convallis arcu. Ut mollis, justo vitae suscipit imperdiet, eros dui laoreet enim, fermentum posuere felis arcu vel urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin blandit ex sit amet suscipit commodo. Duis molestie ligula eu urna tincidunt tincidunt. Mauris posuere aliquet pellentesque. Fusce molestie libero arcu, ut porta massa iaculis sit amet. Fusce varius nisl vitae fermentum fringilla. Pellentesque a cursus lectus.</p>
          <p>Duis condimentum metus et ex tincidunt, faucibus aliquet ligula porttitor. In vitae posuere massa. Donec fermentum magna sit amet suscipit pulvinar. Cras in elit sapien. Vivamus nunc sem, finibus ac suscipit ullamcorper, hendrerit vitae urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque eget tincidunt orci. Mauris congue ipsum non purus tristique, at venenatis elit pellentesque. Etiam congue euismod molestie. Mauris ex orci, lobortis a faucibus sed, sagittis eget neque.</p>
          <p>Mauris tincidunt orci congue turpis viverra pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque rhoncus lorem eget.</p>
        <footer>
          <span class="author">Dominic Woods</span>
          <span class="tags"><a href="index.html">#politics</a> <a href="index.html">#economy</a></span>
          <span class="date">15m</span>
          <a class="comments" href="item.html#comments">5</a>
        </footer>
      </article>


      
      <article>
        <header>
          <h1><a href="item.html">Vivamus fermentum dui nisi, at posuere</a></h1>
        </header>
        <img src="http://lorempixel.com/600/300/city/" alt="">
        <p>Donec magna sapien, feugiat vel commodo et, aliquam in purus. Duis posuere, orci eu mollis lobortis, eros augue aliquam augue, et posuere metus nisl semper quam. In tortor nulla, iaculis at varius a, pharetra et lectus. Pellentesque convallis nibh id justo pellentesque, at sollicitudin ex auctor. Nulla ornare rutrum est, ac faucibus turpis interdum et. Vivamus nisi metus, tempor in dapibus in, vestibulum eget diam. Nunc tristique ante eu diam porta, id consectetur ligula sagittis. Pellentesque eu leo vel felis eleifend luctus eget sit amet ligula. Ut semper ante tristique interdum imperdiet. Mauris et libero varius, sollicitudin turpis at, ullamcorper.</p>
        <p>Nullam et arcu non tellus congue ultrices id id enim. Donec malesuada, neque ut euismod ullamcorper, massa dui congue ante, quis scelerisque enim arcu vel turpis. Praesent ornare elementum finibus. Integer aliquam risus ac lorem mollis, sit amet dignissim dolor faucibus. Praesent non eros ut ligula rhoncus egestas. Duis ex nibh, maximus eget vulputate nec, sagittis in ex. Suspendisse potenti.</p>
        <p>Praesent pellentesque, nisi ut ultrices sagittis, mauris urna tincidunt nibh, eu faucibus ante nisi eu nisl. Quisque commodo est non sapien rhoncus, a fringilla tellus ultricies. Curabitur eget massa mauris. Sed semper ultrices ante, in cursus enim vehicula at. Praesent.</p>
        <footer>
          <span class="author">Zachary Young</span>
          <span class="tags"><a href="index.html">#local</a> <a href="index.html">#life</a></span>
          <span class="date">2h</span>
          <a class="comments" href="item.html#comments">0</a>
        </footer>
      </article>
      <article>
        <header>
          <h1><a href="item.html">Donec placerat tempor ex sit amet</a></h1>
        </header>
        <img src="http://lorempixel.com/600/300/nature/" alt="">
        <p>Nam aliquet leo vel scelerisque sagittis. Praesent hendrerit lectus et augue condimentum, vitae dapibus elit bibendum. Quisque id sapien nec nisl commodo vulputate. Cras vehicula semper lectus. Duis a purus in velit iaculis luctus id ac justo. Mauris a lectus eu dui aliquam pretium nec a massa. Suspendisse risus metus, laoreet quis velit eu, mollis auctor tellus. Maecenas vulputate, nulla a commodo porttitor, urna arcu viverra dolor, a eleifend lectus leo a justo.</p>
        <p>Morbi bibendum volutpat pellentesque. In bibendum est et orci semper rhoncus. Sed cursus vel orci sed malesuada. Fusce ac dictum ligula, quis hendrerit ipsum. Proin hendrerit a.</p>
        <p>Nulla commodo eu nulla ac facilisis. Donec ante lorem, tincidunt nec interdum vulputate, fringilla a urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sapien erat, suscipit a nisl sed, molestie convallis eros. Curabitur egestas massa et metus dignissim, et vestibulum libero porttitor. Sed non metus pharetra, lobortis orci a, commodo diam. Praesent a sagittis massa, quis condimentum augue. Donec id est feugiat ipsum egestas vulputate vel in dolor. Pellentesque pretium placerat lorem, sed sodales diam molestie a. Donec dictum dui ut accumsan tempor. Nam vestibulum in erat et sagittis. Donec venenatis, ante vitae tristique tristique, nisi metus aliquet.</p>
        <footer>
          <span class="author">Alicia Hamilton</span>
          <span class="tags"><a href="index.html">#nature</a> <a href="index.html">#science</a></span>
          <span class="date">17h</span>
          <a class="comments" href="item.html#comments">2</a>
        </footer>
      </article>
      <article>
        <header>
          <h1><a href="item.html">Lorem ipsum dolor sit amet, consectetur</a></h1>
        </header>
        <img src="http://lorempixel.com/600/300/transport/" alt="">
        <p>Nulla facilisi. Proin et lectus dapibus, fermentum nisi a, varius nulla. Sed massa dolor, commodo at iaculis id, facilisis ut erat. Ut ac fringilla sem. Ut vel eros suscipit, convallis arcu porttitor, fringilla purus. Pellentesque eget sapien sem. Maecenas eget pharetra ipsum. Ut sollicitudin sem non feugiat pharetra.</p>
        <p>Aliquam justo nibh, lacinia suscipit odio nec, condimentum tincidunt urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacus mi, blandit nec dolor in, ultrices condimentum elit. Quisque interdum, ante non pellentesque viverra, ipsum velit ultrices tortor, id rhoncus orci est at augue. In hac habitasse platea dictumst. Donec dolor nisi.</p>
        <p>
Suspendisse potenti. Nullam lacinia dictum massa sed sagittis. Sed id ultrices libero. Cras convallis commodo ante, quis sagittis erat vulputate et. Cras nunc lorem, mollis a nibh eget, dignissim auctor lorem. Suspendisse placerat convallis ante vitae dapibus. Donec tellus felis, tincidunt eget iaculis eget, varius non turpis. Curabitur in eros at sapien fringilla venenatis eu a risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque eu consectetur tellus. Suspendisse vitae urna ex. Cras sit amet enim id turpis gravida lacinia a vitae lacus. Vivamus augue ante, pellentesque sed semper non, rutrum ornare ante. Orci varius.</p>
        <footer>
          <span class="author">Abril Cooley</span>
          <span class="tags"><a href="index.html">#transports</a> <a href="index.html">#vehicles</a></span>
          <span class="date">1d</span>
          <a class="comments" href="item.html#comments">5</a>
        </footer>
      </article>
    </section>




<style type="text/css">
	
	#table_stories {
		width:100%;
	}

</style>