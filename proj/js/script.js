'use strict';

let select = document.getElementById("sorting");
if(select) {
	select.addEventListener("change", sortChanged);
}
// Handler for change event on color select
function sortChanged(event) {

    document.location.href = "../pages/stories.php?sort=" + event.target.value;
    
}


function upvoteStory(story_id) {
	
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
	    if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
	       if (xmlhttp.status == 200) {

				var element = document.querySelector("#story-holder-"+story_id+" .downvote");
				if(element) {
					element.classList.remove("voted");
				}

				var elementVoted = document.querySelector("#story-holder-"+story_id+" .upvote.voted");
				if(elementVoted) {

					elementVoted.classList.remove("voted");

				} else {

					var elementNotVoted = document.querySelector("#story-holder-"+story_id+" .upvote");
					elementNotVoted.classList.add("voted");

				}

	       }
	       else if (xmlhttp.status == 400) {
	          alert('There was an error 400');
	       }
	       else {
	           alert('something else other than 200 was returned');
	       }
	    }
	};

	xmlhttp.open("GET", "../actions/action_story_upvote.php?id="+story_id, true);

	xmlhttp.send();
}

function downvoteStory(story_id) {
	
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
	    if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
	       	if (xmlhttp.status == 200) {

				var element = document.querySelector("#story-holder-"+story_id+" .upvote");
				element.classList.remove("voted");

				var elementVoted = document.querySelector("#story-holder-"+story_id+" .downvote.voted");
				if(elementVoted) {

					elementVoted.classList.remove("voted");

				} else {

					var elementNotVoted = document.querySelector("#story-holder-"+story_id+" .downvote");
					elementNotVoted.classList.add("voted");

				}
	       		
	       	}
	       	else if (xmlhttp.status == 400) {
				alert('There was an error 400');
	       	}
	       	else {
				alert('something else other than 200 was returned');
	       	}
	    }
	};

	xmlhttp.open("GET", "../actions/action_story_downvote.php?id="+story_id, true);

	xmlhttp.send();
}

function upvoteComment(comment_id) {
	
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
	    if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
	       if (xmlhttp.status == 200) {

	       	var element = document.querySelector("#comment-holder-"+comment_id+" .downvote");
	       	if(element) {
	       		element.classList.remove("voted");
	       	}

	       	var elementVoted = document.querySelector("#comment-holder-"+comment_id+" .upvote.voted");
	       	if(elementVoted) {

	       		elementVoted.classList.remove("voted");

	       	} else {

	       		var elementNotVoted = document.querySelector("#comment-holder-"+comment_id+" .upvote");
	       		elementNotVoted.classList.add("voted");

	       	}

	       }
	       else if (xmlhttp.status == 400) {
	          alert('There was an error 400');
	       }
	       else {
	           alert('something else other than 200 was returned');
	       }
	    }
	};

	xmlhttp.open("GET", "../actions/action_comment_upvote.php?id="+comment_id, true);

	xmlhttp.send();
}

function downvoteComment(comment_id) {
	
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
	    if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
	       if (xmlhttp.status == 200) {

				var element = document.querySelector("#comment-holder-"+comment_id+" .upvote");
				element.classList.remove("voted");

				var elementVoted = document.querySelector("#comment-holder-"+comment_id+" .downvote.voted");
				if(elementVoted) {

					elementVoted.classList.remove("voted");

				} else {

					var elementNotVoted = document.querySelector("#comment-holder-"+comment_id+" .downvote");
					elementNotVoted.classList.add("voted");

				}
	       		
	       }
	       else if (xmlhttp.status == 400) {
	          alert('There was an error 400');
	       }
	       else {
	           alert('something else other than 200 was returned');
	       }
	    }
	};

	xmlhttp.open("GET", "../actions/action_comment_downvote.php?id="+comment_id, true);
	
	xmlhttp.send();
}


