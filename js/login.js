var passwordField = document.querySelector("#Password");
passwordField.classList.add("error");


var usernameField = document.querySelector("#Username");
usernameField.classList.add("error");

var errorMessage = document.querySelector("#Errormessage");

passwordField.addEventListener("input",function(e){
		            e.target.classList.remove("error");
		            errorMessage.innerHTML = "";
		        })
		        
usernameField.addEventListener("input",function(e){
		            e.target.classList.remove("error");
		            errorMessage.innerHTML = "";
		        })
		        
