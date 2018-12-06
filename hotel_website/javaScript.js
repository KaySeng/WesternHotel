	function validateUserName(element){
		var fn=element.value;
		var len = fn.length;
		
		if (len > 20){
			alert('User Name has to be under 20 characters long');
			element.focus();
			element.select();
		}
		else{
			if(element.value == ""){
				alert('must be unique username')
				element.focus();
				element.select();
			}
		}
	}
	function validatePass(myForm){
		var pass = document.getElementById('pWord').value;
		var Length = pass.length;
		if(Length>=6 && Length<=20)
		{
		}
		else
		{
			alert('please enter a minimum of 6 to 20 characters long');
			pWord.focus();
			pWord.select();
		}
	}
	
	function validaterPass(myForm){
		var rPass = myForm.repWord.value;
		var pass = myForm.pWord.value;
		
		if (rPass == pass){
			
		}
		else
		{
			alert("password does not match");
			rPass.focus();
			rPass.select();
		}	
		 
	}
	
	function validategName(element) {
	var namepattern = /^[a-zA-Z\-\''\s]+$/;
	var fn=element.value;
	var len = fn.length;
	
	if (len > 20){
		alert('Please enter at most 20 characters long');;
	}
	
    if (!namepattern.test(element.value)) {
        // Get the label and use it for the alert message
        alert(" can only contain alphabetical letters and hyphen!");
        element.focus();
        element.select();
    }
}

function validateAddress(element){
	
	var fn=element.value;
	var len = fn.length;
	
	if (len > 40){
		alert('Please enter at most 40 characters long');;
	}
}

function validatePhoneNumber(element){
	var namepattern = /^04\d{8}$/gm ; // (0d) dddd dddd where d is numbers  
	
	
	if (!namepattern.test(element.value)){
		confirm("can only accept sdfdsfd number!");
		// alert("can only accept digit number!");
		// document.getElementById("mobile").focus();
		// document.getElementById("mobile").select();
		
	}
}

function validateEmail(element){
	// http://stackoverflow.com/questions/46155/validate-email-address-in-javascript for email pattern
	var namepattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; 
	 var fn=element.value;
	var len = fn.length;
	
	if (len > 40){
		alert('Please enter at most 40 characters long');;
	}
	 if (!namepattern.test(element.value)) {
        // Get the label and use it for the alert message
        alert(" Please enter the correct format: JohnSmith@gmail.com.au");
        element.focus();
        element.select();
    }
}

function validatePostcode(element){
	var namepattern = /^[0-9]+$/;
	var fn=element.value;
	var len = fn.length;
	
	// allow user to input 4 to 7 numbers
	if (len !== 4 ){
		alert("Please enter a number 4 digits number ");
		element.focus();
		element.select();
	}
	
	 if (!namepattern.test(element.value)) {
        // Get the label and use it for the alert message
        alert("Please enter 4 digits number");
        element.focus();
        element.select();
    }
}
