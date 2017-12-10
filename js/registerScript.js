
window.addEventListener("load",	function(){
 var reqfields = document.querySelectorAll(".required");
 
 var form = document.querySelector("#registerForm");
 form.addEventListener("submit",function(e){
		    for (var j = 0; j < reqfields.length;j++){
		        if(reqfields[j].value == ''){
		            e.preventDefault();
		            reqfields[j].classList.add("error");
		            document.querySelector("#missingErrorMessage").innerHTML = "<strong>Missing Required Fields</strong>";
		        }
		    }
		    if(document.querySelector("#Password").value != document.querySelector("#Re-Password").value){
		    		e.preventDefault();
		    		document.querySelector("#errorMessage").innerHTML = "<strong>Passwords do not match</strong>";
		    		document.querySelector("#Password").classList.add("error");
		    		document.querySelector("#Re-Password").classList.add("error");
		    }
		})
    for (var k = 0; k < reqfields.length; k++){
		        reqfields[k].addEventListener("input",function(e){
		            e.target.classList.remove("error");
		        })
		        
		    }
})
