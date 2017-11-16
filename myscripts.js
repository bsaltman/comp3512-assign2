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

    function logOut() {
        document.location = 'logout.php';
    }

function overlay() {
	el = document.getElementById("overlay");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}


document.querySelector("#logout").addEventListener("click",function logOut(){
    window.location.href = "./logout.php";
}

)

document.querySelector("#menuDropdown").addEventListener("click",function dropDown(){
    var icon = document.querySelector("#menuDropdown");
    var dropDown = document.querySelector("#filterCard .mdl-card__supporting-text");
    if(dropDown.style.display === "block"){
        dropDown.style.display = "none";
        icon.innerHTML = "arrow_drop_down";
    }else{
        dropDown.style.display = "block";
        icon.innerHTML = "arrow_drop_up";
    }
}
)
