'use strict';

let select = document.getElementById("sorting");

select.addEventListener("change", sortChanged);
// Handler for change event on color select
function sortChanged(event) {

    document.location.href = "../pages/stories.php?sort=" + event.target.value;
    
}
