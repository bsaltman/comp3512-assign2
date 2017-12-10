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
	var el = document.getElementById("overlay");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}
//code provided by google maps api 
 function initMap() {
        var latitude = $("#lati").text();
        var longitude = $("#long").text();
          var uluru = {lat: (parseFloat(latitude)), lng: parseFloat(longitude)};
          var map = new google.maps.Map(document.getElementById('mapCard'), {
            zoom: 9,
            center: uluru
          });
          var marker = new google.maps.Marker({
            position: uluru,
            map: map
          });
          $("#Gone").html("");
        }
    
    window.addEventListener("load",	function(){
    
        
    $("#showMap").click(function(e){
         $("#mapCard").toggle();
    })

    document.querySelector("#executeSearch").addEventListener("mouseover",function(){
        document.querySelector("#executeSearch").style.boxShadow = "5px 5px 5px #8da2c4";
    })
    
    document.querySelector("#executeSearch").addEventListener("mouseout",function(){
        document.querySelector("#executeSearch").style.boxShadow = null;
    })
    
    document.querySelector("#executeSearch").addEventListener("click",function(){
        document.querySelector("#searchForm").submit();
    })
    
    document.querySelector("#search").addEventListener("click",function showSearch(){
    var dropSearch = document.querySelector("#searchInput");
    if(dropSearch.style.display === "block"){
        dropSearch.style.display = "none";

    }else{
        dropSearch.style.display = "block";
        document.getElementById("searchBar").focus();

    }
}
)


document.querySelector("#logout").addEventListener("click",function(){
    window.location.href = "./logout.php?page=" + window.location.pathname.replace("/", "");
}

)

var downArrow = document.querySelector("#menuDropdown");
downArrow.addEventListener("click",function dropD(){
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
})
