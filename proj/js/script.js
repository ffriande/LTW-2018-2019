'use strict';

let select = document.getElementById("sorting");
if(select) {
	select.addEventListener("change", sortChanged);
}
// Handler for change event on color select
function sortChanged(event) {

    document.location.href = "../pages/stories.php?sort=" + event.target.value;
    
}

function removeStoryKarma(story_id, adder = 1) {

	var element = document.querySelector("#story-holder-"+story_id+" #karma");

	element.innerHTML = parseInt(element.innerHTML) - adder;

}

function addStoryKarma(story_id, adder = 1) {

	var element = document.querySelector("#story-holder-"+story_id+" #karma");

	element.innerHTML = parseInt(element.innerHTML) + adder;
}

function removeCommentKarma(comment_id, adder = 1) {

	var element = document.querySelector("#comment-holder-"+comment_id+" #karma");

	element.innerHTML = parseInt(element.innerHTML) - adder;

}

function addCommentKarma(comment_id, adder = 1) {

	var element = document.querySelector("#comment-holder-"+comment_id+" #karma");

	element.innerHTML = parseInt(element.innerHTML) + adder;
}


function upvoteStory(story_id) {
	
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {

		var adder = 1;

	    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
	       if (xmlhttp.status == 200) {

				var element = document.querySelector("#story-holder-"+story_id+" .downvote");
				if(element) {
					adder = 2
					element.classList.remove("voted");
				}

				var elementVoted = document.querySelector("#story-holder-"+story_id+" .upvote.voted");
				if(elementVoted) {

					
					removeStoryKarma( story_id );
					elementVoted.classList.remove("voted");

				} else {

					addStoryKarma( story_id, adder );
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

		var adder = 1;

	    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
	       	if (xmlhttp.status == 200) {

				var element = document.querySelector("#story-holder-"+story_id+" .upvote");
				element.classList.remove("voted");

				var elementVoted = document.querySelector("#story-holder-"+story_id+" .downvote.voted");
				if(elementVoted) {

					addStoryKarma( story_id );
					elementVoted.classList.remove("voted");

				} else {

					removeStoryKarma( story_id, adder );
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

		var adder = 1;

	    if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
	       	if (xmlhttp.status == 200) {

		       	var element = document.querySelector("#comment-holder-"+comment_id+" .downvote");
		       	if(element) {
		       		element.classList.remove("voted");
		       	}

		       	var elementVoted = document.querySelector("#comment-holder-"+comment_id+" .upvote.voted");
		       	if(elementVoted) {

		       		removeCommentKarma( comment_id );
		       		elementVoted.classList.remove("voted");

		       	} else {

		       		addCommentKarma( comment_id, adder );
		       		var elementNotVoted = document.querySelector("#comment-holder-"+comment_id+" .upvote");
		       		elementNotVoted.classList.add("voted");

		       	}

	       } else if (xmlhttp.status == 400) {

	          alert('There was an error 400');

	       } else {

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

					addCommentKarma( comment_id );
					elementVoted.classList.remove("voted");

				} else {

					removeCommentKarma( comment_id, adder );
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


