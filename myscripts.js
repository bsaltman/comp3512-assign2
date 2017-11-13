// JavaScript File
function expandDiv() {
    var x = document.getElementsByClassName("buttonDiv");
    for (var i = 0; i < x.length; i++) {
        if (x[i].style.display === "none" || x[i].style.display === "") {
        x[i].style.display = "block";
        document.getElementById("buttonExpand").innerHTML = "Hide Filters";
    } else {
        x[i].style.display = "none";
        document.getElementById("buttonExpand").innerHTML = "Show Filters";
    }

    }
}

function logOut(){
    function logOut() {
        document.location = 'logout.php';
    }
}

function overlay() {
	el = document.getElementById("overlay");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}