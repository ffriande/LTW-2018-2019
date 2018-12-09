 <section>

  <h1>
    <?php echo $story['title']; ?>
  </h1>

  <p>
    <?php echo $story['description'] ?>
  </p>

 </section>

<h2>comments</h2>
 <table id="table_comments">
  <tr>
    <th>Vote</th>
    <th>Description</th>
    <th>Date</th>
  </tr>

  <?php foreach ($comments as $key => $comment) { ?>
    <tr id="story_slug">
      <td>
        <a href="javascript:void();" class="upvote">&uparrow;</a>
        <a href="javascript:void();" class="downvote">&downarrow;</a>
      </td>
      <td>
        <?php echo $comment['description']; ?>
      </td>
      <td>
        <?php echo $story['date']; ?>
      </td>
    </tr>
  <?php } ?>
</table>